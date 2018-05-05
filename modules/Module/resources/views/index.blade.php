@extends('core::layouts.master')
@section('title', __('Modules'))
@section('subtitle', __('A list of all modules available'))

@section('content')
<main>
    <!-- Heading -->
    <div class="level">
        <!-- Left side -->
        <div class="level-left">
            <div class="level-item">
                <h2 class="title is-4">{{ __('Modules') }}</h2>
            </div>
        </div>

        <!-- Right side -->
        {{-- <div class="level-right">
            <a href="{{ route('admin.modules.module.create') }}" class="button is-primary">
                <span class="icon is-small">
                    <i class="mdi mdi-pencil"></i>
                </span>
                <span>Create a new module</span>
            </a>
        </div> --}}
    </div>

    <!-- Search & filters -->
    <nav class="level">
        <!-- Left side -->
        <div class="level-left">
            <div class="level-item">
                <p class="subtitle is-5">
                    <strong>{{ $modules->count() }}</strong> modules
                </p>
            </div>
            {{-- <div class="level-item">
                <form method="GET" action="{{ route('admin.modules.index.search') }}">
                    <div class="field has-addons">
                        <div class="control">
                            <input name="query" class="input is-search" type="text" placeholder="Search for modules by title.." value="{{ $query or '' }}">
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
            </div> --}}
        </div>

        <!-- Right side -->
        <div class="level-right">
            <!-- Status selector -->
            {{-- @include('page::modules.partials.status-selector') --}}
        </div>
    </nav>

    <hr>

    <!-- Main content -->
    @if ($modules->count() >= 1)
    <table class="table is-striped is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th width="1%">
                    <div class="field">
                        <input class="is-checkradio is-small" id="moduleCheckboxAll" type="checkbox" name="id">
                        <label for="moduleCheckboxAll"><span class="is-hidden">Select all</span></label>
                    </div>
                </th>
                <th>Name</th>
                <th>Alias</th>
                <th>Status</th>
                <th>Priority</th>
                <th>Dependencies</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($modules as $module)

            <tr>
                <td>
                    <div class="field">
                        <input class="is-checkradio is-small" value="{{ $module->id }}" id="moduleCheckbox_{{ $module->getAlias() }}" type="checkbox" name="moduleAlias">
                        <label for="moduleCheckbox_{{ $module->getAlias() }}"><span class="is-hidden">Select {{ $module->getAlias()}}</span></label>
                    </div>
                </td>
                <td>
                    <a href="{{ route('admin.administration.modules.module.show', $module->getAlias()) }}" title="{{ $module->getName() }}">
                        <strong>{{ str_limit($module->name, 55, ' (...)') }}</strong>
                    </a>
                </td>
                <td>
                    <span>{!! $module->getAlias() !!}</span>
                </td>
                <td>{{ $module->enabled() ? __('Enabled') : __('Disabled') }}</td>
                <td>{{ $module->getPriority() ?? __('None') }}</td>
                <td>{{ !empty($module->getRequires()) ? implode($module->getRequires(), ', ') : __('None') }}</td>
                <td class="has-text-right">
                    <a href="{{ route('admin.administration.modules.module.update', $module->getAlias()) }}" class="button is-primary is-outlined is-small" disabled>
                        <span class="icon is-small">
                            <i class="mdi mdi-reload"></i>
                        </span>
                        <span>
                            Update
                        </span>
                    </a>
                    @if($module->enabled())
                        <a title="{{ __('Disable') }}" href="{{ route('admin.administration.modules.module.update', $module->getAlias()) }}" class="button is-danger is-outlined is-small" disabled>
                            <span class="icon is-small">
                                <i class="mdi mdi-minus"></i>
                            </span>
                        </a>
                    @else
                        <a title="{{ __('Enable') }}" href="{{ route('admin.administration.modules.module.update', $module->getAlias()) }}" class="button is-link is-outlined is-small" disabled>
                            <span class="icon is-small">
                                <i class="mdi mdi-plus"></i>
                            </span>
                        </a>
                    @endif

                    {{-- <form method="POST" action="{{ route('admin.modules.module.destroy', $module) }}">
                        @method('DELETE')
                        @csrf
                        <button title="Delete module" type="submit" class="button is-outlined is-danger is-small">
                            <span class="icon is-small">
                                <i class="mdi mdi-delete"></i>
                            </span>
                        </button>
                    </form> --}}
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
                    <option>Update</option>
                    <option>Enable</option>
                    <option>Disable</option>
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

</main>
@stop
