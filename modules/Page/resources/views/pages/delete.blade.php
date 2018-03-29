@extends('core::layouts.master')

@section('content')
    <section class="hero is-warning">
        <div class="hero-body">
            <h1 class="title">
                Delete page?
            </h1>
            <h2 class="subtitle">
                {{ $page->title }}
            </h2>
        </div>
    </section>

    <main class="page-content">

        <div class="columns">

            <!-- Main content -->
            <div class="column">
                <div class="content"></div>
                    <h3 class="title is-5">Hey</h3>
                    <p>Are you sure you want to delete this page; {{ $page->title }}</p>
                </div>
            </div>

            <div class="field is-grouped">
                <div class="control">
                    <form method="POST" action="{{ route('admin.pages.page.destroy', $page) }}">
                        @method('DELETE')
                        @csrf
                        <button title="Delete page" type="submit" class="button is-danger">
                            <span class="icon is-small">
                                <span class="oi" data-glyph="trash"></span>
                            </span>
                            <span>Yes, delete this page</span>
                        </button>
                        <input type="hidden" name="confirm_delete" value="true">
                    </form>
                </div>
                <div class="control">
                    <a href="{{ route('admin.pages.index') }}" onclick="window.history.go(-1); return false;" class="button is-text">
                        Whoops, take me back..
                    </a>
                </div>
            </div>

        </div>
    </main>
@stop
