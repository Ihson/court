@extends('layouts.courtDashboard')

@section('content')


@foreach($data as $data)


<h2>{{ $data->case_title}}</h2> <br>

<h2>{{ $data->step_title}}</h2><br>

<h2>{{ $data->details}}</h2><br>

<h2>{{ $data->order_sheet}}</h2><br>

<h2>{{ $data->remarks}}</h2><br>


@endforeach

@endsection
