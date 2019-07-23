@extends('layouts.reception')

@section('content')

	<style type="text/css">

    .container{

			width: 80%;
			margin-top: 10px;
    }

		p{
			color: solid black;
      font-size: 17px;
		}


    h3{
      color: grey;
    }



	</style>

	<div class="container">

      @if(Auth::user()->tehsil == 'adc')
			<center>	<h1>Additional Deputy Commissioner Court</h1></center><br>
      @elseif( Auth::user()->tehsil != 'adc')
			<center>	<h1>{{ Auth::user()->tehsil }}</h1></center><br>
			@endif


     <h4><p>Case No : {{ $case_data->Case_id }} </p></h4>
	   <h4><p>Case Title : {{ $data->case_title }} </p></h4>






			<h3>Plaintiff Details:</h3>

            <p>Name : {{ $p_data->name }} </p>
            <p>Address : {{ $p_data->address }} </p>
            <p> Phone No : {{ $p_data->phone_no }} </p>

	     <h3>Defendent Details:</h3>

            <p>Name : {{ $d_data->name }} </p>
            <p>Address : {{ $d_data->address }} </p>
            <p>Case Description : {{ $data->details }} </p>
				    <p>Lawyer Name : {{ $l_data->name }} </p>


	</div>


<script type="text/javascript" href="jquery.js"></script>
<script type="text/javascript" href="js/bootstrap.js"></script>

@endsection
