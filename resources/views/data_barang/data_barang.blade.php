@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Barang</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barangs as $key => $barang)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $barang->nama_barang }}</td>
                <td>{{ $barang->kategori->nama_kategori }}</td>
                <td>{{ $barang->harga }}</td>
                <td>{{ $barang->stok }}</td>
                <td>
                    <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
