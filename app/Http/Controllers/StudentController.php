<?php

namespace App\Http\Controllers;

use App\Models\StudentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $row = 4;
        if (strlen($keyword)) {
            $data = StudentModel::where('id', 'like', "%$keyword%")
                ->orWhere('name', 'like', "%$keyword%")
                ->orWhere('department', 'like', "%$keyword%")
                ->paginate($row);
        } else {
            $data = StudentModel::orderBy('id', 'desc')->paginate($row);
        }
        return view('student.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id', $request->id);
        Session::flash('name', $request->name);
        Session::flash('department', $request->department);

        $request->validate([
            'id' => 'required|numeric|unique:students,id',
            'name' => 'required',
            'department' => 'required',
        ], [
            'id.required' => 'ID required!',
            'id.numeric' => 'ID must be a number!',
            'id.unique' => 'ID already registered!',
            'name.required' => 'Name reuqired!',
            'department.required' => 'Department required!',
        ]);

        $data = [
            'id' => $request->id,
            'name' => $request->name,
            'department' => $request->department,
        ];

        StudentModel::create($data);
        return redirect()->to('student')->with('success', 'Data added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = StudentModel::where('id', $id)->first();
        return view('student.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'department' => 'required',
        ], [
            'name.required' => 'Name required!',
            'department.required' => 'Department required!',
        ]);
        $data = [
            'name' => $request->name,
            'department' => $request->department,
        ];
        StudentModel::where('id', $id)->update($data);
        return redirect()->to('student')->with('success', 'Data updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        StudentModel::where('id', $id)->delete();
        return redirect()->to('student')->with('success', 'Data deleted!');
    }
}
