@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Kategori Barang</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $key => $category)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $category->nama_kategori }}</td>
                <td>
                    <a href="{{ route('kategori_barang.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('kategori_barang.destroy', $category->id) }}" method="POST" style="display:inline-block;">
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
