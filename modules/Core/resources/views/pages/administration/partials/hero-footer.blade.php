
<div class="hero-foot">
    <nav class="tabs is-boxed">
        <ul>
            <li class="{{ Request::is('admin/administration') ? 'is-active' : '' }}">
                <a href="{{ route('admin.administration') }}">
                    <span class="icon">
                        <i class="mdi mdi-view-dashboard"></i>
                    </span>
                    <span>{{ __('Dashboard') }}</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/administration/pagetypes*') ? 'is-active' : '' }}">
                <a href="{{ route('admin.administration.pagetypes.index') }}">
                    <span class="icon">
                        <i class="mdi mdi-book"></i>
                    </span>
                    <span>{{ __('Pagetypes') }}</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/administration/users*') ? 'is-active' : '' }}">
                <a href="{{ route('admin.administration.users.index') }}">
                    <span class="icon">
                        <i class="mdi mdi-account-multiple"></i>
                    </span>
                    <span>{{ __('Users') }}</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/administration/modules*') ? 'is-active' : '' }}">
                <a href="{{ route('admin.administration.modules.index') }}">
                    <span class="icon">
                        <i class="mdi mdi-view-module"></i>
                    </span>
                    <span>{{ __('Modules') }}</span>
                </a>
            </li>
            <li class="{{ Request::is('admin/administration/settings*') ? 'is-active' : '' }}">
                <a href="{{ route('admin.administration.settings.index') }}">
                    <span class="icon">
                        <i class="mdi mdi-cogs"></i>
                    </span>
                    <span>{{ __('Settings') }}</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
