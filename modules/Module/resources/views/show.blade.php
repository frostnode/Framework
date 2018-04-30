@extends('core::layouts.master')
@section('title', $module->getName())
@section('subtitle', __('Module information'))

@section('content')
<main>
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
