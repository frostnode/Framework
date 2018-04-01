<?php

namespace Modules\Settings\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class SettingsController extends Controller
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
        $request->user()->authorizeRoles(['admin']);

        // Return view
        return view('settings::index');
    }

    /**
     * Show the form for creating a new resource.
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        // Set roles that have access
        $request->user()->authorizeRoles(['admin']);

        // Return view
        return view('settings::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param Request $request
     * @return Response
     */
    public function show(Request $request)
    {
        // Set roles that have access
        $request->user()->authorizeRoles(['admin']);

        // Return view
        return view('settings::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param Request $request
     * @return Response
     */
    public function edit(Request $request)
    {
        // Set roles that have access
        $request->user()->authorizeRoles(['admin']);

        // Return view
        return view('settings::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
        //
    }
}
