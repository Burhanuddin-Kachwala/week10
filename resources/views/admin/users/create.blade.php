<x-admin.layout class="overflow-x-auto">
    <x-forms.form method="POST" action="{{ route('admin.users.store') }}" id="register-user"
        class="p-6 bg-white rounded-lg shadow-md max-w-4xl mx-auto border border-gray-300">

        <h2 class="text-xl font-semibold text-gray-800 mb-6 text-center">Register User</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <x-forms.label label="Name" name="name" class="text-gray-700 font-medium" />
                <x-forms.input placeholder="User name" class="w-full py-2 px-3 border rounded-md focus:ring-blue-500"
                    name="name" value="Sample User Name" />
                <x-forms.error name="name" />
            </div>

            <div>
                <x-forms.label label="Email" name="email" class="text-gray-700 font-medium" />
                <x-forms.input type="email" placeholder="Email"
                    class="w-full py-2 px-3 border rounded-md focus:ring-blue-500" name="email"
                    value="sample@example.com" />
                <x-forms.error name="email" />
            </div>

            <div>
                <x-forms.label label="Password" name="password" class="text-gray-700 font-medium" />
                <x-forms.input type="password" placeholder="Password"
                    class="w-full py-2 px-3 border rounded-md focus:ring-blue-500" name="password" />
                <x-forms.error name="password" />
            </div>

            <div>
                <x-forms.label label="Confirm Password" name="password_confirmation"
                    class="text-gray-700 font-medium" />
                <x-forms.input type="password" placeholder="Confirm Password"
                    class="w-full py-2 px-3 border rounded-md focus:ring-blue-500" name="password_confirmation" />
                <x-forms.error name="password_confirmation" />
            </div>

        </div>

        <div class="mt-5 text-center">
            <x-forms.button
                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-5 rounded-md shadow-md transition duration-200">
                Register
            </x-forms.button>
        </div>

    </x-forms.form>
</x-admin.layout>
