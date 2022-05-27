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


                <div class="card-body">
                    <div class="card-header"><p>{{ __('Edit') }}</p></div>
                    <form method="POST" action="{{ route('user.update', Auth::user()) }}">
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



                        <div class="row align-items-start mb-3">
                            <div class="col-2">
                                <label  class="form-label" for="contents"><p>{{ __('Region') }}</p></label>
                            </div>
                            <div class="col-10 w-20">
                                <select class="form-select region-selector" name="region_id" aria-label="Default select example"  class="@error('region_id') is-invalid @enderror">
                                    <option disabled hidden selected>Select your region</option>

                                  </select>
                            </div>
                        </div>
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
                        <div class="form-group row mb-0  button-div">
                            <div class="col-md-6 offset-md-4 button-div">
                                <button type="submit" class="btn btn-primary btn-action red">
                                    <p>{{ __('Delete Account') }}</p>
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
