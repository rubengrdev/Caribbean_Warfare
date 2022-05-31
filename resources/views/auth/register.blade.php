@extends('layouts.app_black')

@section('content')
<nav class="nav-login">
    <div class="login-location">
        <div class="location">
            <p>Register</p>
        </div>
    </div>
</nav>
<div class="container-auth">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <div class="card-body">
                    <div class="card-header"><p>{{ __('Register') }}</p></div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" tabindex="4" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" tabindex="5" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row align-items-start mb-3">
                            <div class="col-2">
                                <label  class="form-label">{{ __('Region') }}</label>
                            </div>
                            <div class="col-10 w-20">
                                <select class="form-select region-selector" name="region_id" aria-label="Default select example"  class="@error('region_id') is-invalid @enderror">
                                    <option disabled hidden selected>Select your region</option>

                                  </select>
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>





                        <div class="form-group row mb-0  button-div">
                            <div class="col-md-6 offset-md-4 button-div">
                                <button type="submit" class="btn btn-primary btn-action">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    let selector = document.querySelector(".region-selector");
    fetch(window.location + "/regions")
    .then(response => response.json())
    .then(data =>getData(data));

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
