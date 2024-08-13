<!doctype html>
<html lang="en" class="__variable_be477b __variable_aaf875">
<head>
    <meta charset="utf-8">
{{--    <link rel="preload" as="font" href="{{ asset('assets/site/fonts/c9a5bc6a7c948fb0-s.p.woff2') }}" crossorigin=""--}}
{{--          type="font/woff2">--}}
{{--    <link rel="preload" as="font" href="{{ asset('assets/site/fonts/c9a5bc6a7c948fb0-s.p.woff2') }}" crossorigin=""--}}
{{--          type="font/woff2">--}}
    <title>Scivolema</title>
    <meta name="description"
          content="Iuj ajn demandoj kaj respondoj">
    <link rel="author" href="{{ env('APP_URL') }}">
    <meta name="author" content="Sir. Andrew Gotham">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="canonical" href="{{ env('APP_URL') }}">
    <link rel="alternate" type="application/rss+xml"
          href="#">
    <meta property="og:image:alt"
          content="Iuj ajn demandoj kaj respondoj">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image"
          content="{{ asset('assets/images/scivolema.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:image:alt"
          content="Iuj ajn demandoj kaj respondoj">
    <meta name="twitter:image:type" content="image/png">
    <meta name="twitter:image"
          content="{{ asset('assets/images/scivolema.png') }}">
    <meta name="twitter:image:width" content="1200">
    <meta name="twitter:image:height" content="630">
    <link rel="icon" href="{{ assert('assets/images/scivolema.png') }}" type="image/x-icon" sizes="any">
    <link rel="icon" href="{{ assert('assets/images/scivolema.png') }}" sizes="512x512">
    <link rel="apple-touch-icon" href="{{ assert('assets/images/scivolema.png') }}" type="image/png" sizes="180x180">
    <meta name="next-size-adjust">

    <!-- Fonts -->
{{--    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">--}}

{{--    <!-- Styles -->--}}
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">--}}

{{--    <!-- Icons -->--}}
{{--    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">--}}

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
    @stack('styles')
</head>
<body x-cloak x-data="{darkMode: $persist(false)}" :class="{'dark': darkMode === true }" class="min-h-screen bg-gradient-to-b from-slate-100 to-white text-slate-900 antialiased dark:bg-gradient-to-b dark:from-gray-900 dark:to-gray-800 dark:text-slate-50 dark:hover:text-white">
<x-site.header />
<main class="mt-20" id="main-content flex">
    <div class="pb-10 flex flex-col items-center">

        {{ $slot }}

    </div>
</main>
<x-site.footer />
<div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
    <div
        class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-amber-200 to-[#9089fc] opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
        style="clip-path:polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
</div>
<button
    class="items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none ring-offset-background bg-primary text-primary-foreground hover:bg-primary/90 h-10 w-10 hidden fixed bottom-8 right-8 z-50"
    aria-label="Scroll To Top" type="button">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
         stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-up">
        <path d="m5 12 7-7 7 7"></path>
        <path d="M12 19V5"></path>
    </svg>
</button>
<div role="region" aria-label="Notifications (F8)" tabindex="-1" style="pointer-events:none">
    <ol tabindex="-1"
        class="fixed top-0 z-[100] flex max-h-screen w-full flex-col-reverse p-4 sm:bottom-0 sm:right-0 sm:top-auto sm:flex-col md:max-w-[420px]"></ol>
</div>
@livewireScripts
@stack('scripts')
</body>
</html>
