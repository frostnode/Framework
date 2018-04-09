@extends('core::layouts.master')

@section('content')
<section class="hero is-primary">
    <div class="hero-body">
        <h1 class="title">
            {{ $pagetype->name }}
        </h1>
        <h2 class="subtitle">
            {{ __('Pagetype information') }}
        </h2>
    </div>

    <!-- Hero footer: will stick at the bottom -->
    <div class="hero-foot">
        <nav class="tabs is-boxed">
            <ul>
                <li class="is-active">
                    <a>
                        <span class="icon is-small">
                            <span class="oi" data-glyph="book"></span>
                        </span>
                        <span>
                            {{ __('Details') }}
                        </span>
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
                <h2 class="title is-4">Fields</h2>
            </div>
        </div>

        <!-- Right side -->
        <div class="level-right">
            <a href="{{ route('admin.pagetypes.pagetype.update', $pagetype->id) }}" class="button is-primary">
                <span class="icon is-small">
                    <span class="oi" data-glyph="reload"></span>
                </span>
                <span>
                    Update
                </span>
            </a>
        </div>
    </div>
    @if ($fields)
    <table class="table is-striped is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>Name</th>
                <th>Type</th>
                <th>Rules</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fields as $field)
            <tr>
                <td>
                    <strong>{{ $field['name'] }}</strong>
                </td>
                <td>
                    {{ $field['type'] }}
                </td>
                <td>
                    {{ $field['rules'] or '-none-' }}
                </td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <p>No fields set</p>
    @endif
</main>
@stop
