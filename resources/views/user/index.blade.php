@extends('layouts.template')

@section('content')

  <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools">
          <a class="btn btn-sm btn-primary mt-1" href="{{ url('user/create') }}">Tambah</a>
        </div>
      </div>
      <div class="card-body">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Filter:</label>
                    <div class="col-3">
                        <select class="form-control" id="level_id" name="level_name" required>
                            <option value="">- Semua -</option>
                            @foreach ($levels as $level)
                                <option value="{{ $level->level_id }}">{{ $level->level_nama }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-muted">Level Pengguna</small>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped table-hover table-sm" id="table_user">
          <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Nama</th>
                <th>Level Pengguna</th>
                <th>Aksi</th>
            </tr>
          </thead>
      </table>
    </div>
  </div>

@endsection
@push('css')
@endpush 
@push('js') 
<script> 
    $(document).ready(function() {       
        var dataUser = $('#table_user').DataTable({
            serverSide: true, // Jika ingin menggunakan server side processing
            ajax: { 
                "url": "{{ url('user/list') }}", 
                "dataType": "json", 
                "type": "POST",
                "data": function (d){
                    d.level_id = $('#level_id').val();
                }
            },           
            columns: [             
                {              
                    data: "DT_RowIndex", // Nomor urut dari Laravel DataTable addIndexColumn()
                    className: "text-center",               
                    orderable: false,               
                    searchable: false     
                },
                {               
                    data: "username",
                    className: "",               
                    orderable: true,    // Jika ingin kolom ini bisa diurutkan
                    searchable: true   // Jika ingin kolom ini bisa dicari
                },
                {               
                    data: "nama",
                    className: "",               
                    orderable: true,    // Jika ingin kolom ini bisa diurutkan
                    searchable: true   // Jika ingin kolom ini bisa dicari
                },
                {               
                    data: "level.level_nama",
                    className: "",               
                    orderable: false,    // Jika tidak ingin kolom ini diurutkan
                    searchable: false   // Jika tidak ingin kolom ini dicari
                },
                {               
                    data: "aksi",
                    className: "",               
                    orderable: false,    // Jika tidak ingin kolom ini diurutkan
                    searchable: false   // Jika tidak ingin kolom ini dicari
                } 
            ] 
        });
        $('#level_id').on('change', function() {
            dataUser.ajax.reload();
        });
    });
</script>
@endpush    
