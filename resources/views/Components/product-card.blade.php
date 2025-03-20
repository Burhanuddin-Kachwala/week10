@props([
'noOfProducts' => null,
'heading' => 'Books',
'categoryId' => null,
'search' => null, // Add the search parameter
])

@php
$query = \App\Models\Product::latest();

// Filter by category if provided
if ($categoryId) {
    $query->where('category_id', $categoryId);
}

// Filter by search term if provided
if ($search) {
// Search by product name
$query->where('name', 'like', "%{$search}%");


$query->orWhereHas('category', function ($subQuery) use ($search) {
$subQuery->where('name', 'like', "%{$search}%");
});


$query->orWhereHas('author', function ($subQuery) use ($search) {
$subQuery->where('name', 'like', "%{$search}%");
});
}

// Limit number of products if specified
if ($noOfProducts) {
    $query->limit($noOfProducts);
}

$products = $query->get();

// Get category name for heading if categoryId is provided
$categoryName = '';
if ($categoryId) {
    $category = \App\Models\Category::find($categoryId);
if ($category) {
    $categoryName = $category->name;
}
}

// Use category name in heading if available
$displayHeading = $categoryId && $categoryName ? "$heading - $categoryName" : $heading;
@endphp

<x-heading>{{ $displayHeading }}</x-heading>

@if($products->count() > 0)
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($products as $product)
    <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
        <a href="{{ route('products.show', $product->slug) }}" class="flex flex-col">
            <img src="{{asset($product->image)}}" alt="{{ $product->name}}"
                class="h-80 w-72 object-cover rounded-t-xl" />
            <div class="px-4 py-3 w-72">
                <span class="text-gray-400 mr-3 uppercase text-xs">{{ $product->author->name }}</span>
                <p class="text-lg font-bold text-black truncate block capitalize">{{ $product->name }}</p>
                <div class="flex items-center">
                    <p class="text-lg font-semibold text-black cursor-auto my-3">${{ $product->price }}</p>
                    <button
                        class="ml-auto bg-secondary text-white px-3 py-1 rounded-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-bag-plus" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                            <path
                                d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                        </svg>
                    </button>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>
@else
<div class="w-full p-6 text-center bg-gray-100 rounded-lg">
    <p class="text-lg text-gray-600">No products found.</p>
</div>
@endif