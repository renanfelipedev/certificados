<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade as PDF;

class GenerateCertificateController extends Controller
{
    public function __invoke(Request $request)
    {
        $certificate = PDF::loadView('user.layouts.certificate', ['title' => 'Fodas']);
        $certificate->setPaper('a4', 'landscape');
        return $certificate->stream('Certificado.pdf');
    }
}
