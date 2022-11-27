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
        .pagination2 {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            grid-gap: 7px;
            margin: 0px;
            padding: 0;
            list-style: none;
        }

        .pagination2 li {
            display: inline-block;
        }

        .pagination2 li a {
            font-size: 15px;
            font-weight: 500;
            margin: 0;
            color: #626262;
            border-radius: 0px;
            display: inline-block;
            -webkit-transition: all 0.5s ease-out 0s;
            -moz-transition: all 0.5s ease-out 0s;
            -ms-transition: all 0.5s ease-out 0s;
            -o-transition: all 0.5s ease-out 0s;
            transition: all 0.5s ease-out 0s;
            text-decoration: none
        }

        .pagination2>li>a,
        .pagination2>li>span {
            padding: 8px 16px;
            font-size: 15px;
            border: 1px solid #e3e3e3;
            border-radius: 0px;
        }

        .pagination2>li>span {
            padding: 10px 16px;
        }

        .pagination2>li:last-child>a,
        .pagination2>li:last-child>span,
        .pagination2>li:first-child>a,
        .pagination2>li:first-child>span {
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

        .pagination2>.active>a,
        .pagination2>.active>a:focus,
        .pagination2>.active>a:hover,
        .pagination2>.active>span,
        .pagination2>.active>span:focus,
        .pagination2>.active>span:hover {
            background-color: #db2d2e;
            border-color: #db2d2e;
            color: #fff;
        }

        .search-wrapper {
            position: relative;
        }

        .search-result {
            padding: 0;
            margin: 0;
            list-style: none;
            background: #ebebeb;
            position: absolute;
            width: 100%;
            top: 38px;
            box-shadow: 0px 2px 10px #a3a3a3;
            border-radius: 3px;
            display: none;
        }

        .search-result a {
            display: block;
            text-decoration: none;
            padding: 8px 15px;
            color: #000;
        }

        .search-result a:hover {
            background: #cfcfcf;
        }

        .modal-body {
            height: 400px;
            overflow-y: scroll;
        }
    </style>

</head>

<body>

    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>All Posts</h1>

            <a class="btn btn-dark px-5" href="{{ route('posts.create') }}">Add New</a>
        </div>

        <div class="search-wrapper">
            <form action="{{ route('posts.index') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" id="inp" class="form-control" placeholder="Search here..">
                    <button class="btn btn-outline-secondary" id="button-addon2"><i class="fas fa-search"></i></button>
                </div>
                <ul class="search-result">
                </ul>
            </form>
        </div>

        @if (session('msg'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif


        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="edit_form" action="" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Title" />
                            </div>

                            <div class="mb-3">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" />
                                <img width="40" src="" alt="">
                            </div>

                            <div class="mb-3">
                                <label>Body</label>
                                <textarea id="mytextarea" rows="5" name="body" class="form-control" placeholder="Body"></textarea>
                            </div>



                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- <p>Total: {{ $posts->total() }}</p> --}}
        <table class="table table-bordered table-hover table-striped">
            <tr class="table-dark">
                <th>ID</th>
                <th>Title</th>
                <th>Image</th>
                <th>Views</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            @foreach ($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td><img width="80" src="{{ asset('uploads/' . $post->image) }}" alt=""></td>
                    <td>{{ $post->views }}</td>
                    <td>{{ $post->created_at->format('F d, Y') }}</td>
                    {{-- <td>{{ $post->updated_at->diffForHumans() }}</td> --}}
                    <td>
                        @if ($post->created_at == $post->updated_at)
                            Not updated yet
                        @else
                            {{ $post->updated_at->diffForHumans() }}
                        @endif
                    </td>
                    <td>
                        <a
                        data-bs-toggle="modal"
                        data-bs-target="#editModal"
                        class="btn btn-primary btn-sm btn-edit"
                        data-title="{{ $post->title }}"
                        data-image="{{ asset('uploads/' . $post->image) }}"
                        data-url="{{ route('posts.update', $post->id) }}"
                        data-body="{{ $post->body }}"
                        >
                            <i class="fas fa-edit"></i>
                        </a>


                        {{-- <a href="{{ route('posts.destroy', $post->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> --}}

                        <form class="d-inline" action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button onclick="return confirm('Are you sure?!')" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {{ $posts->links() }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.3.0/tinymce.min.js" referrerpolicy="origin"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('globalassets/js/jquery-3.6.1.min.js') }}"></script>
    <script>
        tinymce.init({
          selector: '#mytextarea'
        });
        setTimeout(() => {
            document.querySelector('.alert-success').style.display = 'none';
        }, 3000);

        // setInterval(() => {
        //     console.log('Interval');
        // }, 1000);

        // var inp = document.getElementById('inp')
        // let inp = document.getElementById('inp')
        let inp = document.querySelector('#inp')
        let result = document.querySelector('.search-result')
        // const inp = document.getElementById('inp')

        inp.onblur = () => {
            result.style.display = 'none';
        }

        inp.onfocus = () => {
            if (inp.value.length > 0) {
                result.style.display = 'block';
            }
        }

        inp.onkeyup = () => {

            if (inp.value.length > 0) {
                // Ajax Request
                axios.get("{{ route('posts.search_posts') }}", {
                        params: {
                            keyword: inp.value
                        }
                    })
                    .then(res => {

                        result.innerHTML = '';

                        res.data.forEach(el => {
                            let item = `<li><a href="#">${el.title} - ${el.views}</a></li>`;
                            result.innerHTML += item
                        })

                        result.style.display = 'block';

                    })
            } else {
                result.innerHTML = '';
                result.style.display = 'none';
            }



        }
    </script>

    <script>
        // get old data from button
        $('.btn-edit').on('click', function() {
            let title = $(this).data('title');
            let image = $(this).data('image');
            let body  = $(this).data('body');
            let url  = $(this).data('url');

            $('#editModal form').attr('action', url);
            $('#editModal input[name=title]').val(title);
            $('#editModal img').attr('src', image);
            $('#editModal textarea').val(body);
            // tinymce.activeEditor.setContent(body);
        })


        // Send data using ajax
        $('#edit_form').on('submit', function(e) {
            e.preventDefault();

            let data = new FormData(this);

            // Send Ajax Request
            $.ajax({
                type: 'post',
                url: $('#editModal form').attr('action'),
                data: data,
                processData: false,
                cache: false,
                contentType: false,
                success: function(res) {
                    console.log(res);
                }
            })


        })
    </script>

</body>

</html>
