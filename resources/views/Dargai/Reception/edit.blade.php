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


	</style>

	<div class="container">

    <div class="text-center">

      <center><h1>Edit Details</h1></center><br>

    </div>
          @include('includes.error')

		<form action="{{route('reception.update',['id' => $case_data->Case_id])}}" method="post">
			<!-- <div class="form-group">
			<input type="number" name="Case_id" placeholder="enter case number" class="form-control">
			</div> -->
          {{csrf_field()}}

          <!-- you cant edit case type  -->
			<!-- <div class="form-group">
			<select class="form-control" name="type">

              <option value="0">select case type</option>
              <option value="2">partitioning Case</option>
              <option value="1">produce and ejactment</option>
              <option value="3">Regular Cases</option>
              <option value="3">A</option>
              <option value="3">B</option>
              <option value="3">C</option>

			</select>
    </div> -->
      <div class="form-group">
            <select class="form-control" name="Court">

              <option value="0">select Court</option>
              <option value="1">AC Court</option>
              <option value="2">Tehsildar Court</option>
              <option value="3">Naib Tehsildar Court</option>

			      </select>

			</div><br>
			<h3>Plaintiff Details</h3>

			<div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $p_data->name }}" placeholder="Enter plaintiff name"  required>
            </div>

            <div class="form-group">
                 <label for="address">Address:</label>
                 <input type="text" class="form-control" name="address" value="{{ $p_data->address}}" placeholder="Enter address"  required>
            </div>

            <div class="form-group">
                <label for="phone_no">Phone No:</label>
                <input type="tel" class="form-control" name="phone_no" value="{{ $p_data->phone_no}}" placeholder="Enter phone number" >
            </div>

            <div class="form-group">
                <label for="lname">Lawyer Name:</label>
                <input type="text" class="form-control" name="lname" value="{{ $l_data->name }}" placeholder="Enter Lawyer name" >
            </div>

            <div class="form-group">
                <label for="lphone">Lawyer Phone No:</label>
                <input type="tel" class="form-control" name="lphone" value="{{ $l_data->phone_no }}" placeholder="Enter phone number of Lawyer" >
            </div>

            <h3>Defendent Details</h3>

            <div class="form-group">
                <label for="dname">Name:</label>
                <input type="text" class="form-control" name="dname" value="{{ $d_data->name}}" placeholder="Enter defendent name"  required>
            </div>

            <div class="form-group">
                <label for="daddress">Address:</label>
                <input type="text" class="form-control" name="daddress" value="{{ $d_data->address}}" placeholder="Enter defendent address" required>
            </div>

            <div class="form-group">
                <label for="title">Case Title:</label>
                <input type="text" class="form-control" name="title" value="{{ $data->case_title}}" placeholder="Enter case title" >
            </div>

            <div class = "form-group">
            <label for = "description">Case Description:</label>
            <textarea class = "form-control" rows = "7" name="description"  placeholder = "Enter Case Description">{{ $data->details}}</textarea>
         </div>

         <div>
         	<button type="submit" class="btn btn-primary btn-lg">Iniate Case</button>
         </div>



		</form>
	</div>


<script type="text/javascript" href="jquery.js"></script>
<script type="text/javascript" href="js/bootstrap.js"></script>

@endsection
