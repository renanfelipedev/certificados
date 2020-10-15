<?php

namespace App\Http\Controllers\User\Certificate;

use App\Http\Controllers\Controller;

use App\Models\Student;
use App\Models\Team;

use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade as PDF;

class GenerateCertificateController extends Controller
{
    public function __invoke(Team $team = null, Student $student = null)
    {

        if ($team) {
            $certificate_text = $team->certificate_text;
            $certificate_image = $team->certificate_image;
        }

        if (isset($student)) {
            $activity = $student->team->activity;
            $activity_type = $student->team->activity->type;

            $team = $student->team;

            $certificate_text = $team->certificate_text;
            $certificate_image = $team->certificate_image;
            $certificate_uuid = $student->certificate_uuid;

            $formatted_cpf = substr($student->cpf, 0, 3) . '.' . substr($student->cpf, 3, 3) . '.' . substr($student->cpf, 6, 3) . '-' . substr($student->cpf, 9);

            $certificate_text = str_replace('#NOME#', $student->name, $certificate_text);
            $certificate_text = str_replace('#CPF#', $formatted_cpf, $certificate_text);

            $certificate_text = str_replace('#ATIVIDADE#', $activity->title, $certificate_text);
            $certificate_text = str_replace('#CARGAHORARIA#', $activity->workload, $certificate_text);

            $certificate_text = str_replace('#TIPO#', $activity_type->title, $certificate_text);

            $certificate_text = str_replace('#INICIO#', date('d/m/Y', strtotime($team->start)), $certificate_text);
            $certificate_text = str_replace('#TERMINO#', date('d/m/Y', strtotime($team->end)), $certificate_text);
        }

        $pdf = PDF::loadView('user.layouts.certificate', [
            'certificate_text' => isset($certificate_text) ? $certificate_text : '',
            'certificate_image' => isset($certificate_image) ? $certificate_image : 'certificate/default.png',
            'title' => isset($student->name) ? $student->name : 'Modelo',
            'uuid' => isset($certificate_uuid) ? $certificate_uuid : Str::uuid(),
        ]);

        $pdf->setPaper('a4', 'landscape');


        return $pdf->stream();
    }
}
