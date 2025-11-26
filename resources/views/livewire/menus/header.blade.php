<div class="bg-linear-to-br from-blue-500 via-purple-600 to-indigo-700" x-data="header">
    <div class="w-[90%] mx-auto py-3 text-white flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ route('home') }}"
            class="logo font-bold text-3xl hover:text-transparent bg-clip-text hover:bg-linear-to-r hover:from-red-500 hover:to-green-700 transition duration-300">
            ConnectX
        </a>

        <!-- Desktop Menu -->
        <ul class="hidden md:flex gap-8 items-center text-2xl">
            <li>
                <a href="{{ route('home') }}"
                    class="hover:text-transparent bg-clip-text hover:bg-linear-to-r hover:from-red-500 hover:to-green-700 transition duration-300">
                    <i class="fa-solid fa-house"></i>
                </a>
            </li>
            <li>
                <a href=""
                    class="hover:text-transparent bg-clip-text hover:bg-linear-to-r hover:from-red-500 hover:to-green-700 transition duration-300">
                    <i class="fas fa-newspaper"></i>
                </a>
            </li>
            <li>
                <a href=""
                    class="hover:text-transparent bg-clip-text hover:bg-linear-to-r hover:from-red-500 hover:to-green-700 transition duration-300">
                    <i class="fas fa-user-friends"></i>
                </a>
            </li>
            <li>
                <a href=""
                    class="hover:text-transparent bg-clip-text hover:bg-linear-to-r hover:from-red-500 hover:to-green-700 transition duration-300">
                    <i class="fa-solid fa-message"></i>
                </a>
            </li>
        </ul>

        <!-- Right side icons -->
        <ul class="hidden md:flex items-center gap-4">
            <li
                class="relative text-2xl bg-linear-to-br from-purple-500 via-indigo-600 to-blue-700 
           hover:from-indigo-500 hover:via-blue-600 hover:to-purple-700 p-2 rounded-full 
           transition duration-300">

                <button @click.outside="if (notication) showFalse()" class="cursor-pointer" @click.prevent="noticationToggle">
                    <i class="fa-solid fa-bell text-white"></i>
                </button>


                <div x-show="notication" x-cloak x-transition
                    class="absolute top-17 right-0 bg-gray-300 px-4 py-3 z-50 w-94 rounded-lg">

                    <h3 class="font-semibold text-gray-700 mb-2">Notifications</h3>

                    <livewire:menus.notification :limit="10" />

                    <div class="text-center mt-2">
                        <a href="{{ route('notification') }}" class="text-blue-600 text-sm hover:underline">
                            View all notifications
                        </a>
                    </div>
                </div>
            </li>



            <!-- User dropdown -->
            <li class="relative">
                <img @click.outside="if (dropdownOpen) dropdownOpenFalse()" @click.prevent="showToggle" class="w-10 h-10 rounded-full cursor-pointer"
                    src="{{ asset('storage/' . $user->profile_picture) }}" alt="">

                <div x-show="dropdownOpen" x-cloak x-transition
                    class="absolute top-15 right-0 bg-purple-600 px-4 py-3 z-50 w-70 rounded-lg">
                    <ul class="space-y-3">
                        <li>
                            <a class="flex items-center gap-3 border-b pb-2" href="">
                                <img class="w-10 h-10 rounded-full"
                                    src="{{ asset('storage/' . $user->profile_picture) }}" alt="">
                                <span>{{ $user->name }}</span>
                            </a>
                            <a class="bg-blue-600 hover:bg-blue-700 w-full block mt-2 text-center py-1 rounded-lg"
                                href="">See Profile</a>
                        </li>
                        <li class="hover:bg-indigo-700 py-1 px-1.5 rounded-lg"><a href=""><i
                                    class="fa-solid fa-gear"></i> Settings</a></li>
                        <li class="hover:bg-indigo-700 py-1 px-1.5 rounded-lg">
                            <button class="w-full text-left" wire:click="logout"><i class="fa-solid fa-door-open"></i>
                                Logout</button>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>

        <!-- Mobile Hamburger -->
        <button @click.prevent="mobileOpenToggle"
            class="md:hidden text-2xl focus:outline-none z-50 relative cursor-pointer">
            <i class="fa-solid fa-bars"></i>
        </button>

        <!-- Mobile Menu -->
        <div x-show="mobileOpen" @click.outside="mobileOpenFalse" x-cloak
            x-transition:enter="transition transform duration-300"
            x-transition:enter-start="-translate-x-full opacity-0" x-transition:enter-end="translate-x-0 opacity-100"
            x-transition:leave="transition transform duration-300" x-transition:leave-start="translate-x-0 opacity-100"
            x-transition:leave-end="-translate-x-full opacity-0"
            class="fixed top-0 left-0 w-64 h-full bg-linear-to-br from-purple-700 via-indigo-700 to-purple-700 shadow-xl z-40 flex flex-col py-8 px-4 gap-4 md:hidden">
            <ul class="flex flex-col gap-4 text-white text-lg">
                <li>
                    <a href="" class="flex items-center gap-3 p-2 rounded-lg hover:bg-white/20 transition">
                        <i class="fa-solid fa-house"></i> Home
                    </a>
                </li>
                <li>
                    <a href="" class="flex items-center gap-3 p-2 rounded-lg hover:bg-white/20 transition">
                        <i class="fas fa-newspaper"></i> News Feed
                    </a>
                </li>
                <li>
                    <a href="" class="flex items-center gap-3 p-2 rounded-lg hover:bg-white/20 transition">
                        <i class="fas fa-user-friends"></i> Connections
                    </a>
                </li>
                <li>
                    <a href="" class="flex items-center gap-3 p-2 rounded-lg hover:bg-white/20 transition">
                        <i class="fa-solid fa-message"></i> Messages
                    </a>
                </li>
                <li>
                    <a href="" class="flex items-center gap-3 p-2 rounded-lg hover:bg-white/20 transition">
                        <i class="fa-solid fa-bell"></i> Notifications
                    </a>
                </li>
                <li>
                    <a href="" class="flex items-center gap-3 p-2 rounded-lg hover:bg-white/20 transition">
                        <i class="fa-solid fa-gear"></i> Settings
                    </a>
                </li>
                <li>
                    <button class="flex items-center gap-3 w-full text-left p-2 rounded-lg hover:bg-white/20 transition"
                        wire:click="logout">
                        <i class="fa-solid fa-door-open"></i> Logout
                    </button>
                </li>
            </ul>
        </div>

    </div>
