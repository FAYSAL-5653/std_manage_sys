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
        <form action="{{ url('/insert-teacher') }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="">Name</label><br>
            <input type="text" name="teacher_name" id=""><br>

            <label for="">Designation</label><br>
            <input type="text" name="designation" id=""><br>


            <label for=""></label>Phone</label><br>
            <input type="text" name="phone" id=""><br>

            <label for="">images</label><br>
            <input type="file" name="image" id=""><br><br>
            <button type="submit">Submite</button>

        </form>
    </div>
</body>

</html>
