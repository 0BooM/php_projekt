<div class="w-80 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 flex flex-col">

    <a href="{{ route('post.show', ['username' => $post->user->username, 'post' => $post->id]) }}">
        <div class="relative aspect-[4/3] w-full">
            <div class="absolute top-2 left-2 z-10">
                <span class="bg-blue-100 text-blue-800 text-sm font-semibold px-3 py-1 rounded-full shadow-sm">
                    {{ $post->category->name }}
                </span>
            </div>
            <img class="w-full h-full object-cover object-center rounded-t-lg" src="{{ $post->imageUrl() }}" alt="" />
        </div>
    </a>

    <div class="p-5 flex flex-col h-full">
        <a href="{{ route('post.show', 
                    ['username' => $post->user->username, 
                    'post' => $post->id]) }}" class="mb-2">
            <h5 class=" text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                {{$post->title}}
            </h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-300 flex-grow">
            {{ Str::words($post->content, 20) }}
        </p>
        <div class="flex items-center justify-center gap-3 border-t pt-4">
            <div class="flex gap-2">
                <div>
                    <a href="{{ route('profile.show', $post->user) }}" class="hover:underline">{{$post->user->name}}</a>
                    <p class="text-gray-500">{{ $post->published_at->format("M d, Y") }}</p>
                </div>

            </div>
            <a href="{{ route('post.show', 
                    ['username' => $post->user->username, 
                    'post' => $post->id]) }}" class=" ml-auto inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">

                Read more
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </div>
</div>
