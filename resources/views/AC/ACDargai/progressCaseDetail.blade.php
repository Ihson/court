@extends('layouts.courtDashboard')

@section('content')


@foreach($prod_data as $prod_data)

<h2>  <a href=" {{ route('AcDargai.progressCaseStepDetail',['case_id' => $prod_data->Case_id , 'step_no' => $prod_data->step_no ]) }} ">{{$prod_data->step_title}}</a></h2>

@endforeach

@foreach($part_data as $part_data)

<h2>  <a href="{{ route('AcDargai.progressCaseStepDetail',['case_id' => $part_data->Case_id , 'step_no' => $part_data->step_no ]) }} ">{{$part_data->step_title}}</a></h2>

@endforeach

@foreach($regular_data as $regular_data)

<h2>  <a href="{{ route('AcDargai.progressCaseStepDetail',['case_id' => $regular_data->Case_id , 'step_no' => $regular_data->step_no ]) }} ">{{$regular_data->step_title}}</a></h2>

@endforeach

@endsection
