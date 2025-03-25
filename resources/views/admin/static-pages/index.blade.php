<x-admin.layout>
<div class="container mx-auto py-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Static Pages</h1>
        <a href="{{ route('admin.static-page.create') }}"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full flex items-center">
            <i class="fa-solid fa-plus mr-2"></i> Add Static Page
        </a>
    </div>


  
  
    @if ($staticPages->isEmpty())
    <p class="text-gray-500">No static pages available.</p>
    @else
    <div class="">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border-b">Title</th>
                        <th class="py-2 px-4 border-b">Slug</th>
                        <th class="py-2 px-4 border-b">Status</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($staticPages as $staticPage)
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-4 border-b">{{ $staticPage->title }}</td>
                        <td class="py-2 px-4 border-b">{{ $staticPage->slug }}</td>
                        <td class="py-2 px-4 border-b">
                            <span class="{{ $staticPage->status == 'active' ? 
                                                        'bg-green-100 text-green-700' 
                                                            : 
                                                        'bg-red-100 text-red-700' }}
                                                        px-2 py-1 rounded-full">
                                {{ $staticPage->status == 'active' ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('admin.static-page.edit', $staticPage->slug) }}"
                                class="text-blue-500 hover:underline">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                           <!-- Delete Confirmation Form -->
                        <form action="{{ route('admin.static-pages.destroy', $staticPage->slug) }}" method="POST" class="inline-block"
                            onsubmit="return confirm('Are you sure you want to delete this static page?');">
                            @csrf
                            @method('DELETE')
                            <!-- Hidden input to pass the static page ID -->
                            <input type="hidden" name="id" value="{{ $staticPage->id }}">
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
    </div>
    @endif


</div>
</x-admin.layout>    