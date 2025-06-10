<x-app-layout>
    <div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-xl font-bold mb-4 text-center">Add New Category</h2>
        <form method="POST" action="{{ route('categories.store') }}">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="name">Category Name</label>
                <input type="text" name="name" id="name" class="w-full border rounded px-3 py-2" required>
                @error('name')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-center">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Add Category
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
