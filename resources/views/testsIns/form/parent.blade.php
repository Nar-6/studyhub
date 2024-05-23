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
{{-- 
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
    </div> --}}
{{-- 
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
    </div> --}}
    <div class="form-group row">
        <label for="search" class="col-md-4 col-form-label text-md-right">Enfants</label>
        <div class="col-md-6">
            <input id="searchInput" type="text" class="form-control @error('searchInput') is-invalid @enderror" name="searchInput" value="{{ old('searchInput') }}" autocomplete="searchInput" autofocus  placeholder="Rechercher un enfant...">
        </div>
    </div>

    <div class="form-group row">
        <label for="searchSuggestions" class="col-md-4 col-form-label text-md-right"></label>
    
        <div class="col-md-6">
            <select id="searchSuggestions" type="text" class="form-control @error('enfants') is-invalid @enderror" name="enfants[]" multiple required autocomplete="enfants" autofocus>
                {{-- @foreach ($enfants as $enfant)
                    <option value="{{ $enfant->matricule}}">{{ $enfant->nom}} {{ $enfant->prenom}}</option>
                @endforeach --}}
            </select>
            @error('enfants')
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
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                Create User
            </button>
        </div>
    </div>

    <input type="hidden" name="role" value="{{ $role }}">
</form>
<style>
   
    #enfants {
        position: absolute;
        z-index: 10;
    }
</style>