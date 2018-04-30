@extends('core::layouts.master')
@section('title', $user->name)
@section('subtitle', __('Account preferences'))

@section('content')
<main>
    <!-- Heading -->
    <div class="level">
        <!-- Left side -->
        <div class="level-left">
            <div class="level-item">
                <h2 class="title is-4">Account details</h2>
            </div>
        </div>
    </div>

    <p>User id: {{ $user->id }}</p>
    <p>Name: {{ $user->name }}</p>
    <p>{{ str_plural('Role', count($user->roles)) }}: {{ implode(array_pluck($user->roles, 'name'), ', ') ?? 'none'  }}</p>
    <p>Email address: {{ $user->email }}</p>
    <p>Created: {{ $user->created_at }}</p>
    <p>Updated: {{ $user->updated_at }}</p>

</main>
@stop
