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
    // Set pagination defaults
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

        // Get segments from request
        $status = $request->get('status');
        $query = $request->get('query');

        // Show deleted items if status is 3
        if($status == 3) {
            // Get only deleted pages data
            $pages = Page::onlyTrashed()
                ->orderBy('updated_at', 'desc')
                ->orderBy('created_at', 'desc')
                ->with('pagetype', 'user', 'pagetype')
                ->paginate(self::PAGINATION_ITEMS);

        } else {
            // Get data, and filter by status
            $pages = Page::ofStatus($status)
                ->orderBy('updated_at', 'desc')
                ->orderBy('created_at', 'desc')
                ->with('pagetype', 'user', 'pagetype')
                ->paginate(self::PAGINATION_ITEMS);
        }

        // Return view to user
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

        // Get segments from request
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
            return redirect()->route('admin.management.pages.page.select');
        }

        // Get pagetype, or fail..
        $pagetype = PageType::findOrFail($id);

        // Get fields
        $fields = $pagetype->fields ?: [];

        // Build the form
        $form = $formBuilder->createByArray($fields, [
            'method' => 'POST',
            'url' => route('admin.management.pages.page.store'),
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
            'url' => route('admin.management.pages.page.store'),
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

        // Store media
        $this->storeMedia($request, $page);

        // Save the page
        $page->save();

        // Feedback to user
        flash('The page was successfully saved')->success();

        // Redirect the user
        return redirect()->route('admin.management.pages.index');
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

        $pagetype = str_slug($page->pagetype->name);

        return view($pagetype, ['page' => $page]);
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
        $content = $page->content ?? [];

        // Get media and set it in content
        $media = $this->getMedia($page, $fields);

        // Map all filetype fields to media source
        $content = array_merge($content, $media->all());

        // Build the form content
        $form = $formBuilder->createByArray($fields, [
            'method' => 'PUT',
            'url' => route('admin.management.pages.page.update', $page),
            'name' => 'content',
            'model' => $content
        ]);

        // Display the edit form
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
            'url' => route('admin.management.pages.page.store'),
            'name' => 'content'
        ]);

        // Validate required page fields (title, slug, status etc)
        $request->validate([
            'title' => 'bail|required|min:2|max:255',
            // 'slug' => 'required|unique',
        ]);

        // It will automatically use current request, get the rules, and do the validation
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        // Page data
        $page->title = $request->input('title');
        $page->content = $request->input('content');
        $page->status = $request->input('status') ? 2 : 1;

        // Store media
        $this->storeMedia($request, $page);

        // Update page
        $page->update();

        // User feedback
        flash('The page was successfully updated')->success();

        // Redirect the user
        return redirect()->route('admin.management.pages.index');
    }

    /**
     * Get media
     * @param Page $page
     * @param $fields
     */
    private function getMedia(Page $page, $fields) {

        if (!$fields) {
            return collect();
        }

        $media = collect();

        foreach ($fields as $field) {
            if($field['type'] === 'file') {
                $media[$field['name']] = $page->getMedia($field['name']);
            }
        }

        return $media;
    }

    /**
     * Store media
     * @param Request $request
     * @param $page
     */
    private function storeMedia(Request $request, Page $page)
    {
        // Check if the content array exist
        if($request->files->has('content')) {
            // Process all files in content area
            foreach ($request->files->get('content') as $key => $files) {

                if (count($files) == 1) {
                    // Save file
                    $page->addMedia($files[0])
                    ->withResponsiveImages()
                    ->toMediaCollection($key);
                } else {
                    // Save multiple files
                    foreach ($files as $file) {
                        $page->addMedia($file)
                            ->withResponsiveImages()
                            ->toMediaCollection($key);
                    }
                }

            }
        }
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
            return redirect()->route('admin.management.pages.page.delete', $page);
        }

        if ($request->input('confirm_delete')) {
            $page->forceDelete();
            return redirect()->route('admin.management.pages.index','status=3');
        }

        $page->status = 3;
        $page->save();
        $page->delete();

        flash('Page has been moved to trash')->success();

        return back();
    }
}
