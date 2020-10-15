<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class ToggleUserActivationController extends Controller
{
    public function __invoke($id)
    {
        $user = User::findOrFail($id);

        $user->active = !$user->active;

        $user->save();

        return redirect()->route('users.index');
    }
}
