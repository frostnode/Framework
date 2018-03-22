@extends('core::layouts.master')

@section('content')
<section class="hero is-primary">
    <div class="hero-body">
        <h1 class="title">
            Create a page
        </h1>
        <h2 class="subtitle">
            {{ $pagetype->name }}
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
                    <input class="input is-large" placeholder="Page title" name="title" type="text">
                </div>

                <div class="field">
                    <input class="input is-small" placeholder="Page alias will be generated automatically" name="slug" type="text" disabled>
                </div>

                {!! form_rest($form) !!}

            </div>
            <!-- Main content end -->

            <!-- Sidebar -->
            <div class="column is-4">
                @include('page::pages.partials.edit-sidebar')
            </div>
            <!-- Sidebar end -->

        </div>
    {!! form_end($form, false) !!}
</main>
@stop
