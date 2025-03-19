<x-admin.layout class="overflow-x-auto">
  
    <x-forms.form method="POST" action="{{ route('admin.products.update', $product->id) }}" id="edit-product"
        class="p-6 bg-white rounded-lg shadow-md max-w-4xl mx-auto border border-gray-300"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <h2 class="text-xl font-semibold text-gray-800 mb-6 text-center">Edit Product</h2>
        <x-forms.input type="hidden" name="id" value="{{ $product->id }}" />
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Two-column grid -->

            <!-- Name input -->
            <div>
                <x-forms.label label="Name" name="name" class="text-gray-700 font-medium" />
                <x-forms.input placeholder="Product name" class="w-full py-2 px-3 border rounded-md focus:ring-blue-500"
                    name="name" value="{{ old('name', $product->name) }}" />
                <x-forms.error name="name" />
            </div>

            <!-- Category dropdown -->
            <div>
                <x-forms.label label="Category" name="category" class="text-gray-700 font-medium" />
                <select name="category" class="w-full py-2 px-3 border rounded-md focus:ring-blue-500">
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
                <x-forms.error name="category" />
            </div>

            <!-- Author dropdown -->
            <div>
                <x-forms.label label="Author" name="author" class="text-gray-700 font-medium" />
                <select name="author" class="w-full py-2 px-3 border rounded-md focus:ring-blue-500">
                    @foreach($authors as $author)
                    <option value="{{ $author->id }}" {{ $product->author_id == $author->id ? 'selected' : '' }}>
                        {{ $author->name }}
                    </option>
                    @endforeach
                </select>
                <x-forms.error name="author" />
            </div>

            <!-- Description textarea -->
           <div>
            <x-forms.label label="Description" name="description" class="text-gray-700 font-medium" />
            <textarea placeholder="Product Description" class="w-full py-2 px-3 border rounded-md focus:ring-blue-500" name="description">{{ old('description', $product->description) }}</textarea>
                
            
            <x-forms.error name="description" />
        </div>

            <!-- Image input -->
            <div>
                <x-forms.label label="Image" name="image" class="text-gray-700 font-medium" />
        
                <div class="mb-4">
                    <!-- Display existing image or a placeholder if the product doesn't have one -->
                    <img id="image-preview" src="{{ $product->image ? asset($product->image) : 'https://via.placeholder.com/150' }}"
                        alt="Product Image" class="w-32 h-32 object-cover rounded-md">
                </div>
        
                <!-- File input for selecting a new image -->
                <x-forms.input type="file" accept=".jpeg,.jpg,.png" class="w-full py-2 px-3 border rounded-md focus:ring-blue-500"
                    name="image" id="edit-image-input" />
        
                <x-forms.error name="image" />
            </div>

            <!-- Price input -->
            <div>
                <x-forms.label label="Price" name="price" class="text-gray-700 font-medium" />
                <x-forms.input type="number" placeholder="Price"
                    class="w-full py-2 px-3 border rounded-md focus:ring-blue-500" name="price" min="1"
                    value="{{ old('price', $product->price) }}" />
                <x-forms.error name="price" />
            </div>

            <!-- Quantity input -->
            <div>
                <x-forms.label label="Quantity" name="quantity" class="text-gray-700 font-medium" />
                <x-forms.input type="number" placeholder="Qty"
                    class="w-full py-2 px-3 border rounded-md focus:ring-blue-500" name="quantity" min="1"
                    value="{{ old('quantity', $product->quantity) }}" />
                <x-forms.error name="quantity" />
            </div>

            <!-- Status dropdown -->
            <div>
                <x-forms.label label="Status" name="status" class="text-gray-700 font-medium" />
                <select name="status" class="w-full py-2 px-3 border rounded-md focus:ring-blue-500">
                    <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
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

