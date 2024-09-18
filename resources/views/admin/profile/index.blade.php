@extends('layouts_2.app')

@section('content')
<div class="card">
    <div class="card-header">Profiles</div>
    <div class="card-body">
        <a href="{{ route('profiles.create') }}" class="btn btn-primary btn-sm mb-2">ADD</a>
        <a href="{{ url('admin/profiles/recycle') }}" class="btn btn-warning btn-sm mb-2">Recycle</a>
        <div class="table table-responsive">
            <table class="table table-bordered text-center">
                <thead>

                    <tr>
                        <th>No</th>
                        <th>Actions</th>
                        <th>Status</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Telp</th>
                        <th>Picture</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <a href="{{ route('profiles.edit', $item->id) }}" class="btn btn-success btn-sm ">Edit</a>
                            <form action="{{ route('profiles.softdelete', $item->id) }}" method="POST"
                                style="display: inline" onsubmit="return confirm('Akan di delete sementara ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Soft Delete</button>
                            </form>
                            <a href="{{route('generate-pdf', $item->id)}}" class="btn btn-warning btn-sm">Print</a>
                        </td>

                        <td><input type="radio" name="status" class="status-radio" data-id="{{ $item->id }}"
                                {{ $item->status == 1 ? 'checked' : '' }}>
                        </td>
                        <td>{{ $item->nama_lengkap }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->no_telpon }}</td>
                        <td><img src="{{ asset('storage/image/'.$item->picture) }}" alt="" width="150px ">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer"></div>
</div>
@endsection
@section('script-sweetalert')
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const statusRadios = document.querySelectorAll('.status-radio');
        statusRadios.forEach(radio => {
            radio.addEventListener('click', (event) => {
                const itemId = event.target.getAttribute('data-id');
                const csrfToken = document.querySelector('meta[name="csrf-token"]')
                    .getAttribute('content');
                fetch(`/admin/profiles/update-status/${itemId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire(
                                'Berhasil',
                                'Status Berhasil diperbarui.',
                                'success'
                            );
                            statusRadios.forEach(r => {
                                if (r.getAttribute('data-id') != itemId) {
                                    r.checked = false;
                                }
                            });
                        } else {
                            Swal.fire(
                                'Gagal',
                                data.error ||
                                'Terjadi Kesalahan saat memperbarui status',
                                'error'
                            );
                        }
                    })
                    .catch(error => {
                        Swal.fire(
                            'Gagal',
                            'Terjadi kesalahan saat memperbarui status',
                            'error'
                        );
                    });
            });
        });
    });
</script>
@endsection