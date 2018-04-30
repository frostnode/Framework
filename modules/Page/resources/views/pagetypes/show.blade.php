@extends('core::layouts.master')
@section('title', __( $pagetype->name))
@section('subtitle', __('Pagetype information'))

@section('content')
<main>
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
            <a href="{{ route('admin.administration.pagetypes.pagetype.update', $pagetype->id) }}" class="button is-primary">
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
