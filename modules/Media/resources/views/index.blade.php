@extends('core::layouts.master')

@section('content')
<section class="hero is-primary">
    <div class="hero-body">
        <h1 class="title">
            {{ __('Media') }}
        </h1>
        <h2 class="subtitle">
            {{ __('All media') }}
        </h2>
    </div>

    <!-- Hero footer: will stick at the bottom -->
    <div class="hero-foot">
        <nav class="tabs is-boxed">
            <ul>
                <li class="is-active">
                    <a href="{{ route('admin.pages.index') }}">
                        <span class="icon is-small">
                            <span class="oi" data-glyph="image"></span>
                        </span>
                        <span>{{ __('Images') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.pages.index.trashed') }}">
                        <span class="icon is-small">
                            <span class="oi" data-glyph="document"></span>
                        </span>
                        <span>{{ __('Documents') }}</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</section>

<main class="page-content">

    <!-- Heading -->
    <div class="level">
        <!-- Left side -->
        <div class="level-left">
            <div class="level-item">
                <h2 class="title is-4">{{ __('Images') }}</h2>
            </div>
        </div>

        <!-- Right side -->
        <div class="level-right">
            <a href="{{ route('admin.media.media.create') }}" class="button is-primary">
                <span class="icon is-small">
                    <span class="oi" data-glyph="pencil"></span>
                </span>
                <span>Add a new file</span>
            </a>
        </div>
    </div>

    <!-- Search & filters -->
    <nav class="level">
        <!-- Left side -->
        <div class="level-left">
            <div class="level-item">
                <p class="subtitle is-5">
                    <strong>{{ $media->total() }}</strong> images
                </p>
            </div>
            <div class="level-item">
                <form method="GET" action="{{ route('admin.pages.index.search') }}">
                    <div class="field has-addons">
                        <div class="control">
                            <input name="query" class="input is-search" type="text" placeholder="Search for images by name.." value="{{ $query ?? '' }}">
                        </div>
                        <div class="control">
                            <button type="submit" class="button">
                                <span class="icon is-small">
                                    <span class="oi" data-glyph="magnifying-glass"></span>
                                </span>
                                <span>Search</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right side -->
        <div class="level-right">
            <p class="level-item">
                <a href="{{ route('admin.media.index', 'view=grid') }}">
                    <span class="icon is-small">
                        <span class="oi" data-glyph="grid-four-up"></span>
                    </span>
                    <span>{!! (is_null($view) || $view == 'grid') ? '<strong>Grid</strong>' : 'Grid' !!}</span>
                </a>
            </p>
            <p class="level-item">
                <a href="{{ route('admin.media.index', 'view=list') }}">
                    <span class="icon is-small">
                        <span class="oi" data-glyph="list"></span>
                    </span>
                    <span>{!! ($view == 'list') ? '<strong>List</strong>' : 'List' !!}</span>
                </a>
            </p>

        </div>
    </nav>

    <hr>

    <!-- Main content -->
    @if ($media->total() >= 1)
        <div class="columns is-multiline">


            @foreach ($media as $file)
            <div class="column is-2">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-4by3">
                            <img src="{{ asset($file->getUrl('thumb')) }}">
                        </figure>
                    </div>
                    {{-- <div class="card-content">

                        <div class="content">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Phasellus nec iaculis mauris. <a>@bulmaio</a>.
                            <a href="#">#css</a> <a href="#">#responsive</a>
                            <br>
                            <time datetime="2016-1-1">11:09 PM - 1 Jan 2016</time>
                        </div>
                    </div> --}}
                    <footer class="card-footer">
                        <a href="#" class="card-footer-item">View</a>
                        <a href="#" class="card-footer-item">Edit</a>
                        <a href="#" class="card-footer-item">Delete</a>
                    </footer>
                </div>
            </div>
            @endforeach
        </div>
    @else
        <p class="muted">Nothing found...</p>
    @endif

    <hr>

    <!-- Bulk operations -->
    <label class="label is-hidden">Select what to do with selected items</label>
    <div class="field is-grouped">
        <div class="control has-icons-left">
            <div class="select">
                <select>
                    <option selected>What to do with selected?</option>
                    <option>Publish</option>
                    <option>Depublish</option>
                    <option>Delete</option>
                </select>
            </div>
            <div class="icon is-small is-left">
                <span class="oi" data-glyph="cog"></span>
            </div>
        </div>
        <p class="control">
            <a class="button is-primary">
                <span class="icon is-small">
                    <span class="oi" data-glyph="check"></span>
                </span>
                <span>Save</span>
            </a>
        </p>
    </div>

    <hr>

    <!-- Pagination -->
    {{ $media->links() }}

</main>
@stop
