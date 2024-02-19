@extends('layouts.master')

@section('content')
<div class="container-fluid">
  <div class="col-10 mx-auto">
      <div class="card h-100">
        <div class="card-header pb-0 p-3" id="trans-card">
          <div class="row">
            <div class="col-md-8 d-flex align-items-center">
              <h6 class="mb-0 text-white" style="margin-top: -10px;">Informasi Bengkel</h6>
            </div>
            <div class="col-md-4 text-end">
              <a href="{{ route('profil.edit', ['id' => auth()->user()->id]) }}">
                  <i class="fas fa-user-edit text-secondary text-sm text-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-hidden="true" aria-label="Edit Profile" data-bs-original-title="Edit Profile" style="margin-top: -20px;"></i>
                  <span class="sr-only">Edit Profil</span>
              </a>                
            </div>
          </div>
        </div>
        <div class="card-body p-3">
          <ul class="list-group" >
            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nama Bengkel:</strong> Prestasi Salon Mobil & Variasi Mobil</li>
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Nomor Telepon:</strong> 085259873180</li>
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Jam Buka:</strong> Senin - Minggu (08:00 - 17:00)</li>
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Alamat:</strong> 9WC3+W6 Sukorejo, Kabupaten Nganjuk, Jawa Timur</li>
            <li class="list-group-item border-0 ps-0 pb-0">
              <strong class="text-dark text-sm">Sosial Media:</strong> &nbsp;
              <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                <i class="fab fa-facebook fa-lg" aria-hidden="true"></i>
              </a>
              <a class="btn btn-twitter btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                <i class="fab fa-twitter fa-lg" aria-hidden="true"></i>
              </a>
              <a class="btn btn-instagram btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                <i class="fab fa-instagram fa-lg" aria-hidden="true"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    
@endsection