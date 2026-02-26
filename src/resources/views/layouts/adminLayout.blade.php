<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Terminal | @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #F8F8F8;
        }
    </style>
</head>

<body class="text-black selection:bg-[#D9FF40] selection:text-black antialiased">


    @include('partials.topBarAdmin')
    <main class="max-w-[1600px] mx-auto px-12 py-16">

       @yield('content')
    </main>

</body>

</html>
