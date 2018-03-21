@extends('core::layouts.master')

@section('content')
    <section class="hero is-primary">
        <div class="hero-body">
            <h1 class="title">
                Edit page
            </h1>
            <h2 class="subtitle">
                {{ $page->title }}
            </h2>
        </div>

        <!-- Hero footer: will stick at the bottom -->
        <div class="hero-foot">
            <nav class="tabs is-boxed">
                <ul>
                    <li class="is-active"><a>Content</a></li>
                    <li><a>Meta</a></li>
                </ul>
            </nav>
        </div>
    </section>

    <main class="page-content">
        {!! form_start($form) !!}
        <div class="columns">

            <!-- Main content -->
            <div class="column">

                <div class="field">
                    <input class="input is-large" placeholder="Page title" name="title" type="text" value="{{ $page->title }}">
                </div>

                <div class="field">
                    <input class="input is-small" placeholder="Page alias will be generated automatically" name="slug" type="text"  value="{{ $page->slug }}" disabled>
                </div>

                {!! form_rest($form) !!}

            </div>
            <!-- Main content end -->

            <!-- Sidebar -->
            <div class="column is-4">
                <div class="card">

                    <!-- Card header -->
                    <header class="card-header">
                        <p class="card-header-title">
                            Publish
                        </p>
                        <a href="#" class="card-header-icon" aria-label="more options">
                          <span class="icon">
                            <i class="fas fa-angle-down" aria-hidden="true"></i>
                          </span>
                        </a>
                    </header>

                    <!-- Card content -->
                    <div class="card-content">
                        <div class="field">
                            <label class="checkbox">
                                <input name="status" type="checkbox" value="1">
                                Published?
                            </label>
                        </div>
                        <div class="field">
                            <p>Pagetype: {{ $pagetype->name }} <a href="">edit?</a></p>
                        </div>
                        <div class="field">
                            <p>Authored by: Magnus Vike <a href="">edit?</a></p>
                        </div>
                        <div class="field">
                            <p>Authored on: now <a href="">edit</a></p>
                        </div>
                    </div>

                    <!-- Card footer -->
                    <footer class="card-footer">
                        <div class="card-content">

                            <input type="hidden" name="pagetype_model" value="{{ $pagetype->model }}">

                            <!-- Save and delete -->
                            <button type="submit" class="button is-primary">Save</button>
                            <a href="#" class="button is-text is-pulled-right">Delete</a>

                        </div>
                    </footer>
                </div>
            </div>
            <!-- Sidebar end -->

        </div>
        {!! form_end($form, false) !!}
    </main>
@stop
