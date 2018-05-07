@extends('core::layouts.master')
@section('title', __('Edit page'))
@section('subtitle', $page->title)

@section('content')
<main>
    {!! form_start($form) !!}
    <div class="columns">

        <!-- Main content -->
        <div class="column">

            <!-- Tabs -->
            <b-tabs type="is-boxed" animated="false">

                <!-- Content -->
                <b-tab-item label="Content" icon="table-of-contents">
                    <div id="content" class="tab-panel is-active">

                        <div class="field">
                            <input class="input is-large" placeholder="Page title" name="title" type="text" value="{{ old('title', $page->title) }}" required>
                            @if ($errors->first('title'))
                            <p class="help is-danger">{{ $errors->first('title') }}</p>
                            @endif
                        </div>

                        <div class="field">
                            <input class="input is-small" placeholder="Page alias will be generated automatically" name="slug" type="text"  value="{{ $page->slug }}" disabled>
                            @if ($errors->first('slug'))
                            <p class="help is-danger">{{ $errors->first('slug') }}</p>
                            @endif
                        </div>

                        <!-- Output custom form -->
                        {!! form_rest($form) !!}

                    </div>
                </b-tab-item>

                <!-- SEO -->
                <b-tab-item label="Seo" icon="magnify">
                    <div id="seo" class="tab-panel">

                        <div class="notification is-info"><p>This feature is not implemented yet.</p></div>

                        <div class="field">
                            <label for="meta_keywords" class="label">Meta keyword</label>
                            <input id="meta_keywords" class="input" placeholder="Enter your keywords" name="meta_keywords" type="text">
                            @if ($errors->first('meta_keywords'))
                            <p class="help is-danger">{{ $errors->first('meta_keywords') }}</p>
                            @endif
                        </div>

                        <div class="field">
                            <label for="meta_description" class="label">Meta description</label>
                            <textarea id="meta_description" class="textarea" placeholder="" name="meta_description"></textarea>
                            @if ($errors->first('meta_description'))
                            <p class="help is-danger">{{ $errors->first('meta_description') }}</p>
                            @endif
                        </div>

                    </div>
                </b-tab-item>

            </b-tabs>
        </div>
        <!-- Main content end -->

        <!-- Sidebar -->
        <div class="column is-4">
            @include('page::pages.partials.edit-sidebar', $page)
        </div>
        <!-- Sidebar end -->

    </div>
    {!! form_end($form, false) !!}
</main>
@stop
