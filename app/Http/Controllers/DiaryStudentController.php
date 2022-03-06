<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiaryStudentRequest;
use App\Models\DiaryDate;
use App\Models\DiaryStudent;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DiaryStudentController extends Controller
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
                $diary_students = [];
                $allStudentdiary = DiaryStudent::with('diaryDate')->get();
                foreach($allStudentdiary as $item){
                    if($item->diaryDate->date >= $request->from_date &&  $item->diaryDate->date <= Carbon::parse($request->to_date)->addDay(1))
                    {
                        $diary_students[] = $item ;
                    }
                }

            } else {
                $diary_students = DiaryStudent::all();
            }

            return datatables()->of($diary_students)
                ->addColumn('student_name', function (DiaryStudent $diary_student) {
                    return $diary_student->student->first_name . " " . $diary_student->student->last_name;
                })
                ->editColumn('diary_date', function (DiaryStudent $diary_student) {
                    return $diary_student->diaryDate->date;
                })
                ->make(true);
        }


        $diary_students = DiaryStudent::latest()->get();


        return view('diarydate.diarystudent.index',[
            'diary_students' => $diary_students,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('diarydate.diarystudent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiaryStudentRequest $request)
    {
        //
        if($request->diary_date_id == null)
        {
            if(DiaryDate::where('date','LIKE',Carbon::now()->format('Y-m-d'))->first())
            {
                $diary_date  = DiaryDate::where('date','LIKE',Carbon::now()->format('Y-m-d'))->first();
            }
            else
            {
                $diary_date  =  DiaryDate::create([
                    'date' => Carbon::now()->format('Y-m-d')
                ]);
            }
        }else
        {
            if(DiaryDate::where('date','LIKE',$request->diary_date_id)->first()){
                $diary_date = DiaryDate::where('date','LIKE',$request->diary_date_id)->first();
            }else{
                $diary_date  =  DiaryDate::create([
                    'date' => $request->diary_date_id
                ]);
            }
        }

        $diary_date->diaryStudents()->create($request->validated());
        return redirect()->route('student-diary.index')->with('success','Diary Created Successfully');

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
    public function edit(DiaryStudent $student_diary)
    {
        return view('diarydate.diarystudent.edit',[
            'diary' => $student_diary,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiaryStudent $student_diary)
    {
        $request->validate([
            'diary_date_id' => 'nullable|exists:diary_dates,id',
            'type' => 'required',
            'price' => 'required|numeric',
            'currency_type' => 'required',
            'bond_no' => 'required|numeric|digits:5|unique:diary_students,bond_no,'.$student_diary->id,
            'student_id' => 'required|exists:students,id',
        ]);

        if($request->diary_date_id == null)
        {
            if(DiaryDate::where('date','LIKE',Carbon::now()->format('Y-m-d'))->first())
            {
                $diary_date  = DiaryDate::where('date','LIKE',Carbon::now()->format('Y-m-d'))->first();
            }
            else
            {
                $diary_date  =  DiaryDate::create([
                    'date' => Carbon::now()->format('Y-m-d')
                ]);
            }
        }else
        {
            if(DiaryDate::where('date','LIKE',$request->diary_date_id)->first()){
                $diary_date = DiaryDate::where('date','LIKE',$request->diary_date_id)->first();
            }else{
                $diary_date  =  DiaryDate::create([
                    'date' => $request->diary_date_id
                ]);
            }
        }

        $data = $request->all();
        $data['diary_date_id'] = $diary_date->id;
        $student_diary->update($data);
        return redirect()->route('student-diary.index')->with('success','Diary Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiaryStudent $student_diary)
    {
        $student_diary->delete();
        return redirect()->route('student-diary.index')->with('success','Diary Deleted Successfully');

    }
}
