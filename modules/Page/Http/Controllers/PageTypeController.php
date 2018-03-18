<?php

namespace Modules\Page\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class PageTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('page::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('page::create');
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
    public function show()
    {
        return view('page::show');
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

    public function updateAll()
    {
        $path = config('page.paths.pagetypes');

        // Loop though all files in path and manually instanciate classes.
        foreach (glob($path.'/*.php') as $filename) {
            $className = self::getFullNamespace($filename).'\\'.self::getClassName($filename);

            $pagetype = new $className;
            $pagetype->model = $className;

            $attributes = $pagetype->getAttributes();

            $old_pagetype = \Modules\Page\Entities\PageType::find($pagetype->id);

            if ($old_pagetype && $pagetype->id == $old_pagetype->id) {
                $old_pagetype->update($attributes);
            } else {
                $pagetype->save();
            }
        }

        return back();
    }

    private function getFullNamespace($filename)
    {
        $lines = file($filename);
        $namespaceLine = preg_grep('/^namespace /', $lines);
        $namespaceLine = array_shift($namespaceLine);
        $match = array();
        preg_match('/^namespace (.*);$/', $namespaceLine, $match);
        $fullNamespace = array_pop($match);

        return $fullNamespace;
    }

    private function getClassName($filename)
    {
        $directoriesAndFilename = explode('/', $filename);
        $filename = array_pop($directoriesAndFilename);
        $nameAndExtension = explode('.', $filename);
        $className = array_shift($nameAndExtension);

        return $className;
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
