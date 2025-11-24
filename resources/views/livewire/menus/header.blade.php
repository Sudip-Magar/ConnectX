<div class="bg-linear-to-br from-blue-500 via-purple-600 to-indigo-700 " x-data="header">
    <div class="w-[80%] mx-auto py-3 text-white flex justify-between items-center">
        <a class="logo font-bold text-3xl hover:text-transparent bg-clip-text hover:bg-linear-to-r hover:from-red-500  hover:to-green-700 transition duration-300"
            href="">ConnectX</a>

        <ul class="flex gap-12 items-center text-2xl ">
            <li>
                <a href=""
                    class=" hover:text-transparent bg-clip-text hover:bg-linear-to-r hover:from-red-500  hover:to-green-700 transition duration-300">
                    <i class="fa-solid fa-house"></i>
                </a>
            </li>

            <li
                class=" hover:text-transparent bg-clip-text hover:bg-linear-to-r hover:from-red-500  hover:to-green-700 transition duration-300">
                <a href=""><i class="fas fa-newspaper"></i></a>
            </li>
            <li
                class=" hover:text-transparent bg-clip-text hover:bg-linear-to-r hover:from-red-500  hover:to-green-700 transition duration-300">
                <a href=""><i class="fas fa-user-friends"></i></a>
            </li>
            <li
                class=" hover:text-transparent bg-clip-text hover:bg-linear-to-r hover:from-red-500  hover:to-green-700 transition duration-300">
                <a href=""><i class="fa-solid fa-message"></i></a>
            </li>
        </ul>

        <ul class="flex items-center gap-4">
            <li
                class="text-2xl bg-linear-to-br from-purple-500 via-indigo-600 to-blue-700 hover:from-indigo-500 hover:via-blue-600 hover:to-purple-700 p-1 rounded-full">
                <a href=""><i class="fa-solid fa-bell"></i></a>
            </li>
            <li class="relative">
                {{-- {{ $user->name }} --}}
                <img @click.prevent="showToggle" class="w-10 h-10 rounded-full cursor-pointer" src="{{ asset('storage/' . $user->profile_picture) }}"
                    alt="">

                <div @click.outside="showFalse" x-show="show" class="absolute top-14 -right-40  bg-purple-600 px-4 py-3 z-100 w-70 rounded-lg" x-cloak x-transition>
                    <ul class="space-y-3">
                        <li >
                            <a class="flex items-center gap-3 border-b pb-2" href="">
                                <img class="w-10 h-10 rounded-full "
                                    src="{{ asset('storage/' . $user->profile_picture) }}" alt="">
                                <span>{{ $user->name }}</span>
                            </a>

                            <a class="bg-blue-600 hover:bg-blue-700 w-full block mt-2 text-center py-1 rounded-lg" href="">See Profile</a>
                        </li>
                        <li class=" hover:bg-indigo-700 py-1 px-1.5 rounded-lg"><a href=""> <i class="fa-solid fa-gear"></i> Setting</a></li>
                        <li class="mb-1 hover:bg-indigo-700 py-1 px-1.5 rounded-lg"><button class="cursor-pointer" wire:click="logout"><i class="fa-solid fa-door-open"></i> Logout</button></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</div>
