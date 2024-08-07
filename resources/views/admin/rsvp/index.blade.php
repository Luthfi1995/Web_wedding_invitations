@extends('admin.layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Resepsi') }}</h1>
    <div class="col-lg-12 mb-4">
        <div class="d-flex justify-content-end mx-4">
            <a class="btn btn-primary" href="{{ route('rsvp.create') }}" title="Create" role="button"><ion-icon
                    name="add-outline" size="small"></ion-icon></a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <table class="table table-striped-column">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama Tamu</th>
                        <th scope="col">Kehadiran</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($rsvps->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center">
                                <div class="alert alert-secondary" role="alert">
                                    <span>Belum Ada Data yang tersedia!!!</span>
                                </div>
                            </td>
                        </tr>
                    @else
                        @foreach ($rsvps as $index => $rsvp)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $rsvp->nama_tamu }}</td>
                                <td>{{ $rsvp->kehadiran }}</td>
                                <td>{{ $rsvp->jumlah }}</td>
                                <td>
                                    {{-- <a href="{{ route('gifts.show', $gift->id) }}" class="btn btn-info">Show</a> --}}
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('rsvp.edit', $rsvp->id) }}" class="btn btn-warning mx-2">Edit</a>
                                        <button class="btn btn-danger" onclick="confirmDelete({{ $rsvp->id }})">
                                            Delete
                                        </button>
                                        <form id="delete-form-{{ $rsvp->id }}"
                                            action="{{ route('rsvp.destroy', $rsvp->id) }}" method="POST"
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

@endsection
