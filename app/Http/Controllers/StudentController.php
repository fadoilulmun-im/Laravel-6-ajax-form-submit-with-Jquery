<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        $students = Student::all();
        return Response()->json([
            "status"=>"success",
            "message" => "SUCCESS GET ALL STUDENTS",
            "data" => $students
        ]);
    }

    public function create()
    {
        return view('index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => "required|unique:students,name",
        ]);

        $student = new Student([
            'name' => $request->post('name'),
        ]);
		$student->save();
    }

}
