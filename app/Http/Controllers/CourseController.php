<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Program;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(request()->ajax())
        {
            if(!empty($request->from_date))
            {
                $courses = Course::whereBetween('created_at',[$request->from_date, Carbon::parse($request->to_date)->addDay(1)])->get();
            }
            else{
                $courses = Course::get();
            }

            return datatables()->of($courses)->make(true);
        }



        return view('courses.index',[
            'courses' => Course::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required |max:100 |unique:courses',
            'price' => 'numeric |required',
            'description' => 'nullable | max:500'
        ]);

        $course = Course::create($request->all());

        foreach(Program::all() as $program)
        {
            if($request->post($program->name) == 1)
            {
                DB::table('course_programs')->insert([
                    'program_id' => $program->id,
                    'course_id' => $course->id
                ]);
            }
        }

        return redirect()->route('courses.index')->with('success','Course Craeted Done!');
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
    public function edit(Course $course)
    {
        return view('courses.edit',[
            'course' => $course,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required |max:100 |unique:courses,name,'.$course->id,
            'price' => 'numeric |required',
            'description' => 'nullable | max:500'
        ]);


        DB::table('course_programs')->where('course_id',$course->id)->delete();


        foreach(Program::all() as $program)
        {
            if($request->post($program->name) == 1)
            {
                DB::table('course_programs')->insert([
                    'program_id' => $program->id,
                    'course_id' => $course->id
                ]);
            }
        }


        $course->update($request->all());

        return redirect()->route('courses.index')->with('success','Course Updated Done!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success','Course Deleted Done!');
    }
}
