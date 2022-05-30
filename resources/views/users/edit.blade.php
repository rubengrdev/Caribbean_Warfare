@extends('layouts.app_black')


@section('content')
<nav class="nav-login">
    <div class="login-location">
        <div class="location">
            <p>Edit Profile</p>
        </div>
    </div>
</nav>
<div class="container-auth">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(Auth::user()->role_id == 2)
                <div class="card-body">
                    <div class="card-header"><p>{{ __('Admin') }}</p></div>
                    <a href="{{ route('admin') }}">
                        <div class="form-group row mb-0  button-div">
                            <div class="col-md-6 offset-md-4 button-div">
                                <button class="btn btn-primary btn-action red">
                                    <p>{{ __('View Users') }}</p>
                                </button>
                            </div>
                        </div>
                    </a>
                </div>
                <br>
                @endif

                <div class="card-body">
                    <div class="card-header"><p>{{ __('Edit') }}</p></div>
                    <form method="POST" action="{{ route('user.update', Auth::user()) }}">
                        @method('PUT')
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right"><p>{{ __('Username') }}</p></label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ Auth::user()->username }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><p>{{ __('Email') }}</p></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>

                        <div class="form-group row mb-0 restore-pass">
                            <div class="col-md-8 offset-md-4  button-div">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                <p>{{ __('Modify Password') }}</p>
                                </a>
                                @endif
                            </div>
                        </div>
                        <br>
                        <div class="form-group row mb-0  button-div">
                            <div class="col-md-6 offset-md-4 button-div">
                                <button type="submit" class="btn btn-primary btn-action">
                                    <p>{{ __('Edit') }}</p>
                                </button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <hr>
                    <form method="POST" action="{{ route('user.destroy', Auth::user()) }}">
                        @method('DELETE')
                        @csrf

                        <div class="form-group row mb-0  button-div">
                            <div class="col-md-6 offset-md-4 button-div">
                                <button type="submit" class="btn btn-primary btn-action red">
                                    <p>{{ __('Delete Account') }}</p>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <br>



            </div>
        </div>
    </div>
</div>

<script>

    let selector = document.querySelector(".region-selector");
    fetch()
    .then(response => response.json())
    .then(data =>console.log(data));

    function getData(data){
        let selector = document.querySelector(".region-selector");
        for(let i = 0; i < data.length; i++){

            let option = document.createElement("option");
                option.value = data[i].id;
                option.text = data[i].region;
                selector.appendChild(option);
        }
    }
</script>
@endsection
