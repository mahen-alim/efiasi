@extends('layouts.master')

@section('content')
@include('report.fail_message')
<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active custom-orange" aria-current="page" href="#">Pendapatan</a>
  </li>
  <li class="nav-item">
    <a class="nav-link custom-orange" href="{{ route('dashboard.report.outcome.table') }}">Pengeluaran</a>
  </li>
</ul>

<div class="row">
    <div class="col-12">
        <div class="card mb-4" style="border-top-left-radius: 0px;">
          <div class="card-header pb-0" id="trans-card">
            <h6 class="text-white mb-2" style="margin-top: -10px;">Tabel Rekap Pendapatan</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0 d-flex justify-content-end">
              <div class="mb-3 ml-auto p-2 m-2">
                  <a href="{{ route('dashboard.report.income.export') }}" class="btn btn-primary" id="btn-excel">
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M48 448V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm90.9 233.3c-8.1-10.5-23.2-12.3-33.7-4.2s-12.3 23.2-4.2 33.7L161.6 320l-44.5 57.3c-8.1 10.5-6.3 25.5 4.2 33.7s25.5 6.3 33.7-4.2L192 359.1l37.1 47.6c8.1 10.5 23.2 12.3 33.7 4.2s12.3-23.2 4.2-33.7L222.4 320l44.5-57.3c8.1-10.5 6.3-25.5-4.2-33.7s-25.5-6.3-33.7 4.2L192 280.9l-37.1-47.6z"/></svg>
                  </a>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                      <th class="text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                      {{-- Dinamis --}}
                      <th class="text-secondary text-xxs font-weight-bolder opacity-7">Jenis Layanan</th>
                      <th class="text-secondary text-xxs font-weight-bolder opacity-7">Durasi Pengerjaan</th>
                      <th class="text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                      <th class="text-secondary text-xxs font-weight-bolder opacity-7">Total Bayar</th>
                      <th class="text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                    </tr>
                </thead>
                <tbody class="hoverable">
                  @foreach ($data as $index => $d)
                    <tr>
                      <td class="px-4">{{ $index + 1 }}</td>
                      <td class="px-4">{{ $d->tipe_service}}</td>
                      <td class="px-4">{{ $d->duration}}</td>
                      <td class="px-4">{{ $d->harga}}</td>
                      <td class="px-4">{{ $d->total_price}}</td>
                      <td class="px-4">{{ $d->trans_time}}</td>
                      <td class="px-4 d-flex">          
                      </td>                
                    </tr>
                  @endforeach
                </tbody>
              </table>   
            </div>     
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

