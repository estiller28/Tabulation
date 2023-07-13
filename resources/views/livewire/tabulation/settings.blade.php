<div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Setup rating steps
                    </div>
                </div>
                <div class="card-body">
                    <div class="form">
                        <form wire:submit.prevent="create">
                            @foreach($criterias as $criteria)
                                <div class="form-group mb-3">
                                    <div class="form-check form-switch">
                                        <input
                                            wire:model="status.{{ $criteria->id }}"
                                            class="form-check-input"
                                            value="{{ $criteria->status }}"
                                            type="checkbox"
                                            id="flexSwitchCheckDefault{{ $criteria->id }}"
                                            {{ $criteria->status === 1 ? 'checked' : '' }}
                                        >
{{--                                        {{$criteria->status}}--}}
                                        <label class="form-check-label" for="flexSwitchCheckDefault{{ $criteria->id }}">{{ $criteria->name }}</label>
                                    </div>
                                </div>
                            @endforeach
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
