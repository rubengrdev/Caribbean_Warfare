@extends('layouts.app_black')

@section('content')
<div class="container-auth">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">


                <div class="card-body">
                    <div class="card-header"><p>{{ __('Login') }}</p></div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><p>{{ __('E-Mail Address') }}</p></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><p>{{ __('Password') }}</p></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0 restore-pass">
                            <div class="col-md-8 offset-md-4  button-div">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                <p>{{ __('Forgot Your Password?') }}</p>
                                </a>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row div-remember">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span></span>
                                    <label class="form-check-label" for="remember">
                                        <p>{{ __('Remember Me') }}</p>
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group row mb-0  button-div">
                            <div class="col-md-8 offset-md-4  button-div">
                                <button type="submit" class="btn btn-primary btn-action">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>








                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
