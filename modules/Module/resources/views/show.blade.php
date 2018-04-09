@extends('core::layouts.master')

@section('content')
<section class="hero is-primary">
    <div class="hero-body">
        <h1 class="title">
            {{ $module->getName() }}
        </h1>
        <h2 class="subtitle">
            Module information
        </h2>
    </div>

    <!-- Hero footer: will stick at the bottom -->
    <div class="hero-foot">
        <nav class="tabs is-boxed">
            <ul>
                <li class="is-active">
                    <a>
                        <span class="icon is-small">
                            <span class="oi" data-glyph="box"></span>
                        </span>
                        <span>{{ __('Details') }}</span>
                    </a>
                </li>
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
                <h2 class="title is-4">Module information</h2>
            </div>
        </div>
    </div>

    <p>Name: {{ $module->getName() }}</p>
    <p>Alias: {{ $module->getAlias() }}</p>

</main>
@stop
