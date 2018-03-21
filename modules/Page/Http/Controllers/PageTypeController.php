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
     * @param $id
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
     * @param null $id
     * @return Response
     */
    public function update($id = null)
    {
        $pagetypes = collect();
        /*
         * Update pagetypes
         * All, singe, and mass updating
         *
         * @todo, this needs a damn warning, has potential to destroy content
         */

        if ($id && count($id) == 1) {
            // Update 1 post according to id
            $pagetypes[] = PageType::findOrFail($id);
        } elseif ($id === 100000) {
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

            // Check if it already exist in db, and update/save accordingly
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
     * @param $pagetype
     * @return Response
     */
    public function destroy($pagetype)
    {
        $pagetype = PageType::findOrFail($pagetype);
        $pagetype->delete();

        flash('The pagetype was successfully deleted')->success();

        return back();
    }

    /**
     * Get all pagetypes.
     * @return Response
     */
    public function getAllPagetypes()
    {
        $path = config('page.paths.pagetypes');

        $pagetypes = collect();

        // Loop though all files in path and manually instantiate classes.
        foreach (glob($path.'/*.php') as $filename) {
            $fullClassName = self::getFullNamespace($filename).'\\'.self::getClassName($filename);
            $pagetypes[] = new $fullClassName;
        }

        return $pagetypes;
    }

    /**
     * Get full namespace from file.
     *
     * @todo: move to a helper class
     * @return Response
     */
    private static function getFullNamespace($filename)
    {
        $lines = file($filename);
        $namespaceLine = preg_grep('/^namespace /', $lines);
        $namespaceLine = array_shift($namespaceLine);

        $match = array();
        preg_match('#(namespace)(\\s+)([A-Za-z0-9\\\\]+?)(\\s*);#sm', $namespaceLine, $match);

        $fullNamespace = $match['3'];

        return $fullNamespace;
    }

    /**
     * Get class name from file.
     *
     * @todo: move to a helper class
     * @return Response
     */
    private static function getClassName($filename)
    {
        $directoriesAndFilename = explode('/', $filename);
        $filename = array_pop($directoriesAndFilename);
        $nameAndExtension = explode('.', $filename);
        $className = array_shift($nameAndExtension);

        return $className;
    }
}
