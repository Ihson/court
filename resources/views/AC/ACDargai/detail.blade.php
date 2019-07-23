
@extends('layouts.courtDashboard')

@section('content')

  <style type="text/css">
   .inline {
    display: inline-block;
    }
  </style>




 <!-- mian text -->

 @if(Auth::user()->tehsil == 'adc')
 <center>	<h1>Additional Deputy Commissioner Court</h1></center><br>
 @elseif( Auth::user()->tehsil != 'adc')
 <center>	<h1>{{ Auth::user()->tehsil }}</h1></center><br>
 @endif
    <h2 style="margin-left:100px;"><p>Case No : {{ $case_data->Case_id }} </p></h2>
    <h2 style="margin-left:100px;"><p> {!! $data->case_title !!} </p></h2>
<!-- <div>
<div class="inline" style="margin-left:100px;">
    <h2><p>Case No : {{ $case_data->Case_id }} </p></h2>
  </div>
</div>

<div>
  <div class="inline" style="margin-left:100px;">
     <h2><p> {!! $data->case_title !!} </p></h2>
  </div>
</div> -->



<div class="inline" style="margin-left:100px;">
     <h3>Plaintiff Details:</h3>

           <p>Name : {{ $p_data->name }} </p>
           <p>Address : {{ $p_data->address }} </p>
           <p> Phone No : {{ $p_data->phone_no }} </p>
  </div>


<div class="inline" style="margin-left:400px;">
  <h3>Defendent Details:</h3>

       <p>Name : {{ $d_data->name }} </p>
       <p>Address : {{ $d_data->address }} </p>

       <p>Lawyer Name : {{ $l_data->name }} </p>
</div>

<div>
  <div class="inline" style="margin-left:100px;">
    <h3>Case Description</h3>
  <p> {{ $data->details }} </p>
</div>
</div>

 <!--@include('includes.header')


<style>
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
</head>
<body>
	<div class="container">


			<center>	<h1> Tehsil Dargai</h1></center><br>



     <h4><p>Case No : {{ $case_data->Case_id }} </p></h4>
	   <h4><p>Case Title : {!! $data->case_title !!} </p></h4>






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
</body>
</html> -->
@endsection
