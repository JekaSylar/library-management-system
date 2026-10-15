<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon/favicon-96x96.png')  }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/img/favicon/favicon.svg')  }}" />
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon/favicon.ico')  }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/favicon/apple-touch-icon.png')  }}" />
    <link rel="manifest" href="{{ asset('assets/img/favicon/site.webmanifest') }}" />

    @fonts
    @routes
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <x-inertia::head />
</head>
<body class="bg-slate-50 font-roboto h-screen text-slate-800 antialiased">
<x-inertia::app />
</body>
</html>
