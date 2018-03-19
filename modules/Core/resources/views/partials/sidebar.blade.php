<aside class="menu">
    <div class="is-padded">
        <p class="menu-label">
            General
        </p>
        <ul class="menu-list">
        <li><a href="{{ route('admin.index') }}" class="{{ Request::is('admin') ? 'is-active' : '' }}">Dashboard</a></li>
        </ul>
        <p class="menu-label">
            Content managment
        </p>
        <ul class="menu-list">
            <li>
                <a href="{{ route('admin.pages.index') }}" class="{{ Request::is('admin/pages*') ? 'is-active' : '' }}">Pages</a>
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
                <a href="{{ route('admin.pagetypes.index') }}" class="{{ Request::is('admin/pagetypes*') ? 'is-active' : '' }}">Pagetypes</a>
            </li>
            <li><a>Settings</a></li>
        </ul>
    </div>
</aside>
