<x-admin.layout class="overflow-x-auto">

    <x-forms.form method="POST" action="{{ route('admin.users.update', $user->id) }}" id="edit-user"
        class="p-6 bg-white rounded-lg shadow-md max-w-4xl mx-auto border border-gray-300">
        @csrf
        @method('PUT')

        <h2 class="text-xl font-semibold text-gray-800 mb-6 text-center">Edit User</h2>
        <x-forms.input type="hidden" name="id" value="{{ $user->id }}" />

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Name input -->
            <div>
                <x-forms.label label="Name" name="name" class="text-gray-700 font-medium" />
                <x-forms.input placeholder="User name" class="w-full py-2 px-3 border rounded-md focus:ring-blue-500"
                    name="name" value="{{ old('name', $user->name) }}" />
                <x-forms.error name="name" />
            </div>

            <!-- Email input -->
            <div>
                <x-forms.label label="Email" name="email" class="text-gray-700 font-medium" />
                <x-forms.input type="email" placeholder="User email"
                    class="w-full py-2 px-3 border rounded-md focus:ring-blue-500" name="email"
                    value="{{ old('email', $user->email) }}" />
                <x-forms.error name="email" />
            </div>
            <!-- Password input -->
                        <div>
                            <x-forms.label label="Password" name="password" class="text-gray-700 font-medium" />
                            <x-forms.input type="password" placeholder="New password"
                                class="w-full py-2 px-3 border rounded-md focus:ring-blue-500" name="password" />
                            <x-forms.error name="password" />
                        </div>

            {{-- <!-- Role dropdown -->
            <div>
                <x-forms.label label="Role" name="role" class="text-gray-700 font-medium" />
                <select name="role" class="w-full py-2 px-3 border rounded-md focus:ring-blue-500">
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                </select>
                <x-forms.error name="role" />
            </div> --}}

            <!-- Status dropdown -->
            <div>
                <x-forms.label label="Status" name="status" class="text-gray-700 font-medium" />
                <select name="status" class="w-full py-2 px-3 border rounded-md focus:ring-blue-500">
                    <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                <x-forms.error name="status" />
            </div>
        </div>

        <div class="mt-5 text-center">
            <x-forms.button
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-5 rounded-md shadow-md transition duration-200">
                Update
            </x-forms.button>
        </div>

    </x-forms.form>
</x-admin.layout>
