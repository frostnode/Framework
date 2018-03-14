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
    <div class="columns is-multiline">
        @foreach ($page_types as $page_type)
        <div class="column is-4">
            <div class="card">
                <div class="card-content">
                    <p class="title is-5">{{ $page_type->name }}</p>
                    <div class="content">{{ $page_type->description }}</div>
                    <a href="{{ route('admin.pages.page.create', $page_type->machine_name) }}" class="button is-link">Select this pagetype</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</main>
@stop
