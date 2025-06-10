<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-8">
            {{-- Manage Categories --}}
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
                Manage Categories
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                @foreach($categories as $category)
                <div class="flex items-center justify-between bg-white border rounded-lg shadow px-4 py-3">
                    <span class="font-semibold text-gray-800">{{ $category->name }}</span>
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Delete this category?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="ml-2 text-red-600 hover:text-red-800" title="Delete">
                            <!-- Heroicons trash icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22M8 7V4a1 1 0 011-1h6a1 1 0 011 1v3" />
                            </svg>
                        </button>
                    </form>
                </div>
                @endforeach
            </div>
            <div class="flex justify-center mb-4">
                <a href="{{ route('categories.create') }}" class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">

                    + Add Category
                </a>
            </div>
            <div class="flex justify-center my-4">
                {{ $categories->links() }}
            </div>
        
            <hr class="mt-8 mb-8 border-gray-500">
            
            {{-- Manage Users --}}
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">
                Manage Users
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mb-8">
                @foreach($users as $user)
                @if(!$user->isAdmin())
                <div class="flex items-center justify-between bg-white border rounded-lg shadow px-4 py-3">
                    <a href="{{ route('profile.show', $user) }}" class="font-semibold text-blue-700 hover:underline">
                        {{ $user->name }}
                    </a>
                    <span class="text-xs text-gray-500">({{ $user->email }})</span>
                    <form action="{{ route('users.destroy', $user) }}" method="POST" onsubmit="return confirm('Delete this user?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="ml-2 text-red-600 hover:text-red-800" title="Delete">
                            <!-- Heroicons trash icon -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22M8 7V4a1 1 0 011-1h6a1 1 0 011 1v3" />
                            </svg>
                        </button>
                    </form>
                </div>
                @endif
                @endforeach
            </div>

            <div class="flex justify-center my-4">
                {{ $users->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
