@php
    $userStatus = auth()->user()->status;
@endphp

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 pt-20 w-64 h-screen bg-white border-r border-gray-200 transition-transform -translate-x-full sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="overflow-y-auto px-3 pb-4 h-full bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            @if ($userStatus == '1')
            <li>
                <a href="{{ route('dashboard') }}" wire:navigate
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white {{ request()->routeIs('dashboard*') ? 'bg-gray-100 dark:bg-gray-700' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }} group">
                    <i class="fa fa-tachometer-alt me-2"></i>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.user') }}" wire:navigate
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white {{ request()->routeIs('admin.user*') ? 'bg-gray-100 dark:bg-gray-700' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }} group">
                    <i class="fa fa-users me-2"></i>
                    <span class="ms-3">User Management</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.design') }}" wire:navigate
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white {{ request()->routeIs('admin.design*') ? 'bg-gray-100 dark:bg-gray-700' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }} group">
                    <i class="fa fa-paint-brush me-2"></i>
                    <span class="ms-3">Design</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.properties.index') }}" wire:navigate
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white {{ request()->routeIs('admin.properties*') ? 'bg-gray-100 dark:bg-gray-700' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }} group">
                    <i class="fa fa-home me-2"></i>
                    <span class="ms-3">Property On Sell</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.blogs.index') }}" wire:navigate
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white {{ request()->routeIs('admin.blogs*') ? 'bg-gray-100 dark:bg-gray-700' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }} group">
                    <i class="fa fa-blog me-2"></i>
                    <span class="hide-menu">Blog</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.project.proposal') }}" wire:navigate
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white {{ request()->routeIs('admin.project.proposal*') ? 'bg-gray-100 dark:bg-gray-700' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }} group">
                    <i class="fa fa-project-diagram me-2"></i>
                    <span class="hide-menu">Project Proposal</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.portfolios.index') }}" wire:navigate
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white {{ request()->routeIs('admin.portfolios*') ? 'bg-gray-100 dark:bg-gray-700' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }} group">
                    <i class="fa fa-images me-2"></i>
                    <span class="hide-menu">Portfolio Image</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.Zonning') }}" wire:navigate
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white {{ request()->routeIs('admin.Zonning*') ? 'bg-gray-100 dark:bg-gray-700' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }} group">
                    <i class="fa fa-map me-2"></i>
                    <span class="hide-menu">Zoning</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.magazine') }}" wire:navigate
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white {{ request()->routeIs('admin.magazine*') ? 'bg-gray-100 dark:bg-gray-700' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }} group">
                    <i class="fa fa-newspaper me-2"></i>
                    <span class="hide-menu">Magazine</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.chart') }}" wire:navigate
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white {{ request()->routeIs('admin.chart*') ? 'bg-gray-100 dark:bg-gray-700' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }} group">
                    <i class="fa fa-chart-bar me-2"></i>
                    <span class="hide-menu">Chart</span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin.contact') }}" wire:navigate
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white {{ request()->routeIs('admin.contact*') ? 'bg-gray-100 dark:bg-gray-700' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }} group">
                    <i class="fa fa-envelope me-2"></i>
                    <span class="hide-menu">Messages</span>
                </a>
            </li>
            @endif

            @if ($userStatus == '2')
            <li>
                <a href="{{ route('admin.blogs.index') }}" wire:navigate
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white {{ request()->routeIs('admin.blogs*') ? 'bg-gray-100 dark:bg-gray-700' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }} group">
                    <i class="fa fa-blog me-2"></i>
                    <span class="hide-menu">Blog</span>
                </a>
            </li>
            @endif

            @if ($userStatus == '4')
            <li>
                <a href="{{ route('dashboard') }}" wire:navigate
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white {{ request()->routeIs('dashboard*') ? 'bg-gray-100 dark:bg-gray-700' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }} group">
                    <i class="fa fa-tachometer-alt"></i>
                    <span class="ms-3">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('partner.properties.index') }}" wire:navigate
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white {{ request()->routeIs('partner.properties*') ? 'bg-gray-100 dark:bg-gray-700' : 'hover:bg-gray-100 dark:hover:bg-gray-700' }} group">
                    <i class="fa fa-tachometer-alt"></i>
                    <span class="ms-3">Properties</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</aside>