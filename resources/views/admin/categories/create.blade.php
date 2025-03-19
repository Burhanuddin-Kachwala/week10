<x-admin.layout class="overflow-x-auto">
    <x-forms.form method="POST" action="{{ route('admin.categories.store') }}" id="register-category"
        class="p-6 bg-white rounded-lg shadow-md max-w-4xl mx-auto border border-gray-300" enctype="multipart/form-data">

        <h2 class="text-xl font-semibold text-gray-800 mb-6 text-center">Register Category</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Two-column grid -->
            <div>
                <x-forms.label label="Name" name="name" class="text-gray-700 font-medium" />
                <x-forms.input placeholder="Category name" class="w-full py-2 px-3 border rounded-md focus:ring-blue-500"
                    name="name" value="" />
                <x-forms.error name="name" />
                
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