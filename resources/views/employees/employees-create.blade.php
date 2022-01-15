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
            <h1>Add new employee</h1>
            <div class="float-end">
                <a href="{{ route('employees.index') }}" class="btn btn-default btn btn-info">Back</a>
            </div>

            <form method="post" action="{{ route('employees.store') }}">
                @csrf
                <div class="form-group">
                    <label class="col-md-4 text-right">First Name</label>
                    <div class="col-md-8">
                        <input type="text" name="first_name" class="form-control input-lg" required/>
                    </div>
                </div>
                <br />
                <br />
                <br />

                <div class="form-group">
                    <label class="col-md-4 text-right">Last Name</label>
                    <div class="col-md-8">
                        <input type="text" name="last_name" class="form-control input-lg" required/>
                    </div>
                </div>
                <br />
                <br />
                <br />

                <div class="form-group">
                    <label class="col-md-4 text-right">Mobil</label>
                    <div class="col-md-8">
                        <input type="text" name="mobil" class="form-control input-lg" />
                    </div>
                </div>
                <br />
                <br />
                <br />

                <div class="form-group">
                    <label class="col-md-4 text-right">Email</label>
                    <div class="col-md-8">
                        <input type="text" name="email" class="form-control input-lg" />
                    </div>
                </div>
                <br />
                <br />
                <br />

                <div class="form-group">
                    <label class="col-md-4 text-right">Family</label>
                    <div class="col-md-8">
                        <input type="text" name="family" class="form-control input-lg" />
                    </div>
                </div>
                <br />
                <br />
                <br />

                <div class="form-group">
                    <label class="col-md-4 text-right">Company</label>
                    <div class="col-md-8">
                        <input type="text" name="company" class="form-control input-lg" />
                    </div>
                </div>
                <br />
                <br />
                <br />

                <div class="form-group text-center">
                    <input type="submit" name="add" class="btn btn-primary input-lg" value="Add" />
                </div>
            </form>
        </div>
    @endsection
</body>
</html>