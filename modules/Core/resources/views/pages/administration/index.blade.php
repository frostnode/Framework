@extends('core::layouts.master')
@section('title', __('Administration'))
@section('subtitle', __('A list of all actions available to you'))

@section('content')
<main class="columns is-multiline">
        <div class="column is-4">
            @include('core::partials.box', ['color' => 'is-green', 'icon' => 'account-multiple', 'heading' => 'Users', 'title' => '3', 'link' => ['title' => 'View all users', 'route' => 'admin.administration.users.index'] ])
        </div>
    </main>
@stop
