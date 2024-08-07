@extends('admin.layouts.admin')

@section('main-content')
<div class="container">
    <h1>Edit Gift</h1>
    <form action="{{ route('gifts.update', $gift->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama">Nama: </label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $gift->nama }}" required>
                </div>
                <div class="form-group">
                    <label for="nama_bank">Nama Bank: </label>
                    <input type="text" class="form-control" id="nama_bank" name="nama_bank" value="{{ $gift->nama_bank }}" required>
                </div>
                <div class="form-group">
                    <label for="np_rek">Nomor Rekening: </label>
                    <input type="text" class="form-control" id="np_rek" name="np_rek" value="{{ $gift->no_rek }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="gambar">Gambar: </label>
                    <input type="file" class="form-control" id="gambar" name="gambar">
                   <div class="card card-body my-2">
                    <img src="{{ asset('storage/' . $gift->gambar) }}" alt="Gambar" width="30%" class="d-flex ">
                   </div>
                </div>

            </div>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi: </label>
            <textarea class="form-control" id="deskripsi" name="deskripsi" required>{{ $gift->deskripsi }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{route('gifts.index')}}" type="button" class="btn btn-warning">Back</a>
    </form>
</div>
@endsection
