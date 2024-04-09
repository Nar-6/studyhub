@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->


    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Creer une epreuve</h1>
                    <a href="{{ route('epreuve.index') }}" class="btn btn-primary btn-sm shadow-sm">Retour</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('epreuve.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="nomEp">Nom_epreuve</label>
                        <input type="text" class="form-control" id="nomEp" placeholder="nom de l'epreuve" name="nomEp" value="{{ old('nomEp')}}" />
                    </div>
                    <div class="form-group">
                        <label for="dateEp">Date_epreuve</label>
                        <input type="date" class="form-control" id="dateEp" placeholder="date Epreuve" name="dateEp" value="{{ old('dateEp')}}" />
                    </div>
                    <div class="form-group">
                        <label for="heurDeb">Heure_de_debut</label>
                        <input type="time" class="form-control" id="heurDeb" placeholder="heure de Debut" name="heurDeb" value="{{ old('heurDeb')}}" />
                    </div>
                    <div class="form-group">
                        <label for="heurFin">Heure de fin </label>
                        <input type="time" class="form-control" id="heurFin" placeholder="heure de Fin" name="heurFin" value="{{ old('heurFin')}}" />
                    </div>
                    <div class="form-group">
                        <label for="numProf">Nom du prof</label>
                        <select  id="numProf" class="block mt-1 rounded-md border-gray-300 w-full"
                              name="numProf" >
                            @foreach ($prof as $item)
                                <option value="{{ $item->numProf}}">{{ $item->nomProf}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="codFil">Filiere</label>
                        <select  id="codFil" class="block mt-1 rounded-md border-gray-300 w-full"
                              name="codFil">
                            @foreach ($filiere as $item)
                                <option value="{{ $item->codFil }}">{{ $item->libFil }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="codMat">Matiere</label>
                        <select  id="codMat" class="block mt-1 rounded-md border-gray-300 w-full"
                              name="codMat" ">
                            @foreach ($matiere as $item)
                                <option value="{{ $item->codMat }}">{{ $item->libMat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Creer une epreuve</button>
                </form>
            </div>
        </div>


    <!-- Content Row -->

</div>
@endsection
