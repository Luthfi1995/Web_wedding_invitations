@extends('admin.layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Info') }}</h1>
    <div class="col-lg-12 mb-4">
        <div class="d-flex justify-content-end mx-4">
            <a class="btn btn-primary" href="{{ route('info.create') }}" title="Create" role="button"><ion-icon
                    name="add-outline" size="small"></ion-icon></a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card card-body shadow mb-4">
                {{-- <table class="table table-striped-column">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No.</th>
                        <th scope="col">Pengantin Pria</th>
                        <th scope="col">Pengantin Wanita</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Waktu Acara</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($infos as $index => $info)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $info->nama_pengantin_istri }}</td>
                            <td>{{ $info->nama_pengantin_pria }}</td>
                            <td>{{ $info->tanggal_pernikahan }}</td>
                            <td>{{ $info->waktu_acara }}</td>
                            <td>{{ $info->alamat }}</td>
                            <td>{{ $info->deskripsi }}</td>
                            <td>
                                {{-- <a href="{{ route('gifts.show', $gift->id) }}" class="btn btn-info">Show</a> --}}
                {{-- <div class="d-flex gap-2">
                                    <a href="{{ route('info.edit', $info->id) }}" class="btn btn-warning mx-2">Edit</a>
                                    <button class="btn btn-danger" onclick="confirmDelete({{ $info->id }})">
                                        Delete
                                    </button>
                                    <form id="delete-form-{{ $info->id }}"
                                        action="{{ route('info.destroy', $info->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table> --}}
                @if ($infos->isEmpty())
                    <div class="alert alert-info" role="alert">
                        Tidak ada data disini!!!
                    </div>
                @else
                    @foreach ($infos as $info)
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_pengantin_pria">Pengantin Pria:</label>
                                    <input type="text" class="form-control" id="nama_pengantin_pria"
                                        name="nama_pengantin_pria" value="{{ $info->nama_pengantin_pria }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="nama_pengantin_istri">Pengantin Wanita:</label>
                                    <input type="text" class="form-control" id="nama_pengantin_istri"
                                        name="nama_pengantin_istri" value="{{ $info->nama_pengantin_istri }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat:</label>
                                    <textarea class="form-control" id="alamat" name="alamat" disabled>{{ $info->alamat }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="waktu_acara">Waktu Acara:</label>
                                    <input type="time" class="form-control" id="waktu_acara" name="waktu_acara"
                                        value="{{ $info->waktu_acara }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_pernikahan">Tanggal:</label>
                                    <input type="date" class="form-control" id="tanggal_pernikahan"
                                        name="tanggal_pernikahan" value="{{ $info->tanggal_pernikahan }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi:</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" disabled>{{ $info->deskripsi }}</textarea>
                                </div>

                            </div>
                            <div class="d-flex mx-1">
                                <a href="{{ route('info.edit', $info->id) }}" class="btn btn-warning mx-2">Edit</a>
                                <button class="btn btn-danger" onclick="confirmDelete({{ $info->id }})">
                                    Delete
                                </button>
                                <form id="delete-form-{{ $info->id }}" action="{{ route('info.destroy', $info->id) }}"
                                    method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>
@endsection
