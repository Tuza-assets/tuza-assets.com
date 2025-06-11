
@include('layouts.dashboard.head')

<body>
      <x-banner />
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        @include('layouts.dashboard.toopbar')
        @include('layouts.dashboard.aside')
        <div class="py-6 page-wrapper">
            @yield('content')
        </div>
    </div>
    @include('layouts.dashboard.foot')
</body>
