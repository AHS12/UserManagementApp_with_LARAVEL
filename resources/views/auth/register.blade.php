@extends('layouts.form')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div> --}}

                <div class="form-group row {{ $errors->has('name') ? ' has-error' : '' }}">

                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                    <div class="col-md-6">

                        @if(!empty($name))

                        <input id="name" type="text" class="form-control" name="name" value="{{$name}}" required
                            autofocus>

                        @else

                        <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required
                            autofocus>

                        @endif

                        @if ($errors->has('name'))

                        <span class="help-block">

                            <strong>{{ $errors->first('name') }}</strong>

                        </span>

                        @endif

                    </div>

                </div>

                <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}">

                    <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                    <div class="col-md-6">

                        @if(!empty($email))

                        <input id="email" type="email" class="form-control" name="email" value="{{$email}}" required>

                        @else

                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"
                            required>

                        @endif

                        @if ($errors->has('email'))

                        <span class="help-block">

                            <strong>{{ $errors->first('email') }}</strong>

                        </span>

                        @endif

                    </div>

                </div>











                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm"
                        class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="datetimepicker5"
                        class="col-md-4 col-form-label text-md-right">{{ __('Birth Date') }}</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control datetimepicker-input" id="birthDate" name="birthDate"
                            data-toggle="datetimepicker" data-target="#birthDate" autocomplete="off" required />
                        @error('birthDate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <script type="text/javascript">
                        $(function () {
                            $('#birthDate').datetimepicker({
                                format: 'yy/mm/dd'
                            });
                        });

                    </script>

                </div>

                <div class="form-group row">
                    <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                    <div class="col-md-4 col-form-label">
                        <script type="text/javascript">
                            var loadFile = function (event) {
                                var output = document.getElementById('preview');
                                output.src = URL.createObjectURL(event.target.files[0]);
                                //for canceling the hide from remove preview
                                $("#preview").show();
                            };

                            function removePreview() {
                                $("#preview").hide();
                                $("#image").val('');
                            }

                        </script>

                        <input class="btn " type="file" id="image" name="image" onchange="loadFile(event)">
                        <button class="btn btn-outline-danger" type="button" onclick="removePreview()">Remove
                            Preview</button> <br>
                        <img width="240" height="240" id="preview" src="#" alt=""> <br>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 offset-md-4">
                        @include('errors')
                    </div>
                </div>

                </form>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Register With</label>
                    <div class="col-md-6">
                        <a href="{{ url('login/facebook') }}" class="btn btn-social-icon btn-facebook"><i
                                class="fa fa-facebook"></i></a>
                        {{-- <a href="{{ url('login/twitter') }}" class="btn btn-social-icon btn-twitter"><i
                            class="fa fa-twitter"></i></a> --}}
                        <a href="{{ url('login/google') }}" class="btn btn-social-icon btn-google-plus"><i
                                class="fa fa-google-plus"></i></a>

                        <a href="{{ url('login/github') }}" class="btn btn-social-icon btn-github"><i
                                class="fa fa-github"></i></a>
                        {{-- <a href="{{ url('login/linkedin') }}" class="btn btn-social-icon btn-linkedin"><i
                            class="fa fa-linkedin"></i></a>

                        <a href="{{ url('login/bitbucket') }}" class="btn btn-social-icon btn-bitbucket"><i
                                class="fa fa-bitbucket"></i></a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
