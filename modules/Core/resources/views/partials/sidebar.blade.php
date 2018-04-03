<aside class="menu">
    <div class="is-padded">
        <p class="menu-label">
            General
        </p>
        <ul class="menu-list">
        <li>
            <a href="{{ route('admin.index') }}" class="{{ Request::is('admin') ? 'is-active' : '' }}">
                <span class="icon">
                    <span data-glyph="compass" class="oi"></span>
                </span>
                <span>{{ __('Dashboard') }}</span>
            </a>
        </li>
        </ul>
        <p class="menu-label">
            Content managment
        </p>
        <ul class="menu-list">
            <li>
                <a href="{{ route('admin.pages.index') }}" class="{{ Request::is('admin/pages*') ? 'is-active' : '' }}">
                    <span class="icon">
                        <span data-glyph="document" class="oi"></span>
                    </span>
                    <span>{{ __('Pages') }}</span>
                </a>
            </li>
            {{-- <li>
                <a>Content types</a>
                <ul>
                    <li><a>Members</a></li>
                    <li><a>Plugins</a></li>
                    <li><a>Add a member</a></li>
                </ul>
            </li> --}}
            {{--  <li><a>Invitations</a></li>
            <li><a>Cloud Storage Environment Settings</a></li>
            <li><a>Authentication</a></li>  --}}
        </ul>
         <p class="menu-label">
            Administration
        </p>
        <ul class="menu-list">
            <li>
                <a href="{{ route('admin.users.index') }}" class="{{ Request::is('admin/users*') ? 'is-active' : '' }}">
                    <span class="icon">
                        <span data-glyph="people" class="oi"></span>
                    </span>
                    <span>{{ __('Users') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.pagetypes.index') }}" class="{{ Request::is('admin/pagetypes*') ? 'is-active' : '' }}">
                    <span class="icon">
                        <span data-glyph="book" class="oi"></span>
                    </span>
                    <span>{{ __('Pagetypes') }}</span>
                </a>
            </li>
            <li>
                <a>
                    <span class="icon">
                        <span data-glyph="cog" class="oi"></span>
                    </span>
                    <span>{{ __('Settings') }}</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
