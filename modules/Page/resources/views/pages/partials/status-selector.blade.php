<p class="level-item">
    <a href="{{ route('admin.pages.index') }}">
        {!! (is_null($status)) ? '<strong>All</strong>' : 'All' !!}
    </a>
</p>
<p class="level-item">
    <a href="{{ route('admin.pages.index', 'status=2') }}">
        {!! ($status == 2) ? '<strong>Published</strong>' : 'Published' !!}
    </a>
</p>
<p class="level-item">
    <a href="{{ route('admin.pages.index', 'status=1') }}">
        {!! ($status == 1) ? '<strong>Drafts</strong>' : 'Drafts' !!}
    </a>
</p>
