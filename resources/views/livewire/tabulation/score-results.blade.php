<div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            @if($casualWearResults)
                <div class="col-lg-4">
                    <div class="card-header">
                        <div class="card-title">
                            1. Casual Wear
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th width="10" scope="col">Rank</th>
                                    <th width="350" scope="col">Candidate</th>
                                    <th scope="col">Total Score</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($casualWearResults as $results)
                                    <tr>
                                        <td>{{$i++ }}</td>
                                        <td>Candidate # {{ $results->candidate_number }} - <strong>{{ $results->name }}</strong></td>
                                        <td style="background-color: #9BE8D8;">
                                            @if(!empty($results->average_score))
                                                <strong>{{ number_format($results->average_score, 2)}}</strong>
                                            @else
                                                --
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif

            @if($summerWearResults)
                <div class="col-lg-4">
                    <div class="card-header">
                        <div class="card-title">
                            2. Summer Wear
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th width="10" scope="col">Rank</th>
                                    <th width="350" scope="col">Candidate</th>
                                    <th scope="col">Total Score</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($summerWearResults as $results)
                                    <tr>
                                        <td>{{$i++ }}</td>
                                       <td>Candidate # {{ $results->candidate_number }} - <strong>{{ $results->name }}</strong></td>
                                        <td style="background-color: #9BE8D8;">
                                            @if(!empty($results->average_score))
                                                <strong>{{ number_format($results->average_score, 2)}}</strong>
                                            @else
                                                --
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif

            @if($filipinanaResults)
                <div class="col-lg-4">
                    <div class="card-header">
                        <div class="card-title">
                            3. Filipinana
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th width="10" scope="col">Rank</th>
                                    <th width="350" scope="col">Candidate</th>
                                    <th scope="col">Total Score</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($filipinanaResults as $results)
                                    <tr>
                                        <td>{{$i++ }}</td>
                                       <td>Candidate # {{ $results->candidate_number }} - <strong>{{ $results->name }}</strong></td>
                                        <td style="background-color: #9BE8D8;">
                                            @if(!empty($results->average_score))
                                                <strong>{{ number_format($results->average_score, 2)}}</strong>
                                            @else
                                                --
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif

            @if($topFiveResults)
                <div class="col-lg-4">
                    <div class="card-header">
                        <div class="card-title">
                            4.  Top 5 Question and <Answer></Answer>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th width="10" scope="col">Rank</th>
                                    <th width="350" scope="col">Candidate</th>
                                    <th scope="col">Total Score</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($topFiveResults as $results)
                                    <tr>
                                        <td>{{$i++ }}</td>
                                       <td>Candidate # {{ $results->candidate_number }} - <strong>{{ $results->name }}</strong></td>
                                        <td style="background-color: #9BE8D8;">
                                            @if(!empty($results->average_score))
                                                <strong>{{ number_format($results->average_score, 2)}}</strong>
                                            @else
                                                --
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif

            @if($topThreeResults)
                <div class="col-lg-4">
                    <div class="card-header">
                        <div class="card-title">
                            5. Top 3 Question and Answer
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th width="10" scope="col">Rank</th>
                                    <th width="350" scope="col">Candidate</th>
                                    <th scope="col">Total Score</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($topThreeResults as $results)
                                    <tr>
                                        <td>{{$i++ }}</td>
                                       <td>Candidate # {{ $results->candidate_number }} - <strong>{{ $results->name }}</strong></td>
                                        <td style="background-color: #9BE8D8;">
                                            @if(!empty($results->average_score))
                                                <strong>{{ number_format($results->average_score, 2)}}</strong>
                                            @else
                                                --
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
