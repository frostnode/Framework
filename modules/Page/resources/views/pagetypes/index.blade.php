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
                <li class="is-active">
                    <a href="{{ route('admin.pagetypes.index') }}">
                        <span class="icon is-small">
                            <span class="oi" data-glyph="book"></span>
                        </span>
                        <span>All pagetypes</span>
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
                <h2 class="title is-4">Pagetypes</h2>
            </div>
        </div>

        <!-- Right side -->
        <div class="level-right">
            <a href="{{ route('admin.pagetypes.update') }}" class="button is-primary">
                <span class="icon is-small">
                    <span class="oi" data-glyph="reload"></span>
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
                    <a href="{{ route('admin.pagetypes.pagetype.show', $pagetype) }}">
                        <strong>{{ $pagetype->name }}</strong>
                    </a>
                </td>
                <td>
                    {{ $pagetype->description }}
                </td>
                <td>{{ $pagetype->updated_at }}</td>
                <td>{{ $pagetype->created_at }}</td>
                <td class="has-text-right">
                    <a href="{{ route('admin.pagetypes.update', $pagetype->id) }}" class="button is-primary is-outlined is-small">
                        <span class="icon is-small">
                            <span class="oi" data-glyph="reload"></span>
                        </span>
                        <span>
                            Update
                        </span>
                    </a>
                    <form method="POST" action="{{ route('admin.pagetypes.pagetype.destroy', $pagetype) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="button is-danger is-outlined is-small">
                            <span class="icon is-small">
                                <span class="oi" data-glyph="trash"></span>
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
    {{ $pagetypes->links() }}

</main>
@stop
