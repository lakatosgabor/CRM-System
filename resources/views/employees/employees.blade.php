
@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html>
 <head>
  <title>Simple Login System in Laravel</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
    border:1px solid #ccc;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container">
   @if(isset(Auth::user()->email))
    @section('header')
    @endsection
    <table class="table table-bordered table-striped">
    <a href="{{ route('employees.create') }}"><button>Add new Emoloyee</button></a>
 <tr>
  <th width="10%">Name</th>
  <th width="35%">Email</th>
  <th width="35%">Mobil</th>
  <th width="30%">Family</th>
  <th width="30%">Company</th>
  <th width="30%">Action</th>

 </tr>
 @foreach($data as $row)
  <tr>
   <td>{{ $row->last_name }} {{ $row->first_name }}</td>
   <td>{{ $row->email }}</td>
   <td>{{ $row->mobil }}</td>
   <td>{{ $row->family }}</td>
   <td>{{ $row->company }}</td>
   <td>
    <a href="{{ route('employees.edit', $row->id) }}"><button>Edit</button>
    <form action="{{ route('employees.destroy', $row->id) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
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