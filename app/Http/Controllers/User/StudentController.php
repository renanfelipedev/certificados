<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

        $team = Team::find($id);

        $team->students()->create($request->all());

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
