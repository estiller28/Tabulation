<div wire:init="loadCandidates">
    <div class="container-fluid">
        <div class="row d-flex justify-content-end mb-4">
            <div>
                @if($user->id == auth()->user()->id)
                    @if(count($candidates) < 9)
                        <a href="{{route('candidates.create')}}" class="btn btn-primary">Add Candidate</a>
                    @endif
                @endif
            </div>
        </div>
        <div class="row d-flex justify-content-center text-center mb-5">
            <div class="col-lg-6">
                @if(count($candidates) == 5)
                    <h1><strong>Top 5 </strong></h1>
                @elseif(count($candidates) == 3)
                    <h1><strong>Top 3 </strong></h1>
                @endif
            </div>
        </div>

        @php
            $col = 'justify-content-center';
            if (count($candidates) == 3){
                $col = 'justify-content-center';
            }else{
                $col = 'justify-content-start';
            }
        @endphp

        <div class="row d-flex {{$col}}">
            @foreach($candidates as $candidate)
                <div class="col-lg-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('/storage/'. $candidate->photo)  }}">
                        <div class="card-body">
                            <h2 class="text-bold"> <strong>Candidate No. {{ $candidate->candidate_number }}</strong></h2>
                            <h3 class="card-title">{{ $candidate->name }}</h3>
                            <div class="row">
                                <div class="d-flex justify-content-between">
                                    @if($user->id == auth()->user()->id)
                                        <button wire:click="remove({{ $candidate->id }})" class="btn btn-danger">Remove</button>
                                    @endif
                                    @if($casualWear)
                                        <a href="{{ url('tabulation/'. $candidate->id) .'/rate' }}" class="btn btn-primary">Rate Casual Wear</a>
                                    @endif
                                    @if($summerWear)
                                        <a href="{{ url('tabulation/'. $candidate->id) .'/rate' }}" class="btn btn-primary">Rate Summer Wear</a>
                                    @endif
                                    @if($filipinana)
                                        <a href="{{ url('tabulation/'. $candidate->id) .'/rate' }}" class="btn btn-primary">Rate Filipiñana</a>
                                    @endif
                                    @if($topFive)
                                        <a href="{{ url('tabulation/'. $candidate->id) .'/rate' }}" class="btn btn-primary">Rate Top 5 Q and A</a>
                                    @endif
                                    @if($topThree)
                                        <a href="{{ url('tabulation/'. $candidate->id) .'/rate' }}" class="btn btn-primary">Rate Top 3 Q & A</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
