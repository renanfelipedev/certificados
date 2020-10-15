<?php

namespace App\Http\Controllers\User\Certificate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Student;

class ValidateCertificateController extends Controller
{
    public function showForm()
    {
        return view('user.pages.cartificate.validate');
    }

    public function verify(Request $request)
    {
        $student = Student::where('certificate_uuid', $request->code)->with('team.activity')->first();

        return $student;

        return view('user.pages.cartificate.information', [
            'student' => $student
        ]);
    }
}
