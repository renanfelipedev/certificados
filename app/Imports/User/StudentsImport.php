<?php

namespace App\Imports\User;

use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Models\Team;

class StudentsImport implements OnEachRow, WithHeadingRow
{
    private $team_id;

    public function __construct($team_id)
    {
        $this->team_id = $team_id;
    }

    public function onRow(Row $row)
    {
        $row = $row->toArray();

        $team = Team::find($this->team_id);

        $team->students()->create([
            'name' => $row['nome'],
            'cpf' => $row['cpf'],
            'email' => $row['email'],
        ]);
    }
}
