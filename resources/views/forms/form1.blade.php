<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container mt-5">
        <h2>Basic Form</h2>
        <form action="{{ route('form1_data') }}" method="post">
            {{-- <input name="_token" type="hidden" value="{{ csrf_token() }}" /> --}}
            {{-- {{ csrf_field() }} --}}
            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control">
            </div>

            <div class="mb-3">
                <label>Age</label>
                <input type="number" name="age" class="form-control">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <button class="btn btn-info w-100">Send</button>
            {{-- <button class="btn btn-warning">Send</button>
            <button class="btn btn-danger">Send</button>
            <button class="btn btn-primary">Send</button>
            <button class="btn btn-success">Send</button>
            <button class="btn btn-dark">Send</button>
            <button class="btn btn-default">Send</button> --}}
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
