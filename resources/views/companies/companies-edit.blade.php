@extends('layouts.main')
<!DOCTYPE html>
<html>
 <head>
  <title>MyCRM</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 </head>
 <body>
    @section('content')
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h1>Edit Company</h1>
            <div class="float-end">
                <a href="{{ route('companies.index') }}" class="btn btn-info">Back</a>
            </div>
            <br />
            <form method="post" action="{{ route('companies.update', $data->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label class="col-md-4 text-right">Name</label>
                    <div class="col-md-8">
                        <input type="text" name="name" value="{{ $data->name }}" class="form-control input-lg" required/>
                    </div>
                </div>
                <br />
                <br />
                <br />
                <div class="form-group">
                    <label class="col-md-4 text-right">Webiste</label>
                    <div class="col-md-8">
                        <input type="text" name="website" value="{{ $data->website }}" class="form-control input-lg" />
                    </div>
                </div>
                <br />
                <br />
                <br />
                <div class="form-group">
                    <label class="col-md-4 text-right">Email</label>
                    <div class="col-md-8">
                        <input type="text" name="email" value="{{ $data->email }}" class="form-control input-lg" />
                    </div>
                </div>
                <br />
                <br />
                <br />
                <div class="form-group">
                    <label class="col-md-4 text-right">Logo</label>
                    <div class="col-md-8">
                        <input type="file" name="logo" />
                        <img src="{{ URL::to('/') }}/images/{{ $data->logo }}" class="img-thumbnail" width="100" />
                        <input type="hidden" name="hidden_logo" value="{{ $data->logo }}" />
                    </div>
                </div>
                <br />
                <br />
                <br />
                <div class="form-group text-center">
                    <input type="submit" name="edit" class="btn btn-primary input-lg" value="Edit" />
                </div>
            </form>
        </div>
    @endsection
 </body>
</html>