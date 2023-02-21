<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" />
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Brew Brothers - Craft Ale Brewery</title>
</head>


<body>
    <!-- Nav -->
    <x-nav> </x-nav>


    <!-- Nav End -->

    {{ $slot }}

    <x-footer></x-footer>
</body>


</html>
