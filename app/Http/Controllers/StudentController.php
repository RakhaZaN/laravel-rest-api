<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::all();

        return $this->response(200, 'Get all students', $student);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'nama' => 'required',
            'nim' => 'required',
            'email' => 'required',
            'jurusan' => 'required',
        ]);

        if ($validated->fails()) {
            return $this->response(400, $validated->getMessageBag()->first());
        }

        $create = Student::create($request->all());

        return $create ? $this->response(201, 'Student is created successfully', $create) : $this->response(400, 'Something wrong');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return $this->response(200, 'Get student detail', $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {

        $validated = Validator::make($request->all(), [
            'nama' => 'required',
            'nim' => 'required',
            'email' => 'required',
            'jurusan' => 'required',
        ]);

        if ($validated->fails()) {
            return $this->response(400, $validated->getMessageBag()->first());
        }

        $update = $student->update($request->all());

        return $update ? $this->response(200, 'Student is updated successfully', $request->all()) : $this->response(400, 'Something wrong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $delete = $student->delete();

        return $delete ? $this->response(200, 'Student is deleted successfully') : $this->response(400, 'Something wrong');
    }
}
