@php
    $userStatus = auth()->user()->status;
@endphp

<aside class="bg-blue-100 left-sidebar" data-sidebarbg="skin6" style="position: fixed;">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="py-5 sidebar-nav">
            @if ($userStatus == '1')
                <ul class="flex flex-col gap-3 pl-4">
                    <!-- User Profile-->
                    <li class="p-3 mt-4 sidebar-item">
                        <a class="p-4 py-2 text-gray-500 bg-gray-200 hover:bg-gray-300" href="{{ route('dashboard') }}"
                            aria-expanded="false"><i class="fa fa-tachometer-alt me-2"></i><span
                                class="hide-menu">Dashboard</span></a>
                    </li>

                    <li class="p-3 sidebar-item">
                        <a class="p-4 py-2 mt-2 text-gray-500 bg-gray-200 hover:bg-gray-300"
                            href="{{ route('admin.user') }}" aria-expanded="false">
                            <i class="fa fa-users me-2"></i><span class="hide-menu">User Management</span></a>
                    </li>

                    <li class="p-3 sidebar-item">
                        <a class="p-4 py-2 mt-2 text-gray-500 bg-gray-200 hover:bg-gray-300"
                            href="{{ route('admin.design') }}" aria-expanded="false">
                            <i class="fa fa-paint-brush me-2"></i><span class="hide-menu">Design</span></a>
                    </li>

                    <li class="p-3 sidebar-item">
                        <a class="p-4 py-2 mt-2 text-gray-500 bg-gray-200 hover:bg-gray-300"
                            href="{{ route('admin.properties.index') }}" aria-expanded="false">
                            <i class="fa fa-home me-2"></i><span class="hide-menu">Property On Sell</span></a>
                    </li>

                    <li class="p-3 sidebar-item">
                        <a class="w-full p-4 py-2 mt-2 text-gray-500 bg-gray-200 hover:bg-gray-300 " style="width:100%"
                            href="{{ route('admin.blogs.index') }}" aria-expanded="false">
                            <i class="fa fa-blog me-2"></i><span class="hide-menu">Blog</span></a>
                    </li>

                    <li class="p-3 sidebar-item">
                        <a class="w-full p-4 py-2 mt-2 text-gray-500 bg-gray-200 hover:bg-gray-300 " style="width:100%"
                            href="{{ route('admin.project.proposal') }}" aria-expanded="false">
                            <i class="fa fa-project-diagram me-2"></i><span class="hide-menu">Project
                                Proposal</span></a>
                    </li>

                    <li class="p-3 sidebar-item">
                        <a class="w-full p-4 py-2 mt-2 text-gray-500 bg-gray-200 hover:bg-gray-300 " style="width:100%"
                            href="{{ route('admin.portfolios.index') }}" aria-expanded="false">
                            <i class="fa fa-images me-2"></i><span class="hide-menu">Portfolio Image</span></a>
                    </li>

                    <li class="p-3 sidebar-item">
                        <a class="w-full p-4 py-2 mt-2 text-gray-500 bg-gray-200 hover:bg-gray-300"
                            href="{{ route('admin.Zonning') }}" aria-expanded="false">
                            <i class="fa fa-map me-2"></i><span class="hide-menu">Zoning</span></a>
                    </li>

                    <li class="p-3 sidebar-item">
                        <a class="p-4 py-2 mt-2 text-gray-500 bg-gray-200 hover:bg-gray-300"
                            href="{{ route('admin.magazine') }}" aria-expanded="false">
                            <i class="fa fa-newspaper me-2"></i><span class="hide-menu">Magazine</span></a>
                    </li>

                    <li class="p-3 sidebar-item">
                        <a class="w-full p-4 py-2 mt-2 text-gray-500 bg-gray-200 hover:bg-gray-300"
                            href="{{ route('admin.chart') }}" aria-expanded="false">
                            <i class="fa fa-chart-bar me-2"></i><span class="hide-menu">Chart</span></a>
                    </li>

                    <li class="p-3 sidebar-item">
                        <a class="w-full p-4 py-2 mt-2 text-gray-500 bg-gray-200 hover:bg-gray-300"
                            href="{{ route('admin.contact') }}" aria-expanded="false">
                            <i class="fa fa-envelope me-2"></i><span class="hide-menu">Messages</span></a>
                    </li>

                </ul>
            @endif

            @if ($userStatus == '2')
                <ul class="flex flex-col gap-3 py-5 pl-4 mt-5 ">
                    <li class="p-3 mt-5 sidebar-item">
                        <a class="w-full p-4 py-2 mt-2 text-gray-500 bg-gray-200 hover:bg-gray-300 " style="width:100%"
                            href="{{ route('admin.blogs.index') }}" aria-expanded="false">
                            <i class="fa fa-blog me-2"></i><span class="hide-menu">Blog</span></a>
                    </li>
                </ul>
            @endif

            @if ($userStatus == '4')
            <ul class="flex flex-col gap-3 py-5 pl-4 ">
                <li>
                    <a href="{{ route('dashboard') }}" wire:navigate
                        class="flex items-center p-2 text-gray-900 rounded-lg  {{ request()->routeIS('dashboard*') ? 'bg-gray-100' : 'hover:bg-gray-100' }} group">
                        <i class="fa fa-tachometer-alt"></i>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('partner.properties.index') }}" wire:navigate
                        class="flex items-center p-2 text-gray-900 rounded-lg  {{ request()->routeIS('partner.properties.index*') ? 'bg-gray-100' : 'hover:bg-gray-100' }} group">
                        <i class="fa fa-tachometer-alt"></i>
                        <span class="ms-3">properties</span>
                    </a>
                </li>
            </ul>
            @endif
        </nav>
    </div>
</aside>
