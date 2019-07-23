@extends('layouts.courtDashboard')

@section('content')

<div class="container">

  <div class="row">

     <div class="col-lg-3">
          <div class="panel panel-defualt">

            <div class="panel-body">

                <ul class='list-group'>

                  <li class="'list group-item'">
                      <a href="{{ route('AcDargai.dashboard') }}">Dashboard</a>
                  </li>

                  <li class="'list group-item'">
                      <a href="{{ route('AcDargai.newCases') }}">New Cases</a>
                  </li>

                  <li class="'list group-item'">
                      <a href="{{ route('AcDargai.todayCase')}}">Today's Cases</a>
                  </li>

                  <li class="'list group-item'">
                      <a href=" {{ route('AcDargai.progressCases') }}">In Progress Cases</a>
                  </li>

                  <li class="'list group-item'">
                      <a href=" {{ route('AcDargai.message') }}">Send Message</a>
                  </li>

                </ul>

            </div>

          </div>
     </div>

     <div class="col-lg-9">

     </div>

  </div>

</div>

@endsection
