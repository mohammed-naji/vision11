<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
    <link href="{{ asset('formcss/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"/>
</head>
<body>

    {{-- <i class="fas fa-face-sad-tear"></i>
    <i class="fas fa-heart"></i>
    <i class="far fa-heart"></i>
    <i class="fab fa-facebook"></i>
    <i class="fab fa-facebook-f"></i>
    <i class="fab fa-facebook-square"></i>
    <i class="fab fa-snapchat"></i>
    <i class="fab fa-tiktok"></i> --}}



    <div class="container mt-5">
        <h2>Simple Contact Us Form</h2>
        {{-- @include('forms.errors') --}}
        <form action="{{ route('mail_data') }}" method="POST" class="card p-3" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" placeholder="Name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" />
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" />
                        @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="text" name="phone" placeholder="Phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" />
                        @error('phone')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Subject</label>
                        <input type="text" name="subject" placeholder="Subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject') }}" />
                        @error('subject')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label>CV</label>
                        <input type="file" name="cv" class="form-control @error('cv') is-invalid @enderror"/>
                        @error('cv')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="mb-3">
                        <label>Message</label>
                        <textarea rows="5" name="message" placeholder="Subject" class="form-control @error('message') is-invalid @enderror" >{{ old('message') }}</textarea>
                        @error('message')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <button class="btn btn-success px-5"> <i class="fas fa-paper-plane"></i> Send</button>
                </div>
            </div>

        </form>
    </div>

</body>
</html>
