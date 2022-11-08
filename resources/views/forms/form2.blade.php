<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form 2</title>
    <link href="{{ asset('formcss/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        textarea {
            resize: none;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Personal Information</h1>
        {{-- @dump($errors)
        @dump($errors->any())
        @dump($errors->all()) --}}

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <form action="{{ route('form2_data') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input id="inputname" type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" @error('name') autofocus @enderror
                value="{{ old('name') }}"
                />
                @error('name')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" />
                @error('email')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" value="{{ old('phone') }}" />
                @error('phone')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Start Learning</label>
                <input type="date" name="start" class="form-control @error('start') is-invalid @enderror" value="{{ old('start') }}" />
                @error('start')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>End Learning</label>
                <input type="date" name="end" class="form-control @error('end') is-invalid @enderror" value="{{ old('end') }}" />
                @error('end')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label>Gender</label> <br>
                <input type="radio" name="gender" @checked(old('gender') == 'Male') value="Male" id="male"> <label for="male">Male</label> <br>
                <label><input type="radio" value="Female" name="gender" {{ old('gender') == 'Female' ? 'checked' : '' }}> Female</label>
            </div>

            <div class="mb-3">
                <label>Level of Education</label>
                <select name="education" class="form-control">
                    <option  value="">-- Select --</option>
                    <option @selected(old('education') == 'Diplome') value="Diplome">Diplome</option>
                    <option @selected(old('education') == 'Bachelor') value="Bachelor">Bachelor</option>
                    <option @selected(old('education') == 'Master') value="Master">Master</option>
                    <option @selected(old('education') == 'phD') value="phD">phD</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Bio</label>
                <textarea name="bio" class="form-control @error('start') is-invalid @enderror" rows="5">{{ old('bio') }}</textarea>
                @error('bio')
                    <small class="invalid-feedback">{{ $message }}</small>
                @enderror
            </div>

            <button class="btn btn-success btn-send">Send</button>

        </form>
    </div>

    <script>

        var inputname = document.getElementById('inputname');
        let btn = document.querySelector('.btn-send')

        inputname.onkeyup = function() {
            // alert(55)

            let le = inputname.value.length;
            console.log(le);

            if(le >= 4 && le <= 20) {
                // inputname.classList.remove('is-invalid');
                // inputname.classList.add('is-valid');

                var letters = /^[A-Za-z]+$/;
                if(inputname.value.match(letters)){
                    inputname.classList.remove('is-invalid');
                    inputname.classList.add('is-valid');

                    btn.disabled = false;
                }else{
                    inputname.classList.remove('is-valid');
                    inputname.classList.add('is-invalid');
                    btn.disabled = true;
                }

            }else {
                inputname.classList.remove('is-valid');
                inputname.classList.add('is-invalid');

                btn.disabled = true;
            }

        }



    </script>

</body>
</html>
