<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Team;

class StudentController extends Controller
{
    public function store(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'cpf' => ['required', 'numeric'],
            'email' => ['required', 'email'],
            'birthdate' => ['nullable', 'date'],
        ]);

        $data = $request->all();

        $data['certificate_uuid'] = Str::uuid();

        $team = Team::findOrFail($id);

        $team->students()->create($data);

        return redirect()->route('turmas.show', $id);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
