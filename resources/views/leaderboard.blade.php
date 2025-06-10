<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Leaderboard') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto bg-white shadow rounded-lg p-6">
            <h3 class="text-lg font-bold mb-4 text-center">Top Users by Followers</h3>
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Username</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Followers</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100">
                    @foreach($users as $index => $user)
                    <tr>
                        <td class="px-4 py-2">{{ $index + 1 }}</td>
                        <td class="px-4 py-2">{{ $user->name }}</td>
                        <td class="px-4 py-2 text-blue-600">
                            <a href="{{ route('profile.show', $user->username) }}" class="hover:underline">
                                {{ '@' . $user->username }}
                            </a>
                        </td>
                        <td class="px-4 py-2 font-semibold">{{ $user->followers_count }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if($users->isEmpty())
            <div class="text-center text-gray-500 mt-4">No users found.</div>
            @endif
        </div>
    </div>
</x-app-layout>
