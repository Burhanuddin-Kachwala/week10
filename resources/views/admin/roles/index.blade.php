<x-admin.layout>
    <div class="bg-white shadow-md rounded-lg p-6">
        <h2 class="text-lg font-semibold mb-4">Roles & Permissions</h2>
        <a href="{{ route('roles.create') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Create Role</a>
        <table class="mt-3 w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 px-4 py-2 text-left">Role Name</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Permissions</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Slug</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                <tr>
                    <td class="border border-gray-300 px-4 py-2">{{ $role->name }}</td>
                    <td class="border border-gray-300 px-4 py-2 w-2/3">
                        @if ($role->permissions->isNotEmpty())
                      <div class="flex flex-wrap">
                        @foreach($role->permissions as $permission)
                        <span class="bg-yellow-500 text-white px-4 py-2 rounded-full flex items-center text-sm m-2">
                            <i class="fa fa-shield mr-2"></i> {{ $permission->name }}
                        </span>
                        @endforeach
                    </div>
                        @else
                        <span class="text-gray-500">No permissions assigned</span>
                        @endif
                    </td>
                    <td class="border border-gray-300 px-4 py-2">{{$role->slug}}</td>
                    <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('roles.edit', $role->id) }}" class="text-blue-600"><i class="fa-solid fa-pen-to-square"></i></a> 
                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-admin.layout>