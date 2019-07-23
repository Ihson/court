@extends('layouts.app')

@section('content')

<div class="container">

<a href="{{ route('home')}}"> Back to Home</a>
  @if (session('create'))
      <div class="alert alert-success" role="alert">
          {{ session('create') }}
      </div>
  @endif

  @if (session('delete'))
    <div class="alert alert-danger" role="alert">
        {{ session('delete') }}
    </div>
  @endif
   <table class="table">

        <thead>
             <tr>
                 <th>sr No.</th>
                 <th>Username</th>
                 <th>Email</th>
                 <th>Tehsil</th>
                 <th>Role</th>
                 <th>Delete</th>
             </tr>
        </thead>

          <?php $num =1 ?>
            <tbody>


               @foreach($users as $user)
               <tr>
                  <td> {{$num++ }}</td>
                  <td>{{ $user->username }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->tehsil }}</td>
                  @if($user->role == 1)
                    <td>AC court Operater</td>

                  @elseif($user->role == 2)
                    <td>Tehsildar court Operater</td>

                  @elseif($user->role == 3)
                     <td>Nayab Tehsildar court Operater</td>

                  @else
                     <td> {{ $user->role }} </td>
                  @endif


                  <td> <a href="{{ route('deleteUser',['id' => $user->id])}}" class= 'btn btn-danger btn btn-md'>Delete </a> </td>
               </tr>
               @endforeach
            </tbody>

   </table>
</div>
@endsection
