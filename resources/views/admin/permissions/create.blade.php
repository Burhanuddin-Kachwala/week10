<x-admin.layout>
    <x-slot name="title">Create Permission</x-slot>

    <h2 class="text-2xl font-bold mb-4">Create New Permission</h2>

    <form action="{{ route('permissions.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block font-bold">Permission Name:</label>
            <input type="text" name="name" class="border rounded px-3 py-2 w-full" required>
        </div>
        {{-- <div>
            <label class="block font-bold">Permission Slug:</label>
            <input type="text" name="slug" class="border rounded px-3 py-2 w-full" required>
        </div> --}}
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
    </form>
</x-admin.layout>