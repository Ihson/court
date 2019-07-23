@extends('layouts.app')

@section('content')


     <div class="container">
       <div class="row">
         <div class="col-lg-6 col-lg-offset-3 ">

     @if( count($errors) > 0 )
         @foreach($errors->all() as $error)

              <p class="alert alert-danger">{{ $error }}</P>

         @endforeach
     @endif
          <form action="{{route('registeredUser')}}" method="post">
            {{csrf_field()}}
  <fieldset>
    <legend>Register User</legend>

    <div class="form-group row">
      <label for="username" class="col-lg-4 control-label">User Name</label>
      <div class="col-lg-8">
         <input type="text" class="form-control" name= 'username' value="{{ old('username')}}" placeholder="Enter username">
     </div>
    </div>
    <div class="form-group row">
      <label for="email" class="col-lg-4 control-label">Email</label>
      <div class="col-lg-8">
         <input type="email" class="form-control" name= 'email' value="{{ old('email')}}" placeholder="Enter email">
     </div>
    </div>

    <div class="form-group row">
       <label for="tehsil" class="col-lg-4 control-label" >Select Tehsil </label>
      <div class="col-lg-8">
        <select class="form-control" name="tehsil" >
          <option value="">Select Tehsil</option>
          <option value="dargai">Dargai</option>
          <option value="batkhela">Batkhela</option>
          <option value="baize">Baize</option>
          <option value="adc">Additional Deputy Comissioner </option>
        </select>

     </div>
    </div>

    <div class="form-group row">
       <label for="role" class="col-lg-4 control-label" >Select Role </label>
      <div class="col-lg-8">
        <select class="form-control" name="role">
          <option value="">Select Role</option>
          <option value="1">AC court Operater</option>
          <option value="2">Tehsildar court Operater</option>
          <option value="3">Nayab Tehsildar court Operater</option>
          <option value="receptionist"> Receptionist </option>
          <option value="4">Additional Deputy Comissioner Operator</option>
        </select>

     </div>
    </div>


    <div class="form-group row">
      <label for="exampleInputPassword"  class="col-lg-4 control-label">Password</label>
      <div class="col-lg-8">
        <input type="password" class="form-control" id="exampleInputPassword" name="password" placeholder="Password">
     </div>
    </div>

    <div class="form-group row">
      <label for="exampleInputPassword"   class="col-lg-4 control-label">Confirm Password</label>
      <div class="col-lg-8">
        <input type="password" id="exampleInputPassword" name="password_confirmation" class="form-control"  placeholder="Re-enter Password">
     </div>
    </div>



   <div class="text-center">
      <button type="submit" class="btn btn-primary btn-lg">Submit</button>
   </div>

  </fieldset>
</form>

         </div>

       </div>

     </div>

@endsection
