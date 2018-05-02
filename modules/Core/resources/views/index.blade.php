@extends('core::layouts.master')
@section('title', __('Dashboard'))
@section('subtitle', __('A list of all actions available to you'))
@section('type', 'is-dark')
@section('size', 'is-medium')

@section('content')
<main class="columns is-multiline">
    <div class="column is-4">
        @include('core::partials.box', ['color' => 'is-primary has-background', 'icon' => 'document', 'heading' => 'Pages', 'title' => '380', 'link' => ['title' => 'View all pages', 'route' => 'admin.management.pages.index'] ])
    </div>
    <div class="column is-4">
        @include('core::partials.box', ['color' => 'is-link has-background', 'icon' => 'image', 'heading' => 'Media', 'title' => '150', 'link' => ['title' => 'View all media', 'route' => 'admin.management.media.index'] ])
    </div>
    <div class="column is-4">
        @include('core::partials.box', ['color' => 'is-green has-background', 'icon' => 'people', 'heading' => 'Users', 'title' => '3', 'link' => ['title' => 'View all users', 'route' => 'admin.administration.users.index'] ])
    </div>
</main>
@stop
