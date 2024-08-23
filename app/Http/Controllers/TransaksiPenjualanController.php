<?php

namespace App\Http\Controllers;

use App\Models\TransaksiPenjualan;
use Illuminate\Http\Request;

class TransaksiPenjualanController extends Controller
{
    public function index()
    {
        $transaksi = TransaksiPenjualan::all();
        return view('transaksipenjulan.index', compact('transaksi'));
    }

    public function create()
    {
        return view('transaksipenjulan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'barang_id' => 'required|exists:barang,id',
            'quantity' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        TransaksiPenjualan::create($request->all());
        return redirect()->route('transaksipenjulan.index');
    }

    public function edit(TransaksiPenjualan $transaksiPenjualan)
    {
        return view('transaksipenjulan.edit', compact('transaksiPenjualan'));
    }

    public function update(Request $request, TransaksiPenjualan $transaksiPenjualan)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'barang_id' => 'required|exists:barang,id',
            'quantity' => 'required|numeric',
            'total' => 'required|numeric',
        ]);

        $transaksiPenjualan->update($request->all());
        return redirect()->route('transaksipenjulan.index');
    }

    public function destroy(TransaksiPenjualan $transaksiPenjualan)
    {
        $transaksiPenjualan->delete();
        return redirect()->route('transaksipenjulan.index');
    }
}
