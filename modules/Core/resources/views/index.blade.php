@extends('core::layouts.master')

@section('content')
    <h1 class="title">Hello World</h1>

    <p class="subtitle">
        This view is loaded from module: {!! config('core.name') !!}
    </p>
@stop
