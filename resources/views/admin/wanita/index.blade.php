@extends('admin.layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Biodata Wanita') }}</h1>
    <div class="col-lg-12 mb-4">
        <div class="d-flex justify-content-end mx-4">
            <a class="btn btn-primary" href="{{ route('biodataWanita.create') }}" title="Create" role="button"><ion-icon
                    name="add-outline" size="small"></ion-icon></a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card card-body shadow mb-4">
                @if ($biodataWanita->isEmpty())
                    <div class="alert alert-info" role="alert">
                        Tidak ada data disini!!!
                    </div>
                @else
                    @foreach ($biodataWanita as $wanita)
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama">Nama:</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ $wanita->nama }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="ibu">Ibu:</label>
                                    <input type="text" class="form-control" id="ibu" name="ibu"
                                        value="{{ $wanita->ibu }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="foto">Foto: </label>

                                    <div class="card card-body my-2 shadow">
                                        <img src="{{ asset('storage/' . $wanita->foto) }}" alt="Foto" width="30%"
                                            class="d-flex ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bapak">Bapak:</label>
                                    <input class="form-control" id="bapak" name="bapak" disabled
                                        value="{{ $wanita->bapak }}">
                                </div>
                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi:</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" disabled>{{ $wanita->deskripsi }}</textarea>
                                </div>

                            </div>

                        </div>
                        <div class="d-flex justify-content-end mx-4 mb-2">
                            <a href="{{ route('biodataWanita.edit', $wanita->id) }}" class="btn btn-warning mx-2">Edit</a>
                            <button class="btn btn-danger" onclick="confirmDelete({{ $wanita->id }})">
                                Delete
                            </button>
                            <form id="delete-form-{{ $wanita->id }}"
                                action="{{ route('biodataWanita.destroy', $wanita->id) }}" method="POST"
                                style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
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
