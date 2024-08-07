@extends('admin.layouts.admin')

@section('main-content')
    <div class="container">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Edit Story') }}</h1>
        <form action="{{ route('story.update', $story->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="judul">Judul:</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ $story->judul}}">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar:</label>
                        <input type="file" class="form-control-file" id="gambar" name="gambar">
                        <div class="card card-body my-2">
                            <img src="{{ asset('storage/' . $story->gambar) }}" alt="Gambar" width="30%"
                                class="d-flex ">
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tanggal">Tanggal:</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal"
                            value="{{ $story->tanggal }}">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi:</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" value="{{ $story->deskripsi }}"></textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('story.index') }}" type="button" class="btn btn-warning">Back</a>
        </form>
    </div>
@endsection
