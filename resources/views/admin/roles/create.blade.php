<x-admin.layout>
    <x-slot name="title">Create Role</x-slot>

    <h2 class="text-2xl font-bold mb-4">Create Role</h2>

    <form action="{{ route('roles.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block font-medium text-gray-700">Role Name:</label>
            <input type="text" name="name" class="border rounded px-3 py-2 w-full focus:ring focus:ring-blue-300"
                required>
        </div>

        <div>
            <label class="block font-medium text-gray-700 mb-2">Assign Permissions:</label>
            <div class="grid grid-cols-3 gap-4">
                @foreach($permissions as $permission)
                <label class="flex items-center space-x-2 bg-gray-100 p-2 rounded-lg">
                    <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                        class="form-checkbox text-blue-500">
                    <span class="text-gray-700">{{ $permission->name }}</span>
                </label>
                @endforeach
            </div>
        </div>

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded transition">
            Save Role
        </button>
    </form>
</x-admin.layout>