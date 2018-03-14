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
        @for ($i = 1; $i < 13; $i++)
        <div class="column is-4">
            <div class="card">
                <div class="card-content">
                    <p class="title is-5">Pagetype name {{ $i }}</p>
                    <div class="content">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Phasellus nec iaculis mauris.
                    </div>
                    <a href="{{ route('admin.pages.page.create', $i) }}" class="button is-link">Select this pagetype</a>
                </div>
            </div>
        </div>
        @endfor
    </div>
</main>
@stop
