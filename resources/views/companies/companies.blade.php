
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
    <a href="{{ route('companies.create') }}"><button>Add new Company</button></a>
 <tr>
  <th width="10%">Logo</th>
  <th width="35%">Name</th>
  <th width="35%">Email</th>
  <th width="30%">Webseite</th>
  <th width="30%">Employees</th>
  <th width="30%">Action</th>

 </tr>
 @foreach($data as $row)
  <tr>
   <td><img src="{{ URL::to('/') }}/images/{{ $row->logo }}" class="img-thumbnail" width="75" /></td>
   <td>{{ $row->name }}</td>
   <td>{{ $row->email }}</td>
   <td>{{ $row->website }}</td>
   <td>{{ $row->count_emp}}</td>
   <td>
    <a href="{{ route('companies.edit', $row->id) }}"><button>Edit</button>
    <form action="{{ route('companies.destroy', $row->id) }}" method="post">
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