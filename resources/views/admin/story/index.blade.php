@extends('admin.layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Story') }}</h1>
    <div class="col-lg-12 mb-4">
        <div class="d-flex justify-content-end mx-4">
            <a class="btn btn-primary" href="{{ route('story.create') }}" title="Create" role="button"><ion-icon
                    name="add-outline" size="small"></ion-icon></a>
        </div>
    </div>
    <div class="row justify-content-center">

        <div class="table-responsive">

            <table class="table table-striped-column">
                <thead>
                    <tr class="text-center">
                        <th scope="col">No.</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Deskripsi</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($stories->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center">
                                <div class="alert alert-secondary" role="alert">
                                    <span>Belum Ada Data yang tersedia!!!</span>
                                </div>
                            </td>
                        </tr>
                    @else
                        @foreach ($stories as $stori)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $stori->judul }}</td>
                                <td>
                                    @if ($stori->gambar)
                                        <img src="{{ asset('storage/' . $stori->gambar) }}" alt="Gambar Gift"
                                            width="100">
                                    @else
                                        No image
                                    @endif
                                </td>
                                <td>{{ $stori->tanggal }}</td>
                                <td>{{ $stori->deskripsi }}</td>
                                <td>
                                    {{-- <a href="{{ route('gifts.show', $gift->id) }}" class="btn btn-info">Show</a> --}}
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('story.edit', $stori->id) }}"
                                            class="btn btn-warning mx-2">Edit</a>
                                        <button class="btn btn-danger" onclick="confirmDelete({{ $stori->id }})">
                                            Delete
                                        </button>
                                        <form id="delete-form-{{ $stori->id }}"
                                            action="{{ route('story.destroy', $stori->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @endif

                </tbody>
            </table>

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
