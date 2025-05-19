<x-app-layout>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-4 px-2 text-gray-900">
                    <x-category-tabs>
                        No Categories Found
                    </x-category-tabs>
                </div>
            </div>

            <div class="mt-8">
                <div class="p-4 text-gray-900 flex flex-wrap gap-8 justify-center">
                    @forelse ($posts as $post)
                            <x-post-item :post="$post"></x-post-item>     
                    @empty
                    <div class="text-gray-9 font-semibold text-center py-16 text-gray-400 text-xl">
                            No Posts Found
                    </div>
                    @endforelse
                </div>
                <div class="mt-4 flex justify-center">
                    {{ $posts->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
