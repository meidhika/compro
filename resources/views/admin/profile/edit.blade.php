@extends('layouts_2.app')
@section('content')
    <form action="{{ route('profiles.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="picture">Photo</label>
            <input type="file" name="picture" id="picture" class="form-control" value="{{ $profile->picture }}">
            <span class="d-none d-lg-block"><img width="150px" class="img-fluid img-profile rounded-circle mx-auto mb-2"
                    src="{{ asset('storage/image/' . $profile->picture) }}" alt="..." /></span>
        </div>
        <div class="mb-3">
            <label for="nama_lengkap">Nama</label>
            <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ $profile->nama_lengkap }}"
                class="form-control">
        </div>
        <div class="mb-3">
            <label for="no_telpon">No Telepon</label>
            <input type="number" name="no_telpon" id="no_telpon" value="{{ $profile->no_telpon }}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ $profile->email }}" class="form-control">
        </div>
        <div class="mb-3">
            <label for="description">Descriptions</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ $profile->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="facebook">Facebook</label>
            <input type="url" name="facebook" id="facebook" value="{{ $profile->facebook }}" class="form-control"
                placeholder="https://example.com">
        </div>
        <div class="mb-3">
            <label for="twitter">Twitter</label>
            <input type="url" name="twitter" id="twitter" value="{{ $profile->twitter }}" class="form-control"
                placeholder="https://example.com">
        </div>
        <div class="mb-3">
            <label for="instagram">Instagram</label>
            <input type="url" name="instagram" id="instagram" value="{{ $profile->instagram }}" class="form-control"
                placeholder="https://example.com">
        </div>
        <div class="mb-3">
            <label for="linkedin">LinkedIn</label>
            <input type="url" name="linkedin" id="linkedin" value="{{ $profile->linkedin }}" class="form-control"
                placeholder="https://example.com">
        </div>
        <div class="mb-3">
            <label for="alamat">Alamat</label>
            <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control">{{ $profile->alamat }}</textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ url('admin/profiles') }}" class="btn btn-secondary">Back</a>
        </div>
    </form>
@endsection
