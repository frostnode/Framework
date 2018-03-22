@extends('core::layouts.master')

@section('content')
<section class="hero is-primary">
    <div class="hero-body">
        <h1 class="title">
            Pages
        </h1>
        <h2 class="subtitle">
            A list of all pages available
        </h2>
    </div>

    <!-- Hero footer: will stick at the bottom -->
    <div class="hero-foot">
        <nav class="tabs is-boxed">
            <ul>
                <li class="is-active"><a>List</a></li>
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
                <h2 class="title is-4">Pages</h2>
            </div>
        </div>

        <!-- Right side -->
        <div class="level-right">
            <a href="{{ route('admin.pages.page.select') }}" class="button is-primary">Create a new page</a>
        </div>
    </div>

    <!-- Search & filters -->
    <nav class="level">
        <!-- Left side -->
        <div class="level-left">
            <div class="level-item">
                <p class="subtitle is-5">
                    <strong>{{ count($pages) }}</strong> pages
                </p>
            </div>
            <div class="level-item">
                <div class="field has-addons">
                    <p class="control">
                        <input class="input" type="text" placeholder="Find a page">
                    </p>
                    <p class="control">
                        <button class="button">
                            Search
                        </button>
                    </p>
                </div>
            </div>
        </div>

        <!-- Right side -->
        <div class="level-right">
            <p class="level-item"><strong>All</strong></p>
            <p class="level-item"><a>Published</a></p>
            <p class="level-item"><a>Drafts</a></p>
            <p class="level-item"><a>Deleted</a></p>
        </div>
    </nav>

    <hr>

    <!-- Main content -->
    <table class="table is-striped is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th width="1%">
                    <div class="field">
                        <input class="is-checkradio is-small" id="exampleCheckboxAll" type="checkbox" name="pageID">
                        <label for="exampleCheckboxAll"><span class="is-hidden">Select all</span></label>
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
                        <input class="is-checkradio is-small" id="exampleCheckbox_{{ $page->id }}" type="checkbox" name="pageID">
                        <label for="exampleCheckbox_{{ $page->id }}"><span class="is-hidden">Select {{ $page->id }}</span></label>
                    </div>
                </th>
                <td>
                    <a href="{{ route('admin.pages.page.edit', $page) }}" title="{{ $page->title }}">
                        <strong>{{ $page->title }}</strong>
                    </a>
                    <a href="{{ route('page.show', $page->slug) }}" class="button is-small">
                        <span class="icon is-small">
                            <i class="fas fa-globe"></i>
                        </span>
                        <span>View on page</span>
                    </a>
                </td>
                <td>
                    <span>{{ $page->pagetype->name }}</span>
                </td>
                <td>{{ $page->status }}</td>
                <td>{{ $page->user_id }}</td>
                <td>{{ $page->updated_at }}</td>
                <td class="has-text-right">
                    <a title="Edit page" href="{{ route('admin.pages.page.edit', $page->id) }}" class="button is-primary is-small">
                        <span class="icon is-small">
                            <i class="far fa-edit"></i>
                        </span>
                    </a>
                    <form method="POST" action="{{ route('admin.pages.page.destroy', $page) }}">
                        @method('DELETE')
                        @csrf
                        <button title="Delete page" type="submit" class="button is-danger is-small">
                            <span class="icon is-small">
                                <i class="far fa-trash-alt"></i>
                            </span>
                        </button>
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>
    </table>

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
                <i class="far fa-check-square"></i>
            </div>
        </div>
        <p class="control">
            <a class="button is-primary">
                Save
            </a>
        </p>
    </div>

    <hr>

    <!-- Pagination -->
    {{ $pages->links() }}

</main>
@stop
