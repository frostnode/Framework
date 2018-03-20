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

        {!! form_row($form->title) !!}
        {!! form_row($form->slug) !!}
        {!! form_rest($form) !!}
        <input type="hidden" name="pagetype_model" value="{{ $pagetype->model }}">
        <hr>

        <div class="field is-grouped">
            <div class="control">
                <button type="submit" class="button is-primary">Save</button>
            </div>
        </div>

    {!! form_end($form, false) !!}

</main>
@stop
