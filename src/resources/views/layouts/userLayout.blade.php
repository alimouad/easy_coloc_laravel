<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DarColoc | Simplify Your Living</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800;900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'ui', sans-serif;
            background-color: #F4F4F4;
            /* Matches the screenshot background */
            color: #1a1a1a;
        }

        .lime-accent {
            background-color: #D9FF40;
        }

        .text-lime-accent {
            color: #D9FF40;
        }
    </style>
</head>

<body>

    <div class="min-h-screen bg-[#F4F4F4] font-sans text-gray-900 selection:bg-[#D9FF40] selection:text-black">

        @include('partials.topBar')
        @include('partials.flashMessage')


        @yield('content')
    </div>



</body>

</html>
