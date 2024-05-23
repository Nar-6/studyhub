<form method="POST" action="{{ route('users.store') }}">
    @csrf

    <div class="form-group row">
        <label for="nom" class="col-md-4 col-form-label text-md-right">Nom</label>

        <div class="col-md-6">
            <input id="nom" type="text" class="form-control @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

            @error('nom')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="prenom" class="col-md-4 col-form-label text-md-right">Prenom</label>

        <div class="col-md-6">
            <input id="prenom" type="text" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

            @error('prenom')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="sexe" class="col-md-4 col-form-label text-md-right">Sexe</label>

        <div class="col-md-6">
            <select id="sexe" type="text" class="form-control @error('sexe') is-invalid @enderror" name="sexe" value="{{ old('sexe') }}" required autocomplete="sexe" autofocus>
               <option value="Masculin">Masculin</option>
               <option value="Feminin">Feminin</option>
            </select>
            @error('sexe')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="filiere" class="col-md-4 col-form-label text-md-right">Filiere</label>

        <div class="col-md-6">
            <select id="filiere" type="text" class="form-control @error('filiere') is-invalid @enderror" name="filiere" value="{{ old('filiere') }}" required autocomplete="filiere" autofocus>
                @foreach ($filieres as $filiere)
                    <option value="{{ $filiere->codFil}}">{{ $filiere->codFil}}</option>
                @endforeach
            </select>
            @error('filiere')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">Email Address</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
{{--     
    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

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
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
    </div>
--}}
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                Create User
            </button>
        </div>
    </div>

    <input type="hidden" name="role" value="{{ $role }}">
</form>