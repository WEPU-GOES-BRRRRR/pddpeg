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

    public function store(Request $request, Employee $employee)
    {
        Family::insert([
            'employee_id' => $employee->id,
            'name' => $request->name,
            'gender' => $request->gender,
            'place_of_birth' => $request->place_of_birth,
            'day_of_birth' => $request->day_of_birth,
            'status' => $request->status,
            'created_at' => now('Asia/Jakarta')
        ]);
        return response()->json([
            'title' => 'Menambahkan data keluarga',
            'icon' => 'success',
            'text' => 'Berhasil menambahkan data keluarga!',
            'id' => $employee->id
        ]);
    }
}
