<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form 3</title>
    <link href="{{ asset('formcss/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <h2>Submit your resume</h2>
        @include('forms.errors')
        <form action="{{ route('form3_data') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name" />
            </div>
            <div class="mb-3">
                <label>CV</label>
                <input type="file" name="cv" class="form-control" placeholder="Your CV.." />
            </div>

            <button class="btn btn-dark">Upload</button>
        </form>

    </div>

</body>
</html>
