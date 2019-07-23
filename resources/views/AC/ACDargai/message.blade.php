@extends('layouts.courtDashboard')

@section('content')

@if(session('value') == 0)

   <center>No Case To Display.</center>
@else
@foreach($prod_data as $prod_data)

  <h1>{{$prod_data->case_title}}</h1>

@endforeach


@foreach($part_data as $part_data)

  <h1>{{$part_data->case_title}}</h1>

@endforeach


@foreach($regular as $regular_data)

  <h1>{{$regular_data->case_title}}</h1>

@endforeach

@endif
@endsection
