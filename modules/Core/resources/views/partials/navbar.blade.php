<nav class="navbar is-dark" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{ route('admin') }}">
            Frostnode CMS
        </a>

        <div class="navbar-burger" data-target="navMenu">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div class="navbar-menu" id="navMenu">

        <div class="navbar-start">
            <a href="{{ route('admin.edit') }}" class="navbar-item {{ Request::is('admin/edit*') ? 'is-active' : '' }}">
                Edit
            </a>
            <a href="{{ route('admin.settings') }}" class="navbar-item {{ Request::is('admin/settings*') ? 'is-active' : '' }}">
                Settings
            </a>
        </div>

        <div class="navbar-end">
            <div class="navbar-item has-dropdown is-hoverable">
                <a class="navbar-link">
                    Docs
                </a>

                <div class="navbar-dropdown is-right">
                    <a class="navbar-item">
                        Overview
                    </a>
                    <a class="navbar-item">
                        Elements
                    </a>
                    <a class="navbar-item">
                        Components
                    </a>
                    <hr class="navbar-divider">
                    <div class="navbar-item">
                        Version 0.6.2
                    </div>
                </div>
            </div>
        </div>

    </div>

</nav>
