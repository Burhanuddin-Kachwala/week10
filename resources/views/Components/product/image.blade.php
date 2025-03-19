<div>
    <!-- Main Image -->
    <img src="{{ $mainImage }}" alt="Product" class="w-full h-[400px] object-contain rounded-lg shadow-md mb-4" id="mainImage">


    {{-- <!-- Thumbnails -->
    <div class="flex gap-4 py-4 justify-center overflow-x-auto">
        @foreach ($thumbnails as $thumbnail)
        <img src="{{ $thumbnail }}" alt="Thumbnail"
            class="size-16 sm:size-20 object-cover rounded-md cursor-pointer opacity-60 hover:opacity-100 transition duration-300"
            onclick="changeImage('{{ $thumbnail }}')">
        @endforeach
    </div> --}}
</div>

<script>
    function changeImage(src) {
        document.getElementById('mainImage').src = src;
    }
</script>