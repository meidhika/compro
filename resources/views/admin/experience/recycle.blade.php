@extends('layouts_2.app')
@section('content')
    <div class="card">
        <div class="card-header">Experience</div>
        <div class="card-body">
            <a href="{{ url('admin/experience') }}" class="btn btn-secondary btn-sm mb-2">Back</a>
            <div class="table table-responsive">
                <table class="table table-bordered text-center">
                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Actions</th>
                            <th>Judul</th>
                            <th>Sub Judul</th>
                            <th>Awal Kerja</th>
                            <th>Akhir Kerja</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($experiences as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>

                                <td>

                                    <a href="{{ route('experience.restore', $item->id) }}"
                                        class="btn btn-success btn-sm ">Restore</a>
                                    <form action="{{ route('experience.destroy', $item->id) }}" method="POST"
                                        style="display: inline" onsubmit="return confirm('Akaan di delete permanen ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->sub_judul }}</td>
                                <td>{{ $item->awal_kerja }}</td>
                                <td>{{ $item->akhir_kerja }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer"></div>
    </div>
@endsection
