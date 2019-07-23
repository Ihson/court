@extends('layouts.reception')

@section('content')

<style>

    .container{
      background: #e7eaed;
      width: 70%;
    }

		label{
			color: solid black;
      font-size: 20px;
		}


    h1{
      color: solid black;
    }
    body{
      background: #bcbcbc;
    }
    #but{
      margin-left: 50px;
    }


	</style>


	<div class="container">
    <div class="row">

    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">

      <h1>Welcome to the Reception Desk</h1><br>

    </div>
    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
        <br><a href="{{route('reception.viewcase')}}" id='but' class="btn btn-primary btn-lg">New Cases</a>
    </div>
    <!-- <div class="col-lg-4">
        <ul class="list-group">
          <li class="list-group item">
              <a href="{{route('reception.viewcase')}}"> New Cases</a>
          </li>

        </ul>
    </div> -->
  </div>


          @include('includes.error')

		<form action="{{route('reception.store')}}" method="post">
			<!-- <div class="form-group">
			<input type="number" name="Case_id" placeholder="enter case number" class="form-control">
			</div> -->
          {{csrf_field()}}
			<div class="form-group">
			<select class="form-control" name="type">

              <option value="">select case type</option>
              <option value="2">partition Case</option>
              <option value="1">produce and ejactment</option>
              <option value="3">produce</option>
              <option value="4">ejectment</option>
              <option value="5">Execution</option>
              <option value="6">correction of gardawri</option>
              <option value="7">correction of record of rights</option>
              <option value="8">correction of tax asseesssment</option>
              <option value="9">partition and execution</option>
              <option value="10">Miscellaneous</option>

			</select>
    </div>
      <div class="form-group">
            <select class="form-control" name="Court">

              <option value="">select Court</option>
              @if(Auth::user()->tehsil=='adc')
              <option value="4">Additional deputy commissioner court</option>
              @elseif(Auth::user()->tehsil !='adc')
              <option value="1">AC Court</option>
              <option value="2">Tehsildar Court</option>
              <option value="3">Naib Tehsildar Court</option>
              @endif
			      </select>

			</div><br>
			<h3>Plaintiff Details</h3>

			<div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" placeholder="Enter plaintiff name"  required>
            </div>

            <div class="form-group">
                 <label for="address">Address:</label>
                 <input type="text" class="form-control" name="address" placeholder="Enter address"  required>
            </div>

            <div class="form-group">
                <label for="phone_no">Phone No:</label>
                <input type="tel" class="form-control" name="phone_no" placeholder="Enter phone number" >
            </div>

            <div class="form-group">
                <label for="lname">Lawyer Name:</label>
                <input type="text" class="form-control" name="lname" placeholder="Enter Lawyer name" >
            </div>

            <div class="form-group">
                <label for="lphone">Lawyer Phone No:</label>
                <input type="tel" class="form-control" name="lphone" placeholder="Enter phone number of Lawyer" >
            </div>

            <h3>Defendent Details</h3>

            <div class="form-group">
                <label for="dname">Name:</label>
                <input type="text" class="form-control" name="dname" placeholder="Enter defendent name"  required>
            </div>

            <div class="form-group">
                <label for="daddress">Address:</label>
                <input type="text" class="form-control" name="daddress" placeholder="Enter defendent address" required>
            </div>

            <div class="form-group">
                <label for="title">Case Title:</label>
                <input type="text" class="form-control" name="title" placeholder="Enter case title" >
            </div>

            <div class = "form-group">
            <label for = "description">Case Description:</label>
            <textarea class = "form-control" rows = "7" name="description" placeholder = "Enter Case Description"></textarea>
         </div>

         <div class="text-center">
         	<button type="submit" class="btn btn-success btn-lg ">Initiate Case</button>
         </div>



		</form>
	</div>


<script type="text/javascript" href="jquery.js"></script>
<script type="text/javascript" href="js/bootstrap.js"></script>

@endsection
