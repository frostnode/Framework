@extends('core::layouts.master')
@section('title', __('Create a new page'))
@section('subtitle', __('Create a new page from the list of possible pagetypes'))

@section('content')
<main>

    <!-- Heading -->
    <div class="level">
        <!-- Left side -->
        <div class="level-left">
            <div class="level-item">
                <h2 class="title is-4">{{ __('Select a pagetype from the list') }}</h2>
            </div>
        </div>
    </div>

    <hr>

    <div class="columns is-multiline">
        @forelse  ($pagetypes as $pagetype)
        <div class="column is-4">
            <div class="card">
                <div class="card-content">
                    <p class="title is-5">{{ $pagetype->name }}</p>
                    <div class="content">{{ $pagetype->description }}</div>
                    <a href="{{ route('admin.pages.page.create', $pagetype->id) }}" class="button is-link">Select this pagetype</a>
                </div>
            </div>
        </div>
        @empty
            <div class="column is-12">
                <p>No pagetypes here, <a href="{{ route('admin.pagetypes.index') }}">try updating them?</a></p>
            </div>
        @endforelse
    </div>
</main>
@stop
