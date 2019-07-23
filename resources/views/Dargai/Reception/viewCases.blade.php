@extends('layouts.reception')

@section('content')

<div class="container">

  <div class="panel panel-info">

    <div class="panel-heading">

       <center><h1>Todays Generated Cases</h1></center>

    </div>

    <div class="panel-body">
        <table class="table table-hover">

           <thead>
              <th>Case Title</th>
              <th>Edit</th>
              <!-- <th>Trash</th> -->
           </thead>

           <tbody>

                @foreach( $part as $part )
                  <tr>

                    <td><h3><a href="{{ route( 'reception.produce', ['id'=>$part->Case_id]) }}">{{$part->case_title}}</a></h3></td>

                     <td><a href=" {{ route('reception.edit', ['id'=> $part->Case_id]) }}" class='btn btn-success'>Edit</a></td>
                  </tr>
                @endforeach

                @foreach( $prod as $prod )
                  <tr>

                     <td><h3><a href="{{ route( 'reception.produce', ['id'=>$prod->Case_id]) }}">{!! $prod->case_title !!}</a></h3></td>
                     <td><a href=" {{ route('reception.edit', ['id'=> $prod->Case_id]) }}" class='btn btn-success'>Edit</a></td>
                  </tr>
                @endforeach

                @foreach( $regular as $regular )
                  <tr>

                     <td><h3><a href="{{ route( 'reception.produce', ['id'=>$regular->Case_id]) }}">{{$regular->case_title}}</a></h3></td>
                     <td><a href=" {{ route('reception.edit', ['id'=> $regular->Case_id]) }}" class='btn btn-success'>Edit</a></td>
                  </tr>
                @endforeach

           </tbody>

        </table>
    </div>

  </div>

</div>
@endsection
