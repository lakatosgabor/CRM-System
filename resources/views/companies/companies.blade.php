
@extends('layouts.main')

@section('content')
<!DOCTYPE html>
<html>
 <head>
  <title>MyCRM</title>
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
    <h1>Companies</h1>
    <table class="table table-bordered table-striped">
    <a href="{{ route('companies.create') }}"><button class="btn btn-success">Add new Company</button></a>
 <tr>
  <th width="10%">Logo</th>
  <th width="10%">Name</th>
  <th width="10%">Email</th>
  <th width="10%">Webseite</th>
  <th width="10%">Employees</th>
  <th width="10%">Action</th>

 </tr>
 @foreach($data as $row)
  <tr>
   <td><img src="{{ URL::to('/') }}/images/{{ $row->logo }}" class="img-thumbnail" width="75" /></td>
   <td>{{ $row->name }}</td>
   <td>{{ $row->email }}</td>
   <td>{{ $row->website }}</td>
   <td>{{ $row->count_emp}}</td>
   <td>
       <div>
            <a class="float-start" href="{{ route('companies.edit', $row->id) }}"><button class="btn btn-warning">Edit</button>
       </div>
       <div>
        <form lass="float-end" action="{{ route('companies.destroy', $row->id) }}" method="post">
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