@extends('core::layouts.master')

@section('content')
<section class="hero is-primary">
    <div class="hero-body">
        <h1 class="title">
            Pagetypes
        </h1>
        <h2 class="subtitle">
            A list of all pagetypes available
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
                <h2 class="title is-4">Pagetypes</h2>
            </div>
        </div>

        <!-- Right side -->
        <div class="level-right">
            <a href="{{ route('admin.pagetypes.update') }}" class="button is-warning">Update list</a>
        </div>
    </div>

    <!-- Search & filters -->
    <nav class="level">
        <!-- Left side -->
        <div class="level-left">
            <div class="level-item">
                <p class="subtitle is-5">
                    <strong>{{ count($pagetypes) }}</strong> pagetypes
                </p>
            </div>
        </div>

    </nav>

    <hr>

    <!-- Main content -->
    <table class="table is-striped is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th width="1%">
                    <div class="field">
                        <input class="is-checkradio is-small" id="pagetypeCheckboxAll" type="checkbox" name="pageID">
                        <label for="pagetypeCheckboxAll"><span class="is-hidden">Select all</span></label>
                    </div>
                </th>
                <th>Title</th>
                <th>Description</th>
                <th>Updated</th>
                <th>Created</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pagetypes as $pagetype)

            <tr>
                <th>
                    <div class="field">
                        <input class="is-checkradio is-small" id="pagetypeCheckbox_{{ $pagetype->id }}" type="checkbox" name="pageID">
                        <label for="pagetypeCheckbox_{{ $pagetype->id }}"><span class="is-hidden">Select {{ $pagetype->id }}</span></label>
                    </div>
                </th>
                <td>
                    {{ $pagetype->name }}
                </td>
                <td>
                    {{ $pagetype->description }}
                </td>
                <td>{{ $pagetype->updated_at }}</td>
                <td>{{ $pagetype->created_at }}</td>
                <td class="has-text-right">
                    <a href="{{ route('admin.pagetypes.update', $pagetype->id) }}" class="button is-small is-primary">Update</a>
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
                    <option>Update</option>
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
    <nav class="pagination" role="navigation" aria-label="pagination">
        <a class="pagination-previous" title="This is the first page" disabled>Previous</a>
        <a class="pagination-next">Next page</a>
        <ul class="pagination-list">
            <li>
                <a class="pagination-link is-current" aria-label="Page 1" aria-current="page">1</a>
            </li>
            <li>
                <a class="pagination-link" aria-label="Goto page 2">2</a>
            </li>
            <li>
                <a class="pagination-link" aria-label="Goto page 3">3</a>
            </li>
        </ul>
    </nav>
</main>
@stop
