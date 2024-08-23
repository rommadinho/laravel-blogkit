@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Level User</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Level</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($levels as $key => $level)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $level->name }}</td>
                <td>
                    <a href="{{ route('level_user.edit', $level->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('level_user.destroy', $level->id) }}" method="POST" style="display:inline-block;">
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
