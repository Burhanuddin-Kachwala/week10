<x-layout>
    <x-hero />
    <x-genre />
    <div class="m-4 p-4 mb-2">
            <x-product-card :heading="'Recently Added'" :noOfProducts="6"/>
    </div>        
<x-footer />
</x-layout>