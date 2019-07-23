@extends('layouts.courtDashboard')

@section('content')

@include('includes.error')

<div class="container">


   <h2>Enter Defendent Information</h2>

   <form class="form-group" action=" {{route('AcDargai.storeDefendentData') }}" method="post">

    {{csrf_field()}}
        <input type="hidden" name="id" value="{{ $id }}" >

        <label for="dname">Defendent Name:</label>
        <input type="text" name="dname" >

        <label for="d_phone_no">Defendent Phone Number:</label>
        <input type="tel" name="d_phone_no" >

        <label for="lname">Lawyer Name:</label>
        <input type="text" name="lname" >

        <label for="d_phone_no">Lawyer Phone Number:</label>
        <input type="text" name="d_phone_no" >

        <button type="submit" class="btn btn-info">Submit</button>

   </form>

</div>
@endsection
