<x-admin.layout>
    <div class="container mx-auto py-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Products</h1>
            <a href="{{ route('admin.products.create') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full flex items-center">
                <i class="fa-solid fa-plus mr-2"></i> Add Product
            </a>
        </div>


        @if ($products->isEmpty())
        <p class="text-gray-500">No products available.</p>
        @else
        <div class="">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-2 px-4 border-b">Name</th>
                            <th class="py-2 px-4 border-b">Description</th>
                            <th class="py-2 px-4 border-b">Category</th>
                            <th class="py-2 px-4 border-b">Author</th>
                            <th class="py-2 px-4 border-b">Image</th>
                            <th class="py-2 px-4 border-b">Price</th>
                            <th class="py-2 px-4 border-b">Quantity</th>
                            <th class="py-2 px-4 border-b">Status</th>
                            <th class="py-2 px-4 border-b">Actions</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border-b">{{ $product->name }}</td>
                            <td class="py-2 px-4 border-b">
                                {{ Str::limit($product->description, 50) }}
                            </td>
                            <td class="py-2 px-4 border-b">{{ $product->category->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $product->author->name }}</td>

                            <td class="py-2 px-4 border-b">
                                <img src="{{ asset($product->image) }}" 
                                    alt="{{ $product->name }}"
                                    class="w-16 h-16 object-cover rounded"
                                    >
                            </td>
                            <td class="py-2 px-4 border-b">{{ $product->price }}</td>
                            <td class="py-2 px-4 border-b">{{ $product->quantity }}</td>
                            <td class="py-2 px-4 border-b">
                                <span 
                                class="{{ $product->status == 'active' ? 
                                'bg-green-100 text-green-700' 
                                    : 
                                'bg-red-100 text-red-700' }}
                                 px-2 py-1 rounded-full"
                                 >
                                    {{ ucfirst($product->status) }}
                                </span>
                            </td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('admin.products.edit', $product->slug) }}"
                                    class="text-blue-500 hover:underline">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
    {{ $products->links() }}
   
</x-admin.layout>