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
        <h1>Personal Information</h1>
        <form action="{{ route('form2_data') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" />
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email" />
            </div>

            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" placeholder="Phone" />
            </div>

            <div class="mb-3">
                <label>Start Learning</label>
                <input type="date" name="start" class="form-control" />
            </div>

            <div class="mb-3">
                <label>End Learning</label>
                <input type="date" name="end" class="form-control" />
            </div>

            <button class="btn btn-success">Send</button>

        </form>
    </div>

</body>
</html>
