<aside class="w-64 bg-gray-900 text-white max-h-screen overflow-y-auto">
    <div class="p-4 border-b border-gray-800">
        <div class="flex items-center justify-between">

            <span class="text-xl font-bold">Welcome Admin</span>
        </div>
    </div>

    {{-- <!-- Search Bar -->
    <div class="p-4">
        <div class="relative">
            <input type="text"
                class="w-full bg-gray-800 text-white rounded-md pl-10 pr-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500"
                placeholder="Search...">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        </div>
    </div> --}}

    <nav class="mt-5 px-2">
        <!-- Main Navigation -->
        <div class="space-y-4">
            <!-- Dashboard -->
            <a href="#"
                class="flex items-center px-4 py-2.5 text-sm font-medium rounded-lg bg-gray-800 text-white group transition-all duration-200 hover:bg-gray-700">
                <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
                Dashboard
            </a>

            <!-- Analytics Dropdown -->
            <div class="space-y-1">
                <button
                    class="w-full flex items-center justify-between px-4 py-2.5 text-sm font-medium rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white focus:outline-none"
                    aria-expanded="true" aria-controls="analytics-dropdown">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        Manage
                    </div>
                    <svg class="ml-2 h-5 w-5 transform transition-transform duration-200"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <div class="space-y-1 pl-11" id="analytics-dropdown">
                    <a href="{{ route('admin.products') }}"
                        class="group flex items-center px-4 py-2 text-sm text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
                        Products
                    </a>
                    <a href="{{ route('admin.authors') }}"
                        class="group flex items-center px-4 py-2 text-sm text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
                        Authors
                    </a>
                    <a href="{{route('admin.categories')}}"
                        class="group flex items-center px-4 py-2 text-sm text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
                        Category
                    </a>
                    <a href="{{route('admin.users')}}"
                        class="group flex items-center px-4 py-2 text-sm text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">
                        Users
                    </a>
                </div>
            </div>








        </div>
    </nav>

    <!-- User Profile -->
    <div class="mt-auto p-4 border-t border-gray-800">
        <div class="flex items-center">
            <img class="h-8 w-8 rounded-full"
                src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                alt="">
            <div class="ml-3">
                <p class="text-sm font-medium text-white">{{ Auth::user()->first_name }} {{Auth::user()->last_name}}</p>
                <p class="text-xs text-gray-400">View profile</p>
            </div>
        </div>
        <div class="mt-3">
            <a href="{{ route('admin.logout') }}" class="block px-4 py-2 text-sm text-gray-300 rounded-md hover:bg-gray-700 hover:text-white">Logout</a>
        </div>
    </div>

</aside>