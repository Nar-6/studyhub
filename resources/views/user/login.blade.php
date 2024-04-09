@extends('./../layouts.app')

@section('page-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Connexion') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login.post') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">{{ __('Adresse e-mail') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe :</label>
                            <input class="form-control mt-2" type="password" id="password"
                            placeholder="Mot de passe" name="password"  class="form-control @error('password') is-invalid @enderror"  value="{{ old('password') }}" required autocomplete="password" autofocus>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember_token" id="remember_token" {{ old('remember_token') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember_token">
                                        {{ __('Se souvenir de moi?') }}
                                    </label>
                                </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Se connecter') }}
                        </button>
                        <p class="mt-2">Mot de passe oublié ?  <a href="{{route('password.request')}}">Réninitialiser votre mot de passe !</a></p>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection






