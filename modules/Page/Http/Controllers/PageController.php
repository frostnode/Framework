<?php

namespace Modules\Page\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Page\Repositories\PageRepository;

class PageController extends Controller
{
    /**
     * @var $task
     */
    private $page;

    /**
     * TaskController constructor.
     *
     * @param App\Repositories\TaskRepository $task
     */
    public function __construct(PageRepository $page)
    {
        $this->page = $page;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('page::index');
    }

    /**
     * Show the form for selecting a new resource.
     * @return Response
     */
    public function select()
    {

        // Get all pagetypes
        $page_types = \Modules\Page\Entities\PageType::listAll();

        //dd($page_types);

        return view('page::select', ['page_types' => $page_types]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create($id = null)
    {
        if (!$id) {
            return redirect()->route('admin.pages.page.select');
        }

        return view('page::create', ['pagetype' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
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
        return view('page::edit');
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
