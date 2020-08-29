<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Activity;
use App\Models\Team;

class TeamController extends Controller
{

    public function index()
    {
        $teams = Team::orderBy('created_at')->get();

        return view('user.pages.teams.index', [
            'teams' => $teams
        ]);
    }

    public function create()
    {
        $activities = Activity::orderBy('title')->get();

        return view('user.pages.teams.create', [
            'activities' => $activities,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'certificate_text' => ['required', 'string'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
            'activity_id' => ['required', 'numeric'],
        ]);

        Team::create($request->all());

        return redirect()->route('turmas.index');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
