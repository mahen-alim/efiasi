@extends('layouts.master')

@section('content')
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100 ps ps--active-y">
    <div class="container-fluid">
      <div class="page-header min-height-300 border-radius-xl mt-4" id="info-bengkel">
        <span class="opacity-6"></span>
      </div>
        <div class="card card-body blur shadow-blur mx-4 mt-n12 mb-5 overflow-hidden">
            <div class="row gx-4">
              <div class="col-auto">
                <div class="avatar avatar-xl position-relative mt-1">
                    <img src="{{ auth()->user()->profile_picture }}" alt="Profile Picture" id="profile_picture">
                </div>
            </div>
            
                <div class="col-auto my-auto">
                    <div class="h-100">
                    <h5 class="mb-1">
                        {{ auth()->user()->name }}
                    </h5>
                    <p class="mb-0 font-weight-bold text-sm">
                        {{ auth()->user()->level }}
                    </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-10 mx-auto">
        <div class="card h-100">
          <div class="card-header pb-0 p-3">
            <div class="row">
              <div class="col-md-8 d-flex align-items-center">
                <h6 class="mb-0">Informasi Profil</h6>
              </div>
              <div class="col-md-4 text-end">
                <a href="{{ route('profil.edit', ['id' => auth()->user()->id]) }}">
                    <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" aria-hidden="true" aria-label="Edit Profile" data-bs-original-title="Edit Profile"></i>
                    <span class="sr-only">Edit Profile</span>
                </a>                
              </div>
            </div>
          </div>
          <div class="card-body p-3">
            <ul class="list-group" >
              <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nama Lengkap:</strong> {{ auth()->user()->name }}</li>
              <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Nomor Telepon:</strong> {{ auth()->user()->mobile_phone }}</li>
              <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Email:</strong> {{ auth()->user()->email }}</li>
              <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Alamat:</strong> {{ auth()->user()->location }}</li>
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
            <div class="col-md-8 text-center mt-5 mx-auto">
              <p class="text-sm" id="quotes">
                {{ auth()->user()->quote }}
              </p>
            </div>
          </div>
        </div>
      </div>  
@endsection
