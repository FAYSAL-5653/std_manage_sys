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
        <form action="{{ url('/insert-employee') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="">FristName</label><br>
            <input type="text" name="FristName" id=""><br>

            <label for="">Lastname</label><br>
            <input type="text" name="LastName" id=""><br>


            <label for="">Adress</label><br>
            <input type="text" name="Adress" id=""><br>


            <label for="">City</label><br>
            <input type="text" name="City" id=""><br><br>

            <label for="">images</label><br>
            <input type="file" name="images" id=""><br><br>


            <button type="submit">Submite</button>

        </form>
    </div>
</body>

</html>
