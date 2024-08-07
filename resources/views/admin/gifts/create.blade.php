@extends('admin.layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Create Gift</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('gifts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama">Nama:</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_bank">Nama Bank:</label>
                        <input type="text" class="form-control" id="nama_bank" name="nama_bank"
                            value="{{ old('nama_bank') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_rek">No Rekening:</label>
                        <input type="text" class="form-control" id="no_rek" name="no_rek"
                            value="{{ old('no_rek') }}">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar:</label>
                        <input type="file" class="form-control-file" id="gambar" name="gambar">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi">{{ old('deskripsi') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{route('gifts.index')}}" type="button" class="btn btn-warning">Back</a>
        </form>
    </div>
@endsection
