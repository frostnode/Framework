@extends('core::layouts.master')

@section('content')
<section class="hero is-primary">
    <div class="hero-body">
        <h1 class="title">
            Pagetype
        </h1>
        <h2 class="subtitle">
            A list of all available pagetypes
        </h2>
    </div>

    <!-- Hero footer: will stick at the bottom -->
    <div class="hero-foot">
        <nav class="tabs is-boxed">
            <ul>
                <li class="is-active"><a>List</a></li>
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
                <h2 class="title is-4">Select a pagetype</h2>
            </div>
        </div>
    </div>

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
