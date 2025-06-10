<x-app-layout>
    <div class="max-w-2xl mx-auto py-8">
        <h2 class="text-xl font-bold mb-4">Search results for "{{ $query }}"</h2>
        @forelse($users as $user)
        <div class="mb-2">
            <a href="{{ route('profile.show', $user->username) }}" class="text-blue-600 hover:underline">
                {{ '@' . $user->username }} ({{ $user->name }})
            </a>
        </div>
        @empty
        <div>No users found.</div>
        @endforelse
    </div>
</x-app-layout>
