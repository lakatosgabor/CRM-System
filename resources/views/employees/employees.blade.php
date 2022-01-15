
@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html>
 <head>
  <title>MyCRM</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 </head>
 <body>
  <br />
  <div class="container">
   @if(isset(Auth::user()->email))
    @section('header')
    @endsection
    <h1>Employees</h1>
    <table class="table table-bordered table-striped">
    <a href="{{ route('employees.create') }}"><button class="btn btn-success">Add new Employee</button></a>
 <tr>
  <th >Name</th>
  <th >Email</th>
  <th >Mobil</th>
  <th >Family</th>
  <th >Company</th>
  <th >Action</th>

 </tr>
 @foreach($data as $row)
  <tr>
   <td>{{ $row->last_name }} {{ $row->first_name }}</td>
   <td>{{ $row->email }}</td>
   <td>{{ $row->mobil }}</td>
   <td>{{ $row->family }}</td>
   <td>{{ $row->company }}</td>
   <td>
    <div>
    <a class="float-start" href="{{ route('employees.edit', $row->id) }}"><button class="btn btn-warning">Edit</button>
    </div>
    <div>
    <form class="float-end" action="{{ route('employees.destroy', $row->id) }}"  method="post">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    </div>
   </td>
  </tr>
 @endforeach
</table>
   @else
    <script>window.location = "/";</script>
   @endif
   
   <br />
  </div>
 </body>
</html>
  

@endsection