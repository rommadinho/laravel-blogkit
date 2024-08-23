<?php

namespace App\Http\Controllers;

use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class KategoriBarangController extends Controller
{
    public function index()
{
    $categories = KategoriBarang::all();
    return view('kategori_barang.index', compact('categories'));
}

public function edit($id)
{
    $category = KategoriBarang::find($id);
    return view('kategori_barang.edit', compact('category'));
}

public function update(Request $request, $id)
{
    $category = KategoriBarang::find($id);
    $category->update($request->all());
    return redirect()->route('kategori_barang.index');
}

public function destroy($id)
{
    KategoriBarang::find($id)->delete();
    return redirect()->route('kategori_barang.index');
}

}
