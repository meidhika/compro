@extends('layouts_2.app')
@section('content')
    <h3>Create Profile</h3>
    <form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="">Photo</label>
            <input type="file" name="picture" id="picture" class="form-control">
        </div>
        <div class="mb-3">
            <label for="nama_lengkap">Nama</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control">
        </div>
        <div class="mb-3">
            <label for="no_telp">No Telp</label>
            <input type="number" name="no_telpon" id="no_telpon" class="form-control">
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="description">Descripstion</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="facebook">Facebook</label>
            <input type="url" name="facebook" id="facebook" class="form-control" placeholder="https://example.com">
        </div>
        <div class="mb-3">
            <label for="instagram">Instagram</label>
            <input type="url" name="instagram" id="instagram" class="form-control" placeholder="https://example.com">
        </div>
        <div class="mb-3">
            <label for="twitter">Twitter</label>
            <input type="url" name="twitter" id="twitter" class="form-control" placeholder="https://example.com">
        </div>
        <div class="mb-3">
            <label for="linkedin">LinkedIn</label>
            <input type="url" name="linkedin" id="linkedin" class="form-control" placeholder="https://example.com">
        </div>
        <div class="mb-3">
            <label for="" form="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">ADD</button>
            <a href="{{ url('admin/profiles') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
@endsection
