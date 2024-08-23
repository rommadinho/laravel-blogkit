<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::with('kategori')->get();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        $kategori = KategoriBarang::all();
        return view('barang.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'kategori_barang_id' => 'required|exists:kategori_barang,id',
            'price' => 'required|numeric',
        ]);

        Barang::create($request->all());
        return redirect()->route('barang.index');
    }

    public function edit(Barang $barang)
    {
        $kategori = KategoriBarang::all();
        return view('barang.edit', compact('barang', 'kategori'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'kategori_barang_id' => 'required|exists:kategori_barang,id',
            'price' => 'required|numeric',
        ]);

        $barang->update($request->all());
        return redirect()->route('barang.index');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index');
    }
}
