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
                    <h1 class="h3 mb-0 text-gray-800">Modification d'une option de modification</h1>
                    <a href="{{ route('option.index') }}" class="btn btn-primary btn-sm shadow-sm">Retour</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('option.update', $option->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="question">Question</label>
                        <select class="form-control" name="question_id" id="question">
                            @foreach($questions as $id => $question)
                            <option {{ $id == $option->question->id ? 'selected' : null }} value="{{ $id }}">{{ $question }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="option_text">Option de reponse</label>
                        <input type="text" class="form-control" id="option_text" placeholder="Option de reponse" name="option_text" value="{{ old('option_text', $option->option_text) }}" " />
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" >Enregistrer la modification</button>
                </form>
            </div>
        </div>


    <!-- Content Row -->

</div>
@endsection
