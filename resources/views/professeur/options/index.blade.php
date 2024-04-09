@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- Content Row -->
        <div class="card">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">Option</h6>
                <div class="ml-auto">
                    <a href="{{ route('option.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">Nouvelle option</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover datatable datatable-option" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th width="10">
                                </th>
                                <th>No</th>
                                <th>Question</th>
                                <th>option de reponse</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($options as $option)
                            <tr data-entry-id="{{ $option->id }}">
                                <td>

                                </td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $option->question->question_text }}</td>
                                <td>{{ $option->option_text}}</td>
                                <td>
                                    <div class="btn-group btn-group-sm">
                                        <a href="{{ route('option.edit', $option->id) }}" class="btn btn-info">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form id="supprimer{{ $loop->iteration }}" action="{{ route('option.destroy', $option->id) }}" method="POST">
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
                                <td colspan="7" class="text-center">Pas d'option</td>
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

