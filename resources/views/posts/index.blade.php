<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Posts</title>
    <link href="{{ asset('formcss/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    <style>
        /* Pagination */
.pagination2 {display: flex; flex-wrap: wrap; justify-content: center; align-items: center; grid-gap: 7px;  margin: 0px; padding: 0; list-style: none; }
.pagination2 li { display: inline-block; }
.pagination2 li a { font-size: 15px; font-weight: 500; margin: 0; color: #626262; border-radius: 0px; display: inline-block;
    -webkit-transition: all 0.5s ease-out 0s;
    -moz-transition: all 0.5s ease-out 0s;
    -ms-transition: all 0.5s ease-out 0s;
    -o-transition: all 0.5s ease-out 0s;
    transition: all 0.5s ease-out 0s;
    text-decoration: none
}
.pagination2 > li > a,
.pagination2 > li > span { padding: 8px 16px; font-size: 15px; border: 1px solid #e3e3e3; border-radius: 0px; }
.pagination2 > li > span { padding: 10px 16px; }

.pagination2>li:last-child>a,
.pagination2>li:last-child>span,
.pagination2>li:first-child>a,
.pagination2>li:first-child>span{
    border-radius: 0px;
}
.pagination2 li a:focus,
.pagination2 li a:hover,
.pagination2 li span:focus,
.pagination2 li span:hover,
.pagination2 li span.current {
    background-color: #db2d2e;
    border-color: #db2d2e;
    color: #fff;
}
.pagination2 > .active > a,
.pagination2 > .active > a:focus,
.pagination2 > .active > a:hover,
.pagination2 > .active > span,
.pagination2 > .active > span:focus,
.pagination2 > .active > span:hover {
    background-color: #db2d2e;
    border-color: #db2d2e;
    color: #fff;
}


    </style>

</head>

<body>

    <div class="container mt-5">
        <h1>All Posts</h1>
        <table class="table table-bordered table-hover table-striped">
            <tr class="table-dark">
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Views</th>
                <th>Actions</th>
            </tr>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td><img width="80" src="{{ $post->image }}" alt=""></td>
                    <td>{{ $post->views }}</td>
                    <td>
                        <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>

        {{ $posts->links() }}
    </div>

</body>

</html>
