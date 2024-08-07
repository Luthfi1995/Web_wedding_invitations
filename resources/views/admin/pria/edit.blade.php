@extends('admin.layouts.admin')

@section('main-content')
<div class="container">
    <h1>Edit Biodata Pria</h1>
    <form action="{{ route('biodataPria.update', $biodataPria) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $biodataPria->nama }}" required>
                </div>
                <div class="form-group">
                    <label for="ibu">Ibu</label>
                    <input type="text" class="form-control" id="ibu" name="ibu" value="{{ $biodataPria->ibu }}" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ $biodataPria->deskripsi }}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="bapak">Bapak</label>
                    <input type="text" class="form-control" id="bapak" name="bapak" value="{{ $biodataPria->bapak }}" required>
                </div>
                <div class="form-group">
                    <label for="foto">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                    <div class="card card-body my-2 shadow">
                        <img src="{{ asset('storage/' . $biodataPria->foto) }}" alt="Foto" width="30%"
                            class="d-flex ">
                    </div>
                </div>
            </div>
        </div>

        <div class="d-flex mb-5">
              <button type="submit" class="btn btn-primary mx-2">Simpan</button>
        <a href="{{route('biodataPria.index')}}" class="btn btn-warning" type="button">Back</a>
        </div>
    </form>
</div>
@endsection
