<?php

namespace Modules\Page\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use Modules\Page\Entities\Page;
use Modules\Page\Entities\PageType;
use Kris\LaravelFormBuilder\FormBuilder;

class PageController extends Controller
{
    // Set some defaults
    const PAGINATION_ITEMS = 50;

    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @param null $status
     * @return Response
     */
    public function index(Request $request, $status = null)
    {
        // Set roles that have access
        $request->user()->authorizeRoles(['admin', 'editor']);

        $status = $request->get('status');
        $query = $request->get('query');

        $pages = Page::ofStatus($status)
            ->orderBy('updated_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->with('pagetype')
            ->paginate(self::PAGINATION_ITEMS);

        return view('page::pages.index', [
            'pages' => $pages,
            'status' => $status,
            'query' => $query
        ]);
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @param null $status
     * @return Response
     * @todo: This should be merged into index method
     */
    public function search(Request $request, $status = null)
    {
        // Set roles that have access
        $request->user()->authorizeRoles(['admin', 'editor']);

        $status = $request->get('status');
        $query = $request->get('query');

        $pages = Page::ofStatus($status)
            ->where('title', 'ilike', '%'.$query.'%')
            ->orderBy('updated_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->with('pagetype')
            ->paginate(self::PAGINATION_ITEMS);

        return view('page::pages.index', [
            'pages' => $pages,
            'status' => $status,
            'query' => $query
        ]);
    }

    /**
     * Display a listing of trashed resources.
     * @param Request $request
     * @return Response
     * @todo: This should be merged into index method
     */
    public function trashed(Request $request)
    {
        // Set roles that have access
        $request->user()->authorizeRoles(['admin', 'editor']);

        $pages = Page::onlyTrashed()
            ->orderBy('updated_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->with('pagetype')
            ->paginate(self::PAGINATION_ITEMS);

        return view('page::pages.trashed', ['pages' => $pages]);
    }

    /**
     * Show the form for selecting a new resource.
     * @param Request $request
     * @return Response
     */
    public function select(Request $request)
    {
        // Set roles that have access
        $request->user()->authorizeRoles(['admin', 'editor']);

        // Get all pagetypes
        $pagetypes = PageType::all();
        return view('page::pages.select', ['pagetypes' => $pagetypes]);
    }

    /**
     * Show the form for creating a new resource.
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @param $id
     * @return Response
     */
    public function create(Request $request, FormBuilder $formBuilder, $id)
    {
        // Set roles that have access
        $request->user()->authorizeRoles(['admin', 'editor']);

        // Check if pagetype id exist, otherwise gtfo
        if (!$id) {
            return redirect()->route('admin.pages.page.select');
        }

        // Get pagetype, or fail..
        $pagetype = PageType::findOrFail($id);

        // Get fields
        $fields = $pagetype->fields ?: [];

        // Build the form
        $form = $formBuilder->createByArray($fields, [
            'method' => 'POST',
            'url' => route('admin.pages.page.store'),
            'name' => 'content'
        ]);

        return view('page::pages.create', [
            'pagetype' => $pagetype,
            'form' => $form
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param FormBuilder $formBuilder
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request, FormBuilder $formBuilder)
    {
        // Set roles that have access
        $request->user()->authorizeRoles(['admin', 'editor']);

        // Get pagetype, or fail..
        $pagetype = PageType::where('model', $request->pagetype_model)->first();

        // Get form fields
        $fields = $pagetype->fields ?: [];

        // Build the form
        $form = $formBuilder->createByArray($fields, [
            'method' => 'POST',
            'url' => route('admin.pages.page.store'),
            'name' => 'content'
        ]);

        // Validate required page fields (title, slug, status etc)
        $request->validate([
            'title' => 'bail|required|min:2|max:255',
            // 'slug' => 'required|unique',
        ]);


        // Validate custom form fields
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        // Store the post
        $page = new Page;

        // Page data
        $page->uuid = (string) Str::uuid();
        $page->title = $request->input('title');
        $page->pagetype_model = $request->input('pagetype_model');
        $page->content = $request->input('content');
        $page->status = $request->input('status') ? 2 : 1;
        $page->lang_id = 1;
        $page->user_id = 1;

        $page->save();

        flash('The page was successfully saved')->success();

        return redirect()->route('admin.pages.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($slug)
    {
        $page = Page::where('slug', $slug)->first();

        if (!$page) {
            abort(404);
        }

        return view('show', ['page' => $page]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @param $page
     * @return Response
     */
    public function edit(Request $request, FormBuilder $formBuilder, $page)
    {
        // Set roles that have access
        $request->user()->authorizeRoles(['admin', 'editor']);

        $page = Page::withTrashed()->findOrFail($page);

        // Get pagetype, or fail..
        $pagetype = PageType::where('model', $page->pagetype_model)->first();

        // Get form fields
        $fields = $pagetype->fields ?: [];

        // Get content
        $content = $page->content;

        // Build the form content[body]
        $form = $formBuilder->createByArray($fields, [
            'method' => 'PUT',
            'url' => route('admin.pages.page.update', $page),
            'name' => 'content',
            'model' => $content
        ]);

        return view('page::pages.edit', [
            'page' => $page,
            'pagetype' => $pagetype,
            'form' => $form
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param FormBuilder $formBuilder
     * @param  Request $request
     * @param $page
     * @return Response
     */
    public function update(Request $request, FormBuilder $formBuilder, $page)
    {
        // Set roles that have access
        $request->user()->authorizeRoles(['admin', 'editor']);

        // Get page
        $page = Page::withTrashed()->findOrFail($page);

        // Get pagetype, or fail..
        $pagetype = PageType::where('model', $page->pagetype_model)->first();

        // Get fields
        $fields = $pagetype->fields ?: [];

        // Build the form
        $form = $formBuilder->createByArray($fields, [
            'method' => 'POST',
            'url' => route('admin.pages.page.store'),
            'name' => 'content'
        ]);

        // It will automatically use current request, get the rules, and do the validation
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        // Page data
        $page->title = $request->input('title');
        $page->content = $request->input('content');
        $page->status = $request->input('status') ? 2 : 1;

        $page->update();

        flash('The page was successfully updated')->success();

        return redirect()->route('admin.pages.index');
    }


    /**
     * Display a delete page.
     * @param Request $request
     * @param $page
     * @return View
     */
    public function delete(Request $request, $page)
    {
        // Set roles that have access
        $request->user()->authorizeRoles(['admin', 'editor']);

        $page = Page::withTrashed()->findOrFail($page);
        return view('page::pages.delete', ['page' => $page]);
    }

    /**
     * Remove the specified resource from storage.
     * @param Request $request
     * @param $page
     * @return Response
     */
    public function restore(Request $request, $page)
    {
        // Set roles that have access
        $request->user()->authorizeRoles(['admin', 'editor']);

        $page = Page::withTrashed()->findOrFail($page);
        $page->restore();

        flash('Page has been successfully restored')->success();

        return back();
    }


    /**
     * Remove the specified resource from storage.
     * @param Request $request
     * @param $page
     * @return Response
     */
    public function destroy(Request $request, $page)
    {
        // Set roles that have access
        $request->user()->authorizeRoles(['admin', 'editor']);

        $page = Page::withTrashed()->findOrFail($page);

        if ($page->trashed() && !$request->input('confirm_delete')) {
            return redirect()->route('admin.pages.page.delete', $page);
        }

        if ($request->input('confirm_delete')) {
            $page->forceDelete();
            return redirect()->route('admin.pages.index.trashed');
        }

        $page->status = 1;
        $page->save();
        $page->delete();

        flash('Page has been moved to trash')->success();

        return back();
    }
}
