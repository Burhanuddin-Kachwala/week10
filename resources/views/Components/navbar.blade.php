<nav class="bg-light dark:bg-dark-800 antialiased ">
    <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0 py-4">
        <div class="flex items-center justify-between">

            <div class="flex items-center space-x-8">
                <div>
                    <a href="/">
                        <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="" width="150">
                    </a>
                </div>

                <ul class="hidden lg:flex items-center justify-start gap-6 md:gap-8 py-3 sm:justify-center">
                    <li>
                        <a href="#" title=""
                            class="flex  text-xl font-medium text-primary hover:text-primary-700 dark:text-primary dark:hover:text-primary-500">
                            Home
                        </a>
                    </li>
                    <li class="shrink-0">
                        <a href="#" title=""
                            class="flex text-xl font-medium text-primary hover:text-primary-700 dark:text-white dark:hover:text-primary-500">
                            Best Sellers
                        </a>
                    </li>
                    <li class="shrink-0">
                        <a href="#" title=""
                            class="flex text-xl font-medium text-primary hover:text-primary-700 dark:text-white dark:hover:text-primary-500">
                            Gift Ideas
                        </li>
                    <li class="shrink-0 w-full lg:w-auto">
                        <form action="#" method="GET" class="flex items-center">
                            <div class="relative w-full lg:w-64">
                                <input type="text" name="search" placeholder="Search items" class="px-4 py-2 border rounded-full text-sm w-full">
                                <button type="submit" class="absolute right-1 top-2 mt-2 mr-2 transform -translate-y-1/2">
                                    <svg class="w-4 h-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35m1.35-5.65a7 7 0 1 1-14 0 7 7 0 0 1 14 0z" />
                                    </svg>
                                </button>
                            </div>
                        </form>
                    </li>
                </ul> 
            </div>

            <div class="flex items-center lg:space-x-2">
                <button id="myCartDropdownButton1" data-dropdown-toggle="myCartDropdown1" type="button"
                    class="inline-flex items-center rounded-lg justify-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium leading-none text-gray-900 dark:text-white">
                    <span class="sr-only">
                        Cart
                    </span>
                    <svg class="w-5 h-5 lg:me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312" />
                    </svg>
                    <span class="hidden sm:flex">My Cart</span>
                    <svg class="hidden sm:flex w-4 h-4 text-gray-900 dark:text-white ms-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 9-7 7-7-7" />
                    </svg>
                </button>

                <div id="myCartDropdown1"
                    class="hidden z-10 mx-auto max-w-sm space-y-4 overflow-hidden rounded-lg bg-white p-4 antialiased shadow-lg dark:bg-gray-800">
                    <!-- Cart items here -->
                </div>

                @auth
                <button id="userDropdownButton1" data-dropdown-toggle="userDropdown1" type="button"
                    class="inline-flex items-center rounded-lg justify-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium leading-none text-gray-900 dark:text-white">
                    <svg class="w-5 h-5 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2"
                            d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    Account
                    <svg class="w-4 h-4 text-gray-900 dark:text-white ms-1" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 9-7 7-7-7" />
                    </svg>
                </button>

                <div id="userDropdown1"
                    class="hidden z-10 w-56 divide-y divide-gray-100 overflow-hidden overflow-y-auto rounded-lg bg-white antialiased shadow dark:divide-gray-600 dark:bg-gray-700">
                    <ul class="p-2 text-start text-sm font-medium text-gray-900 dark:text-white">
                        <li><a href="#" title=""
                                class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                My Account </a></li>
                        <li><a href="#" title=""
                                class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                My Orders </a></li>
                        <li><a href="#" title=""
                                class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                Settings </a></li>
                        <li><a href="#" title=""
                                class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                Favourites </a></li>
                        <li><a href="#" title=""
                                class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                Delivery Addresses </a></li>
                        <li><a href="#" title=""
                                class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                Billing Data </a></li>
                    </ul>

                    <div class="p-2 text-sm font-medium text-gray-900 dark:text-white">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            
                            <button type="submit" title=""
                                class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600">
                                Sign Out
                            </button>
                        </form>
                    </div>
                </div>
                @endauth

                @guest
                <a href="{{ route('login') }}" title=""
                    class="inline-flex items-center rounded-lg justify-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium leading-none text-gray-900 dark:text-white">
                    <svg class="w-5 h-5 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2"
                            d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                    Login
                </a>
                @endguest

                <button type="button" data-collapse-toggle="ecommerce-navbar-menu-1"
                    aria-controls="ecommerce-navbar-menu-1" aria-expanded="false"
                    class="inline-flex lg:hidden items-center justify-center hover:bg-gray-100 rounded-md dark:hover:bg-gray-700 p-2 text-gray-900 dark:text-white">
                    <span class="sr-only">
                        Open Menu
                    </span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                            d="M5 7h14M5 12h14M5 17h14" />
                    </svg>
                </button>
            </div>
        </div>

        <div id="ecommerce-navbar-menu-1"
            class="bg-gray-50 dark:bg-gray-700 dark:border-gray-600 border border-gray-200 rounded-lg py-3 hidden px-4 mt-4">
            <ul class="text-gray-900 dark:text-[var(--color-primary)] text-sm font-medium space-y-3">
                <li>
                    <a href="#" class="hover:text-[var(--color-link)] dark:hover:text-primary-500">Home</a>
                </li>
                <li>
                    <a href="#" class="hover:text-[var(--color-link)] dark:hover:text-primary-500">Best Sellers</a>
                </li>
                <li>
                    <a href="#" class="hover:text-[var(--color-link)] dark:hover:text-primary-500">Gift Ideas</a>
                </li>
                <li>
                    <a href="#" class="hover:text-[var(--color-link)] dark:hover:text-primary-500">Games</a>
                </li>
                <li>
                    <a href="#" class="hover:text-[var(--color-link)] dark:hover:text-primary-500">Electronics</a>
                </li>
                <li>
                    <a href="#" class="hover:text-[var(--color-link)] dark:hover:text-primary-500">Home & Garden</a>
                </li>
            </ul>
        </div>
    </div>
</nav>