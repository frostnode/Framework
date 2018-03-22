<div class="card">

    <!-- Card header -->
    <header class="card-header">
        <p class="card-header-title">
            Publish
        </p>
        <a href="#" class="card-header-icon" aria-label="more options">
          <span class="icon">
            <i class="fas fa-angle-down" aria-hidden="true"></i>
          </span>
        </a>
    </header>

    <!-- Card content -->
    <div class="card-content">
        <div class="field">
            <label class="checkbox">
                <input name="status" type="checkbox" value="1" {{ isset($page->status) && $page->status ? 'checked' : '' }}>
                Published?
            </label>
        </div>
        <div class="field">
            <p>Pagetype: {{ $pagetype->name }} <a href="">edit?</a></p>
        </div>
        <div class="field">
            <p>Authored by: Magnus Vike <a href="">edit?</a></p>
        </div>
        <div class="field">
            @if ($page)
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
            <button type="submit" class="button is-primary">Save</button>
            <form method="POST" action="{{ route('admin.pages.page.destroy', $page) }}">
                @method('DELETE')
                @csrf
                <button title="Delete page" type="submit" class="button is-text is-pulled-right">
                    <span class="icon is-small">
                        <i class="far fa-trash-alt"></i>
                    </span>
                    <span>Delete</span>
                </button>
            </form>

        </div>
    </footer>
</div>
