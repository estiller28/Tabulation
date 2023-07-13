@extends('layouts.main')
@section('title', 'Candidates')

@section('content')
    <div class="container-fluid p-0">
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-sm-block">
                <h3><strong>Results</strong> </h3>
            </div>
        </div>
    </div>
    @livewire('tabulation.score-results')
@endsection
