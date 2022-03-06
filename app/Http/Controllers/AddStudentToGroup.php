<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\PostponedGroup;
use App\Models\Student;
use Illuminate\Http\Request;

class AddStudentToGroup extends Controller
{
    public function index(Request $request,Group $group)
    {
        # code...
        $students = Student::where('group_id',null)->where('status','new')->get();
        if($request->has('search'))
        {
            $students = Student::where('group_id',null)->where('status','new')->where('full_name','LIKE',"%$request->search%")->get();
        }


        return view('addstudenttogroup.index',[
            'students' => $students,
            'group' => $group,
        ]);
    }

    public function update(Request $request)
    {
        # code...
        $students = Student::where('group_id',null)->where('status','new')->get();
        $group = Group::findOrFail($request->group_id);
        foreach($students as $student)
        {
            if($student->postponedGroup)
            {
                $student->postponedGroup()->delete();
            }

            if($request->input($student->id) == '1')
            {
                $student->group_id = $request->group_id;
                $student->status = 'active';
                $student->save();
            }
        }

        return redirect()->route('add.student.group.index',$group->id)->with('success','Students Added To Group'.$group->name);

    }

    public function destroy(Request $request)
    {
        # code...
        $student = Student::where('id',$request->student_id)->first();
        $group =  $student->group;
        $student->update([
            'status' => 'pending',
            'group_id' => null,
        ]);

        $postponed_student = $student->postponedGroup()->create([
            'note' => $request->note,
        ]);

        return redirect()->route('groups.show',$group->id)->with('success','the student has been Removed From This Group and placed in the postponed student group');
    }
}
