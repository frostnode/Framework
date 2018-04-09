@extends('core::layouts.master')

@section('content')
<section class="hero is-primary">
    <div class="hero-body">
        <h1 class="title">
            {{ $user->name }}
        </h1>
        <h2 class="subtitle">
            {{ __('Account preferences') }}
        </h2>
    </div>

    <!-- Hero footer: will stick at the bottom -->
    <div class="hero-foot">
        <nav class="tabs is-boxed">
            <ul>
                <li class="is-active">
                    <a>
                        <span class="icon is-small">
                            <span class="oi" data-glyph="document"></span>
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
                <h2 class="title is-4">Account details</h2>
            </div>
        </div>
    </div>

    <p>User id: {{ $user->id }}</p>
    <p>Name: {{ $user->name }}</p>
    <p>{{ str_plural('Role', count($user->roles)) }}: {{ implode(array_pluck($user->roles, 'name'), ', ') ?? 'none'  }}</p>
    <p>Email address: {{ $user->email }}</p>
    <p>Created: {{ $user->created_at }}</p>
    <p>Updated: {{ $user->updated_at }}</p>

</main>
@stop
