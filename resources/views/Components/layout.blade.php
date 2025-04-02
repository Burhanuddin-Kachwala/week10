<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BookSaw</title>

    <!-- Preconnect to external resources -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3.8.0/notyf.min.css">
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<style>
    .blur-background {
        transition: filter 0.2s ease-in-out;
        /* Smooth transition */
        filter: blur(0);
        /* Start without blur */
    }

    /* When the blur effect is triggered, it will apply the blur */
    .blur-background-active {
        filter: blur(2px);
        /* Adjust the blur intensity as needed */
    }

    /* Optional: Add a smooth transition for the suggestions */
    .tt-dataset {
        position: relative;
        z-index: 10;
    }

</style>
<body class="font-hanken-grotesk bg-light">

    <!-- Navbar Component -->
    <x-navbar />

    <!-- Main Content -->
    <main class="blur-background">
        {{$slot}}
    </main>

    <!-- jQuery JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

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

    <!-- Flowbite JS (for additional UI components) -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

    <!-- jQuery Validation Plugin -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>

    {{-- Suggestion Libreary of Search - typeahead.js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/corejs-typeahead/1.3.1/typeahead.bundle.min.js"></script>

</body>

</html>
