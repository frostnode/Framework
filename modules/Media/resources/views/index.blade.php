@extends('core::layouts.master')
@section('title', __('Media'))
@section('subtitle', __('All media'))

@section('content')
<main>
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
            <a href="{{ route('admin.management.media.media.create') }}" class="button is-primary">
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
                <form method="GET" action="{{ route('admin.management.pages.index.search') }}">
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
                <a href="{{ route('admin.management.media.index', 'view=grid') }}">
                    <span class="icon is-small">
                        <span class="oi" data-glyph="grid-four-up"></span>
                    </span>
                    <span>{!! (is_null($view) || $view == 'grid') ? '<strong>Grid</strong>' : 'Grid' !!}</span>
                </a>
            </p>
            <p class="level-item">
                <a href="{{ route('admin.management.media.index', 'view=list') }}">
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
            <div class="column is-2 is-1-fullhd">
                <div class="card">
                    <div class="card-image">
                        <figure class="image is-8by5">
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
                        <a title="View" href="#" class="card-footer-item">
                            <span class="icon is-small">
                                <span class="oi" data-glyph="magnifying-glass"></span>
                            </span>
                        </a>
                        <a title="Edit" href="#" class="card-footer-item">
                            <span class="icon is-small">
                                <span class="oi" data-glyph="pencil"></span>
                            </span>
                        </a>
                        <a title="Delete" href="#" class="card-footer-item">
                            <span class="icon is-small">
                                <span class="oi" data-glyph="trash"></span>
                            </span>
                        </a>
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
            <a class="button is-link">
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
