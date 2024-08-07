@extends('admin.layouts.admin')

@section('main-content')
    <div class="container"> <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">{{ __('Gifts') }}</h1>
        <div class="col-lg-12 mb-4">
            <div class="d-flex justify-content-end mx-4">
                <a class="btn btn-primary" href="{{ route('gifts.create') }}" title="Create" role="button"><ion-icon
                        name="add-outline" size="small"></ion-icon></a>
            </div>
        </div>
        <table class="table mt-3">
            <thead>
                <tr class="text-center">
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Nama Bank</th>
                    <th>Gambar</th>
                    <th>Nomor Rekening</th>
                    <th>Deskripsi</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if ($gifts->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center">
                            <div class="alert alert-secondary" role="alert">
                                <span>Belum Ada Data yang tersedia!!!</span>
                            </div>
                        </td>
                    </tr>
                @else
                    @foreach ($gifts as $index => $gift)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $gift->nama }}</td>
                            <td>{{ $gift->nama_bank }}</td>
                            <td>
                                @if ($gift->gambar)
                                    <img src="{{ asset('storage/' . $gift->gambar) }}" alt="Gambar Gift" width="100">
                                @else
                                    No image
                                @endif
                            </td>
                            <td>{{ $gift->no_rek }}</td>
                            <td>{{ $gift->deskripsi }}</td>
                            <td>
                                {{-- <a href="{{ route('gifts.show', $gift->id) }}" class="btn btn-info">Show</a> --}}
                                <div class="d-flex gap-2">
                                    <a href="{{ route('gifts.edit', $gift->id) }}" class="btn btn-warning mx-2">Edit</a>
                                    <button class="btn btn-danger" onclick="confirmDelete({{ $gift->id }})">
                                        Delete
                                    </button>
                                    <form id="delete-form-{{ $gift->id }}"
                                        action="{{ route('gifts.destroy', $gift->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
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
