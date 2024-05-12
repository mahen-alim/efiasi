@extends('layouts.master')

@section('content')
@include('report.fail_message')
<ul class="nav nav-tabs" id="myTab">
  <li class="nav-item">
    <a class="nav-link custom-orange" href="{{ route('dashboard.report.income.table') }}">Pendapatan</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active custom-orange" aria-current="page"  href="#">Pengeluaran</a>
  </li>
</ul>

<div class="row">
    <div class="col-12">
        <div class="card mb-4" style="border-top-left-radius: 0px;">
          <div class="card-header pb-0" id="trans-card">
            <h6 class="text-white mb-2" style="margin-top: -10px;">Tabel Rekap Pengeluaran</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0 d-flex justify-content-end">
              <div class="mb-3 ml-auto p-2 m-2">
                  <a href="{{ route('dashboard.report.export') }}" class="btn btn-primary" id="btn-excel">
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
                      @if($data->isNotEmpty() && isset($data[0]->sparepart_id))
                        <th class="text-secondary text-xxs font-weight-bolder opacity-7">Nama Variasi</th> 
                        <th class="text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Variasi</th> 
                        <th class="text-secondary text-xxs font-weight-bolder opacity-7">Merek Variasi</th> 
                        <th class="text-secondary text-xxs font-weight-bolder opacity-7">Harga Pemasangan</th> 
                        <th class="text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Masuk</th>
                      @else
                        <th class="text-secondary text-xxs font-weight-bolder opacity-7">Jenis Pengeluaran</th> 
                        <th class="text-secondary text-xxs font-weight-bolder opacity-7">Kategori Biaya</th> 
                        <th class="text-secondary text-xxs font-weight-bolder opacity-7">Total Biaya</th> 
                        <th class="text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Masuk</th>
                      @endif
                     
                  
                    </tr>
                </thead>
                <tbody class="hoverable">
                  @foreach ($data as $index => $d)
                      <tr>
                          @if ($d->sparepart_id)
                              <td class="px-4">{{ $index + 1 }}</td>
                              <td class="px-4">{{ $d->sparepart->name }}</td>
                              <td class="px-4">{{ $d->sparepart->jumlah }}</td>
                              <td class="px-4">{{ $d->sparepart->merk }}</td>
                              <td class="px-4">{{ $d->sparepart->price }}</td>
                              <td class="px-4">{{ $d->created_at->format('Y-m-d') }}</td>
                          @else
                              <td class="px-4">{{ $index + 1 }}</td>
                              <td class="px-4">{{ $d->operational->type_cost }}</td>
                              <td class="px-4">{{ $d->operational->category }}</td>
                              <td class="px-4">{{ $d->operational->nominal }}</td>
                              <td class="px-4">{{ $d->created_at->format('Y-m-d') }}</td>
                          @endif
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

