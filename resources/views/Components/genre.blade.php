@php
    $genres = ['Fiction', 'Non-Fiction', 'Mystery', 'Romance', 'Science Fiction', 'Fantasy', 'Biography', 'History', 'Self-Help', 'Children'];
@endphp

<div class="container mx-auto p-6 flex justify-center">
    <div class="p-6 rounded-lg">
        <x-heading>Genres</x-heading>
        <div class="flex flex-wrap gap-2 justify-center">
            @foreach ($genres as $genre)
                <a href="#" class="bg-accent hover:bg-secondary py-1 px-2 rounded-lg text-sm">{{ $genre }}</a>
            @endforeach
        </div>
    </div>
</div>
