<aside class="menu">
    <div class="wrapper">
        <p class="menu-label">
            General
        </p>
        <ul class="menu-list">
        <li><a href="{{ route('admin.settings') }}" class="{{ Request::is('admin/settings*') ? 'is-active' : '' }}">Dashboard</a></li>
        </ul>
        {{--  <p class="menu-label">
            Content managment
        </p>
        <ul class="menu-list">
            <li><a>Pages</a></li>
            <li>
                <a>Content types</a>
                <ul>
                    <li><a>Members</a></li>
                    <li><a>Plugins</a></li>
                    <li><a>Add a member</a></li>
                </ul>
            </li>
            <li><a>Invitations</a></li>
            <li><a>Cloud Storage Environment Settings</a></li>
            <li><a>Authentication</a></li>
        </ul>  --}}
        {{--  <p class="menu-label">
            Transactions
        </p>
        <ul class="menu-list">
            <li><a>Payments</a></li>
            <li><a>Transfers</a></li>
            <li><a>Balance</a></li>
        </ul>  --}}
    </div>
</aside>
