<x-admin.layout>
    <!-- Specific jQuery version known to work well with Summernote -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>    
    <!-- Summernote specific versions -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <h2 class="text-2xl mb-6">Edit Static Page</h2>

    <x-forms.form method="POST" action="{{ route('admin.static-page.update', $staticPage->slug) }}"
        id="edit-static-page" class="p-6 bg-white rounded-lg shadow-md max-w-4xl mx-auto border border-gray-300">
        @method('PUT')
        <!-- Hidden input to pass the static page ID -->
        <input type="hidden" name="slug" value="{{ $staticPage->slug }}">

        <div class="space-y-5">
            <!-- Title Field -->
            <x-forms.label :label="'Title'" :name="'title'" />
            <x-forms.input placeholder="Enter the page title" class="w-full py-3" name="title"
                value="{{ old('title', $staticPage->title) }}" />
            <x-forms.error name="title" />

            {{-- <!-- Slug Field (Read-Only) -->
            <x-forms.label :label="'Slug'" :name="'slug'" />
            <x-forms.input placeholder="Slug (auto-generated)" class="w-full py-3" name="slug"
                value="{{ old('slug', $staticPage->slug) }}" readonly />
            <x-forms.error name="slug" /> --}}

            <!-- Status dropdown -->
            <!-- Status dropdown -->
            <div>
                <x-forms.label label="Status" name="status" class="text-gray-700 font-medium m-2" />
                <select name="status" class="w-1/2 py-2 px-3 border rounded-md focus:ring-blue-500">/
                    <option value="active" {{ $staticPage->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $staticPage->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
                <x-forms.error name="status" />
            </div>

            <!-- Content (Editor) -->
            <x-forms.label :label="'Content'" :name="'content'" />
            <textarea id="summernote" name="content">{{ old('content', $staticPage->content) }}</textarea>
            
            <x-forms.error name="content" />
        </div>

        <x-forms.button class="bg-primary">
            Update Page
        </x-forms.button>
    </x-forms.form>

    <script>
        // Comprehensive initialization with error handling
            (function($) {
                $(document).ready(function() {
                    // Detailed diagnostic logging
                    console.log('jQuery version:', $.fn.jquery);
                    
                    // Check Summernote availability with safe initialization
                    try {
                        // Attempt to initialize with minimal configuration
                        $('#summernote').summernote({
                            height: 300,
                            placeholder: 'Write your content here...',
                                                    callbacks: {
                                onInit: function() {
                                    console.log('Summernote initialized successfully');
                                },
                                onError: function(err) {
                                    console.error('Summernote error:', err);
                                }
                            }
                        });
                    } catch (error) {
                        console.error('Summernote initialization failed:', error);
                        
                        // Fallback error handling
                        $('#summernote').replaceWith(
                            '<textarea name="content" class="w-full h-300 border p-2">' + 
                            'Rich text editor failed to load. Please enter your content here.' + 
                            '</textarea>'
                        );
                    }
                });
            })(jQuery);
    </script>
</x-admin.layout>