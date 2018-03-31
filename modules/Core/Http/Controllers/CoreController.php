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
        $request->user()->authorizeRoles(['admin', 'editor']);
        return view('core::index');
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Response
     */
    public function settings(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        return view('core::settings');
    }

}
