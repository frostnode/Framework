<div class="card">

    <!-- Card header -->
    <header class="card-header">
        <p class="card-header-title">
            Publish
        </p>
    </header>

    <!-- Card content -->
    <div class="card-content">
        <div class="field">
          <input class="is-checkradio" id="statusCheckbox" type="checkbox" name="status" value="2" {{ isset($page->status) && $page->status == 2 ? 'checked' : '' }}>
          <label for="statusCheckbox">Publish</label>
        </div>
        <div class="field">
            <p>Pagetype: {{ $pagetype->name }} <a href="">edit?</a></p>
        </div>
        <div class="field">
            <p>Authored by: {{ $page->user->name ?? Auth::user()->name }}
                @if(!Request::is('admin/management/pages/page/create*'))
                    <a href="">edit?</a>
                @endif
            </p>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        </div>
        <div class="field">
            @if (isset($page))
                <p>Authored on: {{ $page->created_at }} <a href="">edit</a></p>
            @else
                <p>Authored on: now <a href="">edit</a></p>
            @endif
        </div>
    </div>

    <!-- Card footer -->
    <footer class="card-footer">
        <div class="card-content">

            <input type="hidden" name="pagetype_model" value="{{ $pagetype->model }}">

            <!-- Save and delete -->
            <button type="submit" class="button is-primary">
                <span class="icon is-small">
                    <i class="mdi mdi-check"></i>
                </span>
                <span>Save</span>
            </button>

            @if (isset($page))
                <a href="{{ route('admin.management.pages.page.delete', $page) }}" title="Delete page" class="button is-text is-pulled-right">
                    <span class="icon is-small">
                        <i class="mdi mdi-delete"></i>
                    </span>
                    <span>Delete</span>
                </a>
            @endif

        </div>
    </footer>
</div>
