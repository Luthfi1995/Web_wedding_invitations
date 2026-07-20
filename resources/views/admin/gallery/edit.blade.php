@extends('admin.layouts.admin')

@section('main-content')
    <div class="container">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Edit Gallery') }}</h1>
        <form action="{{ route('gallery.update', $gallery->id) }}" method="POST">
            @csrf
            @method('PUT')
           <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="id_nama_pengantin_istri" class="form-label">Nama Pengantin Istri</label>
                        <select name="id_nama_pengantin_istri" id="id_nama_pengantin_istri" class="form-control" required>
                            @foreach ($infos as $info)
                                <option value="{{ $info->id }}" {{ $gallery->id_nama_pengantin_istri == $info->id ? 'selected' : '' }}>
                                    {{ $info->nama_pengantin_istri }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" name="gambar" id="gambar" class="form-control">
                        @if ($gallery->gambar)
                            <div class="card card-body mt-2 mb-5">
                                <img src="{{ asset('storage/' . $gallery->gambar) }}" alt="Gallery Image" width="100">
                            </div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="id_nama_pengantin_pria" class="form-label">Nama Pengantin Pria</label>
                        <select name="id_nama_pengantin_pria" id="id_nama_pengantin_pria" class="form-control" required>
                            @foreach ($infos as $info)
                                <option value="{{ $info->id }}" {{ $gallery->id_nama_pengantin_pria == $info->id ? 'selected' : '' }}>
                                    {{ $info->nama_pengantin_pria }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" required>{{ $gallery->deskripsi }}</textarea>
                    </div>
                </div>
           </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('gallery.index') }}" class="btn btn-secondary">Back</a>
        </form>
    </div>
@endsection
