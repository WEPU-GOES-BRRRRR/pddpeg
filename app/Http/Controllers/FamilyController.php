<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Family;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('family.index', [
            'title' => 'PDDPEG | Data Keluarga Pegawai',
            'employees' => Employee::where([
                ['deleted_at', null]
            ])->get()->all()
        ]);
    }

    public function getFamilyData(Employee $employee)
    {
        $fammilies = Family::where([
            ['employee_id', $employee->id]
        ])->get()->all();
        return response()->json($fammilies);
    }
}
