<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class DataBarang extends Controller
{
    public function index()
{
    $barangs = Barang::with('kategori')->get();
    return view('barang.index', compact('barangs'));
}

public function edit($id)
{
    $barang = Barang::find($id);
    $categories = KategoriBarang::all();
    return view('barang.edit', compact('barang', 'categories'));
}

public function update(Request $request, $id)
{
    $barang = Barang::find($id);
    $barang->update($request->all());
    return redirect()->route('barang.index');
}

public function destroy($id)
{
    Barang::find($id)->delete();
    return redirect()->route('barang.index');
}

}
