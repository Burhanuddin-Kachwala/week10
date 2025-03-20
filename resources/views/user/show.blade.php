
<x-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="flex flex-wrap -mx-4">
            <!-- Product Images -->
            <div class="w-full md:w-1/2 px-4 mb-8">
                <x-product.image
                    mainImage="{{ asset($product->image) }}"
                     />
            </div>

            <!-- Product Details -->
            <div class="w-full md:w-1/2 px-4">
                <x-product.details name="{{ $product->name }}" author="{{ $product->author->name }}" price="{{ $product->price }}"
                    category="{{ $product->category->name }}" 
                    {{-- rating="{{ $product->rating }}" reviews="{{ $product->reviews }}" --}}
                    description="{!! $product->description !!}"
                    {{-- :features="$product->features" --}}
                     />
            </div>

        </div>
    </div>

    <div class="flex space-x-4 mb-6">
        {{-- This can be added to your product card component --}}
        <form action="{{ route('cart.add') }}" method="POST" class="add-to-cart-form">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            <input type="hidden" name="quantity" value="1">
            <button type="submit"
                class="ml-auto bg-secondary text-white px-3 py-1 rounded-full hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bag-plus"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                    <path
                        d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                </svg>
            </button>
        </form>
    
    
        <a href="/cart"
            class="bg-orange-700 flex gap-2 items-center text-white px-6 py-2 rounded-md hover:bg-orange-800 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z" />
            </svg>
            Buy Now
        </a>
    </div>
</x-layout>
