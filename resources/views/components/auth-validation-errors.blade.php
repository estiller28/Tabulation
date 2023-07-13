@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="fs-5 badge bg-danger">
            @foreach ($errors->all() as $error)
                <strong class="text-white">  {{$error}}</strong>
            @endforeach
        </div>
    </div>
@endif
