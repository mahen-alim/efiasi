@extends('layouts.master')

@section('content')

<div class="row">
  <div class="col-lg-6 mb-5">
    <div class="card p-3 h-100">
      <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" id="info-bengkel">
        <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
          <h5 class="text-white font-weight-bolder mb-4 pt-2">Rekap Keuangan</h5>
          <p class="text-white">Kontrol keuangan dengan mudah: Pantau, Analisis, Berencana!</p>
          <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="/report/money">
            Lihat Rekapan
            <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-6 mb-5">
    <div class="card p-3 h-100">
      <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" id="info-bengkel">
        <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
          <h5 class="text-white font-weight-bolder mb-4 pt-2">Rekap Operasional</h5>
          <p class="text-white">Optimalkan Efisiensi Bisnis Anda dengan Rekap Biaya Operasional!</p>
          <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
            Lihat Rekapan
            <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
          </a>
        </div>
      </div>
    </div>
  </div>
</div>



@endsection