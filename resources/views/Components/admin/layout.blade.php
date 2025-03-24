<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   
    <script src="https://cdn.tailwindcss.com/"></script>
    <!-- Font Awesome 6 (Latest) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3.8.0/notyf.min.css">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex h-screen">
        <!-- Sidebar -->
        <x-admin.sidebar />

        <!-- Main Content -->
        <main class="flex-1 p-3 bg-gray-100 overflow-auto">
            {{ $slot }}
        </main>
    </div>

    <!-- jQuery Script should be loaded first -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Add jQuery Validation Script -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>

    <!-- Toastr JS -->
    <script src="https://cdn.jsdelivr.net/npm/notyf@3.8.0/notyf.min.js"></script>
    <!-- Toastr Session Message Handling -->
    <script>
        const notyf = new Notyf();
            @if(session('success'))
                notyf.success("{{ session('success') }}", 'Success');
            @elseif(session('error'))
                notyf.error("{{ session('error') }}", 'Error');
            @elseif(session('warning'))
                notyf.warning("{{ session('warning') }}", 'Warning');
            @endif
    </script>

    <script>
        // Dropdown functionality using jQuery
        $('button[aria-controls]').each(function() {
            $(this).on('click', function() {
            var isExpanded = $(this).attr('aria-expanded') === 'true';
            var dropdownContentId = $(this).attr('aria-controls');
            var $dropdownContent = $('#' + dropdownContentId);

            if ($dropdownContent.length) {
                $(this).attr('aria-expanded', !isExpanded);
                $dropdownContent.toggleClass('hidden');
                $(this).find('svg:last-child').toggleClass('rotate-180');
            }
            });
        });
    </script>

</body>

</html>