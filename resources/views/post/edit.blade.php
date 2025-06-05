<x-app-layout>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-4 lg:px-8">
            <h1 class="mb-4 font-semibold text-xl">Edit post: {{ $post->title }}</h1>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                <form method="POST" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')
                    @if($post->imageUrl())
                        <div class="mb-8">
                            <img src="{{ $post->imageUrl()}}" alt="{{ $post->title }}" class="w-full">
                        </div>
                    @endif
                    <!-- Image -->
                    <div>
                        <x-input-label for="image" :value="__('Image')" />
                        <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" autofocus />

                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>


                    <!-- Title -->
                    <div class="mt-4">
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $post->title)" required autofocus />

                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Content -->
                    <div class="mt-4">
                        <x-input-label for="content" :value="__('Content')" />
                        <x-input-textarea id="content" class="block mt-1 w-full" type="text" name="content" required>
                            {{old('content', $post->content)}}
                        </x-input-textarea>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>

                    <!-- Categories -->
                    <div class="mt-4">
                        <x-input-label for="category" :value="__('Category')" />
                        <select name="category_id" id="category_id" class=" border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id', $post->category_id) == $category->id)>{{ $category->name }}</option>
                            @endforeach
                        </select>

                        <x-input-error :messages="$errors->get('category')" class="mt-2" />
                    </div>

                    <!-- Published At -->
                    <div class="mt-4">
                        <x-input-label for="published_at" :value="__('Published At')" />
                        <x-text-input id="published_at" class="block mt-1 w-full" type="datetime-local" name="published_at" :value="old('published_at', $post->published_at)" required autofocus />




                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <!-- Submit -->
                    <x-secondary-button class="mt-4">
                        Edit
                    </x-secondary-button>

                </form>
            </div>
        </div>
</x-app-layout>
