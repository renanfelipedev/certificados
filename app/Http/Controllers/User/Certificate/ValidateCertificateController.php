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
        $request->validate([
            'code' => ['required']
        ]);

        $student = Student::where('certificate_uuid', $request->code)->with('team.activity')->first();

        if ($student) {
            return view('user.pages.cartificate.information', [
                'student' => $student
            ]);
        }

        return back()->withErrors('Este código não pertence a nenhum certificado válido. Entre em contato com a instituição de ensino responsável', 'verify');
    }
}
