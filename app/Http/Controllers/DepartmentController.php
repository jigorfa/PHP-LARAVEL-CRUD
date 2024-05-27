<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller{
    public function index(){
        $departments = Department::orderBy('id', 'desc')->get();
        $total = Department::count();
        return view('admin.departments.home', compact(['departments', 'total']));
    }

    public function create(){
        return view('admin.departments.create');
    }

    public function save(Request $request){
        $validation = $request->validate([
            'name' => 'required',
            'sectors' => 'required',
        ]);
        $data = Department::create($validation);
        if ($data) {
            session()->flash('create', 'Departamento cadastrado com êxito!');
            return redirect(route('admin/departments'));
        } else {
            session()->flash('error', 'Departamento não pôde ser cadastrado');
            return redirect(route('admin.departments/create'));
        }
    }

    public function edit($id){
        $departments = Department::findOrFail($id);
        return view('admin.departments.update', compact('departments'));
    }

    public function update(Request $request, $id){
        $departments = Department::findOrFail($id);
        $name = $request->name;
        $sectors = $request->sectors;

        $departments->name = $name;
        $departments->sectors = $sectors;

        $validate = $request->validate([
            'name' => 'required',
            'sectors' => 'required',
        ]);

        $data = $departments->save();
            if ($data && $validate) {
                session()->flash('update', 'Departamento atualizado com êxito!');
                return redirect(route('admin/departments'));
            } else {
                session()->flash('error', 'Departamento não pôde ser atualizado');
                return redirect(route('admin/departments/update'));
            }
    }
    public function delete($id){
        $departments = Department::findOrFail($id)->delete();
        if ($departments) {
            session()->flash('delete', 'Departamento deletado com êxito!');
            return redirect(route('admin/departments'));
        } else {
            session()->flash('error', 'Departamento não pôde ser deletado');
            return redirect(route('admin/departments'));
        }
    }
}
