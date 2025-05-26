<x-app-layout>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <div class="flex gap-4 mb-4">
                    @if($post->user->image)
                    <img src="{{ $post->user->imageUrl() }}" alt="{{ $post->user->name }}" class="w-12 h-12 rounded-full">
                    @else
                    <img src="https://static.everypixel.com/ep-pixabay/0329/8099/0858/84037/3298099085884037069-head.png" alt="" class="w-12 h-12 rounded-full">
                    @endif
                    <!-- Author Info -->
                    <div class="flex flex-col">
                        <div class="flex gap-4">
                            <h3>{{$post->user->name}}</h3>
                            <h3>•</h3>
                            <a href="#" class="text-blue-500 hover:underline hover:text-blue-700">Follow</a>
                        </div>
                        <div class="flex gap-2 text-sm">
                            <h4 class="text-gray-500">{{ $post->readTime() }} min read</h4>
                            <h4>•</h4>
                            <h4 class="text-gray-500">{{ $post->created_at->format("M d, Y") }}</h4>
                        </div>
                    </div>
                </div>
                <h1 class="text-3xl font-bold text-center">{{ $post->title }}</h1>
                <!-- Post Stats -->
                <x-stats-button/>
                <!-- Post Image -->
                <div class="mt-4">
                    <img src="{{ $post->imageUrl() }}" alt="{{ $post->title }}" class="w-full h-96 mt-4 rounded-lg object-cover">
                </div>
                <!-- Post Content -->
                <div class="mt-4 text-lg"> {{ $post->content }}</div>
                <div class="mt-4">
                    <span class="inline-block bg-blue-100 text-blue-800 text-sm font-semibold px-4 py-2 rounded-full shadow hover:bg-blue-200 transition">
                        {{ $post->category->name }}
                    </span>
                </div>

        </div>
</x-app-layout>
