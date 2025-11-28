<div class="max-w-3xl mx-auto mt-10" x-data="post">
    @php
        $me = Auth::guard('web')->user()->id
    @endphp
    <div class="bg-white rounded-xl shadow-md p-6">
        <!-- Profile Header -->
        <div class="flex items-center space-x-4">
            @if ($user->profile_picture)
                <img class="w-24 h-24 rounded-full border-4 border-blue-500"
                    src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture">
            @else
                <span
                    class="w-24 h-24 border-4 border-blue-500 rounded-full bg-gray-200 text-gray-500 text-6xl cursor-pointer flex justify-center items-center"><i
                        class="fa-solid fa-user"></i></span>
            @endif
            <div>
                <h1 class="text-2xl font-bold text-gray-800">{{ $user->name }}</h1>
                <p class="text-gray-500"><span>@</span>{{ $user->username }}</p>
            </div>
        </div>

        <!-- Stats -->
        <div class="flex justify-around mt-6 text-center border-t border-b py-4">
            <div>
                <p class="text-gray-800 font-bold text-lg">{{ $user->posts->count() }}</p>
                <p class="text-gray-500 text-sm">Posts</p>
            </div>
            <a href="">
                <p class="text-gray-800 font-bold text-lg">{{ $user->followers->count() }}</p>
                <p class="text-gray-500 text-sm">Followers</p>
            </a>
            <a href="">
                <p class="text-gray-800 font-bold text-lg">{{ $user->following->count() }}</p>
                <p class="text-gray-500 text-sm">Following</p>
            </a>
        </div>

        <!-- Bio Section -->
        <div class="mt-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-2">About Me</h2>
            <p class="text-gray-600">
                {{ $user->bio ? $user->bio : 'No Information' }}
            </p>
        </div>

        <!-- Friends Section (Optional) -->
        <div class="mt-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Friends</h2>
            <div class="flex -space-x-5">
                <img class="w-12 h-12 z-2 rounded-full" src="https://randomuser.me/api/portraits/men/45.jpg"
                    alt="Friend 1">
                <img class="w-12 h-12 z-3 rounded-full" src="https://randomuser.me/api/portraits/women/44.jpg"
                    alt="Friend 2">
                <img class="w-12 h-12 z-4 rounded-full" src="https://randomuser.me/api/portraits/men/56.jpg"
                    alt="Friend 3">
                <img class="w-12 h-12 z-5 rounded-full" src="https://randomuser.me/api/portraits/women/55.jpg"
                    alt="Friend 4">
            </div>
        </div>


    </div>

    {{-- Posts --}}
    <div class="">
        <div class="text-xl font-semibold text-gray-500 py-3 bg-white rounded-xl shadow-md p-6 mt-2">All Post</div>
        @forelse($user->posts as $post)
            <div x-data="{ createComment: false, }" class="bg-white p-4 rounded-lg shadow flex flex-col gap-2  my-2">
                <div class="flex items-center gap-3 ">
                    @if ($post->user->profile_picture)
                        <img src="{{ asset('storage/' . $post->user->profile_picture) }}"
                            class="w-10 h-10 rounded-full">
                    @else
                        <button
                            class="w-10 h-10 shrink-0 rounded-full bg-gray-200 text-gray-500 text-2xl cursor-pointer"><i
                                class="fa-solid fa-user"></i></button>
                    @endif
                    <div>
                        <a href="" class="font-bold hover:text-purple-600">{{ $post->user->name }}</a>
                        <p class="text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div>
                <p>{{ $post->content }}</p>
                @if ($post->media->isNotEmpty())
                    <img src="{{ asset('storage/' . $post->media->first()->media) }}" class="rounded-lg mt-2">
                @endif
                <div class="flex justify-end gap-4 mt-2 text-gray-600 border-t border-t-gray-300 pt-3">
                    @php
                        $userLiked = $post->likes->where('user_id', Auth::id())->where('post_id', $post->id)->first();
                    @endphp
                    <button wire:click='likePost({{ $post->id }})'
                        class="hover:text-blue-500 {{ $userLiked ? 'text-blue-500' : 'text-gray-600' }} cursor-pointer">
                        <i class="fa-solid fa-thumbs-up"></i>
                        <span>
                            @if ($userLiked)
                                Unlike({{ $post->likes->count() }})
                            @else
                                Like({{ $post->likes->count() }})
                            @endif
                        </span>
                    </button>
                    <button @click.prevent='createComment = !createComment'
                        class="hover:text-blue-500 cursor-pointer"><i class="fa-solid fa-comment"></i>
                        Comment({{ $post->comments->count() }})</button>
                    <button class="hover:text-blue-500 cursor-pointer"><i class="fa-solid fa-share"></i> Share</button>
                </div>

                <div x-show="createComment" class="my-1" x-cloak>
                    <div class="flex gap-2 items-center">
                        <img class="w-10 h-10 rounded-full" src="{{ asset('storage/' . $user->profile_picture) }}"
                            alt="">

                        <div class="border rounded-full w-full py-1 px-1 ps-3">
                            <form class="flex" wire:submit='createComment({{ $post->id }})'>
                                <input class="w-full outline-none" type="text" placeholder="Add a Comment"
                                    wire:model='comment.{{ $post->id }}'>
                                <button class="text-white cursor-pointer py-1 px-4 rounded-full bg-blue-800"><i
                                        class="fa-solid fa-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>

                    <div class="mt-4">
                        <div class="text-gray-500">All Comments</div>
                        @if ($post->likes)
                            @foreach ($post->comments as $comment)
                                <div class="my-3 flex justify-between border-b pb-3 border-b-gray-300">
                                    <div class="flex items-start gap-3">
                                        <img class="w-10 h-10 rounded-full object-cover"
                                            src="{{ asset('storage/' . $comment->user->profile_picture) }}"
                                            alt="">
                                        <div>
                                            <strong class="text-sm">{{ $comment->user->name }}</strong>

                                            <p class="mt-1.5 text-sm">{{ $comment->content }}</p>
                                        </div>
                                    </div>

                                    <p class="text-[12px]">{{ $comment->created_at->diffForHumans() }}</p>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div
                class="text-center font-semibold text-2xl text-gray-500 bg-white rounded-xl shadow-md p-6 my-2">
                No Post
            </div>
        @endforelse
    </div>
</div>
