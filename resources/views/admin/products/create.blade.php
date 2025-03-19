<x-admin.layout class="overflow-x-auto">
    <x-forms.form method="POST" action="{{ route('admin.products.store') }}" id="register-product"
        class="p-6 bg-white rounded-lg shadow-md max-w-4xl mx-auto border border-gray-300"
        enctype="multipart/form-data">

        <h2 class="text-xl font-semibold text-gray-800 mb-6 text-center">Register Product</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Two-column grid -->
            <div>
                <x-forms.label label="Name" name="name" class="text-gray-700 font-medium" />
                <x-forms.input placeholder="Product name" class="w-full py-2 px-3 border rounded-md focus:ring-blue-500"
                    name="name" value="Sample Product Name" />
                <x-forms.error name="name" />
            </div>

            <div>
                <x-forms.label label="Category" name="category" class="text-gray-700 font-medium" />
                <select name="category" class="w-full py-2 px-3 border rounded-md focus:ring-blue-500">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <x-forms.error name="category" />
            </div>

            <div>
                <x-forms.label label="Author" name="author" class="text-gray-700 font-medium" />
                <select name="author" class="w-full py-2 px-3 border rounded-md focus:ring-blue-500">
                    @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
                <x-forms.error name="author" />
            </div>

            <div>
                <x-forms.label label="Description" name="description" class="text-gray-700 font-medium" />
                <x-forms.textarea placeholder="Short description"
                    class="w-full py-2 px-3 border rounded-md focus:ring-blue-500" name="description"
                    value="Sample Product Description">
                </x-forms.textarea>
                <x-forms.error name="description" />
            </div>

            <div>
                <x-forms.label label="Image" name="image" class="text-gray-700 font-medium" />
                <x-forms.input type="file" accept=".jpeg,.jpg,.png"
                    class="w-full py-2 px-3 border rounded-md focus:ring-blue-500" name="image" />
                <x-forms.error name="image" />
            </div>

            <div>
                <x-forms.label label="Price" name="price" class="text-gray-700 font-medium" />
                <x-forms.input type="number" placeholder="Price"
                    class="w-full py-2 px-3 border rounded-md focus:ring-blue-500" name="price" min="1" value="5" />
                <x-forms.error name="price" />
            </div>

            <div>
                <x-forms.label label="Quantity" name="quantity" class="text-gray-700 font-medium" />
                <x-forms.input type="number" placeholder="Qty"
                    class="w-full py-2 px-3 border rounded-md focus:ring-blue-500" name="quantity" min="1" value="5" />
                <x-forms.error name="quantity" />
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