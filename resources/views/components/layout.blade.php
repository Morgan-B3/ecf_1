@props(['heading', 'show' => true])

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>{{ $heading }}</title>
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    </head>
    <body class="bg-background">
        <div class="min-h-full">
            <nav class="bg-teal-800">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="flex h-16 items-center justify-between">
                        <div class="flex items-center">
                            <div class="shrink-0">
                                <a href="/" class="text-white font-bold text-3xl">&#128170; FitLife
                                </a>
                            </div>
                            @auth
                                <div class="hidden md:block">
                                    <div class="ml-10 flex items-baseline space-x-4">
                                        <a href="/bookings" class="rounded-md px-3 py-2 text-sm font-medium text-white" aria-current="page">
                                            Profil
                                        </a>
                                    </div>
                                </div>
                                <div class="hidden md:block">
                                    <div class="ml-10 flex items-baseline space-x-4">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="rounded-md px-3 py-2 text-sm font-medium text-white">
                                                {{ __('Déconnexion') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            @endauth
                            @guest
                                <a href="/bookings" class="rounded-md px-3 py-2 text-sm font-medium text-white" aria-current="page">
                                    Connexion
                                </a>
                            @endguest
                        </div>
                    </div>
                </div>
            </nav>

            <header class="bg-white shadow-sm">
                @if($show === true)
                    <div class="mx-auto max-w-7xl py-2 sm:px-6 lg:px-8">
                        <h1 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{$heading}}</h1>
                    </div>
                @endif
            </header>
            <main>
                <div class="bg-background mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                    {{$slot}}
                </div>
            </main>
            <footer>

            </footer>
        </div>
    </body>

</html>
