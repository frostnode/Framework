@extends('core::layouts.master')
@section('title', __('Create page'))
@section('subtitle', $pagetype->name)

@section('content')
<detached-tabs>
    <tab-item name="Content" target="content" selected="true"></tab-item>
    <tab-item name="Seo" target="seo"></tab-item>
</detached-tabs>

<main>
    {!! form_start($form) !!}
    <div class="columns">

        <!-- Main content -->
        <div class="column">

            <!-- Tab content -->
            <div class="tab-panels">

                <!-- Content -->
                <div id="content" class="tab-panel is-active">
                    <div class="field">
                        <input class="input is-large" placeholder="Page title" name="title" type="text" required>
                        @if ($errors->first('title'))
                        <p class="help is-danger">{{ $errors->first('title') }}</p>
                        @endif
                    </div>

                    <div class="field">
                        <input class="input is-small" placeholder="<Page alias will be generated automatically>" name="slug" type="text" disabled>
                            @if ($errors->first('slug'))
                            <p class="help is-danger">{{ $errors->first('slug') }}</p>
                            @endif
                        </div>

                        {!! form_rest($form) !!}

                    </div>

                    <!-- SEO -->
                    <div id="seo" class="tab-panel">

                        <div class="notification is-info"><p>This feature is not implemented yet.</p></div>

                        <div class="field">
                            <label for="meta_keywords" class="label">Meta keyword</label>
                            <input id="meta_keywords" class="input" placeholder="Enter your keywords" name="meta[keywords]" type="text">
                            @if ($errors->first('meta_keywords'))
                            <p class="help is-danger">{{ $errors->first('meta_keywords') }}</p>
                            @endif
                        </div>

                        <div class="field">
                            <label for="meta_description" class="label">Meta description</label>
                            <textarea id="meta_description" class="textarea" placeholder="" name="meta[description]"></textarea>
                            @if ($errors->first('meta_description'))
                            <p class="help is-danger">{{ $errors->first('meta_description') }}</p>
                            @endif
                        </div>

                    </div>

                </div>

            </div>
            <!-- Main content end -->

            <!-- Sidebar -->
            <div class="column is-4">
                @include('page::pages.partials.edit-sidebar')
            </div>
            <!-- Sidebar end -->

        </div>
        {!! form_end($form, false) !!}
    </main>
    @stop
