<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Bureau of Animal Industry"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    @livewireStyles
    <link href="{{ asset('home/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('home/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('home/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
</head>
<body>

<div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col-md-12 text-center mt-5">
            Republic of the Philippines
            <br>
            Province of Sorsogon
            <br>
            <b>MUNICIPALITY OF BULAN SORSOGON</b>
        </div>

    </div>
</div>


<div class="container" style="margin-top: 100px;">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th >Barangay</th>
            <th>Dog Name</th>
            <th>Id Number</th>
            <th>Owner Name</th>
            <th>Origin</th>
            <th>Breed</th>
            <th>Color </th>
            <th>Age </th>
            <th>Sex </th>
            <th>Sex Description </th>
            <th>Vaccines Taken </th>

        </tr>
        </thead>
        <tbody>
        @foreach($dogs as $dog)
            <tr>
                <td>{{ $dog->barangay_name }}</td>
                <td>{{ $dog->dog_name }}</td>
                <td>{{ $dog->id_number }}</td>
                <td>{{ $dog->owner_name }}</td>
                <td>{{ $dog->origin }}</td>
                <td>{{ $dog->breed }}</td>
                <td>{{ $dog->color }}</td>
                <td>{{ $dog->age }}</td>
                <td>{{ $dog->sex }}</td>
                <td>{{ $dog->sex_description }}</td>
                <td>{{ $dog->vaccines_taken }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>


<script src="{{ asset('home/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>


