@extends('admin.layouts.admin')

@section('main-content')
    <div class="container">
        <h1>Create Info</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('info.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama_pengantin_pria">Pengantin Pria:</label>
                        <input type="text" class="form-control" id="nama_pengantin_pria" name="nama_pengantin_pria"
                            value="{{ old('nama_pengantin_pria') }}">
                    </div>
                    <div class="form-group">
                        <label for="nama_pengantin_istri">Pengantin Wanita:</label>
                        <input type="text" class="form-control" id="nama_pengantin_istri" name="nama_pengantin_istri"
                            value="{{ old('nama_pengantin_istri') }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <textarea class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}">{{ old('alamat') }}</textarea>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="waktu_acara">Waktu Acara:</label>
                        <input type="time" class="form-control" id="waktu_acara" name="waktu_acara"
                            value="{{ old('waktu_acara') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pernikahan">Tanggal:</label>
                        <input type="date" class="form-control" id="tanggal_pernikahan" name="tanggal_pernikahan"
                            value="{{ old('tanggal_pernikahan') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi:</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi">{{ old('deskripsi') }}</textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mx-2">Save</button>
            <a href="{{ route('gifts.index') }}" type="button" class="btn btn-warning">Back</a>
        </form>
    </div>
@endsection
