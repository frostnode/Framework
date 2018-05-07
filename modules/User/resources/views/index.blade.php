@extends('core::layouts.master')
@section('title', __('Users'))
@section('subtitle', __('A list of all users'))

@section('content')
<main>
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
            <a href="{{ route('admin.administration.users.user.create') }}" class="button is-primary is-large">
                <span class="icon is-large">
                    <i class="mdi mdi-account-plus"></i>
                </span>
                <span>{{ __('Create a new user') }}</span>
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
                <form method="GET" action="{{ route('admin.administration.users.index.search') }}">
                    <div class="field has-addons">
                        <div class="control">
                            <input name="query" class="input is-search" type="text" placeholder="Search for users by title.." value="{{ $query or '' }}">
                        </div>
                        <div class="control">
                            <button type="submit" class="button">
                                <span class="icon is-small">
                                    <i class="mdi mdi-magnify"></i>
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
                    <a href="{{ route('admin.administration.users.user.show', $user) }}" title="{{ $user->name }}">
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
                    <a title="Edit user" href="{{ route('admin.administration.users.user.edit', $user->id) }}" class="button is-outlined is-primary is-small">
                        <span class="icon is-small">
                            <i class="mdi mdi-pencil"></i>
                        </span>
                    </a>
                    <form method="POST" action="{{ route('admin.administration.users.user.destroy', $user) }}">
                        @method('DELETE')
                        @csrf
                        <button title="Delete user" type="submit" class="button is-outlined is-danger is-small">
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
                    <option>Delete</option>
                    <option>Restore</option>
                    <option>Activate</option>
                    <option>Deactivate</option>
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
    {{ $users->links() }}

</main>
@stop
