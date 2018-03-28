<div class="card">

    <!-- Card header -->
    <header class="card-header">
        <p class="card-header-title">
            Publish
        </p>
        <a href="#" class="card-header-icon" aria-label="more options">
          <span class="icon">
            <span class="oi" data-glyph="chevron-bottom"></span>
          </span>
        </a>
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
            <p>Authored by: Magnus Vike <a href="">edit?</a></p>
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
                    <span class="oi" data-glyph="check"></span>
                </span>
                <span>Save</span>
            </button>

            @if (isset($page))
                <a href="{{ route('admin.pages.page.delete', $page) }}" title="Delete page" class="button is-text is-pulled-right">
                    <span class="icon is-small">
                        <span class="oi" data-glyph="trash"></span>
                    </span>
                    <span>Delete</span>
                </a>
            @endif

        </div>
    </footer>
</div>
