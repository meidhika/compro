@extends('layouts_2.app')
@section('content')
    <h3>Create Experience</h3>
    <form action="{{ route('experience.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">

            <label for="id_profile">Pilih Profile</label>
            <select name="id_profile" id="id_profile" class="form-control" required>
                <option value="">Pilih Profile</option>
                @foreach ($profile as $index => $item)
                    <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="judul">Judul</label>
            <input type="text" name="judul" id="judul" class="form-control">
        </div>
        <div class="mb-3">
            <label for="sub_judul">Sub Judul</label>
            <input type="text" name="sub_judul" id="sub_judul" class="form-control">
        </div>
        <div class="mb-3">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="" form="awal_kerja">Awal Kerja</label>
            <input type="date" name="awal_kerja" id="awal_kerja" class="form-control">
        </div>
        <div class="mb-3">
            <label for="" form="akhir_kerja">Akhir Kerja</label>
            <input type="date" name="akhir_kerja" id="akhir_kerja" class="form-control">
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">ADD</button>
            <a href="{{ url('admin/experience') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
@endsection
