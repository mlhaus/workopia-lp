<x-workopia-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <div class="mx-auto py-6 max-w-6xl">
        <h2 class="text-2xl mb-4">{{ $title }}</h2>
        <table class="min-w-full text-left">
            <thead class="text-zinc-950">
            <tr class="border-b border-b-zinc-950/50">
                <th class="px-4 py-2">First Name</th>
                <th class="px-4 py-2">Last Name</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Roles</th>
                @can('delete-users')<th class="px-4 py-2">Actions</th>@endcan
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr class="border-b border-zinc-950/20">
                    <td class="px-4 py-4 text-zinc-500">{{ $user->first_name }}</td>
                    <td class="px-4 py-4 text-zinc-500">{{ $user->last_name }}</td>
                    <td class="px-4 py-4 text-zinc-500">{{ $user->email }}</td>
                    <td class="px-4 py-4 text-zinc-500">
                        {{ $user->getRoleNames()->implode(', ') ?: 'None' }}
                    </td>
                    @can('delete-users')
                        <td class="px-4 py-4 text-zinc-500">
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                            </form>
                        </td>
                    @endcan
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-4 py-4 text-center text-zinc-500">No users found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</x-workopia-layout>