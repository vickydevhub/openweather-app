@extends('layouts.app')

@section('content')
    <h1>Cities</h1>

    <a href="{{ route('cities.create') }}" class="btn btn-primary mb-3">Create City</a>

    <a href="{{ route('cities.weather') }}" class="btn btn-primary mb-3">All Cities Weather data</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>City</th> 
                <th>Weather</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($weatherData as $city => $data)
            @php
                 $five_days_data = [];
            @endphp
                <tr>
                    
                    <td>{{ $city }}</td>
                    <td>
                        <table class="table table-bordered">
                          <th colspan="3">5 days Weather</th>
                          <tr>
                            @foreach ($data['list'] as $weather)
                            @php
                               $date = date('Y-m-d',strtotime($weather['dt_txt']));
                                if(!in_array( $date,$five_days_data)) {
                                $five_days_data[]= $date;
                            @endphp
                                @include('weather.each-item', ['date' => $date,'weather'=>$weather])
                            @php  }  @endphp    
                            @endforeach
                          </tr>
                        </table>
                      </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection