@extends('core::layouts.master')

@section('content')
<section class="hero is-primary">
    <div class="hero-body">
        <h1 class="title">
            {{ __('Users') }}
        </h1>
        <h2 class="subtitle">
            {{ __('A list of all users') }}
        </h2>
    </div>

    <!-- Hero footer: will stick at the bottom -->
    <div class="hero-foot">
        <nav class="tabs is-boxed">
            <ul>
                <li class="is-active">
                    <a href="{{ route('admin.users.index') }}">
                        <span class="icon is-small">
                            <span class="oi" data-glyph="people"></span>
                        </span>
                        <span>{{ __('All users') }}</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.users.index.trashed') }}">
                        <span class="icon is-small">
                            <span class="oi" data-glyph="trash"></span>
                        </span>
                        <span>{{ __('Deleted') }}</span>
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
                <h2 class="title is-4">{{ __('Users') }}</h2>
            </div>
        </div>

        <!-- Right side -->
        <div class="level-right">
            <a href="{{ route('admin.users.user.create') }}" class="button is-primary">
                <span class="icon is-small">
                    <span class="oi" data-glyph="pencil"></span>
                </span>
                <span>Create a new user</span>
            </a>
        </div>
    </div>

    <!-- Search & filters -->
    <nav class="level">
        <!-- Left side -->
        <div class="level-left">
            <div class="level-item">
                <p class="subtitle is-5">
                    <strong>{{ $users->total() }}</strong> users
                </p>
            </div>
            <div class="level-item">
                <form method="GET" action="{{ route('admin.users.index.search') }}">
                    <div class="field has-addons">
                        <div class="control">
                            <input name="query" class="input is-search" type="text" placeholder="Search for users by title.." value="{{ $query or '' }}">
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
            <!-- Status selector -->
            {{-- @include('page::users.partials.status-selector') --}}
        </div>
    </nav>

    <hr>

    <!-- Main content -->
    @if ($users->total() >= 1)
    <table class="table is-striped is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th width="1%">
                    <div class="field">
                        <input class="is-checkradio is-small" id="userCheckboxAll" type="checkbox" name="id">
                        <label for="userCheckboxAll"><span class="is-hidden">Select all</span></label>
                    </div>
                </th>
                <th>Name</th>
                <th>Email</th>
                <th>{{ __('Activated') }}</th>
                <th>Created</th>
                <th>Updated</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)

            <tr>
                <td>
                    <div class="field">
                        <input class="is-checkradio is-small" value="{{ $user->id }}" id="userCheckbox_{{ $user->id }}" type="checkbox" name="pageID">
                        <label for="userCheckbox_{{ $user->id }}"><span class="is-hidden">Select {{ $user->id }}</span></label>
                    </div>
                </td>
                <td>
                    <a href="{{ route('admin.users.user.show', $user) }}" title="{{ $user->name }}">
                        <strong>{{ str_limit($user->name, 55, ' (...)') }}</strong>
                    </a>
                </td>
                <td>
                    <span>{!! $user->email !!}</span>
                </td>
                <td>{{ $user->activated ? __('Active') : __('Unactivated') }}</td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
                <td class="has-text-right">
                    <a title="Edit user" href="{{ route('admin.users.user.edit', $user->id) }}" class="button is-outlined is-primary is-small">
                        <span class="icon is-small">
                            <span class="oi" data-glyph="pencil"></span>
                        </span>
                    </a>
                    <form method="POST" action="{{ route('admin.users.user.destroy', $user) }}">
                        @method('DELETE')
                        @csrf
                        <button title="Delete user" type="submit" class="button is-outlined is-danger is-small">
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
    {{ $users->links() }}

</main>
@stop
