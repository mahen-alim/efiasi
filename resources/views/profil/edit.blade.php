@extends('layouts.master')

@section('content')
    <div class="card-body p-3">
        <form method="POST" action="{{ route('dashboard.profile.update', ['id' => $profil->id]) }}">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $profil->name }}">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="mobile_phone" class="form-label">Nomor Telepon</label>
                <input type="text" class="form-control" id="mobile_phone" name="mobile_phone" value="{{ $profil->no_hp }}">
                @error('mobile_phone')
                <div class="text-danger">{{ $message }}</div>
                @enderror   
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ $profil->alamat }}">
                @error('location')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="quote" class="form-label">Quote</label>
                <input type="text" class="form-control" id="quote" name="quote" value="{{ $profil->quote }}">
                @error('quote')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <!-- Tambahkan bidang lainnya sesuai kebutuhan -->
            <button type="submit" class="btn form-control mt-3" id="search-btn">Simpan Perubahan</button>
        </form>        
    </div>
@endsection