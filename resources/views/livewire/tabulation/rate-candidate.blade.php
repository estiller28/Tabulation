<div>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-3">
            <div class="card">
                <img class="card-img-top" src="{{ asset('/storage/'. $candidate->photo)  }}">
                <div class="card-body">
                    <h2 class="text-bold"> <strong>Candidate No. {{ $candidate->candidate_number }}</strong></h2>
                    <h3 class="card-title">{{ $candidate->name }}</h3>
                    <div class="row">
                        <form wire:submit.prevent="rate">
                            @if($casualWear)
                                <div class="form-group mb-3">
                                    <label for="">Rate Casual Wear:</label>
                                    <select wire:model="score" class="form-select @error('score') is-invalid @enderror" name="" id="">
                                        <option value="">--select score--</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    @error('score')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif


                            @if($summerWear)
                                <div class="form-group mb-3">
                                    <label for="">Summer Wear:</label>
                                    <select wire:model="score" class="form-select @error('score') is-invalid @enderror" name="" id="">
                                        <option value="">--select score--</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    @error('score')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif

                            @if($filipinana)
                                <div class="form-group mb-2">
                                    <label for="">Filipiñana</label>
                                    <select wire:model="score" class="form-select @error('score') is-invalid @enderror" name="" id="">
                                        <option value="">--select score--</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    @error('score')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror

                                </div>
                            @endif

                            @if($topFive)
                                <div class="form-group mb-2">
                                    <label for="">Top 5 Question and Answer:
                                    </label>
                                    <select wire:model="score" class="form-select @error('score') is-invalid @enderror" name="" id="">
                                        <option value="">--select score--</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    @error('score')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif

                            @if($topThree)
                                <div class="form-group mb-3">
                                    <label for="">Top 3 Q & A:
                                    </label>
                                    <select wire:model="score" class="form-select @error('score') is-invalid @enderror" name="" id="">
                                        <option value="">--select score--</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                    @error('score')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif
                            <div class="form-group d-flex justify-content-between">
                                <a href="{{ route('candidates.index') }}" type="button" class="btn btn-light">Go Back</a>
                                <button class="btn btn-success">Submit Rating</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
