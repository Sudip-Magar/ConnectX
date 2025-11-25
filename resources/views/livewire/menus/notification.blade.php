<div class="space-y-3 ">
    @forelse ($notifications as $notification)
        <a href=""
            class="flex items-start gap-3 p-3 rounded-lg hover:bg-gray-100 transition border border-white/10 bg-gray-50 text-black">

            <!-- Avatar -->
            <img src="{{ asset('storage/' . $notification->actor->profile_picture) }}"
                class="w-10 h-10 rounded-full object-cover" />

            <!-- Text -->
            <div class="flex-1">
                <p class="text-sm leading-tight">
                    @if ($notification->type === 'like')
                        <span class="font-bold">
                            {{ $notification->by == auth()->id() ? 'You' : $notification->actor->name }}
                        </span>
                        liked your post
                    @elseif($notification->type === 'comment')
                        <span class="font-bold">
                            {{ $notification->by == auth()->id() ? 'You' : $notification->actor->name }}
                        </span>
                        commented on your post
                    @endif
                </p>

                <span class="text-xs  block mt-0.5">
                    {{ $notification->created_at->diffForHumans() }}
                </span>
            </div>
        </a>
    @empty
        <div class="text-gray-500 text-center py-4 font-semibold text-2xl">No Notification</div>
    @endforelse
</div>
