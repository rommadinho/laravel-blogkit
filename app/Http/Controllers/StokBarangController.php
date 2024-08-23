<?php

namespace App\Http\Controllers;

use App\Models\StokBarang;
use Illuminate\Http\Request;

class StokBarangController extends Controller
{
    public function index()
    {
        $stokBarangs = StokBarang::all();
        return view('stokbarang.index', compact('stokBarangs'));
    }

    public function create()
    {
        return view('stokbarang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'quantity' => 'required|numeric',
        ]);

        StokBarang::create($request->all());
        return redirect()->route('stokbarang.index');
    }

    public function edit(StokBarang $stokBarang)
    {
        return view('stokbarang.edit', compact('stokBarang'));
    }

    public function update(Request $request, StokBarang $stokBarang)
    {
        $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'quantity' => 'required|numeric',
        ]);

        $stokBarang->update($request->all());
        return redirect()->route('stokbarang.index');
    }

    public function destroy(StokBarang $stokBarang)
    {
        $stokBarang->delete();
        return redirect()->route('stokbarang.index');
    }
}
