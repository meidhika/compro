@extends('layouts_2.app')
@section('content')
    <form action="{{ route('experience.update', $experience->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control" value="{{ $experience->judul }}">
        </div>
        <div class="mb-3">
            <label for="sub_judul">Sub Judul</label>
            <input type="text" name="sub_judul" id="sub_judul" class="form-control" value="{{ $experience->sub_judul }}">
        </div>
        <div class="mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control">{{ $experience->deskripsi }}"</textarea>
        </div>
        <div class="mb-3">
            <label for="" form="awal_kerja">Awal Kerja</label>
            <input type="date" name="awal_kerja" id="awal_kerja" class="form-control"
                value="{{ $experience->awal_kerja }}">
        </div>
        <div class="mb-3">
            <label for="" form="akhir_kerja">Akhir Kerja</label>
            <input type="date" name="akhir_kerja" id="akhir_kerja" class="form-control"
                value="{{ $experience->akhir_kerja }}">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ url('admin/experience') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
@endsection
