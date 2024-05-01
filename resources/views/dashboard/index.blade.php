@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Pendapatan Hari Ini</p>
                <h5 class="font-weight-bolder mb-0">
                  $53,000
                  <span class="text-success text-sm font-weight-bolder">+55%</span>
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
                  2,300
                  <span class="text-success text-sm font-weight-bolder">+3%</span>
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
                  +3,462
                  <span class="text-danger text-sm font-weight-bolder">-2%</span>
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
                  $103,430
                  <span class="text-success text-sm font-weight-bolder">+5%</span>
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
                <p class="text-sm mb-0" style="margin-top: -10px; padding-bottom: 10px;">
                  <i class="fa fa-check text-success" aria-hidden="true"></i>
                  <span class="font-weight-bold ms-1">6 Pengguna Terdaftar</span>
                </p>
              </div>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="table-responsive">
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
                  <tr>
                    <td class="px-4">{{ $index + 1 }}</td>
                    <td class="px-4 text-sm">{{ $user->name }}</td>
                    <td class="px-4 text-sm" style="position: relative;">
                      <span class="dot-success"></span>
                      {{ $user->email }}
                    </td>
                    <td class="px-4 text-sm">{{ $user->mobile_phone }}</td>
                    <td class="px-4 text-sm">{{ $user->level }}</td>
                    @endforeach
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="pagination justify-content-center">     
                @if ($user instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    {{ $user->links() }}
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
        <div class="col-lg-4 col-md-6">
            <div class="card h-100">
            <div class="card-header pb-0" id="trans-card">
                <h6  style="margin-top: -10px; color: white;">Ikhtisar Pesanan</h6>
                <p class="text-sm text-white"  style="margin-top: -10px; margin-bottom: 10px;">
                <i class="fa fa-arrow-up text-success" aria-hidden="true"></i>
                <span class="font-weight-bold">6 Pelanggan</span> bulan ini
                </p>
            </div>
            <div class="card-body p-3" id="ikhtisar-pesanan">
                <div class="timeline timeline-one-side">
                <div class="timeline-block mb-3">
                    <span class="timeline-step">
                        <i class="fa-solid fa-user text-success"></i>
                    </span>
                    <div class="timeline-content">
                        <h6 class="text-dark text-sm font-weight-bold mb-0">Ucok</h6>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Pesan Detailing Interior</p>
                    </div>
                </div>
                <div class="timeline-block mb-3">
                    <span class="timeline-step">
                      <i class="fa-solid fa-user text-success"></i>
                    </span>
                    <div class="timeline-content">
                        <h6 class="text-dark text-sm font-weight-bold mb-0">Budi</h6>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Pesan Detailing Eksterior</p>
                    </div>
                </div>
                <div class="timeline-block mb-3">
                    <span class="timeline-step">
                      <i class="fa-solid fa-user text-success"></i>
                    </span>
                    <div class="timeline-content">
                        <h6 class="text-dark text-sm font-weight-bold mb-0">Gerung</h6>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Pesan Variasi Lampu Mobil</p>
                    </div>
                </div>
                <div class="timeline-block mb-3">
                    <span class="timeline-step">
                      <i class="fa-solid fa-user text-success"></i>
                    </span>
                    <div class="timeline-content">
                        <h6 class="text-dark text-sm font-weight-bold mb-0">Rendy</h6>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Pesan Variasi Audio Mobil</p>
                    </div>
                </div>
                <div class="timeline-block mb-3">
                    <span class="timeline-step">
                      <i class="fa-solid fa-user text-success"></i>
                    </span>
                    <div class="timeline-content">
                        <h6 class="text-dark text-sm font-weight-bold mb-0">Feri</h6>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Pesan Detailing Velg & Ban</p>
                    </div>
                </div>
                <div class="timeline-block">
                    <span class="timeline-step">
                      <i class="fa-solid fa-user text-success"></i>
                    </span>
                    <div class="timeline-content">
                        <h6 class="text-dark text-sm font-weight-bold mb-0">Sulaiman</h6>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Pesan Detailing Kaca Mobil</p>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-6 mt-5">
      
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