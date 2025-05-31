<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex">
                    <div class="flex-1 pr-8">
                        <h1 class="text-4xl font-bold">{{ $user->name }}</h1>

                        <div class="mt-8">
                            @forelse ($posts as $post)
                            <x-profile-post-item :post="$post"></x-profile-post-item>
                            @empty
                            <div class="text-gray-9 font-semibold text-center py-16 text-gray-400 text-xl">
                                No Posts Found
                            </div>
                            @endforelse
                        </div>
                    </div>
 <!-- Right Side -->
                    <div class="w-[320px] border-l px-8">
                        <x-user-avatar :user="$user" size="w-24 h-24"/>
                        <h3>{{ $user->name }}</h3>
                        <p class="text-gray-500">26k followers</p>
                        <p>{{ $user->bio }}</p>
                        <div>
                            <button class="bg-green-500 rounded-full px-4 py-2 text-white mt-2">
                                Follow
                            </button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

