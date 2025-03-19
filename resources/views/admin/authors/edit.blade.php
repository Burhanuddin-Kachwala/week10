<x-admin.layout class="overflow-x-auto">
    <x-forms.form method="POST" action="{{ route('admin.authors.update', $author->id) }}" id="edit-author"
        class="p-6 bg-white rounded-lg shadow-md max-w-4xl mx-auto border border-gray-300">
        @csrf
        @method('PUT')

        <h2 class="text-xl font-semibold text-gray-800 mb-6 text-center">Edit Author</h2>
        <x-forms.input type="hidden" name="id" value="{{ $author->id }}" />

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Two-column grid -->

            <!-- Name input -->
            <div>
                <x-forms.label label="Name" name="name" class="text-gray-700 font-medium" />
                <x-forms.input placeholder="Author name" class="w-full py-2 px-3 border rounded-md focus:ring-blue-500"
                    name="name" value="{{ old('name', $author->name) }}" />
                <x-forms.error name="name" />
            </div>

            <!-- Bio textarea -->
            <div>
                <x-forms.label label="Bio" name="bio" class="text-gray-700 font-medium" />
                <textarea placeholder="Author Bio" class="w-full py-2 px-3 border rounded-md focus:ring-blue-500" name="bio">{{ old('bio', $author->bio) }}</textarea>
                <x-forms.error name="bio" />
            </div>

            <!-- Image input -->
            <div>
                <x-forms.label label="Image" name="image" class="text-gray-700 font-medium" />

                <div class="mb-4">
                    <!-- Display existing image or a placeholder if the author doesn't have one -->
                    <img id="image-preview" src="{{ $author->image ? asset($author->image) : 'https://via.placeholder.com/150' }}"
                        alt="Author Image" class="w-32 h-32 object-cover rounded-md">
                </div>

                <!-- File input for selecting a new image -->
                <x-forms.input type="file" accept=".jpeg,.jpg,.png" class="w-full py-2 px-3 border rounded-md focus:ring-blue-500"
                    name="image" id="edit-image-input" />

                <x-forms.error name="image" />
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