<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\User\Entities\User;

class UserController extends Controller
{
    // Set some defaults
    const PAGINATION_ITEMS = 50;

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request, $status = null)
    {
        // Set roles that have access
        $request->user()->authorizeRoles(['admin']);

        // Get and return users to view
        $users = User::paginate(self::PAGINATION_ITEMS);
        return view('user::index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        //
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
     * @param $user
     * @return Response
     */
    public function show(Request $request, $user)
    {
        // Set roles that have access
        $request->user()->authorizeRoles(['admin']);

        // Return view with user object
        $user = User::findOrFail($user);
        return view('user::show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Request $request
     * @param $user
     * @return Response
     */
    public function edit(Request $request, $user)
    {
        // Set roles that have access
        $request->user()->authorizeRoles(['admin']);

        // Return view with user object
        $user = User::findOrFail($user);
        return view('user::edit', ['user' => $user]);
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
