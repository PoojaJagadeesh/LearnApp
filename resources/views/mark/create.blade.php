{{-- @extends('layouts.app')
@section('content') --}}
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h2 class="font-weight-bold">Add Mark List</h2>
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
<form action="{{ route('mark.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Student:</strong>
                <select class="form-control" name="teacher_id">
                <option>Select Student</option>
    @foreach($student as $studen)
        <option value="{{$studen->id}}">{{$studen->name}}</option>
    @endforeach 
</select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Term:</strong>
                <select class="form-control" name="teacher_id">
                <option>Select Term</option>
    @foreach($term as $terms)
        <option value="{{$terms->id}}">{{$terms->name}}</option>
    @endforeach 
</select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Subjects:</strong><br>
                @foreach($subject as $subjects) 
                {{$subjects->subject_name}}:
                <input type="text" name="{{$subjects->id}}" class="form-control" placeholder="Mark">
                @endforeach 
            </div>
        </div>
      
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-primary" href="" data-dismiss="modal"> Cancel</a>

            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
{{-- @endsection --}}
