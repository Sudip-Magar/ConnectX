<div>
    @if ($notifications->count() > 0)
        @foreach ($notifications as $notification)
            <!-- Notification 1 -->
            <div class="flex items-center gap-3 p-2 hover:bg-gray-100 rounded-lg cursor-pointer">
                <img src="{{ asset('storage/' . $notification->actor->profile_picture) }}" class="w-10 h-10 rounded-full">
                <div>
                    @if ($notification->type == 'like')
                        @if ($notification->by == Auth::guard('web')->user()->id)
                            <p class="text-sm text-white"><span class="font-bold">You</span>
                                liked
                                your post</p>
                        @else
                            <p class="text-sm text-white"><span class="font-bold">{{ $notification->actor->name }}</span>
                                liked
                                your post</p>
                        @endif
                    @elseif($notification->type == 'comment')
                        @if ($notification->by == Auth::guard('web')->user()->id)
                            <p class="text-sm text-white"><span class="font-bold">
                                    You
                                </span>
                                comment on your post
                            </p>
                        @else
                            <p class="text-sm text-white"><span class="font-bold">
                                    {{ $notification->actor->name }}
                                </span>
                                comment on your post
                            </p>
                        @endif
                    @endif
                    <span class="text-xs text-gray-500">{{ $notification->created_at->diffForHumans() }}</span>
                </div>
            </div>
        @endforeach
    @else
        <div class="text-gray-400 text-center">No Notification</div>
    @endif
</div>
