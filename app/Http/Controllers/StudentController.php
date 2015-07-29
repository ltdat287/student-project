<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\StudentCreateRequest;
use App\Http\Controllers\Controller;
use App\Student;
use Session;

class StudentController extends Controller
{

    // Create default value pass for form Create Student
    protected $fields = [
        'name' => '',
        'age' => '',
        'address' => '',
        'gender' => 0,
    ];

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        $student = Student::paginate(config('student.students_per_page'));
        $student->setPath('student');

        return view('student.index')->withStudents($student);
    }

    /**
     * Show the form for creating a new resource. 
     *
     * @return Response
     */
    public function create()
    {
        // Create array $data and return $default if error
        $data = [];
        foreach ($this->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }

        return view('student.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(StudentCreateRequest $request)
    {
        //
        $student = new Student();
        foreach (array_keys($this->fields) as $field) {
            $student->$field = $request->get($field);
        }
        // dd($student);
        $student->save();

        return redirect('/student')->withSuccess("Student $student->name has been created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
        $student = Student::whereId($id)->firstOrFail();

        return view('student.detail')->withStudent($student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
        $student = Student::findOrFail($id);
        $data = ['id' => $id];
        foreach (array_keys($this->fields) as $field) {
            $data[$field] = old($field,$student->$field);
        }

        return view('student.edit', $data);
    }

    public function edit_conf(StudentCreateRequest $request, $id)
    {
        $student = new \stdClass;
        $student->id = $id;
        foreach (array_keys($this->fields) as $field) {
            $student->$field = $request->get($field);
        }
        // dd($student);
        Session::put('student',$student);

        return view('student.edit_conf')->withStudent($student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
        $student = Student::findOrFail($id);
        $session = Session::get('student');

        foreach (array_keys($this->fields) as $field) {
            $student->$field = $session->$field;
        }
        $student->save();

        //clear Session
        Session::forget('student');

        return redirect('/student')->withSuccess("Changed success information student. $student->name with id: $student->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
        $student = Student::findOrFail($id)->detele();
        // dd($student);

        return redirect('/student')->withSuccess("Delete success!");
    }
}
