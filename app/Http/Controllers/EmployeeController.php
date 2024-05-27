<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller{
    public function index(){
        $employees = Employee::orderBy('id', 'desc')->get();
        $total = Employee::count();
        return view('admin.employees.home', compact(['employees', 'total']));
    }

    public function create(){
        return view('admin.employees.create');
    }

    public function save(Request $request){
        $validation = $request->validate([
            'name' => 'required',
            'year' => 'required',
            'function' => 'required',
        ]);
        $data = Employee::create($validation);
        if ($data) {
            session()->flash('create', 'Funcionário cadastrado com êxito!');
            return redirect(route('admin/employees'));
        } else {
            session()->flash('error', 'Funcionário não pôde ser cadastrado');
            return redirect(route('admin.employees/create'));
        }
    }

    public function edit($id){
        $employees = Employee::findOrFail($id);
        return view('admin.employees.update', compact('employees'));
    }

    public function update(Request $request, $id){
        $employees = Employee::findOrFail($id);
        $name = $request->name;
        $year = $request->year;
        $function = $request->function;

        $employees->name = $name;
        $employees->year = $year;
        $employees->function = $function;

        $validate = $request->validate([
            'name' => 'required',
            'year' => 'required',
            'function' => 'required',
        ]);

        $data = $employees->save();
            if ($data && $validate) {
                session()->flash('update', 'Funcionário atualizado com êxito!');
                return redirect(route('admin/employees'));
            } else {
                session()->flash('error', 'Funcionário não pôde ser atualizado');
                return redirect(route('admin/employees/update'));
            }
    }
    public function delete($id){
        $employees = Employee::findOrFail($id)->delete();
        if ($employees) {
            session()->flash('delete', 'Funcionário deletado com êxito!');
            return redirect(route('admin/employees'));
        } else {
            session()->flash('error', 'Funcionário não pôde ser deletado');
            return redirect(route('admin/employees'));
        }
    }
}
