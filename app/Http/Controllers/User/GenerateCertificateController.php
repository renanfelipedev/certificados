<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Student;

use Barryvdh\DomPDF\Facade as PDF;

class GenerateCertificateController extends Controller
{
    public function __invoke($id = null)
    {
        if ($id) {
            $student = Student::with('team.activity')->find($id);
            $activity = $student->team->activity;
            $activity_type = $student->team->activity->type;
            $team = $student->team;
            $certificate_text = $team->certificate_text;



            $certificate_text = str_replace('#NOME#', $student->name, $certificate_text);
            $certificate_text = str_replace('#CPF#', $student->cpf, $certificate_text);

            $certificate_text = str_replace('#ATIVIDADE#', $activity->title, $certificate_text);
            $certificate_text = str_replace('#CARGAHORARIA#', $activity->workload, $certificate_text);

            $certificate_text = str_replace('#TIPO#', $activity_type->title, $certificate_text);

            $certificate_text = str_replace('#INICIO#', date('d/m/Y', strtotime($team->start)), $certificate_text);
            $certificate_text = str_replace('#TERMINO#', date('d/m/Y', strtotime($team->end)), $certificate_text);
        }

        $pdf = PDF::loadView('user.layouts.certificate', [
            'certificate_text' => isset($certificate_text) ? $certificate_text : '',
            'title' => isset($student->name) ? $student->name : '',
        ]);

        $pdf->setPaper('a4', 'landscape');


        return $pdf->stream();
    }
}
