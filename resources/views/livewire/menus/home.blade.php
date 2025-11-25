<div>
    @include('common.message')


    <!-- Main Content -->
    <main class="max-w-7xl mx-auto flex flex-col md:flex-row gap-6 mt-6 px-4">

        <!-- Left Sidebar -->
        <aside class="hidden md:flex flex-col gap-4 w-1/4">
            <div class="bg-white rounded-lg p-4 shadow">
                <h2 class="font-bold mb-2">Shortcuts</h2>
                <ul class="flex flex-col gap-2 text-gray-700">
                    <li><a href="#" class="hover:text-blue-500">Groups</a></li>
                    <li><a href="#" class="hover:text-blue-500">Events</a></li>
                    <li><a href="#" class="hover:text-blue-500">Saved</a></li>
                </ul>
            </div>
        </aside>

        <!-- Feed -->
        <div class="flex-1 flex flex-col gap-6">
            <livewire:menus.post/>
        </div>

        <!-- Right Sidebar -->
        <aside class="hidden md:flex flex-col gap-4 w-1/4">
            <div class="bg-white rounded-lg p-4 shadow">
                <h2 class="font-bold mb-2">People You May Know</h2>
                <ul class="flex flex-col gap-2">
                    <li class="flex items-center gap-2">
                        <img src="{{ asset('storage/users/z1jg0OZjLbijjUl3kSlOD7niOXpPmXYEqxET2CUq.jpg') }}" class="w-8 h-8 rounded-full">
                        <span>Jane Doe</span>
                        <button
                            class="ml-auto bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 text-sm">Connect</button>
                    </li>
                    <li class="flex items-center gap-2">
                        <img src="{{ asset('storage/users/455D4JKAJdTBRhrfF94hzuiACSEJ1ghuJZg4yRkM.jpg') }}" class="w-8 h-8 rounded-full">
                        <span>Mark Smith</span>
                        <button
                            class="ml-auto bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 text-sm">Connect</button>
                    </li>
                </ul>
            </div>
        </aside>
    </main>
</div>
