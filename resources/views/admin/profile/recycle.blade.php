@extends('layouts_2.app')
@section('content')
    <div class="card">
        <div class="card-header">Profiles</div>
        <div class="card-body">
            <a href="{{ url('admin/profiles') }}" class="btn btn-secondary btn-sm mb-2">Back</a>
            <div class="table table-responsive">
                <table class="table table-bordered text-center">
                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Actions</th>
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
                                    {{-- {{ route('profiles.edit', $item->id) }} --}}
                                    <a href="{{ route('profiles.restore', $item->id) }}"
                                        class="btn btn-success btn-sm">Restore</a>

                                    <form action="{{ route('profiles.destroy', $item->id) }}" method="POST"
                                        style="display: inline" onsubmit="return confirm('Akaan di delete permanen ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                                <td>{{ $item->nama_lengkap }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->no_telpon }}</td>
                                <td><img src="{{ asset('storage/image/' . $item->picture) }}" alt="" width="150px ">
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
