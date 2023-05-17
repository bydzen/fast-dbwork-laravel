@extends('layout.template')
@section('content')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href="{{ url('student') }}" class="btn btn-secondary mb-5">Back</a>
        <div class="mb-3 row">
            <label for="id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
                <input type="text" class="form-control disabled" name="id" id="id" value="{{ $data->id }}"
                    disabled>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='name' id="name" value="{{ $data->name }}" disabled>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="department" class="col-sm-2 col-form-label">Department</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='department' id="department"
                    value="{{ $data->department }}" disabled>
            </div>
        </div>
    </div>
@endsection
