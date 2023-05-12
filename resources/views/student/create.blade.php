@extends('layout.template')
@section('content')
    <form action='{{ url('student') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href="{{ url('student') }}" class="btn btn-secondary mb-5">Back</a>
            <div class="mb-3 row">
                <label for="id" class="col-sm-2 col-form-label">ID</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='id' id="id">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='name' id="name">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="department" class="col-sm-2 col-form-label">Department</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='department' id="department">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="save" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">Add Data</button>
                </div>
            </div>
    </form>
    </div>
@endsection
