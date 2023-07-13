<div>
    <div class="card-body">
        <div class="col-md-5 col-lg-3">
            <form wire:submit.prevent="CreateUser" class="row needs-validation" novalidate>
                <div class="mb-3">
                    <label for="validationCustom01" class="form-label">Barangay Name</label>
                    <input type="text" wire:model="barangay_name" class="form-control  @error('barangay_name') is-invalid @enderror"  required aria-describedby="validationServer03Feedback">
                    @error('barangay_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="validationCustom02" class="form-label">Name</label>
                    <input type="text" wire:model.debounce.500ms="name" class="form-control @error('name') is-invalid @enderror" required aria-describedby="validationServer03Feedback">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>

                <div class="mb-3">
                    <label for="validationCustom02" class="form-label">Email</label>
                    <input type="email" wire:model.debounce.500ms="email" class="form-control @error('email') is-invalid @enderror"  required aria-describedby="validationServer03Feedback">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="validationCustom02" class="form-label">Password</label>
                    <input type="password" wire:model.debounce.500ms="password" class="form-control @error('password') is-invalid @enderror"  required aria-describedby="validationServer03Feedback">
                    @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>
                <div class="mb-3">
                    <label for="validationCustom02" class="form-label">Confirm password</label>
                    <input type="password" wire:model.debounce.500ms="password_confirmation" class="form-control  @error('password_confirmation') is-invalid @enderror" required aria-describedby="validationServer03Feedback">
                    @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <div class="mr-2"></div>
                    <div class="d-flex mt-3 gap-2 py-2">
                        <a href="{{ route('users.index') }}" class="btn btn-light btn-sm-block">Cancel</a>
                        <button type="submit"  class="btn btn-primary btn-sm-block">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
