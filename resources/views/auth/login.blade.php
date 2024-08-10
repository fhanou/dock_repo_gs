@extends('layouts.app')

@section('content')

<div class="panel-heading">
    <a href="index3.html" class="brand-link">
        <center><img src="{{ asset('images/logo_men.png') }}"></center>
    </a>
    <h4 style="text-align: center;">MINISTERE DE L'EDUCATION NATIONALE</h4>
    <hr>
    <div class="row">
        <br>
        <div class="col-xs-6">
            <a href="#" class="active" id="login-form-link">{{ __('Authentification') }}</a>
        </div>
        <div class="col-xs-6">
            <a href="#" id="register-form-link">{{ __('Inscription') }}</a>
        </div>
        <br>
        <hr>
    </div>
      
</div>
<div class="panel-body">
    <div class="row">
        <div class="col-lg-12">
            <!-- forme authentification -->
            <form method="POST" action="{{ route('login') }}" id="login-form" role="form" style="display: block;">
                @csrf
                <div class="form-group row">
                    <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                    <div class="col-md-9">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Mots de passe') }}</label>

                    <div class="col-md-9">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-8 col-sm-offset-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Enregistrer les infos') }}
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-sm-8 col-sm-offset-4">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Se connecter') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Mots de passe oublier?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </form>
            <!--  forme inscription -->

            <form method="POST" action="{{ route('register') }}" id="register-form" role="form" style="display: none;">
                @csrf

                <div class="form-group row">
                    <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Nom') }}</label>

                    <div class="col-md-9">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="fonction" class="col-md-3 col-form-label text-md-right">{{ __('Fonction') }}</label>

                    <div class="col-md-9">
                        <select id="fonction" type="text" class="form-control @error('fonction') is-invalid @enderror" name="fonction" value="{{ old('fonction') }}" required autocomplete="fonction" autofocus>
                            <option value="0">-------Choisi-------</option>
                            <option value="Ati">ATI</option>
                            <option value="Directeur">DIRECTEUR</option>
                            <option value="Proviseur">PROVISEUR</option>
                            <option value="Secretaire">SECRETAIRE</option>
                        </select>

                        @error('fonction')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                    <div class="col-md-9">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Mots de passe') }}</label>

                    <div class="col-md-9">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('Confirmation du mots de passe') }}</label>

                    <div class="col-md-9">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-sm-7 col-sm-offset-5">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Inscrire') }}
                        </button>
                    </div>
                </div>
            </form>

            
        </div>
    </div>
</div>
@endsection

