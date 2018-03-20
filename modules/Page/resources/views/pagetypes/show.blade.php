@extends('core::layouts.master')

@section('content')
<section class="hero is-primary">
    <div class="hero-body">
        <h1 class="title">
            View pagetype
        </h1>
        <h2 class="subtitle">
            {{ $pagetype->name }}
        </h2>
    </div>

    <!-- Hero footer: will stick at the bottom -->
    <div class="hero-foot">
        <nav class="tabs is-boxed">
            <ul>
                <li class="is-active"><a>Information</a></li>
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
            <a href="{{ route('admin.pagetypes.pagetype.update', $pagetype->id) }}" class="button is-primary">Update</a>
        </div>
    </div>

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
            @foreach ($pagetype->fields as $field)
            <tr>
                <td>
                    <strong>{{ $field['name'] }}</strong>
                </td>
                <td>
                    {{ $field['type'] }}
                </td>
                <td>
                    {{ $field['rules'] }}
                </td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>

</main>
@stop
