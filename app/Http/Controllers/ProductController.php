<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller{
    public function index(){
        $products = Product::orderBy('id', 'desc')->get();
        $total = Product::count();
        return view('admin.product.home', compact(['products', 'total']));
    }

    public function create(){
        return view('admin.product.create');
    }

    public function save(Request $request){
        $validation = $request->validate([
            'title' => 'required',
            'year' => 'required',
            'category' => 'required',
            'price' => 'required',

        ]);
        $data = Product::create($validation);
        if ($data) {
            session()->flash('success', 'Produto adicionado com êxito');
            return redirect(route('admin/products'));
        } else {
            session()->flash('error', 'Algum problema ocorreu');
            return redirect(route('admin.products/create'));
        }
    }

    public function edit($id){
        $products = Product::findOrFail($id);
        return view('admin.product.update', compact('products'));
    }

    public function update(Request $request, $id){
        $products = Product::findOrFail($id);
        $title = $request->title;
        $year = $request->year;
        $category = $request->category;
        $price = $request->price;

        $products->title = $title;
        $products->year = $year;
        $products->category = $category;
        $products->price = $price;
        $data = $products->save();
            if ($data) {
                session()->flash('success', 'Product Update Successfully');
                return redirect(route('admin/products'));
            } else {
                session()->flash('error', 'Some problem occure');
                return redirect(route('admin/products/update'));
            }
    }
    public function delete($id)
    {
        $products = Product::findOrFail($id)->delete();
        if ($products) {
            session()->flash('success', 'Produto deletado com sucesso');
            return redirect(route('admin/products'));
        } else {
            session()->flash('error', 'Produto não pôde ser deletado');
            return redirect(route('admin/products'));
        }
    }
}
