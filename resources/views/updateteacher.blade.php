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
        <form action="{{ url('/update-Teacher', $teacherdata->id) }}" method="post" enctype="multipart/form-data">
            @csrf

            {{-- Uncomment if using an ID field --}}
            <label for="update_teacher_id">ID</label><br>
            <input type="text" name="update_teacher_id" value="{{ $teacherdata->id }}" id="update_teacher_id"
                readonly><br>

            <label for="update_teacher_name">Name</label><br>
            <input type="text" name="update_teacher_name" value="{{ $teacherdata->teacher_name }}"
                id="update_teacher_name"><br>

            <label for="update_designation">Designation</label><br>
            <input type="text" name="update_designation" value="{{ $teacherdata->designation }}"
                id="update_designation"><br>

            <label for="update_phone">Phone</label><br>
            <input type="text" name="update_phone" value="{{ $teacherdata->phone }}" id="update_phone"><br>

            <label for="update_image">Images</label><br>
            <input type="file" name="update_image" id="update_image"><br><br>

            <button type="submit">Submit</button>
        </form>

    </div>
</body>

</html>
