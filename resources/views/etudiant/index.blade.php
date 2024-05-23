@extends('layouts.etudiant')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Résultats des épreuves</div>

                <div class="card-body">
                    @foreach($users as $user)
                        <h5>{{ $user->name }}</h5>
                        <ul>
                            @foreach($user->results as $result)
                                <li>{{ $result->epreuve->nomEp }} - Score: {{ $result->total_points }}/20</li>
                            @endforeach
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
