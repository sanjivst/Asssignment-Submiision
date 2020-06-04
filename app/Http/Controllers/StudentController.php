<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('created_at', 'desc')->paginate(10);
        return view('index', ['students'=>$students,'layout'=>'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = Student::create($this->validateRequest());

        $this->storeImage($student);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $students = Student::orderBy('created_at', 'desc')->get();
        return view('index', ['students'=>$students,'layout'=>'teacher']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $student = Student::find($id);
      return view('index', ['student'=>$student, 'layout'=>'edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'roll_id' => 'required|max:10|unique:students,roll_id,'.$id,
            'firstName' => 'required',
            'secondName' => 'required',
            'faculty' => 'required',
            'assignment_title' => 'required|min:4',
            'assignment_file' => 'sometimes|file|image|max:10000',
        ]);

        $student = Student::find($id);
        $student->roll_id = $request->input('roll_id') ;
        $student->firstName = $request->input('firstName') ;
        $student->secondName = $request->input('secondName') ;
        $student->faculty = $request->input('faculty') ;
        $student->assignment_title = $request->input('assignment_title') ;
        $this->storeImage($student);
        $student->save() ;
        return redirect('/teacher') ;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete() ;
        return redirect('/teacher') ;
    }

    private function validateRequest()
    {
        return request()->validate([
            'roll_id' => 'required|max:10|unique:students,roll_id,',
            'firstName' => 'required',
            'secondName' => 'required',
            'faculty' => 'required',
            'assignment_title' => 'required|min:4',
            'assignment_file' => 'required|file|image|max:10000',
        ]);
    }

    private function storeImage($student)
    {
        if(request()->has('assignment_file')) {
            $student->update([
                'assignment_file' => request()->assignment_file->store('uploads', 'public'),
            ]);
        }
    }
}
