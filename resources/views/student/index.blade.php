@extends('layout.template')
@section('content')
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <div class="pb-3">
            <form class="d-flex" action="{{ url('student') }}" method="get">
                <input class="form-control me-1" type="search" name="keyword" value="{{ Request::get('keyword') }}"
                    placeholder="Search data keyword" aria-label="Search">
                <button class="btn btn-secondary" type="submit">Search</button>
            </form>
        </div>
        <div class="pb-3">
            <a href='{{ route('student.create') }}' class="btn btn-primary">+ Add Data</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="col-md-1">No</th>
                    <th class="col-md-3">ID</th>
                    <th class="col-md-4">Name</th>
                    <th class="col-md-2">Department</th>
                    <th class="col-md-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = $data->firstItem();
                @endphp
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->department }}</td>
                        <td>
                            <a href='{{ url('student/' . $item->id) }}' class="btn btn-primary btn-sm">Show</a>
                            <a href='{{ url('student/' . $item->id . '/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                            <form onsubmit="return confirm('Delete data?')" action="{{ url('student/' . $item->id) }}"
                                class="d-inline" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @php
                        $i++;
                    @endphp
                @endforeach
            </tbody>
        </table>
        {{ $data->withQueryString()->links() }}
    </div>
@endsection
