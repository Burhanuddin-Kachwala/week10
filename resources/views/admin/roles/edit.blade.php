<x-admin.layout>
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-lg font-semibold mb-4">Edit Role</h2>

        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Role Name</label>
                <input type="text" name="name" value="{{ $role->name }}"
                    class="w-full border border-gray-300 px-4 py-2">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Permissions</label>
                <div class="grid grid-cols-2 gap-4">
                    @foreach ($permissions as $permission)
                    <label class="flex items-center">
                        <input type="checkbox" name="permissions[]" value="{{ $permission->id }}"
                            @if($role->permissions->contains($permission->id)) checked @endif>
                        <span class="ml-2">{{ $permission->name }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update Role</button>
        </form>
    </div>
</x-admin.layout>