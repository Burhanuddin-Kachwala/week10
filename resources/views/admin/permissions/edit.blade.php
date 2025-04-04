<x-admin.layout>
    <x-slot name="title">Edit Permission</x-slot>

    <h2 class="text-2xl font-bold mb-4">Edit Permission</h2>

    <form action="{{ route('permissions.update', $permission->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-bold">Permission Name:</label>
            <input type="text" name="name" value="{{ $permission->name }}" class="border rounded px-3 py-2 w-full"
                required>
        </div>
        @error('name')
         <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
        <div>
            <label class="block font-bold">Permission Slug:</label>
            <input type="text" name="slug" value="{{ $permission->slug }}" class="border rounded px-3 py-2 w-full"
                required>
        </div>
        @error('slug')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
        @enderror
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
    </form>
</x-admin.layout>