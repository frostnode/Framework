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
        @if (Request::is('admin/management*'))
            @include('core::pages.management.partials.hero-footer')
        @elseif (Request::is('admin/administration*'))
            @include('core::pages.administration.partials.hero-footer')
        @endif

    </div>
</section>
