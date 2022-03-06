<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $students = Student::whereBetween('created_at', [$request->from_date, Carbon::parse( $request->to_date)->addDay(1)])->get();
            } else {
                $students = Student::get();
            }

            return datatables()->of($students)
                ->addColumn('full_name', function (Student $student) {
                    return $student->first_name . " " . $student->father_name . " " . $student->grandfather_name . " " . $student->last_name;
                })
                ->editColumn('current_group', function (Student $student) {
                    return $student->group->name ?? 'لا يوجد حاليا';
                })
                ->editColumn('application_date', function (Student $student) {
                    return Carbon::parse($student->created_at)->format('Y-m-d');
                })
                ->editColumn('status',function(Student $student){
                    return __($student->status);
                })
                ->make(true);
        }

        $students = Student::all();




        return view('students.index', [
            'students' => $students,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $age = (Carbon::now()->format('y')) - (Carbon::parse($request->date_of_birth)->format('y'));
        if ($age < 0) {
            $age += 100;
        }
        $data = $request->validated();
        $data['age'] = $age;
        $data['full_name'] = $request->first_name . " " . $request->last_name;

        // dd($data);

        $student = Student::create($data);

        return redirect()->route('students.index')->with('success', 'Student Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('students.edit', [
            'student' => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, Student $student)
    {
        $age = (Carbon::now()->format('y')) - (Carbon::parse($request->date_of_birth)->format('y'));
        $data = $request->validated();
        $data['age'] = $age;
        $data['full_name'] = $request->first_name . " " . $request->father_name . " " . $request->grandfather_name . " " . $request->last_name;

        $student->update($data);
        return redirect()->route('students.index')->with('success', 'Student Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        if ($student->trashed()) {
            $student->forceDelete();
        } else {
            $student->status = 'stopped';
            $student->group_id = null;
            $student->delete();
        }
        return redirect()->route('students.index')->with('success', 'Student Deleted Done!');
    }

    public function restore($id)
    {
        $student = Student::onlyTrashed()->findOrFail($id);
        // $this->authorize('restore', $product);
        $student->restore();

        $message = sprintf('Student %s restored', $student->name);
        return redirect()->route('students.index')
            ->with('success', $message);
    }

    public function trashedStudent(Request $request)
    {


        // if ($request->has('trash')) {
        //     $students = Student::onlyTrashed()->paginate(10);
        // }
        # code...
        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                $students = Student::onlyTrashed()->whereBetween('created_at', [$request->from_date, Carbon::parse($request->to_date)->addDay(1)])->get();
            } else {
                $students = Student::onlyTrashed()->get();
            }

            return datatables()->of($students)
                ->addColumn('full_name', function (Student $student) {
                    return $student->first_name . " " . $student->father_name . " " . $student->grandfather_name . " " . $student->last_name;
                })
                ->editColumn('current_group', function (Student $student) {
                    return $student->group->name ?? 'لا يوجد حاليا';
                })
                ->editColumn('application_date', function (Student $student) {
                    return Carbon::parse($student->created_at)->format('Y-m-d');
                })
                ->make(true);
        }

        return view('students.trashStudent', [
            'trashStudents' => Student::onlyTrashed()->paginate(),
        ]);
    }
}
