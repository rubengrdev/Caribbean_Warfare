@extends('layouts.app_black')

@section('content')
<div class="container-auth">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <div class="card-body">
                    <div class="card-header"><p>{{ __('Register') }}</p></div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><p>{{ __('Name') }}</p></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><p>{{ __('E-Mail Address') }}</p></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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



                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><p>{{ __('Password') }}</p></label>

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
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><p>{{ __('Confirm Password') }}</p></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>





                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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
