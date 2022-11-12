<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use DataTables;


class MarkController extends Controller
{
    //

    public function create()
    {
        $subject = Subject::all();
        return view('student.create',compact('subject'));
    }

    public function index(){
       
        $students = Termsubject::with('term')->with('student')->with('subject');
        //   $teachers= Teacher::select(['id','name']);
           dd($students);
         //   $teachers= Teacher::select(['id','name']);
          //  dd($students);

            return DataTables::of($students)
                ->addColumn('action', function ($students) {
                    return ' <a data-toggle="modal" id="smallButton" data-target="#smallModal"
                    data-attr="'. route('student.edit', $students->id) .'" title="show">
                    <i class="fas fa-edit text-success  fa-lg"></i>
                </a>
               
                <form action="'. route('student.destroy', $students->id) .'" method="POST">
                '.csrf_field().'
                '.method_field("DELETE").'
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm(\'Are You Sure Want to Delete?\')"
                    style="padding: .0em !important;font-size: xx-small;">X</a>
                </form>
            ';
            
                })
                ->make(true);
       
        return view('dashboard');
    }

    public function edit(Student $student)
    {
        $teachers = Teacher::all();
      //  $data=array($student,$teachers);
        return view('student.edit',compact('student','teachers'));
        
    }

    public function show(Student $student)
    {
        return view('student.show', compact('student'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'teacher_id' => 'required'
        ]);

        $studentName = $request->name;

        Student::create($request->all());

        return redirect()->route('dashboard')
            ->with('success', $studentName. ' created successfully.');
    }

    public function update(Request $request, Student $student)
    {
        //($request);
       
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'teacher_id' => 'required'
        ]);

        $studentName = $request->name;
        
        $student->update($request->all());

        return redirect()->route('dashboard')
            ->with('success', $studentName . ' updated successfully');
    }

    public function destroy(Student $student)
    {
       // dd($student);
        $student->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Student deleted successfully');
    }
    
}
