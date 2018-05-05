@extends('core::layouts.master')
@section('title', __('Pages'))
@section('subtitle', __('A list of all pages'))

@section('content')
<main>
    <!-- Heading -->
    <div class="level">
        <!-- Left side -->
        <div class="level-left">
            <div class="level-item">
                <h2 class="title is-4">
                    {{ ($status == 3) ? __('Deleted pages') : __('All pages') }}
                </h2>
            </div>
        </div>

        <!-- Right side -->
        <div class="level-right">
            <a href="{{ route('admin.management.pages.page.select') }}" class="button is-primary is-large">
                <span class="icon is-small">
                    <i class="mdi mdi-pencil"></i>
                </span>
                <span>{{ __('Create a new page') }}</span>
            </a>
        </div>
    </div>

    <!-- Search & filters -->
    <nav class="level">
        <!-- Left side -->
        <div class="level-left">
            <div class="level-item">
                <p class="subtitle is-5">
                    <strong>{{ $pages->total() }}</strong> pages
                </p>
            </div>
            <div class="level-item">
                <form method="GET" action="{{ route('admin.management.pages.index.search') }}">
                    <div class="field has-addons">
                        <div class="control">
                            <input name="query" class="input is-search" type="text" placeholder="Search for pages by title.." value="{{ $query ?? '' }}">
                        </div>
                        <div class="control">
                            <button type="submit" class="button">
                                <span class="icon is-small">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <span>{{ __('Search') }}</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Right side -->
        <div class="level-right">
            <!-- Status selector -->
            @include('page::pages.partials.status-selector')
        </div>
    </nav>

    <hr>

    <!-- Main content -->
    @if ($pages->total() >= 1)
    <table class="table is-striped is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th width="1%">
                    <div class="field">
                        <input class="is-checkradio is-small" id="pageCheckboxAll" type="checkbox" name="pageID">
                        <label for="pageCheckboxAll"><span class="is-hidden">Select all</span></label>
                    </div>
                </th>
                <th>Title</th>
                <th><abbr title="Pagetype">Type</abbr></th>
                <th>Status</th>
                <th>Author</th>
                <th>Updated</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pages as $page)

            <tr>
                <th>
                    <div class="field">
                        <input class="is-checkradio is-small" value="{{ $page->id }}" id="pageCheckbox_{{ $page->id }}" type="checkbox" name="pageID">
                        <label for="pageCheckbox_{{ $page->id }}"><span class="is-hidden">Select {{ $page->id }}</span></label>
                    </div>
                </th>
                <td>
                    <a href="{{ route('admin.management.pages.page.edit', $page) }}" title="{{ $page->title }}">
                        <strong>{{ str_limit($page->title, 55, ' (...)') }}</strong>
                    </a>

                    <!-- Recently updated -->
                    {!! ($page->updated_at->isToday()) ? '<small class="has-text-danger">'.__('Recently updated').'</small>' : ''  !!}

                </td>
                <td>
                    <span>{!! $page->pagetype->name ?? '<p class="has-text-danger">Not found</p>' !!}</span>
                </td>
                <td>{{ $page->status_name }}</td>
                <td>{{ $page->user->name }}</td>
                <td>{{ $page->updated_at }}</td>
                <td class="has-text-right">
                    <!-- View on site -->
                    <a href="{{ route('page.show', $page->slug) }}" class="button is-outlined is-link is-small">
                        <span class="icon is-small">
                            <i class="mdi mdi-open-in-new"></i>
                        </span>
                    </a>

                    <a title="Edit page" href="{{ route('admin.management.pages.page.edit', $page->id) }}" class="button is-outlined is-link is-small">
                        <span class="icon is-small">
                            <i class="mdi mdi-pencil"></i>
                        </span>
                    </a>
                    @if ($status == 3)
                        <form method="POST" action="{{ route('admin.management.pages.page.restore', $page) }}">
                            @csrf
                            <button title="Restore page" type="submit" class="button is-outlined is-link is-small">
                                <span class="icon is-small">
                                    <i class="mdi mdi-undo"></i>
                                </span>
                            </button>
                        </form>
                    @endif
                    <form method="POST" action="{{ route('admin.management.pages.page.destroy', $page) }}">
                        @method('DELETE')
                        @csrf
                        <button title="Delete page" type="submit" class="button is-outlined is-link is-small">
                            <span class="icon is-small">
                                <i class="mdi mdi-delete"></i>
                            </span>
                        </button>
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>
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
                <i class="mdi mdi-cogs"></i>
            </div>
        </div>
        <p class="control">
            <a class="button is-link">
                <span class="icon is-small">
                    <i class="mdi mdi-check"></i>
                </span>
                <span>Save</span>
            </a>
        </p>
    </div>

    <hr>

    <!-- Pagination -->
    {{ $pages->appends(['status' => $status, 'query' => $query])->links() }}

</main>
@stop
