@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card shadow">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-4 text-gray-800">Modifier un professeur</h1>
                    <a href="{{ route('professeur.index') }}" class="btn btn-primary btn-sm shadow-sm">Retour</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('professeur.update', $professeur->numProf) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nomProf">Nom du professeur</label>
                        <input type="text" class="form-control" id="nomProf" name="nomProf" value="{{ old('nomProf', $professeur->nomProf)}}" placeholder="Entrez le nom du professeur" />
                    </div>
                    <div class="form-group">
                        <label for="user_id">Utilisateur</label>
                        <select class="form-control" id="user_id" name="user_id">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ $user->id == $professeur->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
    </div>
</div>
@endsection
