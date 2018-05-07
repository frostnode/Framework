@extends('core::layouts.master')
@section('title', __('Content management'))
@section('subtitle', __('A list of all actions available to you'))

@section('content')
<main class="columns is-multiline">
        <div class="column is-4">
            @include('core::partials.box', ['color' => 'is-primary', 'icon' => 'file-document-box', 'heading' => 'Pages', 'title' => $page_count, 'link' => ['title' => 'View all pages', 'route' => 'admin.management.pages.index'] ])
        </div>
        <div class="column is-4">
            @include('core::partials.box', ['color' => 'is-link', 'icon' => 'image', 'heading' => 'Media', 'title' => $media_count, 'link' => ['title' => 'View all media', 'route' => 'admin.management.media.index'] ])
        </div>
    </main>
@stop
