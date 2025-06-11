<header class="top-0 left-0 z-50 w-full topbar" data-navbarbg="skin6" style="position: fixed;">
    <nav class="z-40 flex items-center justify-between px-6 py-4 bg-gray-100 shadow">
        <div class="flex items-center">
            <!-- Logo -->
            <a href="{{ route('dashboard') }}" class="flex items-center">
                <img src="{{ asset('assets/images/logo.png') }}" alt="homepage" class="h-12">
            </a>
        </div>

        <ul class="flex items-center space-x-4">
            @php
                $user = Auth::user();
                $initials = strtoupper(substr($user->email, 0, 2));
            @endphp

            @if($user->status == 1)
            <li>
                <a href="http://auth.tuza-assets.com" type="button" class="btn btn-secondary">Switch site</a>
            </li>
            @endif

            <!-- Profile Dropdown -->
            <li class="relative">
                <button id="profileDropdownButton" class="flex items-center p-2 space-x-2 transition-colors rounded-lg hover:bg-gray-200">
                    <!-- Profile Avatar with Initials -->
                    <div class="flex items-center justify-center w-10 h-10 text-sm font-semibold text-white bg-green-600 rounded-full">
                        {{ $initials }}
                    </div>
                    <div class="text-left">
                        <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                        <div class="text-xs text-gray-500">{{ $user->email }}</div>
                    </div>
                    <!-- Dropdown Arrow -->
                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div id="profileDropdown" class="absolute right-0 z-50 hidden w-48 py-1 mt-2 bg-white border border-gray-200 rounded-md shadow-lg">
                    <a href="{{ route('profile.show') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Profile
                    </a>
                    <div class="border-t border-gray-100"></div>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                       class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                        <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        Logout
                    </a>
                </div>
            </li>
        </ul>
    </nav>

    <!-- Logout Form -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</header>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const dropdownButton = document.getElementById('profileDropdownButton');
    const dropdown = document.getElementById('profileDropdown');

    // Toggle dropdown
    dropdownButton.addEventListener('click', function() {
        dropdown.classList.toggle('hidden');
    });

    // Close dropdown when clicking outside
    document.addEventListener('click', function(event) {
        if (!dropdownButton.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.classList.add('hidden');
        }
    });
});
</script>