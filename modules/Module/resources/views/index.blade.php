@extends('core::layouts.master')

@section('content')
<section class="hero is-primary">
    <div class="hero-body">
        <h1 class="title">
            Modules
        </h1>
        <h2 class="subtitle">
            A list of all modules available
        </h2>
    </div>

    <!-- Hero footer: will stick at the bottom -->
    <div class="hero-foot">
        <nav class="tabs is-boxed">
            <ul>
                <li class="is-active">
                    <a href="{{ route('admin.modules.index') }}">
                        <span class="icon is-small">
                            <span class="oi" data-glyph="box"></span>
                        </span>
                        <span>{{ __('All modules') }}</span>
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
                <h2 class="title is-4">{{ __('Modules') }}</h2>
            </div>
        </div>

        <!-- Right side -->
        {{-- <div class="level-right">
            <a href="{{ route('admin.modules.module.create') }}" class="button is-primary">
                <span class="icon is-small">
                    <span class="oi" data-glyph="pencil"></span>
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
                                    <span class="oi" data-glyph="magnifying-glass"></span>
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
                    <a href="{{ route('admin.modules.module.show', $module->getAlias()) }}" title="{{ $module->getName() }}">
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
                    <a href="{{ route('admin.modules.module.update', $module->getAlias()) }}" class="button is-primary is-outlined is-small" disabled>
                        <span class="icon is-small">
                            <span class="oi" data-glyph="reload"></span>
                        </span>
                        <span>
                            Update
                        </span>
                    </a>
                    @if($module->enabled())
                        <a title="{{ __('Disable') }}" href="{{ route('admin.modules.module.update', $module->getAlias()) }}" class="button is-danger is-outlined is-small" disabled>
                            <span class="icon is-small">
                                <span class="oi" data-glyph="delete"></span>
                            </span>
                        </a>
                    @else
                        <a title="{{ __('Enable') }}" href="{{ route('admin.modules.module.update', $module->getAlias()) }}" class="button is-link is-outlined is-small" disabled>
                            <span class="icon is-small">
                                <span class="oi" data-glyph="plus"></span>
                            </span>
                        </a>
                    @endif

                    {{-- <form method="POST" action="{{ route('admin.modules.module.destroy', $module) }}">
                        @method('DELETE')
                        @csrf
                        <button title="Delete module" type="submit" class="button is-outlined is-danger is-small">
                            <span class="icon is-small">
                                <span class="oi" data-glyph="trash"></span>
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

</main>
@stop
