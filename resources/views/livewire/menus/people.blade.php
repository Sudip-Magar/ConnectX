<div>
    <ul class="flex flex-col gap-2">
        @foreach ($users as $user)
            <li class="flex items-center gap-2">
                <a href="{{ route('user',['username' => $user->username]) }}" class="flex gap-2 items-center hover:text-blue-500">
                    @if ($user->profile_picture)
                        <img src="{{ asset('storage/' . $user->profile_picture) }}" class="w-8 h-8 rounded-full">
                    @else
                        <button
                            class="w-8 h-8 border rounded-full bg-gray-200 text-gray-500 text-xl cursor-pointer"><i
                                class="fa-solid fa-user"></i></button>
                    @endif
                    <span>{{ $user->name }}</span>
                </a>
                <button wire:click='following({{ $user->id }})'
                    class="ml-auto bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 text-sm cursor-pointer">
                    {{ $user->follow_status }}
                </button>
            </li>
        @endforeach
    </ul>
</div>
