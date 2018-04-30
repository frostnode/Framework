<div class="hero-foot">
    <nav class="tabs is-boxed">
        <ul>
            <li class="{{ Request::is('admin/management') ? 'is-active' : '' }}">
                <a href="{{ route('admin.management') }}">
                    <span class="icon">
                        <span class="oi" data-glyph="dashboard"></span>
                    </span>
                    <span>{{ __('Dashboard') }}</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/management/pages*') ? 'is-active' : '' }}">
                <a href="{{ route('admin.management.pages.index') }}">
                    <span class="icon">
                        <span data-glyph="document" class="oi"></span>
                    </span>
                    <span>{{ __('Pages') }}</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/management/media*') ? 'is-active' : '' }}">
                <a href="{{ route('admin.management.media.index') }}">
                    <span class="icon">
                        <span data-glyph="image" class="oi"></span>
                    </span>
                    <span>{{ __('Media') }}</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
