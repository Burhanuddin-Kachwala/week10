<x-admin.layout>
<div class="container mx-auto py-8">
    <h1 class="text-2xl font-bold mb-6">Products</h1>
    @if ($products->isEmpty())
        <p class="text-gray-500">No products available.</p>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>                       
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">Description</th>
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
                            <td class="py-2 px-4 border-b">{{ $product->product_name }}</td>
                            <td class="py-2 px-4 border-b">{{ $product->description }}</td>
                            <td class="py-2 px-4 border-b">
                                <img src="{{ $product->image_path }}" alt="{{ $product->product_name }}" class="w-16 h-16 object-cover rounded">
                            </td>
                            <td class="py-2 px-4 border-b">{{ $product->price }}</td>
                            <td class="py-2 px-4 border-b">{{ $product->quantity }}</td>
                            <td class="py-2 px-4 border-b">{{ $product->status }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('admin.products.edit', $product->product_id) }}" class="text-blue-500 hover:underline">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('admin.products.destroy', $product->product_id) }}" method="POST" class="inline-block">
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
    @endif
</div>
{{ $products->links() }}
</x-admin.layout>

