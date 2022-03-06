<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroupRequest;
use App\Models\Group;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GroupController extends Controller
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
                $groups = Group::whereBetween('created_at',[$request->from_date, Carbon::parse($request->to_date)->addDay(1)])->get();
            }
            else{
                $groups = Group::get();
            }

            return datatables()->of($groups)
                    ->addColumn('course_id',function(Group $group){
                        return $group->course->name;
                    })
                    ->editColumn('trining_day',function(Group $group){
                        return __($group->trining_day);
                    })
                    ->editColumn('state',function(Group $group){
                        return __($group->state);
                    })
                    ->make(true);
        }

        return view('groups.index',[
            'groups' => Group::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGroupRequest $request)
    {
        $group = Group::create($request->validated());

        return redirect()->route('groups.index')->with('success', 'Group '.$group->name.' Created Done!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        //
        return view('groups.showstudentingroup',[
            'group' => $group,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('groups.edit',[
            'group' => $group,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreGroupRequest $request, Group $group)
    {
        if($request->lecture_id != 'No Lecture')
        {
            $group->state = "starting";
            $group->lecture_id = $request->lecture_id;
            $group->save();
        }

        $group->update($request->validated());

        return redirect()->route('groups.index')->with('success', 'Group '.$group->name.' Updeted Done!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        if($group->trashed())
        {
            $group->forceDelete();
        }else{
            $group->state = 'ended';
            $group->delete();
        }
        return redirect()->route('groups.index')->with('success', 'Group '.$group->name.' Deleted Done!');
    }

    public function restore(Request $request, $id)
    {
        $group = Group::onlyTrashed()->findOrFail($id);
       // $this->authorize('restore', $product);
        $group->restore();

        $message = sprintf('Group %s restored', $group->name);
        return redirect()->route('groups.index')
            ->with('success', $message);
    }

    public function trashedGroup(Request $request)
    {
        # code...
        if(request()->ajax())
        {
            if(!empty($request->from_date))
            {
                $groups = Group::onlyTrashed()->whereBetween('created_at',[$request->from_date, Carbon::parse($request->to_date)->addDay(1)])->get();
            }
            else{
                $groups = Group::onlyTrashed()->get();
            }

            return datatables()->of($groups)
                    ->addColumn('course_id',function(Group $group){
                        return $group->course->name;
                    })
                    ->editColumn('trining_day',function(Group $group){
                        return __($group->trining_day);
                    })
                    ->make(true);
        }

        return view('groups.trashGroups',[
            'trashGroups' => Group::onlyTrashed()->get(),
        ]);
    }
}
