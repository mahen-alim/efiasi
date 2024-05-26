@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-xxl-3 col-sm-6 mb-xxl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Pendapatan Hari Ini</p>
                <h5 class="font-weight-bolder mb-0">
                  Rp. {{ $totalHargaLayanan->sum() }}
                </h5>           
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape shadow text-center border-radius-md">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Pelanggan Hari Ini</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $totalPemesan }} <span class="font-ms mb-0">Pelanggan</span>
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="fas fa-user text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Barang Masuk</p>
                <h5 class="font-weight-bolder mb-0">
                  {{ $totalSparepart }}
                </h5>             
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="fas fa-box-open text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Barang Keluar</p>
                <h5 class="font-weight-bolder mb-0">
                </h5>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-box-2 text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row my-4">
    <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
        <div class="card">
          <div class="card-header pb-0" id="trans-card">
            <div class="row">
              <div class="col-lg-6 col-7 text-white" style="margin-top: -10px;">
                <h6 class="text-white">Akun Pengguna</h6>
                <p class="text-sm mb-0" style="width: 300px; margin-top: -10px; padding-bottom: 10px;">
                  <i class="fa fa-users text-white" aria-hidden="true"></i>
                  <span class="font-weight-bold" style="width: 300px;">{{ $totalPelanggan }} Pengguna Terdaftar</span>
                </p>
              </div>
            </div>
          </div>
          <div class="card-body p-2">
            <div class="table-responsive"  id="table-show-account">
              <table class="table mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Pengguna</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No. Telepon</th>
                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Level</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $index => $user)
                    @if ($user->level == 'END USER')
                        <tr>
                            <td class="px-4">{{ $index + 1 }}</td>
                            <td class="px-4 text-sm">{{ $user->name }}</td>
                            <td class="px-4 text-sm" style="position: relative;">
                                <span class="dot-success"></span>
                                {{ $user->email }}
                            </td>
                            <td class="px-4 text-sm">{{ $user->no_hp }}</td>
                            <td class="px-4 text-sm">{{ $user->level }}</td>
                        </tr>
                    @endif
                  @endforeach              
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
        <div class="col-lg-4 col-md-6">
          <div class="card" id="card-list-order">
            <div class="card-header pb-0" id="trans-card">
                <h6  style="margin-top: -10px; color: white;">Ikhtisar Pesanan</h6>
                <p class="text-sm text-white"  style="margin-top: -10px; margin-bottom: 10px;">            
                    @if($totalPemesan > 0)
                        <i class="fa fa-shopping-cart text-white" aria-hidden="true"></i>        
                        <span class="font-weight-bold">{{ $totalPemesan }} Pemesan</span>
                    @else
                        <i class="fa fa-times text-danger" aria-hidden="true"></i>          
                        <span class="font-weight-bold text-danger">Tidak Ada Pesanan Masuk</span>
                    @endif
                </p>    
            </div>
            <div class="card-body" id="ikhtisar-pesanan">
              <div class="timeline timeline-one-side">
                  @if($totalPemesan == 0)
                    <div class="timeline-block mb-3 mt-5">
                        <span class="timeline-step w-100" style="display: flex; flex-direction: column; width: 100%; margin-top: 40px; margin-left: 150px;">
                            <i class="ph ph-empty" style="font-size: 40px; color: red;"></i>
                            <p class="text-black">Data tidak tersedia</p>
                        </span>
                    </div>
                  @else
                  @foreach ($users as $user)
                  @if ($user->level == 'END USER' && $user->services->isNotEmpty())
                      <div class="timeline-block mb-3">
                          <span class="timeline-step">
                              <i class="fa-solid fa-user text-success"></i>
                          </span>
                          <div class="timeline-content">
                              <div class="d-flex" style="gap: 10px;">
                                  <h6 class="text-dark text-sm font-weight-bold mb-0">{{ $user->name }}</h6>
                                  @if ($user->services->count() > 0)
                                      <i class="ph ph-whatsapp-logo wa-logo" id="wa-logo" data-phone="{{ $user->no_hp }}"></i>
                                  @endif
                              </div>
                              <ul class="list-group mb-0">  
                                  @foreach ($user->services as $service)
                                      <a href="/notif" id="order-con-list" target="_blank">
                                          <li class="list-group-item d-flex justify-content-between align-items-center w-98 mt-2">
                                              <p class="mb-0" style="font-weight: normal;">{{ $service->tipe_service }}</p>
                                              <span class="badge bg-secondary rounded-pill">{{ $service->created_at->format('Y-m-d') }}</span>
                                          </li>
                                      </a>
                                  @endforeach
                              </ul>
                          </div>
                      </div>
                  @endif
              @endforeach
              
                  @endif
              </div>
            </div>
          </div> 
        </div>
    </div>
    <div class="col-lg-12 col-md-10">
      <div class="card h-100">
        <div class="card-header pb-0 p-3" id="trans-card">
          <div class="row">
            <div class="col-md-8 d-flex align-items-center">
              <h6 class="mb-0 text-white" style="margin-top: -10px;">Informasi Bengkel</h6>
            </div>
            <div class="col-md-4 text-end">
              {{-- <a href="{{ route('dashboard.profil.edit', ['id' => auth()->user()->id]) }}">
                  <i class="fas fa-user-edit text-secondary text-sm text-white" data-bs-toggle="tooltip" data-bs-placement="top" aria-hidden="true" aria-label="Edit Profile" data-bs-original-title="Edit Profile" style="margin-top: -20px;"></i>
                  <span class="sr-only">Edit Info Bengkel</span>
              </a>                 --}}
            </div>
          </div>
        </div>
        <div class="card-body p-3">
          <ul class="list-group" >
            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Nama Bengkel:</strong> Prestasi Salon Mobil & Variasi Mobil</li>
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Nomor Telepon:</strong> 085259873180</li>
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Waktu Operasional:</strong> Senin - Minggu (08:00 - 17:00)</li>
            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Alamat:</strong> 9WC3+W6 Sukorejo, Kabupaten Nganjuk, Jawa Timur</li>
            <li class="list-group-item border-0 ps-0 pb-0">
              <strong class="text-dark text-sm">Sosial Media:</strong> &nbsp;
              <a class="btn btn-facebook btn-simple mb-0 ps-1 pe-2 py-0" href="javascript:;">
                <i class="ph ph-whatsapp-logo wa-logo" id="wa-logo"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
@endsection