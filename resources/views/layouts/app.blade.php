<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <title>{{ config('app.name') }}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Check if a theme preference is stored in localStorage
                    const savedTheme = localStorage.getItem('theme');
                
                    // If a theme preference exists, set it
                    if (savedTheme) {
                        document.documentElement.classList.add(savedTheme);
                    }
                
                    // Toggle theme function
                    function toggleTheme() {
                        // Toggle the 'dark' class on the html tag
                        document.documentElement.classList.toggle('dark');
                
                        // Check if the 'dark' class is present
                        const isDarkMode = document.documentElement.classList.contains('dark');
                
                        // Set the theme preference in localStorage
                        localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
                
                    }
                
                    // Attach the toggleTheme function to a button click or any other event you prefer
                    document.getElementById('theme-toggle-button').addEventListener('click', toggleTheme);
                });
          </script>
        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />
        <div class="min-h-screen bg-gray-50 dark:bg-gray-900">
            @livewire('navigation-menu')
            
            <!-- Page Heading -->
            @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
            @endif
            
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

  @stack('modals')
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
  @livewireScripts
</body>

</html>
