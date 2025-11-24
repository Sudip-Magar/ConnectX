<div class="min-h-screen bg-linear-to-br from-purple-600 via-indigo-600 to-blue-600 flex items-center justify-center">
    @include('common.message')
    <div class="backdrop-blur-xl bg-white/10 p-10 rounded-3xl shadow-2xl w-full max-w-xl border border-white/20">

        <!-- Logo -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-extrabold text-white tracking-wide">ConnectX</h1>
            <p class="text-white/70 mt-1">Create your new account</p>
        </div>

        <!-- Registration Form -->
        <form wire:submit='registerUser' class="space-y-5">
            <!-- Profile Image Upload -->
            <div>
                <!-- Preview Box -->
                @if ($profile_picture)
                    <div class="mt-4 flex justify-center">
                        <img src="{{ $profile_picture->temporaryUrl() }}"
                            class="w-32 h-32 rounded-xl object-cover border-2 border-white/30 shadow-lg">
                    </div>
                @endif

                <label class="text-white">Profile Picture</label>
                <input type="file" wire:model='profile_picture'
                    class="mt-2 w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-white/60 
               border border-white/30 focus:ring-2 focus:ring-white/50 focus:outline-none cursor-pointer">


            </div>


            <!-- Name -->
            <div>
                <label class="text-white">Full Name <span class="text-red-500">*</span></label>
                <input type="text" required wire:model='name'
                    class="mt-2 w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-white/60 border border-white/30 focus:ring-2 focus:ring-white/50 focus:outline-none"
                    placeholder="Your full name">
                    @error('name')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
            </div>

            <!-- Username -->
            <div>
                <label class="text-white">Username <span class="text-red-500">*</span></label>
                <input type="text" required wire:model='username'
                    class="mt-2 w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-white/60 border border-white/30 focus:ring-2 focus:ring-white/50 focus:outline-none"
                    placeholder="Enter Username">
                     @error('username')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="text-white">Email <span class="text-red-500">*</span></label>
                <input type="email" required wire:model='email'
                    class="mt-2 w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-white/60 border border-white/30 focus:ring-2 focus:ring-white/50 focus:outline-none"
                    placeholder="Enter your email">
                     @error('email')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
            </div>

            <!-- Password -->
            <div>
                <label class="text-white">Password <span class="text-red-500">*</span></label>
                <input type="password" required wire:model='password'
                    class="mt-2 w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-white/60 border border-white/30 focus:ring-2 focus:ring-white/50 focus:outline-none"
                    placeholder="••••••••">
                     @error('password')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
            </div>

            <!-- Confirm Password -->
            <div>
                <label class="text-white">Confirm Password <span class="text-red-500">*</span></label>
                <input type="password" required wire:model='password_confirmation'
                    class="mt-2 w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-white/60 border border-white/30 focus:ring-2 focus:ring-white/50 focus:outline-none"
                    placeholder="••••••••">
                     @error('password_confirmation')
                    <small class="text-red-500">{{ $message }}</small>
                    @enderror
            </div>

            <!-- Create Account Button -->
            <button
                class="cursor-pointer w-full py-3 rounded-xl bg-white text-indigo-700 font-bold text-lg shadow-lg hover:bg-gray-200 transition">
                Create Account
            </button>
        </form>

        <!-- Divider -->
        <div class="flex items-center my-6">
            <div class="grow border-t border-white/30"></div>
            <span class="mx-3 text-white/70">OR</span>
            <div class="grow border-t border-white/30"></div>
        </div>

        <!-- Google -->
        <a href="{{ route('auth.google') }}"
            class="w-full flex items-center justify-center gap-3 py-3 rounded-xl bg-white text-gray-700 font-semibold shadow-lg hover:bg-gray-100 transition">

            <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-6 h-6">
            Continue with Google
        </a>

        <!-- Already account -->
        <p class="text-center text-white/70 text-sm mt-6">
            Already have an account?
            <a href="{{ route('login') }}" class="text-white font-semibold">Login</a>
        </p>

    </div>
</div>
