@extends('core::layouts.master')
@section('title', __('Pagetypes'))
@section('subtitle', __('A list of all pagetypes available'))

@section('content')
<main>
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
            <a href="{{ route('admin.administration.pagetypes.update') }}" class="button is-primary is-large">
                <span class="icon is-small">
                    <i class="mdi mdi-reload"></i>
                </span>
                <span>Reload from code</span>
            </a>
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
                    <a href="{{ route('admin.administration.pagetypes.pagetype.show', $pagetype) }}">
                        <strong>{{ $pagetype->name }}</strong>
                    </a>
                </td>
                <td>
                    {{ $pagetype->description }}
                </td>
                <td>{{ $pagetype->updated_at }}</td>
                <td>{{ $pagetype->created_at }}</td>
                <td class="has-text-right">
                    <a href="{{ route('admin.administration.pagetypes.update', $pagetype->id) }}" class="button is-primary is-outlined is-small">
                        <span class="icon is-small">
                            <i class="mdi mdi-reload"></i>
                        </span>
                        <span>
                            Update
                        </span>
                    </a>
                    <form method="POST" action="{{ route('admin.administration.pagetypes.pagetype.destroy', $pagetype) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="button is-danger is-outlined is-small">
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
    {{ $pagetypes->links() }}

</main>
@stop
