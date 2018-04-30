@extends('core::layouts.master')
@section('title', __('Administration'))
@section('subtitle', __('A list of all actions available to you'))

@section('content')
<main class="columns">
    <div class="column is-6">
        <nav class="panel">
            <p class="panel-heading">
                {{ __('Pages') }}
            </p>

            <a href="{{ route('admin.administration.pagetypes.index') }}" class="panel-block">
                <span class="panel-icon">
                    <span class="oi" data-glyph="book"></span>
                </span>
                {{ __('View pagetypes') }}
            </a>
        </nav>
    </div>
</main>
@stop
