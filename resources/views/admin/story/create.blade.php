@extends('admin.layouts.admin')

@section('main-content')
    <div class="container">
        <h1 class="h3 mb-4 text-gray-800">{{ __('Create Story') }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('story.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="judul">Judul:</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul') }}">
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar:</label>
                        <input type="file" class="form-control-file" id="gambar" name="gambar" value="gambar">

                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tanggal">Tanggal:</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal"
                            value="{{ old('tanggal') }}">
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi:</label>
                        <textarea  class="form-control" id="deskripsi" name="deskripsi"
                            value="{{ old('deskripsi') }}"></textarea>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{route('story.index')}}" type="button" class="btn btn-warning">Back</a>
        </form>
    </div>
@endsection
