<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a href="{{ route('admin.index') }}" class="navbar-item {{ Request::is('admin') ? 'is-active' : '' }}">
            <img class="is-hidden-fullhd" src="{{ asset('/modules/core/images/logo.svg') }}">
            <span class="icon is-visible-fullhd">
                <span class="oi" data-glyph="dashboard"></span>
            </span>
            <span class="is-hidden">Frostnode CMS</span>
        </a>

        <a href="{{ route('admin.management') }}" class="navbar-item {{ Request::is('admin/management*') ? 'is-active' : '' }}">
            <span>{{ __('Content management') }}</span>
        </a>

        <a href="{{ route('admin.administration') }}" class="navbar-item {{ Request::is('admin/administration*') ? 'is-active' : '' }}">
            <span>{{ __('Administration') }}</span>
        </a>

        <navbar-burger target="navMenu"></navbar-burger>

    </div>

    <div class="navbar-menu" id="navMenu">

        {{-- <div class="navbar-start">
            <a href="{{ route('admin.management') }}" class="navbar-item {{ Request::is('admin/management*') ? 'is-active' : '' }}">
                <span>{{ __('Content management') }}</span>
            </a>
            <a href="{{ route('admin.administration') }}" class="navbar-item {{ Request::is('admin/administration*') ? 'is-active' : '' }}">
                <span>{{ __('Administration') }}</span>
            </a>
        </div> --}}

        <div class="navbar-end">

            <a class="navbar-item">
                <span class="icon">
                    <span class="oi" data-glyph="globe"></span>
                </span>
                <span>
                    View website
                </span>
            </a>

            <a class="navbar-item">
                <span class="badge is-badge-danger" data-badge="88">
                    <span class="icon">
                        <span class="oi" data-glyph="bullhorn"></span>
                    </span>
                    <span class="is-hidden-desktop">Notifications</span>
                </span>
            </a>

            @auth
            <div class="navbar-item has-dropdown is-hoverable">
                <a href="{{ route('admin.administration.users.user.show', Auth::user() ) }}" class="navbar-link">
                    <img class="profile-image" src="https://randomuser.me/api/portraits/men/17.jpg">
                    {{-- <span class="icon">
                        <span class="oi" data-glyph="person"></span>
                    </span> --}}
                    <span class="is-hidden-desktop">{{ Auth::user()->name }}</span>
                </a>
                <div class="navbar-dropdown is-boxed is-right">
                    <a href="{{ route('admin.administration.users.user.edit', Auth::user()->id) }}" class="navbar-item">
                        <div class="icon">
                            <span class="oi" data-glyph="cog"></span>
                        </div>
                        <span>Account preferences</span>
                    </a>
                    <hr class="navbar-divider">
                    <a href="{{ route('logout') }}" class="navbar-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <div class="icon">
                            <span class="oi" data-glyph="account-logout"></span>
                        </div>
                        <span>Sign out</span>
                    </a>

                    <!-- Logout form -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                </div>
            </div>
            @endauth

        </div>

    </div>

</nav>
