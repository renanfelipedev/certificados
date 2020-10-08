<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Team;

class UploadCertificateController extends Controller
{
    public function __invoke(Team $team, Request $request)
    {
        $request->validate([
            'file' => ['required', 'image']
        ]);

        $path = $request->file('file')->store('certificate');

        return redirect()->back();
    }
}
