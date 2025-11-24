<div class="min-h-screen bg-linear-to-br from-blue-500 via-purple-600 to-indigo-700 flex items-center justify-center">
    @include('common.message')
    <div class="backdrop-blur-xl bg-white/10 p-10 rounded-3xl shadow-2xl w-full max-w-md border border-white/20">

        <!-- Logo -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-extrabold text-white tracking-wide">ConnectX</h1>
            <p class="text-white/70 mt-1">Welcome back! Login to continue</p>
        </div>

        <!-- Login Form -->
        <form wire:submit='userLogin' class="space-y-5">
            <div>
                <label class="text-white">Email</label>
                <input type="email" wire:model='email' required
                    class="mt-2 w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-white/60 border border-white/30 focus:ring-2 focus:ring-white/50 focus:outline-none"
                    placeholder="Enter your email">
            </div>

            <div>
                <label class="text-white">Password</label>
                <input type="password" wire:model="password" required
                    class="mt-2 w-full px-4 py-3 rounded-xl bg-white/20 text-white placeholder-white/60 border border-white/30 focus:ring-2 focus:ring-white/50 focus:outline-none"
                    placeholder="••••••••">
            </div>

            <button
                class="cursor-pointer w-full py-3 rounded-xl bg-white text-indigo-700 font-bold text-lg shadow-lg hover:bg-gray-200 transition">
                Login
            </button>
        </form>

        <!-- Divider -->
        <div class="flex items-center my-6">
            <div class="grow border-t border-white/30"></div>
            <span class="mx-3 text-white/70">OR</span>
            <div class="grow border-t border-white/30"></div>
        </div>

        <!-- Google Login -->
        <a href="{{ route('auth.google') }}"
            class="w-full flex items-center justify-center gap-3 py-3 rounded-xl bg-white text-gray-700 font-semibold shadow-lg hover:bg-gray-100 transition">

            <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-6 h-6">
            Continue with Google
        </a>

        <p class="text-center text-white/70 text-sm mt-6">
            Don’t have an account?
            <a href="{{ route('auth.register') }}" class="text-white font-semibold">Sign Up</a>
        </p>

    </div>
</div>
