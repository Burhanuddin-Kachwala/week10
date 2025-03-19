<x-admin.layout class="overflow-x-auto">
    <x-forms.form method="POST" action="{{ route('admin.authors.store') }}" id="register-author"
        class="p-6 bg-white rounded-lg shadow-md max-w-4xl mx-auto border border-gray-300" enctype="multipart/form-data">

        <h2 class="text-xl font-semibold text-gray-800 mb-6 text-center">Register Author</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Two-column grid -->
            <div>
                <x-forms.label label="Name" name="name" class="text-gray-700 font-medium" />
                <x-forms.input placeholder="Author name" class="w-full py-2 px-3 border rounded-md focus:ring-blue-500"
                    name="name" value="" />
                <x-forms.error name="name" />
            </div>

            <div>
                <x-forms.label label="Bio" name="bio" class="text-gray-700 font-medium" />
                <x-forms.textarea placeholder="Short bio"
                    class="w-full py-2 px-3 border rounded-md focus:ring-blue-500" name="bio">
                </x-forms.textarea>
                <x-forms.error name="bio" />
            </div>

            <div>
                <x-forms.label label="Image" name="image" class="text-gray-700 font-medium" />
                <x-forms.input type="file" class="w-full py-2 px-3 border rounded-md focus:ring-blue-500"
                    name="image" accept=".jpeg,.jpg,.png"/>
                <x-forms.error name="image" />
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