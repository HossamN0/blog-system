<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            @if(session('success'))
                <div
                    style="position: fixed; top: 20px; right: 20px; background: #d4edda; color: #155724; padding: 16px; border: 1px solid #c3e6cb; border-radius: 8px; max-width: 400px; z-index: 1000; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 12px;">
                        <span style="flex: 1;">✅ {{ session('success') }}</span>
                        <button onclick="this.parentElement.parentElement.style.display='none'"
                            style="background: none; border: none; font-size: 18px; cursor: pointer; color: #155724; padding: 0; margin: 0; line-height: 1;">
                            ×
                        </button>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div
                    style="position: fixed; top: 20px; right: 20px; background: #f8d7da; color: #721c24; padding: 16px; border: 1px solid #f5c6cb; border-radius: 8px; max-width: 400px; z-index: 1000; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                    <div style="display: flex; justify-content: space-between; align-items: flex-start; gap: 12px;">
                        <span style="flex: 1;">❌ {{ session('error') }}</span>
                        <button onclick="this.parentElement.parentElement.style.display='none'"
                            style="background: none; border: none; font-size: 18px; cursor: pointer; color: #721c24; padding: 0; margin: 0; line-height: 1;">
                            ×
                        </button>
                    </div>
                </div>
            @endif
            {{ $slot }}
        </main>
    </div>
</body>

</html>