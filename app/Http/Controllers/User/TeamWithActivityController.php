<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Activity;
use App\Models\Team;

class TeamWithActivityController extends Controller
{

    public function index($id)
    {
        $activity = Activity::find($id);

        return view('user.pages.activities.teams.index', [
            'activity' => $activity,
            'teams' => $activity->teams
        ]);
    }

    public function edit($id, $team)
    {
        return view('user.pages.activities.teams.edit');
    }

    public function create($id)
    {
        $activity = Activity::find($id);

        return view('user.pages.activities.teams.create', [
            'activity' => $activity
        ]);
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'certificate_text' => ['required', 'string'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
            'activity_id' => ['required', 'numeric'],
        ]);

        Team::create($request->all());

        return redirect()->route('teams.index', $id);
    }

    public function destroy($id, $team)
    {
        Team::find($team)->delete();

        return redirect()->back();
    }
}
