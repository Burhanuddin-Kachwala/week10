<div>
    <!-- Product Name and SKU -->
    <h2 class="text-3xl font-bold mb-2">{{ $name }}</h2>
    <!-- Category with a badge-like style -->

        <h3 class="text-lg font-semibold text-indigo-600 bg-indigo-100 px-3 py-1 rounded-full inline-block mb-2">
            {{ $category }}
        </h3>
   
    
    <!-- Author with an elegant italic style -->
    <h3 class="text-lg text-gray-700 italic mb-4">
         {{ $author }}
    </h3>
    {{-- <p class="text-gray-600 mb-4">SKU: {{ $sku }}</p> --}}

    <!-- Price -->
    <div class="mb-4">
        <span class="text-2xl font-bold mr-2">₹{{ $price }}</span>
        {{-- <span class="text-gray-500 line-through">${{ $originalPrice }}</span> --}}
    </div>

    <!-- Rating -->
    <div class="flex items-center mb-4">
        @for ($i = 0; $i < 5; $i++) <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
            class="size-6 text-yellow-500">
            <path fill-rule="evenodd"
                d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z"
                clip-rule="evenodd" />
            </svg>
            @endfor
            {{-- <span class="ml-2 text-gray-600">{{ $rating }} ({{ $reviews }} reviews)</span> --}}
    </div>

    <p class="text-gray-700 mb-6">{{ $description }}</p>

   

   
      

<form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
    <!-- Quantity -->
    <div class="mb-6">
        <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" max="10" value="1"
            class="w-12 text-center rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
    </div>
    @csrf
    <input type="hidden" name="product_id" value="{{ $id }}">
   <!-- Buttons -->
    <div class="flex space-x-4 mb-6">
    <button
        class="bg-indigo-600 flex gap-2 items-center text-white px-6 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
        </svg>
        Add to Cart
    </button>
</form>

        
        {{-- <a href="/cart"
            class="bg-orange-700 flex gap-2 items-center text-white px-6 py-2 rounded-md hover:bg-orange-800 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
            </svg>
            Buy Now
        </a> --}}
    </div>
{{-- 
    <!-- Key Features -->
    <div>
        <h3 class="text-lg font-semibold mb-2">Key Features:</h3>
        <ul class="list-disc list-inside text-gray-700">
            @foreach ($features as $feature)
            <li>{{ $feature }}</li>
            @endforeach
        </ul>
    </div> --}}
</div>