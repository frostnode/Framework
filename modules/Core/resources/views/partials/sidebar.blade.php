<aside class="menu">
    <div class="is-padded">
        <p class="menu-label">
            General
        </p>
        <ul class="menu-list">
        <li>
            <a href="{{ route('admin.index') }}" class="{{ Request::is('admin') ? 'is-active' : '' }}">
                <span class="icon">
                    <span data-glyph="dashboard" class="oi"></span>
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
            <li>
                <a href="{{ route('admin.pages.index') }}" class="{{ Request::is('admin/media*') ? 'is-active' : '' }}">
                    <span class="icon">
                        <span data-glyph="image" class="oi"></span>
                    </span>
                    <span>{{ __('Media') }}</span>
                </a>
            </li>
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
                    <span>{{ __('Users and roles') }}</span>
                </a>
                <ul>
                    {{-- <li><a>Users</a></li> --}}
                    <li><a disabled>Roles</a></li>
                    {{-- <li><a>Add a member</a></li> --}}
                </ul>
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
                <a href="{{ route('admin.index') }}" class="{{ Request::is('admin/modules*') ? 'is-active' : '' }}">
                    <span class="icon">
                        <span data-glyph="box" class="oi"></span>
                    </span>
                    <span>{{ __('Modules') }}</span>
                </a>
                {{-- <ul>
                    <li><a>List</a></li>
                    <li><a disabled>Install</a></li>
                    <li><a>Add a member</a></li>
                </ul> --}}
            </li>
            <li>
                <a>
                    <span class="icon">
                        <span data-glyph="cog" class="oi"></span>
                    </span>
                    <span>{{ __('Settings') }}</span>
                </a>
                {{-- <ul>
                    <li><a>General</a></li>
                    <li><a>Locale</a></li>
                    <li><a>Add a member</a></li>
                </ul> --}}
            </li>
        </ul>
    </div>
</aside>
