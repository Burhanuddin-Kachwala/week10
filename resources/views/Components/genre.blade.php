@php
    use App\Models\Category;
    $genres = Category::all();
@endphp

<div class="container mx-auto p-6 flex justify-center">
    <div class="p-6 rounded-lg">
        <x-heading>Genres</x-heading>
        <div class="flex flex-wrap gap-2 justify-center">
            
            @foreach ($genres as $genre)
            
                <a href="{{ route('categories.show',$genre->slug ) }}" class="bg-accent hover:bg-secondary py-1 px-2 rounded-lg text-sm">{{ $genre->name }}</a>
            @endforeach
        </div>
    </div>
</div>
