<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form 2</title>
    <link href="{{ asset('formcss/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="alert alert-success">
            <p><b>Name:</b> {{ $name }}</p>
            <p><b>Email:</b> {{ $email }}</p>
            <p><b>Phone:</b> {{ $phone }}</p>
            <p><b>Data of Birth:</b> {{ $dob }}</p>
        </div>
    </div>

</body>
</html>
