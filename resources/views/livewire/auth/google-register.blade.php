<div class="min-h-screen bg-linear-to-br from-blue-500 via-purple-600 to-indigo-700 flex items-center justify-center">
    @include('common.message')
    <div class="backdrop-blur-xl bg-white/10 p-10 rounded-3xl shadow-2xl w-full max-w-md border border-white/20">
        @if ($isNewUser)
            <!-- New Google User Registration -->
            <h2 class="text-white text-2xl mb-4">Complete Your Registration</h2>

            <form wire:submit.prevent="register" class="space-y-5">

                    <div>
                        <label class="text-white">Username</label>
                        <input type="text" wire:model="username" placeholder="Enter Username"
                            class="mt-2 w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-white/60 border border-white/30">
                        @error('username') <p class="text-red-400">{{ $message }}</p> @enderror
                    </div>

                <div>
                    <label class="text-white">Password</label>
                    <input type="password" wire:model="password" placeholder="*********"
                        class="mt-2 w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-white/60 border border-white/30">
                </div>

                <div>
                    <label class="text-white">Confirm Password</label>
                    <input type="password" wire:model="password_confirmation" placeholder="*******"
                        class="mt-2 w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-white/60 border border-white/30">
                    @error('password') <p class="text-red-400">{{ $message }}</p> @enderror
                </div>

                <button class="w-full py-3 rounded-xl bg-white text-indigo-700 font-bold text-lg shadow-lg">
                    Create Account
                </button>

            </form>
        @else
            
            <h2 class="text-white">Logging in…</h2>
            <!-- If old user → auto login already runs in mount -->
            
        @endif

    </div>
</div>
