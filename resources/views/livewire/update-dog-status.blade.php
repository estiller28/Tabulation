<div>
    <div class="row d-flex justify-content-center animate__animated animate__fadeInUp">
        <div class="col-lg-6">
            <div class="col-md-12 text-center mb-5">
                <h2> Update Dog Status</h2>
            </div>
            <div class="card-body">
                <form wire:submit.prevent="create" class="needs-validation" novalidate >
                    <div>
                        @if (session()->has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                    </div>

                    <div class="row justify-content-center">
                        <div class="mb-3 col-md-6">
                            <label for="exampleInputEmail1" class="form-label">Owner Name</label>
                            <input wire:model="owner_name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter your Name" aria-describedby="emailHelp">
                            @error('owner_name')
                            <div class="custom-error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3 col-md-6">
                            <label for="id_number" class="form-label">Dog ID Number</label>
                            <input wire:model="id_number" type="text" class="form-control" id="id_number" placeholder="Ex: XY-14803ee" aria-describedby="emailHelp">
                            @error('id_number')
                            <div class="custom-error">{{ $message }}</div>
                            @enderror
                        </div>

                        @if($verifyButton)
                            <div class="mb-3 row justify-content-between p-0">
                                <div style="text-align: right;">
                                    <button wire:click.prefetch="toggleDogStatus" type="button" class="btn btn-success">Verify Dog</button>
                                </div>
                            </div>
                        @endif
                    </div>

                    @if($contentIsVisible)
                        <div class="row justify-content-center">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Dog Status</label>
                                <select wire:model="status" class="form-select" id="exampleInputEmail1"  aria-describedby="emailHelp">
                                    <option value="" selected="selected">--select dog status--</option>
                                    @if($isHealthy)
                                        <option value="Healthy">Healthy</option>
                                    @endif
                                    @if($isWithIllness)
                                        <option value="With Illness">With Illness</option>
                                    @endif
                                    <option value="Deceased">Deceased</option>
                                </select>
                                @error('status')
                                <div class="custom-error">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="reason" class="form-label">Reason</label>
                                <div class="form-floating">
                                    <textarea wire:model="reason" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                    <label style="font-size: 15px;" for="floatingTextarea2">Type your reasons here.</label>
                                    @error('reason')
                                    <div class="custom-error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row justify-content-between p-0">
                                <div style="text-align: right;">
                                    <button type="submit" class="btn btn-success">Submit Request</button>
                                </div>
                            </div>
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
</div>
