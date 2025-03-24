<x-admin.layout>
    <div class="container mx-auto py-4 px-4">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Categories</h1>
            <a href="{{ route('admin.categories.create') }}"
                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full flex items-center">
                <i class="fa-solid fa-plus mr-2"></i> Add Category
            </a>
        </div>

        @if ($categories->isEmpty())
        <p class="text-gray-500">No categories available.</p>
        @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4 border-b text-center">{{ $category->name }}</td>
                        <td class="py-2 px-4 border-b text-center">
                            <a href="{{ route('admin.categories.edit', $category->slug) }}"
                                class="text-blue-500 hover:underline">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
    {{ $categories->links() }}
    {{-- @if(session('success'))
    <div class="fixed top-0 left-3/4 transform -translate-x-1/2 mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-full shadow-lg"
        role="alert" id="success-alert">
        <span class="block sm:inline">{{ session('success') }}</span>
    </div> --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#success-alert').fadeOut('slow');
            }, 3000);
        });
    </script>
    @endif
</x-admin.layout>
