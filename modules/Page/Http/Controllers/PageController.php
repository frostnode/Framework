<?php

namespace Modules\Page\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Page\Repositories\PageRepository;
use Modules\Page\Entities\PageType;
use Collective\Html\FormBuilder as Form;

class PageController extends Controller
{

    /**
     * @var $task
     */
    private $page;

    protected $form;

    /**
     * TaskController constructor.
     *
     * @param App\Repositories\TaskRepository $task
     */
    public function __construct(PageRepository $page, Form $form)
    {
        $this->page = $page;
        $this->form = $form;
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
        $page_types = PageType::all();

        return view('page::select', ['page_types' => $page_types]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create($pagetype = null)
    {
        if (!$pagetype) {
            return redirect()->route('admin.pages.page.select');
        }

        $pagetype = PageType::where('machine_name', $pagetype)->first();

        $fields = json_decode($pagetype->content, true); // Added decode, cast to json breaks on updating model in pagetypecontroller

        $form = [];
        $helptext = "";

        // Add fields defined in pagetypes
        foreach ($fields as $type => $attributes) {
            // Simple logic to select appropriate field type
            switch ($type) {
                case 'input':
                    $form[] = $this->form->input($type, null, null, $attributes);
                    break;
                case 'textarea':
                    $form[] = $this->form->textarea('bar', null, $attributes);
                    break;
                default:
                    break;
            }

            // Add support for help text
            $help_template = "<p class='help'>{$helptext}</p>";
        }

        // Wrap all items in .field class
        $form = array_map(function ($form) {
            return '<div class="field">'.$form.'</div>';
        }, array_values($form));

        $form = implode("\n", $form);

        return view('page::create', [
            'pagetype' => $pagetype,
            'form' => $form
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
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
