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
                <li class="is-active"><a href="#content">Content</a></li>
                <li><a href="#seo">Seo</a></li>
            </ul>
        </nav>
    </div>
</section>

<main class="page-content">
    {!! form_start($form) !!}
        <div class="columns">

            <!-- Main content -->
            <div class="column">

                <!-- Tab content -->
                <div class="tab-panels">

                    <!-- Content -->
                    <div id="content" class="panel is-active">
                        <div class="field">
                            <input class="input is-large" placeholder="Page title" name="title" type="text">
                            @if ($errors->first('title'))
                                <p class="help is-danger">{{ $errors->first('title') }}</p>
                            @endif
                        </div>

                        <div class="field">
                            <input class="input is-small" placeholder="Page alias will be generated automatically" name="slug" type="text" disabled>
                            @if ($errors->first('slug'))
                                <p class="help is-danger">{{ $errors->first('slug') }}</p>
                            @endif
                        </div>

                        {!! form_rest($form) !!}

                    </div>

                    <!-- SEO -->
                    <div id="seo" class="panel">

                        <div class="field">
                            <label for="meta_keywords">Meta keyword</label>
                            <input id="meta_keywords" class="input" placeholder="Enter your keywords" name="meta_keywords" type="text">
                            @if ($errors->first('meta_keywords'))
                                <p class="help is-danger">{{ $errors->first('meta_keywords') }}</p>
                            @endif
                        </div>

                        <div class="field">
                            <label for="meta_description">Meta description</label>
                            <textarea id="meta_description" class="textarea" placeholder="" name="meta_description"></textarea>
                            @if ($errors->first('meta_description'))
                                <p class="help is-danger">{{ $errors->first('meta_description') }}</p>
                            @endif
                        </div>

                    </div>


                </div>



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
