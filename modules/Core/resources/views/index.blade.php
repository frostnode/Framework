@extends('core::layouts.master')

@section('content')
<section class="hero is-primary">
    <div class="hero-body">
        <h1 class="title">
            Dashboard
        </h1>
        <h2 class="subtitle">
            A list of all actions available to you
        </h2>
    </div>

    <!-- Hero footer: will stick at the bottom -->
    <div class="hero-foot">
        <nav class="tabs is-boxed">
            <ul>
                <li class="is-active">
                    <a href="{{ route('admin.index') }}">
                        <span class="icon">
                            <span class="oi" data-glyph="compass"></span>
                        </span>
                        <span>Dashboard</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</section>

<main class="page-content">
    <div class="columns is-multiline">
        <div class="column is-6">

            <nav class="panel">
                <p class="panel-heading">
                    Pages
                </p>
                <a href="{{ route('admin.pages.page.select') }}" class="panel-block">
                    <span class="panel-icon">
                        <span class="oi" data-glyph="document"></span>
                    </span>
                    Create a new page
                </a>
                <a href="{{ route('admin.pages.index') }}" class="panel-block">
                    <span class="panel-icon">
                        <span class="oi" data-glyph="document"></span>
                    </span>
                    List all pages
                </a>
                <a href="{{ route('admin.pagetypes.index') }}" class="panel-block">
                    <span class="panel-icon">
                        <span class="oi" data-glyph="book"></span>
                    </span>
                    View pagetypes
                </a>
            </nav>

        </div>
    </div>
</main>
@stop
