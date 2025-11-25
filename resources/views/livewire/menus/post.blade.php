 <section class="flex-1 flex flex-col gap-6" x-data="post">

     <!-- Post Creation Box -->
     <div class="bg-white p-4 rounded-lg shadow flex items-center gap-4">
         <img class="w-15 h-15 object-cover rounded-full" src="{{ asset('storage/' . $user->profile_picture) }}"
             alt="">
         <div @click.prevent="showcreatePost"
             class="border w-full py-3 px-4 font-semibold text-gray-500 rounded-full cursor-pointer">
             <p>Start a Post</p>
         </div>
     </div>

     <!-- Sample Post -->
     @foreach ($posts as $post)
         <div class="bg-white p-4 rounded-lg shadow flex flex-col gap-2">
             <div class="flex items-center gap-3 ">
                 <img src="{{ asset('storage/' . $post->user->profile_picture) }}" class="w-10 h-10 rounded-full">
                 <div>
                     <a href="" class="font-bold hover:text-purple-600">{{ $post->user->name }}</a>
                     <p class="text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</p>
                 </div>
             </div>
             <p>{{ $post->content }}</p>
             <img src="{{ asset('storage/' . $post->media->first()->media) }}" class="rounded-lg mt-2">
             <div class="flex gap-4 mt-2 text-gray-600 border-t pt-3">
                 <button wire:click='likePost({{ $post->id }})' class="hover:text-blue-500 {{ $post->likes->first() ? 'text-blue-500' : 'text-gray-600' }} cursor-pointer"><i class="fa-solid fa-thumbs-up"></i> {{{ $post->likes->first() ? 'Unlike' : 'Like'}}}({{ $post->likes->count() }})</button>
                 <button class="hover:text-blue-500 cursor-pointer"><i class="fa-solid fa-comment"></i> Comment({{ $post->comments->count() }})</button>
                 <button class="hover:text-blue-500 cursor-pointer"><i class="fa-solid fa-share"></i> Share</button>
             </div>
         </div>
     @endforeach


     <div x-show="createPost" x-transition.opacity x-cloak
         class="fixed inset-0 bg-gray-900/80 z-75 overflow-y-auto py-10">
         <div class="bg-white rounded-lg shadow-xl w-[90%] max-w-3xl mx-auto p-6 relative">
             <span class="absolute top-5 right-5 cursor-pointer" @click.prevent="closeModel"><i
                     class="fa-solid fa-xmark"></i></span>

             <form class="my-6" wire:submit='createPost'>
                 <!-- Post Create Box -->


                 <!-- User Info + Input -->
                 <div class="flex gap-3">
                     <!-- Profile Image -->
                     <img src="{{ asset('storage/' . $user->profile_picture) }}"
                         class="w-10 h-10 rounded-full object-cover" alt="User">

                     <!-- Textarea -->
                     <textarea placeholder="What's on your mind?" wire:model='content'
                         class="w-full border border-gray-300 rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-purple-500 resize-none"
                         rows="3"></textarea>
                 </div>

                 <!-- Divider -->
                 <div class="border-t my-3"></div>

                 <div class="my-3">
                     @if ($images)
                         <img class="rounded-lg" src="{{ $images->temporaryUrl() }}" alt="">
                     @endif
                 </div>

                 <!-- Options -->
                 <div class="flex items-center justify-between">
                     <div class="flex items-center gap-4 text-gray-600">

                         <div>
                             <label for="image" class="cursor-pointer flex items-center gap-2 hover:text-purple-600">
                                 <i class="fa-solid fa-image"></i>
                                 <span class="text-sm">Photo</span>
                             </label>
                             <input type="file" id="image" class="hidden" wire:model='images'>

                         </div>

                         <button class="flex items-center gap-2 hover:text-purple-600">
                             <i class="fa-solid fa-video"></i>
                             <span class="text-sm">Video</span>
                         </button>

                         <button class="flex items-center gap-2 hover:text-purple-600">
                             <i class="fa-solid fa-face-smile"></i>
                             <span class="text-sm">Feeling</span>
                         </button>

                     </div>

                     <!-- Post Button -->
                     <button class="bg-purple-600 text-white px-5 py-2 rounded-lg hover:bg-purple-700">
                         Post
                     </button>
                 </div>

             </form>

         </div>
     </div>

 </section>
