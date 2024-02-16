@extends('layouts..master')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0" id="trans-card">
          <h6 class="text-white" style="margin-top: -10px;">Tabel</h6>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                    {{-- Statis --}}
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sparepart</th> 
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah Barang</th>
                    {{-- Dinamis --}}
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Layanan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal</th>
                  </tr>
              </thead>
              <tbody class="hoverable">
                @foreach ($data as $index => $d)
                  <tr>
                    <td class="px-4">{{ $index + 1 }}</td>
                    <td class="px-4">{{ $d->sparepart}}</td>
                    <td class="px-4">{{ $d->qty}}</td>
                    <td class="px-4">{{ $d->tipe_service}}</td>
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
@endsection