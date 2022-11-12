{{-- @extends('layouts.app')
@section('content') --}}
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h2 class="font-weight-bold">Add New Student</h2>
        </div>

    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('student.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Age:</strong>
                <input type="text" name="age" class="form-control" placeholder="Age">

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gender:</strong>
                <input type="radio" name="gender" value="M" class="form-control">Male
                <input type="radio" name="gender" value="F" class="form-control">Female
                <input type="radio" name="gender" value="O" class="form-control">Other
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Teacher:</strong>
                <select class="form-control" name="teacher_id">
                <option>Select Gender</option>
    @foreach($teachers as $teacher)
        <option value="{{$teacher->id}}">{{$teacher->name}}</option>
    @endforeach 
</select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-primary" href="" data-dismiss="modal"> Cancel</a>

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
{{-- @endsection --}}
