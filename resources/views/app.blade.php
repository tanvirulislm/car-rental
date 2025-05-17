<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0,
maximum-scale=1.0" />
    {{-- Favicon --}}
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon.jpg">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon.jpg">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon.jpg">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="
{{url('https://cdnjs.cloudflare.com/ajax/libs/nprogress/0.2.0/nprogress.min.
css')}}" />

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet" />

    @vite('resources/js/app.js')
    @inertiaHead
</head>

<body class="font-['Inter']">
    @inertia
</body>

</html>