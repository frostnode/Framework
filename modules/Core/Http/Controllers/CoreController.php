<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Page\Entities\Page;
use Modules\Media\Entities\Media;
use Modules\User\Entities\User;

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

        // Get page data for box
        $page_count = Page::count();
        $media_count = Media::count();
        $user_count = User::count();

        // Return index view
        return view('core::index',
            [
                'page_count' => $page_count,
                'media_count' => $media_count,
                'user_count' => $user_count
            ]
        );
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Response
     */
    public function management(Request $request)
    {
        // Set roles that have access
        $request->user()->authorizeRoles(['admin', 'editor']);

        // Return settings view
        return view('core::pages.management.index');
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Response
     */
    public function administration(Request $request)
    {
        // Set roles that have access
        $request->user()->authorizeRoles(['admin']);

        // Return settings view
        return view('core::pages.administration.index');
    }

}
