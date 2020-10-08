<?php

namespace App\Http\Controllers\User\Certificate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Models\Team;

class UploadCertificateController extends Controller
{
    public function __invoke(Team $team, Request $request)
    {
        $request->validate([
            'file' => ['required', 'image']
        ]);

        if($team->certificate_image) {
            Storage::delete("$team->certificate_image");
        }

        $path = $request->file('file')->store('certificate');

        $team->certificate_image = $path;

        $team->save();

        return redirect()->back();
    }
}
