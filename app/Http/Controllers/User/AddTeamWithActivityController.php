<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Activity;

class AddTeamWithActivityController extends Controller
{
    public function __invoke($id)
    {
        $activity = Activity::find($id);

        return view('user.pages.teams.create-with-activity', [
            'activity' => $activity
        ]);
    }
}
