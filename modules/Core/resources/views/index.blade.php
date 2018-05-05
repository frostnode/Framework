@extends('core::layouts.master')
@section('title', __('Dashboard'))
@section('subtitle', __('A list of all actions available to you'))
@section('type', 'is-dark')
@section('size', 'is-medium')

@section('content')
<main class="columns is-multiline">
    <div class="column is-4">
        @include('core::partials.box', ['color' => 'is-primary', 'icon' => 'file-document-box', 'heading' => 'Pages', 'title' => $page_count, 'link' => ['title' => 'View all pages', 'route' => 'admin.management.pages.index'] ])
    </div>
    <div class="column is-4">
        @include('core::partials.box', ['color' => 'is-link', 'icon' => 'image', 'heading' => 'Media', 'title' => $media_count, 'link' => ['title' => 'View all media', 'route' => 'admin.management.media.index'] ])
    </div>
    <div class="column is-4">
        @include('core::partials.box', ['color' => 'is-green', 'icon' => 'account-multiple', 'heading' => 'Users', 'title' => $user_count, 'link' => ['title' => 'View all users', 'route' => 'admin.administration.users.index'] ])
    </div>
</main>
@stop
