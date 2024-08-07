@extends('admin.layouts.admin')

@section('main-content')
<div class="container">
    <h1>Tambah Biodata Pria</h1>
    <form action="{{ route('biodataWanita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
       <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="ibu">Ibu</label>
                <input type="text" class="form-control" id="ibu" name="ibu" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="bapak">Bapak</label>
                <input type="text" class="form-control" id="bapak" name="bapak" required>
            </div>
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>
        </div>
       </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{route('biodataWanita.index')}}" type="button" class="btn btn-warning">Back</a>
    </form>
</div>
@endsection
