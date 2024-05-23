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
                    <h1 class="h3 mb-0 text-gray-800">Creer une question </h1>
                    <a href="{{ route('question.index') }}" class="btn btn-primary btn-sm shadow-sm">Retour</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('question.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label for="numEp">epreuve</label>
                        <select class="form-control" name="epreuve_numEp" id="numEp">
                            @foreach($epreuves as $numEp => $epreuve)
                                <option value="{{ $numEp }}">{{ $epreuve }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="question_text">question test</label>
                        <input type="text" class="form-control" id="question_text" placeholder="question text" name="question_text" value="{{ old('question_text') }}" />
                    </div>
                    <div class="form-group">
                        <label for="reponse_text">Reponse a la quesion</label>
                        <input type="text" class="form-control" id="reponse_text" placeholder="reponse a la question" name="reponse_text" value="{{ old('reponse_text') }}" />
                    </div>
                    <div class="form-group">
                        <label for="points">Point</label>
                        <input type="number" class="form-control" id="points" placeholder="Point de la question" name="points" value="{{ old('points') }}" />
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Creer la question</button>
                </form>
            </div>
        </div>


    <!-- Content Row -->

</div>
@endsection
