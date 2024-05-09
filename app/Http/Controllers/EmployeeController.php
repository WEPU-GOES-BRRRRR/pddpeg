<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('employee.index', [
            'title' => 'PDDPEG | Pegawai',
            'employees' => Employee::where([
                ['deleted_at', null]
            ])->get()->all()
        ]);
    }

    public function add(): View
    {
        return view('employee.add', [
            'title' => 'PDDPEG | Tambah Pegawai',
        ]);
    }

    public function edit(Employee $employee): View
    {
        return view('employee.edit', [
            'title' => 'PDDPEG | Edit Pegawai',
            'employee' => $employee
        ]);
    }

    public function detail(Employee $employee): View
    {
        return view('employee.detail', [
            'title' => 'PDDPEG | Detail Pegawai',
            'employee' => $employee
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:employees',
            'name' => 'required',
            'day_of_birth' => 'required',
            'place_of_birth' => 'required',
            'gender' => 'required',
            'blood_type' => 'required',
            'address' => 'required',
        ]);
        Employee::insert([
            'nip' => $request->nip,
            'name' => $request->name,
            'day_of_birth' => $request->day_of_birth,
            'place_of_birth' => $request->place_of_birth,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'blood_type' => $request->blood_type,
            'address' => $request->address,
            'created_at' => now('Asia/Jakarta')
        ]);
        return redirect()->route('pegawai.index')->with([
            'title' => 'Menambahkan Pegawai',
            'icon' => 'success',
            'text' => 'Berhasil menambahkan data pegawai!'
        ]);
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'nip' => 'required',
            'name' => 'required',
            'day_of_birth' => 'required',
            'place_of_birth' => 'required',
            'gender' => 'required',
            'blood_type' => 'required',
            'address' => 'required',
        ]);
        Employee::where('id', $employee->id)->update([
            'nip' => $request->nip,
            'name' => $request->name,
            'day_of_birth' => $request->day_of_birth,
            'place_of_birth' => $request->place_of_birth,
            'gender' => $request->gender,
            'religion' => $request->religion,
            'blood_type' => $request->blood_type,
            'address' => $request->address,
            'updated_at' => now('Asia/Jakarta')
        ]);
        return redirect()->route('pegawai.index')->with([
            'title' => 'Mengedit Pegawai',
            'icon' => 'success',
            'text' => 'Berhasil mengedit data pegawai!'
        ]);
    }

    public function delete(Employee $employee)
    {
        Employee::where('id', $employee->id)->update([
            'deleted_at' => now('Asia/Jakarta')
        ]);
        return response()->json([
            'title' => 'Menghapus Data',
            'icon' => 'success',
            'text' => 'Berhasil menghapus data pegawai!'
        ]);
    }
}
