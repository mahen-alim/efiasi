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
                  <tr>
                    <td>
                      <div class="d-flex px-3 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <h6 class="mb-0 text-sm">1.</h6>
                        </div>
                      </div>
                    </td>
                    <td class="align-middle text-center text-sm">
                      <span class="text-xs font-weight-bold">Mahen</span>
                    </td>
                    <td class="align-middle">
                      <div class="progress-wrapper w-75 mx-auto">
                        <div class="progress-info">
                          <div class="progress-percentage">
                            <span class="text-xs font-weight-bold">mahennekkers27@gmail.com</span>
                          </div>
                        </div>
                        <div class="progress">
                          <div class="progress-bar bg-gradient-info w-100" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
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
                <span class="font-weight-bold">50%</span> bulan ini
                </p>
            </div>
            <div class="card-body p-3" id="ikhtisar-pesanan">
                <div class="timeline timeline-one-side">
                <div class="timeline-block mb-3">
                    <span class="timeline-step">
                        <i class="fa-solid fa-user text-success"></i>
                    </span>
                    <div class="timeline-content">
                        <h6 class="text-dark text-sm font-weight-bold mb-0">User memilih layanan yang akan dipesan</h6>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Langkah 1</p>
                    </div>
                </div>
                <div class="timeline-block mb-3">
                    <span class="timeline-step">
                        <i class="fa-solid fa-mobile-button text-danger text-gradient"></i>
                    </span>
                    <div class="timeline-content">
                        <h6 class="text-dark text-sm font-weight-bold mb-0">User menekan tombol pesan</h6>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Langkah 2</p>
                    </div>
                </div>
                <div class="timeline-block mb-3">
                    <span class="timeline-step">
                    <i class="ni ni-cart text-info text-gradient"></i>
                    </span>
                    <div class="timeline-content">
                        <h6 class="text-dark text-sm font-weight-bold mb-0">Pesanan akan diterima admin di dashboard web</h6>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Langkah 3</p>
                    </div>
                </div>
                <div class="timeline-block mb-3">
                    <span class="timeline-step">
                    <i class="fa-solid fa-user-gear text-warning text-gradient"></i>
                    </span>
                    <div class="timeline-content">
                        <h6 class="text-dark text-sm font-weight-bold mb-0">Admin mengkonfirmasi pesanan</h6>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Langkah 4</p>
                    </div>
                </div>
                <div class="timeline-block mb-3">
                    <span class="timeline-step">
                        <i class="fa-solid fa-bell text-primary text-gradient"></i>
                    </span>
                    <div class="timeline-content">
                        <h6 class="text-dark text-sm font-weight-bold mb-0">User mendapat notifikasi pesanan pada aplikasi mobile</h6>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Langkah 5</p>
                    </div>
                </div>
                <div class="timeline-block">
                    <span class="timeline-step">
                        <i class="fas fa-money-check-alt text-dark text-gradient"></i>
                    </span>
                    <div class="timeline-content">
                        <h6 class="text-dark text-sm font-weight-bold mb-0">User melakukan pembayaran offline/ bayar ditempat</h6>
                        <p class="text-secondary font-weight-bold text-xs mt-1 mb-0">Langkah 6</p>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-md-6 mt-5">
      
        <div class="card h-100 p-3">
        <div class="overflow-hidden position-relative border-radius-lg h-100" id="info-bengkel">
            <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
            <h5 class="text-white font-weight-bolder mb-4 pt-2">Informasi Bengkel</h5>
            <p class="text-white">Informasi singkat tentang bengkel detailing mobil .... .</p>
            <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="/info-bengkel">
                Lihat Informasi
                <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
            </a>
            </div>
        </div>
        </div>
     
    </div>
@endsection