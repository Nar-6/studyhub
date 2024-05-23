@extends('layouts.admin')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Résultats des épreuves</h1>
    </div>

    <!-- Card -->
    <div class="card">
        <div class="card-body">
            @foreach($epreuves as $epreuve)
                <div class="mb-3">
                    <h5>{{ $epreuve->nomEp }}</h5>
                    <ul>
                        @foreach($epreuve->results as $result)
                            <li>{{ $result->user->name }} - Score: {{ $result->total_points }}/20</li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
