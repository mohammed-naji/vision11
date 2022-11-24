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
                    <input type="text" id="inp" class="form-control" placeholder="Search here.." >
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
                    <td><img width="80" src="{{ asset('uploads/'.$post->image) }}" alt=""></td>
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
                        <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                        <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        </table>

        {{ $posts->links() }}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>

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
            if(inp.value.length > 0) {
                result.style.display = 'block';
            }
        }

        inp.onkeyup = () => {

            if(inp.value.length > 0) {
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
            }else {
                result.innerHTML = '';
                result.style.display = 'none';
            }



        }
    </script>

</body>

</html>
