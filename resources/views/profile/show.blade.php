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
                    <x-follow-container :user="$user">
                        <x-user-avatar :user="$user" size="w-24 h-24"/>
                        <h3>{{ $user->name }}</h3>
                        <p class="text-gray-500"> <span x-text="followersCount"></span> followers</p>
                        <p>{{ $user->bio }}</p>
                        @if (auth()->user() && auth()->user()->id !== $user->id)
                        <div>
                            <button @click="follow()" class="rounded-full px-4 py-2 text-white mt-2"
                            x-text="following ? 'Unfollow' : 'Follow'"
                            :class="following ? 'bg-red-500' : 'bg-green-500'"
                            >
                            </button>
                        </div>
                        @endif
                    </x-follow-container>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>

