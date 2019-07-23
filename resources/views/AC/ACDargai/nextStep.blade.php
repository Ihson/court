@extends('layouts.courtDashboard')

@section('content')

<div class="container">

  <a href=" {{ route('AcDargai.defendentData',['id'=>$data->Case_id])}}" class="btn btn-info">Enter Defendent Information</a>

    <form  action="{{route('AcDargai.store')}}" method="POST">
      {{csrf_field()}}
     @if( $data->Case_type == 3)
          @foreach($r_data as $r_data)
                <center><h1>{{$r_data->case_title }}</h1></center>
                <h2 class="text-center">Step {!!$step_data->step_no!!}</h2>
                <input type="hidden" name="step" value="{{ $step }}" >
                <input type="hidden" name="case_title" value="{{ $r_data->case_title }}" >
                <div class="form-group">
                  <label for="title">Title:</label>
                  <input type="text" name="step_title" class="form-control">

                </div>
          @endforeach

     @endif

@if($data->Case_type == 1 || $data->Case_type == 2)

  @if($data->Case_type == 1)
    @foreach($case_data as $case_data)
       <center><h1>{{$case_data->case_title}}</h1></center>
       <input type="hidden" name="case_title" value="{{ $case_data->case_title }}" >
    @endforeach
  @endif

  @if($data->Case_type == 2)
  @foreach($case_data as $case_data)
     <center><h1>{{$case_data->case_title}}</h1></center>
     <input type="hidden" name="case_title" value="{{ $case_data->case_title }}" >
  @endforeach
  @endif

   <h2 class="text-center">Step {!!$step_data->step_no!!}  :  {{ $step_data->title }}</h2>
   <input type="hidden" name="step_title" value="{{ $step_data->title }}" >

   <input type="hidden" name="step_no" value="{{ $step_data->step_no }}" >

@endif

@include('includes.error')






        <div class="form-group">

          <input type="hidden" name="Case_id" value="{{ $data->Case_id}}" >


          <label for="details">Step Description:</label>
          <textarea name="details" rows="15" cols="152" class="form-control"></textarea>

        </div>

        <div class="form-group">

          <label for="ordersheet">Generete The Order Sheet</label>
          <textarea name="ordersheet" rows="5" cols="80" class="form-control"></textarea>

        </div>

        <div class="form-group">

          <label for="remarks">Any Remarks</label>
          <textarea name="remarks" rows="2" cols="50" class="form-control" placeholder="Remarks (optional)"></textarea>

        </div>

        <div class="form-group">

          <label for="hearingDate">Set Next Hearing Date</label>
          <input type="date" name="hearingDate" class="form-control" >

        </div>

        <div class="form-group">

          <button type="submit" name="button" class="btn btn-default">submit</button>

        </div>


    </form>


</div>

@endsection
