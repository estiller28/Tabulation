<div>
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Add new candidate.
                    </div>
                </div>
                <div class="card-body">
                    <div class="form">
                        <form wire:submit.prevent="create">
                            <div class="form-group mb-2">
                                <label for="name">Name:</label>
                                <input wire:model="name" type="text" class="form-control  @error('name') is-invalid @enderror">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="name">Candidate number:</label>
                                <input wire:model="candidate_number" type="number" class="form-control @error('candidate_number') is-invalid @enderror">
                                @error('candidate_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <div wire:ignore class="col-md-12">
                                    <div id="img-preview"></div>
                                </div>
                                <label for="name">Photo:</label>
                                <input wire:model="photo" class="form-control @error('photo') is-invalid @enderror" type="file"  accept="image/jpeg" id="image" name="photo">
                                @error('photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
