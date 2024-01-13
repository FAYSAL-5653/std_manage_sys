<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->

</head>

<body class="antialiased">
    <div>
        <form action="{{ url('/insert-Classname') }}" method="post">
            @csrf
            <label for="">Class Name</label><br>
            <input type="text" name="ClassName" id=""><br><br>
            <button type="submit">Submite</button>

        </form>
    </div>
</body>

</html>
