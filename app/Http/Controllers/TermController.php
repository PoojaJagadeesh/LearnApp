<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\TermSubject;
use App\Models\Term;
use App\Models\Subject;
use DataTables;



class TermController extends Controller
{
    //
    public function create()
    {
        $student = Student::all();
        $term=Term::all();
        $subject=Subject::all();
        return view('mark.create',compact('student','term','subject'));
    }
    public function index(){
        $students = Termsubject::with('term')->with('student')->with('subject');
        //   $teachers= Teacher::select(['id','name']);
        //   dd($students);

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
      
       return view('mark.index');
}
public function show(Request $request)
{
    $student = Student::all();

    return view('mark.show', compact('student'));
}
}
