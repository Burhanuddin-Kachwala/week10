@php
$products = [
    [
        'imageUrl' => 'product-item1.jpg',
        'author' => 'J.K. Rowling',
        'bookName' => 'Harry Potter and the Sorcerer\'s Stone',
        'price' => 20
        ],
        [
        'imageUrl' => 'product-item2.jpg',
        'author' => 'George Orwell',
        'bookName' => '1984',
        'price' => 25
        ],
        [
        'imageUrl' => 'product-item3.jpg',
        'author' => 'J.R.R. Tolkien',
        'bookName' => 'The Hobbit',
        'price' => 30
        ],
        [
        'imageUrl' => 'product-item4.jpg',
        'author' => 'Harper Lee',
        'bookName' => 'To Kill a Mockingbird',
        'price' => 35
        ],
        [
        'imageUrl' => 'product-item5.jpg',
        'author' => 'F. Scott Fitzgerald',
        'bookName' => 'The Great Gatsby',
        'price' => 40
    ]
];
@endphp
<x-heading>Books</x-heading>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach ($products as $product)
    <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl">
        <a href="/product">
            <img src="{{ Vite::asset('resources/images/' . $product['imageUrl']) }}" alt="{{ $product['bookName'] }}" class="h-80 w-72 object-cover rounded-t-xl" />
            <div class="px-4 py-3 w-72">
                <span class="text-gray-400 mr-3 uppercase text-xs">{{ $product['author'] }}</span>
                <p class="text-lg font-bold text-black truncate block capitalize">{{ $product['bookName'] }}</p>
                <div class="flex items-center">
                    <p class="text-lg font-semibold text-black cursor-auto my-3">${{ $product['price'] }}</p>
                    <button class="ml-auto bg-secondary text-white px-3 py-1 rounded-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                        </svg>
                    </button>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>
