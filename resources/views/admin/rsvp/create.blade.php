@extends('admin.layouts.admin')

@section('main-content')
    <div class="container">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Create Rsvp') }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('rsvp.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="nama_tamu">Nama Tamu:</label>
                        <input type="text" class="form-control" id="nama_tamu" name="nama_tamu"
                            value="{{ old('nama_tamu') }}">
                    </div>
                    <label for="kehadiran" class="form-label">Kehadiran</label>
                    <select name="kehadiran" id="kehadiran" class="form-control" required>
                        <option value="">Pilih Kehadiran</option>
                        <option value="Hadir">Hadir</option>
                        <option value="Tidak Hadir">Tidak Hadir</option>
                    </select>
                    <div class="form-group">
                        <label for="jumlah">Jumlah:</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah"
                            value="{{ old('tanggal') }}">
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('rsvp.index') }}" type="button" class="btn btn-warning">Back</a>
        </form>
    </div>
@endsection
