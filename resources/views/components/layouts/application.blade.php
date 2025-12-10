<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopta un Amigo</title>
    @fluxAppearance
    @livewireStyles
    @vite('resources/css/app.css')

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Roboto', 'Oxygen', 'Ubuntu', 'Cantarell', sans-serif;
            min-height: 100vh;
        }

        .nav-container {
            margin: 0 auto;
            padding: 0 1rem;
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 64px;
        }

        .nav-logo {
            font-size: 1.25rem;
            font-weight: 700;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
        }

        /* Main Container */
        .container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 3rem 1rem;
        }



        @media (min-width: 768px) {
            .container {
                padding: 4rem 1.5rem;
            }

            .nav-container {
                padding: 0 1.5rem;
            }
        }

        @media (min-width: 1024px) {
            .container {
                padding: 4rem 2rem;
            }

            .nav-container {
                padding: 0 2rem;
            }
        }
    </style>
</head>
<body>

<flux:navbar @class('nav-container')>
    <flux:heading @class('nav-logo')>Adopta un amigo</flux:heading>

    <div class="nav-links">
        <flux:navbar.item href="{{ route('home')  }}">Descubrir</flux:navbar.item>
        <flux:navbar.item href="{{ route('favorites') }}">Favoritos</flux:navbar.item>
    </div>

    <flux:button x-data x-on:click="$flux.dark = ! $flux.dark" icon="moon" variant="subtle"
                 aria-label="Toggle dark mode"/>
</flux:navbar>

<div class="container">
    {{ $slot }}
</div>

<!-- Flux UI scripts -->
@livewireScripts
@fluxScripts
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>
