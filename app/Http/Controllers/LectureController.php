<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LectureController extends Controller
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
                $lectures = Lecture::whereBetween('created_at',[$request->from_date, Carbon::parse($request->to_date)->addDay(1)])->get();
            }
            else{
                $lectures = Lecture::get();
            }

            return datatables()->of($lectures)
                    ->addIndexColumn()
                    ->make(true);
        }

        return view('lectures.index',[
            'lectures' => Lecture::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lectures.create');
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
            'name' => 'required |string',
            'id_number' => 'required |numeric |digits:9 |unique:lectures,id_number',
            'phone' => 'required |numeric |digits:10 |unique:lectures,id_number',
            'address' => 'nullable |string',
            'second_phone' => 'nullable |digits:10 |unique:lectures,id_number'
        ]);

        $lecture = Lecture::create($request->all());

        return redirect()->route('lectures.index')->with('success','Lecture '.$lecture->name.' Created');
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
    public function edit(Lecture $lecture)
    {
        return view('lectures.edit' ,[
            'lecture' =>$lecture,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecture $lecture)
    {
        $request->validate([
            'name' => 'required |string',
            'id_number' => ['required', 'numeric','digits:9', "unique:lectures,id_number,".$lecture->id],
            'phone' => ['required', 'numeric','digits:10', "unique:lectures,id_number,".$lecture->id],
            'address' => 'nullable |string',
            'second_phone' => ['required', 'numeric','digits:10', "unique:lectures,id_number,".$lecture->id],
        ]);

        $lecture->update($request->all());

        return redirect()->route('lectures.index')->with('success','Lecture '.$lecture->name.' Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecture $lecture)
    {
        $lecture->delete();
        return redirect()->route('lectures.index')->with('success','Lecture Deleted');

    }
}
