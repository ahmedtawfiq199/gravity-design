<?php

namespace App\Http\Controllers;

use App\Models\PostponedGroup;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PostponedGroupController extends Controller
{
    public function index(Request $request)
    {
        # code...

        if(request()->ajax())
        {
            if(!empty($request->from_date))
            {
                $postponed_students = PostponedGroup::whereBetween('created_at',[$request->from_date, Carbon::parse($request->to_date)->addDay(1)])->get();
            }
            else{
                $postponed_students = PostponedGroup::get();
            }

            return datatables()->of($postponed_students)
                    ->addColumn('student_name',function(PostponedGroup $postponed_student){
                        return  $postponed_student->student->first_name." ".$postponed_student->student->father_name." ".$postponed_student->student->grandfather_name." ".$postponed_student->student->last_name;
                    })
                    ->editColumn('phone',function(PostponedGroup $postponed_student){
                        return $postponed_student->student->mobile_number;
                    })
                    ->editColumn('application_date',function(PostponedGroup $postponed_student){
                        return Carbon::parse($postponed_student->student->created_at)->format('Y-m-d');
                    })
                    ->make(true);
        }

        $postponed_students = PostponedGroup::get();

        return view('postpondgroup.index',[
            'postponed_students' => $postponed_students,
        ]);
    }

    public function destroy(PostponedGroup $postponed_student)
    {
        $student = $postponed_student->student;

        $postponed_student->delete();
        $student->update([
            'status' => 'new',
        ]);

        return redirect()->route('postponed.students.index')->with('success','Student removed From Postponed Group');
    }
}
