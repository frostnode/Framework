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
    const PAGINATION_ITEMS = 25;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $pages = Page::paginate(self::PAGINATION_ITEMS);
        return view('page::pages.index', ['pages' => $pages]);
    }

    /**
     * Show the form for selecting a new resource.
     * @return Response
     */
    public function select()
    {
        // Get all pagetypes
        $pagetypes = PageType::all();
        return view('page::pages.select', ['pagetypes' => $pagetypes]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(FormBuilder $formBuilder, $id)
    {
        // Check if pagetype id exist, otherwise gtfo
        if (!$id) {
            return redirect()->route('admin.pages.page.select');
        }

        // Get pagetype, or fail..
        $pagetype = PageType::findOrFail($id);

        // Get fields
        $fields = $pagetype->fields;

        // Build the form
        $form = $formBuilder->createByArray($fields, [
            'method' => 'POST',
            'url' => route('admin.pages.page.store')
        ]);

        return view('page::pages.create', [
            'pagetype' => $pagetype,
            'form' => $form
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(FormBuilder $formBuilder, Request $request)
    {
        // Get pagetype, or fail..
        $pagetype = PageType::where('model', $request->pagetype_model)->first();

        // Get fields
        $fields = $pagetype->fields;

        // Build the form
        $form = $formBuilder->createByArray($fields, [
            'method' => 'POST',
            'url' => route('admin.pages.page.store')
        ]);

        // Generate slug is none is set..
        if (!$request->slug) {
            $slug = str_slug($request->title);
            $request->request->add(['slug' => $slug]);
        }

        // It will automatically use current request, get the rules, and do the validation
        if (!$form->isValid()) {
            return redirect()->back()->withErrors($form->getErrors())->withInput();
        }

        // Store the post
        $page = new Page;

        // Page data
        $page->uuid = (string) Str::uuid();
        $page->title = $request->input('title');
        $page->slug = $request->input('slug');
        $page->pagetype_model = $request->input('pagetype_model');
        $page->status = 1;
        $page->lang_id = 1;
        $page->user_id = 1;

        // Page content
        $page->content = $request->except(['_token', 'title', 'slug', 'pagetype_model']);

        $page->save();

        return redirect()->route('admin.pages.index');
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($slug)
    {
        $page = $this->page->getBySlug($slug)->first();

        if (!$page) {
            abort(404);
        }

        return view('show', ['page' => $page]);
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('page::pages.edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
