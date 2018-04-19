<section class="hero @yield('type', 'is-dark') @yield('size')">
    <div class="container is-fluid">

        <!-- Hero head -->
        <div class="hero-head">
            @include('core::partials.navbar')
        </div>

        <!-- Hero content -->
        <div class="hero-body">
            <h1 class="title">
                @yield('title')
            </h1>
            <h2 class="subtitle">
                @yield('subtitle')
            </h2>
        </div>

        <!-- Hero footer: will stick at the bottom -->
        <div class="hero-foot">

            {{-- <a class="button is-primary is-round is-large" href="#">
                <span class="icon is-large">
                    <span class="oi" data-glyph="plus"></span>
                </span>
            </a> --}}

            <nav class="tabs is-boxed">
                <ul>
                    <li class="{{ Request::is('admin') ? 'is-active' : '' }}">
                        <a href="{{ route('admin.index') }}">
                            <span class="icon">
                                <span class="oi" data-glyph="dashboard"></span>
                            </span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/pages*') ? 'is-active' : '' }}">
                        <a href="{{ route('admin.pages.index') }}">
                            <span class="icon">
                                <span data-glyph="document" class="oi"></span>
                            </span>
                            <span>{{ __('Pages') }}</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/media*') ? 'is-active' : '' }}">
                        <a href="{{ route('admin.media.index') }}">
                            <span class="icon">
                                <span data-glyph="image" class="oi"></span>
                            </span>
                            <span>{{ __('Media') }}</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</section>
