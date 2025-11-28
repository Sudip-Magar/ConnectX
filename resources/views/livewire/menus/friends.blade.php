<div class="p-6 max-w-4xl mx-auto space-y-8" x-data="friend">
    <div class="flex justify-end gap-4">
        <button @click.prevent="showFollower" class="">Followers</button>
        <button @click.prevent="showFollowing" class="">Following</button>
    </div>

    <div class="">
        <div x-show="show" class="max-h-100 overflow-auto ">
            @foreach ($followers as $follower)
                <!-- Follower 1 -->
                <div class="bg-white rounded-xl shadow-md p-4 space-y-4 my-2">
                    <div class="flex items-center space-x-4 ">
                        @if ($follower->profile_picture)
                            <img class="w-12 h-12 rounded-full" src="{{ asset('storage/' . $follower->profile_picture) }}"
                                alt="Follower 1">
                        @else
                            <button class="w-12 h-12 rounded-full bg-gray-200 text-gray-500 text-3xl cursor-pointer"><i
                                    class="fa-solid fa-user"></i></button>
                        @endif

                        <div>
                            <p class="text-gray-900 font-semibold">{{ $follower->name }}</p>
                            <p class="text-gray-500 text-sm"><span>@</span>{{ $follower->username }}</p>
                        </div>
                        <button
                            class="ml-auto px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600">Message</button>
                    </div>
                </div>
            @endforeach
        </div>


        <div x-show="!show" class="max-h-20 overflow-auto " x-cloak>
            @foreach ($following as $follow)
                <div class="bg-white rounded-xl shadow-md p-4 space-y-4 my-2">
                    <div class="flex items-center space-x-4">
                        @if ($follow->profile_picture)
                            <img class="w-12 h-12 rounded-full" src="{{ asset('storage/' . $follow->profile_picture) }}"
                                alt="Follower 1">
                        @else
                            <button class="w-12 h-12 rounded-full bg-gray-200 text-gray-500 text-3xl cursor-pointer"><i
                                    class="fa-solid fa-user"></i></button>
                        @endif
                        <div>
                            <p class="text-gray-900 font-semibold">{{ $follow->name }}</p>
                            <p class="text-gray-500 text-sm"><span>@</span>{{ $follow->username }}</p>
                        </div>
                        <button
                            class="ml-auto px-3 py-1 bg-green-500 text-white rounded hover:bg-green-600">Message</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
