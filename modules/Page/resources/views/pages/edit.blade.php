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
            <b-tabs type="is-boxed">

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

                        <div class="field">
                            <label for="meta_keywords" class="label">Meta keyword</label>
                            <input id="meta_keywords" class="input" placeholder="Keywords" name="meta[keywords]" type="text" value="{{ old('meta[keywords]', $page->meta['keywords']) }}">
                            @if ($errors->first('meta_keywords'))
                            <p class="help is-danger">{{ $errors->first('meta_keywords') }}</p>
                            @else
                            <p class="help">Keywords should be comma seperated</p>
                            @endif
                        </div>

                        <div class="field">
                            <label for="meta_description" class="label">Meta description</label>
                            <textarea id="meta_description" class="textarea" placeholder="Description" name="meta[description]">{{ old('meta[description]', $page->meta['description']) }}</textarea>
                            @if ($errors->first('meta_description'))
                            <p class="help is-danger">{{ $errors->first('meta_description') }}</p>
                            @else
                            <p class="help">One sentence or a short paragraph</p>
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
