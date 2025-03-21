<x-layout>
    <div class="m-4 p-4">
      @php
        $heading = sprintf('Search Results for "%s"', $query);
    @endphp
        <x-product-card :search="$query" :heading="$heading" />        
    </div>

    <x-footer />
</x-layout>    