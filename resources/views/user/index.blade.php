<x-layout>
   @if(session('success'))
    <script>
        console.log("Success message found:", "{{ session('success') }}"); // Debugging log
                toastr.success("{{ session('success') }}", 'Success');
    </script>
    @endif
    <x-hero />
    <x-genre />
    <div class="m-4 p-4 mb-2">
        <x-product-card :heading="'Recently Added'" :noOfProducts="6" />
    </div>
    <x-footer />
   
</x-layout>