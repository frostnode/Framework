@extends('core::layouts.master')

@section('content')
<section class="hero is-primary">
    <div class="hero-body">
        <h1 class="title">
            {{ __('Settings') }}
        </h1>
        <h2 class="subtitle">
            {{ __('A list of all settings') }}
        </h2>
    </div>

    <!-- Hero footer: will stick at the bottom -->
    <div class="hero-foot">
        <nav class="tabs is-boxed">
            <ul>
                <li class="is-active">
                    <a href="{{ route('admin.settings.index') }}">
                        <span class="icon is-small">
                            <span class="oi" data-glyph="cog"></span>
                        </span>
                        <span>{{ __('All settings') }}</span>
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
                <h2 class="title is-4">{{ __('Settings') }}</h2>
            </div>
        </div>
    </div>

    <!-- Search & filters -->
    <nav class="level">
        <!-- Left side -->
        <div class="level-left">
            <div class="level-item">
                <p class="subtitle is-5">
                    <strong>{{ $settings->count() }}</strong> settings
                </p>
            </div>
            {{-- <div class="level-item">
                <form method="GET" action="{{ route('admin.settings.index.search') }}">
                    <div class="field has-addons">
                        <div class="control">
                            <input name="query" class="input is-search" type="text" placeholder="Search for setting by name.." value="{{ $query or '' }}">
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
    </nav>

    <hr>

    <!-- Main content -->
    @if ($settings->count() >= 1)
    <table class="table is-striped is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th width="1%">
                    <div class="field">
                        <input class="is-checkradio is-small" id="settingCheckboxAll" type="checkbox" name="id">
                        <label for="settingCheckboxAll"><span class="is-hidden">Select all</span></label>
                    </div>
                </th>
                <th>Name</th>
                <th>Value</th>
                <th>Group</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($settings as $setting)

            <tr>
                <td>
                    <div class="field">
                        <input class="is-checkradio is-small" value="{{ $setting->id }}" id="settingCheckbox_{{ $setting->id }}" type="checkbox" name="settingId">
                        <label for="settingCheckbox_{{ $setting->id }}"><span class="is-hidden">Select {{ $setting->id }}</span></label>
                    </div>
                </td>
                <td>
                    <a title="{{ $setting->name }}">
                        <strong>{{ str_limit($setting->name, 55, ' (...)') }}</strong>
                    </a>
                </td>
                <td>
                    <span>{!! $setting->value !!}</span>
                </td>
                <td>{{ $setting->group }}</td>
                <td class="has-text-right">
                    <a href="{{ route('admin.settings.setting.update', $setting->getAlias()) }}" class="button is-primary is-outlined is-small" disabled>
                        <span class="icon is-small">
                            <span class="oi" data-glyph="pencil"></span>
                        </span>
                        <span>
                            Edit
                        </span>
                    </a>

                    {{-- <form method="POST" action="{{ route('admin.settings.setting.destroy', $setting) }}">
                        @method('DELETE')
                        @csrf
                        <button title="Delete setting" type="submit" class="button is-outlined is-danger is-small">
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
