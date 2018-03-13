@extends('core::layouts.master')

@section('content')
    <nav class="breadcrumb" aria-label="breadcrumbs">
        <ul>
            <li><a href="#">Frostnode CMS</a></li>
            <li><a href="#">Pages</a></li>
            <li class="is-active"><a href="#" aria-current="page">Edit</a></li>
        </ul>
    </nav>

    <div class="columns">

        <div class="column is-9">

            <div class="box">

                <!-- Heading -->
                <div class="level">
                    <!-- Left side -->
                    <div class="level-left">
                        <div class="level-item">
                            <h1 class="title is-4">Edit page</h1>
                        </div>
                    </div>

                    <!-- Right side -->
                    <!-- <div class="level-right">
                        <a class="level-item is-primary">Archive</a>
                        <a class="level-item is-danger">Delete</a>
                    </div> -->
                </div>

                <hr>

                <div class="field">
                    <label class="label is-hidden">Heading</label>
                    <div class="control">
                        <input class="input is-large" type="text" placeholder="Main page heading">
                    </div>
                </div>

                <div class="field">
                    <label class="label is-hidden">Alias</label>
                    <div class="control has-icons-left has-icons-right">
                        <input class="input is-small" type="text" placeholder="Text input" value="page-article-name" disabled="">
                        <span class="icon is-small is-left">
                            <i class="far fa-keyboard"></i>
                        </span>
                    </div>
                    <!-- <p class="help is-success">This alias is available</p> -->
                </div>


                <div class="field">
                    <label class="label">Body</label>
                    <div class="control">
                        <textarea class="textarea" placeholder="Textarea"></textarea>
                    </div>
                    <p class="help">Main body, the bread and butter to all great pages</p>
                </div>

                <hr>

                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-primary">Save and publish</button>
                    </div>

                    <div class="control">
                        <button class="button is-text">Save as draft</button>
                    </div>

                    <div class="control">
                        <button class="button is-text">Cancel</button>
                    </div>
                </div>

            </div>

        </div>

        <div class="column">
            <div class="box">
                <div class="field">
                    <label class="label">Page type</label>
                    <div class="control">
                        <div class="select">
                            <select>
                                <option>Select dropdown</option>
                                <option>With options</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop
