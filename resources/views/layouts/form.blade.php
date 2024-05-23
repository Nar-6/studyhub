<div class="" style="width: 35%;float:left;height:100vh;margin-right:40px">
</div>
<div class="container my-4">
    <h2> @yield('titleform')</h2>

    <hr style="width: 500px">


    <form action="@yield('form_action')" method="POST">

        @csrf
        @method($etudiant->matricule ? 'PUT' : 'POST')
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" style="width: 500px" class="form-control" name="nom" value={{ old('nom', $etudiant->nom)
            }}> <br>
            @error('nom')
            {{$message}}
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label" for="prenom">Prenom</label>
            <input class="form-control" type="text" style="width: 500px" class="form-control" name="prenom" value={{ old('prenom',
                $etudiant->prenom) }}> <br>
            @error('prenom')
            {{$message}}
            @enderror
        </div>
        <div class="form-group">
            <label class="form-label" for="sexe">Sexe</label>
            <select class="form-select" style="width: 500px" name="sexe">
                <option value="">Sélectionnez le sexe</option>
                <option value="M" {{ old('sexe', $etudiant->sexe) === 'M' ? 'selected' : '' }}>Masculin</option>
                <option value="F" {{ old('sexe', $etudiant->sexe) === 'F' ? 'selected' : '' }}>Féminin</option>
            </select>
            @error('sexe')
            {{$message}}
            @enderror
        </div>


        <div class="form-group">
            <label for="numero">Numero</label>
            <input type="tel" style="width: 500px" class="form-control" name="numero" value={{
                old('numero',$etudiant->numero) }}> <br>
            @error('numero')
            {{$message}}
            @enderror
        </div>


        <button class="btn " style="background-color: rgb(232, 127, 79)">
            @yield('actionButton')
        </button>

    </form>
</div>
