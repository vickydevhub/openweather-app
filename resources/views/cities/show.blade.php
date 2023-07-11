@extends('layouts.app')

@section('content')
    <h1>City Details</h1>

    <table class="table">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $city->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $city->name }}</td>
            </tr>
            <tr>
                <th>Weather</th> 
                <td>
                    <table class="table table-bordered">
                        <th colspan="3">5 days Weather</th>
                        <tr>
                          @foreach ($weather['list'] as $data)
                          @php
                             $date = date('Y-m-d',strtotime($data['dt_txt']));
                              if(!in_array( $date,$five_days_data)) {
                              $five_days_data[]= $date;
                          @endphp
                              @include('weather.each-item', ['date' => $date,'weather'=>$data])
                          @php  }  @endphp    
                          @endforeach
                        </tr>
                      </table>
                </td> 
            </tr>
            
        </tbody>
    </table>

    <a href="{{ route('cities.index') }}" class="btn btn-primary">Back</a>
@endsection