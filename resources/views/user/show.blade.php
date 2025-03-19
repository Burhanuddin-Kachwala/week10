
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
                    description="{{ $product->description }}"
                    {{-- :features="$product->features" --}}
                     />
            </div>
        </div>
    </div>
</x-layout>
