<?php

namespace Modules\Page\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Page\Entities\PageType;

class PageTypeController extends Controller
{

    // Set some defaults
    const PAGINATION_ITEMS = 25;

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        // Get all pagetypes
        $pagetypes = PageType::paginate(self::PAGINATION_ITEMS);
        return view('page::pagetypes.index', ['pagetypes' => $pagetypes]);
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
     * @return Response
     */
    public function show($id)
    {
        $pagetype = PageType::findOrFail($id);
        return view('page::pagetypes.show', ['pagetype' => $pagetype]);
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
    public function update($id = null)
    {
        $pagetypes = collect();
        /*
         * Update pagetypes
         * All, singe, and mass updating
         *
         * @todo, this needs a damn warning, has potensial to destroy content
         *
         */

        if (count($id) == 1) {
            // Update 1 post accoriding to id
            $pagetypes[] = PageType::findOrFail($id);
        } else if ($id === 100000) {
            // Update all in array
        } else {
            // Update all pagetypes from source
            $pagetypes = self::getAllPagetypes();
        }

        foreach ($pagetypes as $pagetype) {
            // Get model name
            $model = get_class($pagetype);

            // Validate $pagetype content
            if (!$pagetype->name || !$pagetype->description) {
                dd($pagetype->model . ' was missing attributes for name or description');
            }

            // Check if it already exist in db, and update/save accordningly
            $existing_pagetype = PageType::where('model', $model)->first();

            if (!$existing_pagetype) {
                // Get and set all required attributes
                $pagetype->name = $pagetype->name;
                $pagetype->description = $pagetype->description;
                $pagetype->model = $model;

                //Get default fields
                $default_fields = $pagetype->getDefaultFields();

                // Get new declared fields and merge with default
                if (method_exists($pagetype, 'setFields')) {
                    $pagetype->fields = array_merge($default_fields, $pagetype->setFields());
                } else {
                    $pagetype->fields = $default_fields;
                }

                // Save
                $pagetype->save();
            } else {
                // Get and set all required attributes
                $existing_pagetype->name = $pagetype->name;
                $existing_pagetype->description = $pagetype->description;

                //Get default fields
                $default_fields = $pagetype->getDefaultFields();

                // Get new declared fields and merge with default
                if (method_exists($pagetype, 'setFields')) {
                    $existing_pagetype->fields = array_merge($default_fields, $pagetype->setFields());
                } else {
                    $existing_pagetype->fields = $default_fields;
                }

                // Update
                $existing_pagetype->touch();
                $existing_pagetype->update();
            }
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request, $pagetype)
    {
        $pagetype = PageType::findOrFail($pagetype);
        $pagetype->delete();
        return back();
    }

    public function getAllPagetypes()
    {
        $path = config('page.paths.pagetypes');

        $forms = collect();

        // Loop though all files in path and manually instanciate classes.
        foreach (glob($path.'/*.php') as $filename) {
            $fullClassName = self::getFullNamespace($filename).'\\'.self::getClassName($filename);
            $forms[] =new $fullClassName;
        }

        return $forms;
    }

    private static function getFullNamespace($filename)
    {
        $lines = file($filename);
        $namespaceLine = preg_grep('/^namespace /', $lines);
        $namespaceLine = array_shift($namespaceLine);
        $match = array();
        preg_match('/^namespace (.*);$/', $namespaceLine, $match);
        $fullNamespace = array_pop($match);

        return $fullNamespace;
    }

    private static function getClassName($filename)
    {
        $directoriesAndFilename = explode('/', $filename);
        $filename = array_pop($directoriesAndFilename);
        $nameAndExtension = explode('.', $filename);
        $className = array_shift($nameAndExtension);

        return $className;
    }
}
