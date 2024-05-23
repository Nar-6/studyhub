@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    Epreuve
                </h6>
                <div class="ml-auto">
                    <a href="{{ route('epreuve.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">Nouvelle epreuve</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-epreuve" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>No</th>
                                <th>Nom Epreuve</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($epreuves as $epreuve)
                            <tr data-entry-id="{{ $epreuve->numEp }}">
                                <td>

                                </td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $epreuve->nomEp }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('epreuve.edit', $epreuve->numEp) }}" class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>

                                        <form action="{{ route('epreuve.destroy', $epreuve->numEp) }}" id="supprimer{{ $loop->iteration }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" style="border-top-left-radius: 0;border-bottom-left-radius: 0;" type="submit" onclick="event.preventDefault();confirm('Voulez vous vraiment supprimer cet élément ?')?document.getElementById('supprimer{{ $loop->iteration }}').submit():''" class="btn" style="background-color:red !important; color:white !important">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">Pas d'epreuve</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <!-- Content Row -->

</div>
@endsection

