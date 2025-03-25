<x-admin.layout>
    <!-- Specific jQuery version known to work well with Summernote -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap CSS (if needed) -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- Summernote specific versions -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <h2 class="text-2xl font-semibold mb-4">Create Static Page</h2>

    <x-forms.form method="POST" action="{{ route('admin.static-page.store') }}" id="static-page-form"
        class="p-6 bg-white rounded-lg shadow-md max-w-4xl mx-auto border border-gray-300">
        <div class="space-y-5">
            {{-- Title --}}
            <x-forms.label :label="'Title'" :name="'title'" />
            <x-forms.input placeholder="Enter page title" class="w-full py-3" name="title" value="{{ old('title') }}" />
            <x-forms.error name="title" />

            {{-- Content with Summernote --}}
            <x-forms.label :label="'Content'" :name="'content'" />
            <div>
                <textarea id="summernote" name="content" class="w-full">{{ old('content') }}</textarea>
            </div>
            <x-forms.error name="content" />
        </div>

        {{-- Submit Button --}}
        <x-forms.button class="bg-primary mt-4">
            Create Page
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