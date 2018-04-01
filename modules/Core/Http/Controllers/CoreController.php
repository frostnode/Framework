<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class CoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        // Set roles that have access
        $request->user()->authorizeRoles(['admin', 'editor']);

        // Return index view
        return view('core::index');
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Response
     */
    public function settings(Request $request)
    {
        // Set roles that have access
        $request->user()->authorizeRoles(['admin']);

        // Return settings view
        return view('core::settings');
    }

}
