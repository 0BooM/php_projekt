<x-app-layout>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <div class="flex gap-4 mb-4">
                    <x-user-avatar :user="$post->user"/>
                    <!-- Author Info -->
                    <div class="flex flex-col">
                        <x-follow-container :user="$post->user" class="flex gap-4">
                            <a href="{{ route('profile.show', $post->user) }}"
                                class="hover:underline">{{$post->user->name}}</a>
                            @auth
                            <h3>•</h3>
                            <button class="hover:underline"
                            x-text="following ? 'Unfollow' : 'Follow'"
                            :class="following ? 'text-red-500' : 'text-blue-500'"
                            @click="follow()"></button>
                            @endauth
                        </x-follow-container>
                        <div class="flex gap-2 text-sm">
                            <h4 class="text-gray-500">{{ $post->readTime() }} min read</h4>
                            <h4>•</h4>
                            <h4 class="text-gray-500">{{ $post->created_at->format("M d, Y") }}</h4>
                        </div>
                    </div>
                </div>
                <h1 class="text-3xl font-bold text-center">{{ $post->title }}</h1>

                <!-- Edit btns -->
                @if($post->user_id === Auth::id())
                <div class="mt-8 pt-4 border-t">
                    <x-primary-button href="{{ route('post.edit', $post->id) }}" class="mr-4">Edit Post</x-primary-button>
                    <form action="{{ route('post.destroy', $post) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <x-danger-button>Delete Post</x-danger-button>
                    </form>
                </div>
                @endif

                <!-- Post Stats -->
                <x-stats-button :post="$post"/>
                <!-- Post Image -->
                <div class="mt-4">
                    <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" class="w-full h-96 mt-4 rounded-lg object-cover">
                </div>
                <!-- Post Content -->
                <div class="mt-4 text-lg"> {{ $post->content }}</div>
                <div class="mt-10">
                    <span class="inline-block bg-blue-100 text-blue-800 text-sm font-semibold px-4 py-2 rounded-full shadow hover:bg-blue-200 transition">
                        {{ $post->category->name }}
                    </span>
                </div>
        </div>
</x-app-layout>
