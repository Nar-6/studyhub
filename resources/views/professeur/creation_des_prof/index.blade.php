@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">Professeurs</h6>
            <div class="ml-auto">
                <a href="{{ route('professeur.create') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">Nouveau professeur</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nom du professeur</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($professeurs as $professeur)
                            <tr data-entry-id="{{$professeur->numProf }}">
                                <td>

                                </td>
                                <td>{{ $loop->iteration }}</td>
                            <td>{{ $professeur->nomProf }}</td>
                            <td>
                                <a href="{{ route('professeur.edit', $professeur->numProf) }}" class="btn btn-info">
                                    <i class="fa fa-pencil-alt"></i>
                                </a>

                                <form action="{{ route('professeur.destroy', $professeur->numProf) }}" method="POST" style="display: inline;" id="supprimer{{ $loop->iteration }}" >
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;" type="submit" onclick="event.preventDefault();confirm('Voulez vous vraiment supprimer cet élément ?')?document.getElementById('supprimer{{ $loop->iteration }}').submit():''" class="btn" style="background-color:red !important; color:white !important">
                                                <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="text-center">Pas de professeurs</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
