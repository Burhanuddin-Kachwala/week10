@php
$products = [
    [
        'imageUrl' => 'product-item1.jpg',
        'brand' => 'Brand A',
        'productName' => 'Book A',
        'price' => 20
    ],
    [
        'imageUrl' => 'product-item2.jpg',
        'brand' => 'Brand B',
        'productName' => 'Book B',
        'price' => 25
    ],
    [
        'imageUrl' => 'product-item3.jpg',
        'brand' => 'Brand C',
        'productName' => 'Book C',
        'price' => 30
    ],
    [
        'imageUrl' => 'product-item4.jpg',
        'brand' => 'Brand D',
        'productName' => 'Book D',
        'price' => 35
    ],
    [
        'imageUrl' => 'product-item5.jpg',
        'brand' => 'Brand E',
        'productName' => 'Book E',
        'price' => 40
    ]
];
@endphp
<x-heading>Books</x-heading>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($products as $product)
    <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
        <a href="#">
            <img src="{{ Vite::asset('resources/images/' . $product['imageUrl']) }}" alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
            <div class="px-4 py-3 w-72">
                <span class="text-gray-400 mr-3 uppercase text-xs">{{ $product['brand'] }}</span>
                <p class="text-lg font-bold text-black truncate block capitalize">{{ $product['productName'] }}</p>
                <div class="flex items-center">
                    <p class="text-lg font-semibold text-black cursor-auto my-3">${{ $product['price'] }}</p>
                    <div class="ml-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-bag-plus" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                            <path
                                d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                        </svg>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>
