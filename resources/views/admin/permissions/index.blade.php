<x-admin.layout>
    <x-slot name="title">Permissions</x-slot>

    <h2 class="text-2xl font-bold mb-4">Permissions</h2>
    <a href="{{ route('permissions.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Create Permission</a>

    <table class="mt-3 table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Slug</th>
                <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($permissions as $permission)
            <tr class="border border-gray-300">
                <td class="border px-4 py-2">{{ $permission->id }}</td>
                <td class="border px-4 py-2">{{ $permission->name }}</td>
                <td class="border px-4 py-2">{{ $permission->slug }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('permissions.edit', $permission->id) }}" class="text-blue-500"><i class="fa-solid fa-pen-to-square"></i></a> 
                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-red-500"><i class="fa-solid fa-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-admin.layout>