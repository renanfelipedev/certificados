<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Imports\User\StudentsImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportStudentController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $request->validate([
            'file' => ['required', 'mimes:ods,xls,xlsx']
        ]);


        Excel::import(new StudentsImport($id), $request->file('file'));

        return redirect()->back();
    }
}
