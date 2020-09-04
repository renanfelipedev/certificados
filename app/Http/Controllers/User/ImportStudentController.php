<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImportStudentController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        return redirect()->back();
    }
}
