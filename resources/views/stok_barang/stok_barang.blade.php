@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Stok Barang</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jumlah Stok</th>
                <th>Tanggal Update</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stoks as $key => $stok)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $stok->barang->nama_barang }}</td>
                <td>{{ $stok->jumlah }}</td>
                <td>{{ $stok->updated_at }}</td>
                <td>
                    <a href="{{ route('stok_barang.edit', $stok->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('stok_barang.destroy', $stok->id) }}" method="POST" style="display:inline-block;">
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
