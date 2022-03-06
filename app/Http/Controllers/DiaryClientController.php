<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiaryClientRequest;
use App\Models\DiaryClient;
use App\Models\DiaryDate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DiaryClientController extends Controller
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
                $allStudentdiary = DiaryClient::with('diaryDate')->get();
                foreach($allStudentdiary as $item){
                    if($item->diaryDate->date >= $request->from_date &&  $item->diaryDate->date <= Carbon::parse($request->to_date)->addDay(1))
                    {
                        $diary_students[] = $item ;
                    }
                }

            } else {
                $diary_students = DiaryClient::all();
            }

            return datatables()->of($diary_students)
                ->editColumn('diary_date', function (DiaryClient $diary_student) {
                    return $diary_student->diaryDate->date;
                })
                ->make(true);
        }

        $diary_clients = DiaryClient::all();

        return view('diarydate.diaryclient.index',[
            'diary_clients' => $diary_clients,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('diarydate.diaryclient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiaryClientRequest $request)
    {
        //
        if($request->diary_date_id == null)
        {
            if(DiaryDate::where('date','LIKE',Carbon::now()->format('y-m-d'))->first())
            {
                $diary_date  = DiaryDate::where('date','LIKE',Carbon::now()->format('y-m-d'))->first();
            }
            else
            {
                $diary_date  =  DiaryDate::create([
                    'date' => Carbon::now()->format('y-m-d')
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

        $diary_date->diaryClients()->create($request->validated());
        return redirect()->route('client-diary.index')->with('success','Diary Created Successfully');
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
    public function edit(DiaryClient $client_diary)
    {
        //
        return view('diarydate.diaryclient.edit',[
            'diary' => $client_diary,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiaryClient $client_diary)
    {
        //
        //dd($request);
        $request->validate([
            'diary_date_id' => 'nullable|exists:diary_dates,id',
            'type' => 'required',
            'price' => 'required|numeric',
            'currency_type' => 'required',
            'bond_no' => 'required|numeric|digits:5|unique:diary_clients,bond_no,'.$client_diary->id,
            'statment' => 'required|string',
        ]);
        if($request->diary_date_id == null)
        {
            if(DiaryDate::where('date','LIKE',Carbon::now()->format('y-m-d'))->first())
            {
                $diary_date  = DiaryDate::where('date','LIKE',Carbon::now()->format('y-m-d'))->first();
            }
            else
            {
                $diary_date  =  DiaryDate::create([
                    'date' => Carbon::now()->format('y-m-d')
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
        $client_diary->update($data);
        return redirect()->route('client-diary.index')->with('success','Diary Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiaryClient $client_diary)
    {
        $client_diary->delete();
        return redirect()->route('client-diary.index')->with('success','Diary Deleted Successfully');

    }
}
