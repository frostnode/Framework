@extends('core::layouts.master')
@section('title', __('Dashboard'))
@section('subtitle', __('A list of all actions available to you'))
@section('type', 'is-dark')
@section('size', 'is-large has-background')

@section('content')
<main class="columns">
    <div class="column is-6">
        <nav class="panel">
            <p class="panel-heading">
                {{ __('Pages') }}
            </p>
            <a href="{{ route('admin.pages.page.select') }}" class="panel-block">
                <span class="panel-icon">
                    <span class="oi" data-glyph="document"></span>
                </span>
                {{ __('Create a new page') }}
            </a>
            <a href="{{ route('admin.pages.index') }}" class="panel-block">
                <span class="panel-icon">
                    <span class="oi" data-glyph="document"></span>
                </span>
                {{ __('List all pages') }}
            </a>
            <a href="{{ route('admin.pagetypes.index') }}" class="panel-block">
                <span class="panel-icon">
                    <span class="oi" data-glyph="book"></span>
                </span>
                {{ __('View pagetypes') }}
            </a>
        </nav>
    </div>
</main>
@stop
