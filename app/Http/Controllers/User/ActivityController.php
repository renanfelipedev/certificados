<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Activity;
use App\Models\ActivityType;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::orderBy('created_at')->get();

        return view('user.pages.activities.index', [
            'activities' => $activities
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activity_types = ActivityType::orderBy('title')->get();

        return view('user.pages.activities.create', [
            'types' => $activity_types,
        ]);
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
            'title' => ['required', 'string', 'max:255'],
            'workload' => ['required', 'numeric', 'min:1'],
            'activity_type_id' => ['required', 'numeric'],
            'content' => ['required', 'string']
        ]);


        $request->user()->activities()->create($request->all());

        return redirect()->route('activities.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $activity = Activity::with('type')->find($id);
        $types = ActivityType::orderBy('title')->get();

        return view('user.pages.activities.edit', [
            'activity' => $activity,
            'types' => $types,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'workload' => ['required', 'numeric', 'min:1'],
            'activity_type_id' => ['required', 'numeric'],
            'content' => ['required', 'string']
        ]);

        $activity = Activity::find($id);

        $activity->update($request->all());

        return redirect()->route('activities.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $activity = Activity::find($id);

        $activity->delete();

        return redirect()->route('activities.index');
    }
}
