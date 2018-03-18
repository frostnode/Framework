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

    {!! Form::open(['route' => 'admin.pages.page.store']) !!}

    <!-- Lets add some default fields, like title and slug -->
    <!-- @todo, this should be moved to a base page class, that get appended though class inherance -->
    <div class="field">
        <label class="label is-hidden">Heading</label>
        <div class="control">
            <input class="input is-large" type="text" placeholder="Main pagetitle">
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

    </div>

    {!! $form !!}

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

    {!! Form::close() !!}

</main>
@stop
