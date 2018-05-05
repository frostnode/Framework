<div class="hero-foot">
    <nav class="tabs is-boxed">
        <ul>
            <li class="{{ Request::is('admin/management') ? 'is-active' : '' }}">
                <a href="{{ route('admin.management') }}">
                    <span class="icon">
                        <i class="mdi mdi-view-dashboard"></i>
                    </span>
                    <span>{{ __('Dashboard') }}</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/management/pages*') ? 'is-active' : '' }}">
                <a href="{{ route('admin.management.pages.index') }}">
                    <span class="icon">
                        <i class="mdi mdi-file-document-box"></i>
                    </span>
                    <span>{{ __('Pages') }}</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/management/media*') ? 'is-active' : '' }}">
                <a href="{{ route('admin.management.media.index') }}">
                    <span class="icon">
                        <i class="mdi mdi-image"></i>
                    </span>
                    <span>{{ __('Media') }}</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
