@extends('core::layouts.master')

@section('sidebar')
    <div class="column is-2">
        @include('core::partials.sidebar-edit')
    </div>
@stop

@section('content')
    <div class="box">
        <h1 class="title">Hello World</h1>

        <p class="subtitle">
            This view is loaded from module: {!! config('core.name') !!}
        </p>

    </div>
@stop
