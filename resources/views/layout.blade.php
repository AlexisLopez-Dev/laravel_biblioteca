<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Mi biblioteca</title>

        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen">

        <header class="bg-black text-white shadow-md">
            <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
                <a href="{{ route('libros.index') }}" class="text-2xl font-black tracking-tighter hover:text-gray-300 transition">
                    📚 MiBiblioteca
                </a>

                <nav class="space-x-4">
                    <a href="{{ route('libros.index') }}" class="font-bold hover:text-yellow-400 transition">Ver Libros</a>
                    <a href="{{ route('libros.create') }}" class="bg-white text-black px-4 py-2 rounded-lg font-bold hover:bg-gray-200 transition">
                        + Nuevo Libro
                    </a>
                </nav>
            </div>
        </header>

        <main class="flex-1 w-full max-w-7xl mx-auto px-4 py-8">
            @yield('content')
        </main>

        <footer class="bg-white border-t border-gray-200 mt-8">
            <div class="max-w-7xl mx-auto px-4 py-6 text-center text-gray-500 text-sm">
                <p>&copy; {{ date('Y') }} MiBiblioteca - Desarrollado con café y Laravel</p>
            </div>
        </footer>

    </body>
</html>
