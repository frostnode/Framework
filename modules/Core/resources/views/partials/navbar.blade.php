<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a href="{{ route('admin.index') }}" class="navbar-item {{ Request::is('admin') ? 'is-active' : '' }}">
            <img class="is-hidden-fullhd" src="{{ asset('/modules/core/images/logo.svg') }}">
            <span class="icon is-visible-fullhd">
                <i class="mdi mdi-view-dashboard"></i>
            </span>
            <span class="is-hidden">Frostnode CMS</span>
        </a>

        <a href="{{ route('admin.management') }}" class="navbar-item {{ Request::is('admin/management*') ? 'is-active' : '' }}">
            <span>{{ __('Content management') }}</span>
        </a>

        <a href="{{ route('admin.administration') }}" class="navbar-item {{ Request::is('admin/administration*') ? 'is-active' : '' }}">
            <span>{{ __('Administration') }}</span>
        </a>

        <div class="navbar-burger" @click="showNav = !showNav" :class="{ 'is-active': showNav }">
            <span></span>
            <span></span>
            <span></span>
        </div>

    </div>

    <div class="navbar-menu" :class="{ 'is-active': showNav }">

        <div class="navbar-end">

            {{-- <a class="navbar-item">
                <span class="icon">
                    <i class="mdi mdi-earth"></i>
                </span>
                <span>
                    View website
                </span>
            </a> --}}

            <a class="navbar-item">
                <span class="badge is-badge-danger" data-badge="88">
                    <span class="icon">
                        <i class="mdi mdi-bell-outline"></i>
                    </span>
                    <span class="is-hidden-desktop">Notifications</span>
                </span>
            </a>

            @auth

                <a href="{{ route('admin.administration.users.user.show', Auth::user() ) }}" class="navbar-item">
                    {!!"<img class='profile-image' src='http://gravatar.com/avatar/".md5(strtolower(trim(Auth::user()->email)))."?size=32&d=identicon' />" !!}
                    <span class="">{{ Auth::user()->name }}</span>
                </a>

                <a href="{{ route('logout') }}" title="{{ __('Sign out') }}" class="navbar-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <div class="icon">
                        <i class="mdi mdi-logout-variant"></i>
                    </div>
                </a>

                <!-- Logout form -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>

            @endauth

        </div>

    </div>

</nav>
