
@extends('layouts.courtDashboard')

@section('content')

<div class="container">

  <div class="panel panel-info">

    <div class="panel-heading">

       <center><h1>Progress Cases</h1></center>

    </div>

    <div class="panel-body">
        <table class="table table-hover">

           <thead>
              <th>Case Title</th>
              <th>Move To Next Step</th>
              <th>View Details</th>

           </thead>

           <tbody>

                @foreach( $part_data as $part )
                  <tr>

                    <td><h3>{{$part->case_title}}</h3></td>

                     <td><a href=" {{ route('AcDargai.progressCaseDetail', ['id'=> $part->Case_id]) }}" class='btn btn-success '>Details</a></td>

                     <td><a href=" {{ route('AcDargai.nextStep', ['id'=> $part->Case_id]) }}" class='btn btn-success '>Proceed</a></td>
                  </tr>
                @endforeach

                @foreach( $prod_data as $prod )
                  <tr>

                    <td><h3>{{$prod->case_title}}</h3></td>

                     <td><a href=" {{ route('AcDargai.progressCaseDetail', ['id'=> $prod->Case_id]) }}" class='btn btn-success'>Details</a></td>

                     <td><a href=" {{ route('AcDargai.nextStep', ['id'=> $prod->Case_id]) }}" class='btn btn-success'>Proceed</a></td>
                  </tr>
                @endforeach

                @foreach( $regular_data as $regular )
                  <tr>

                    <td><h3>{{$regular->case_title}}</h3></td>

                     <td><a href=" {{ route('AcDargai.progressCaseDetail', ['id'=> $regular->Case_id]) }}" class='btn btn-success'>Details</a></td>

                     <td><a href=" {{ route('AcDargai.nextStep', ['id'=> $regular->Case_id]) }}" class='btn btn-success'>Proceed</a></td>
                  </tr>
                @endforeach



           </tbody>

        </table>
    </div>

  </div>

</div>
@endsection
