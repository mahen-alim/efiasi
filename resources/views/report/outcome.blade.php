@extends('layouts.master')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Formulir Rekap Pengeluaran</h6>
          <form action="{{ route('dashboard.report.outcome.table') }}" method="GET" autocomplete="off">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Jenis Pengeluaran</label>
                <select name="outcome_type" class="form-control" id="exampleInputService" placeholder="Pilih Jenis Pengeluaran">
                  <option value="" disabled selected>Pilih Jenis Pengeluaran</option>
                  <option value="Transportasi">Transportasi</option>
                  <option value="Asuransi">Asuransi</option>
                  <option value="Keamanan">Keamanan</option>
                  <option value="Pemeliharaan & Perbaikan">Pemeliharaan & Perbaikan</option>
                  <option value="Penggajian">Penggajian</option>
                  <option value="Variasi Lampu Mobil">Variasi Lampu Mobil</option>
                  <option value="Variasi Audio Mobil">Variasi Audio Mobil</option>
                  <option value="Variasi Stiker Mobil">Variasi Stiker Mobil</option>
                  <option value="Variasi Velg Mobil">Variasi Velg Mobil</option>
                  <option value="Variasi Kaca Mobil">Variasi Kaca Mobil</option>
              </select>                      
                @error('outcome_type')
                  <div class="text-danger">{{ $message }}</div>
                @enderror          
                <label for="exampleInputEmail1">Tanggal</label>
                <input name="date" type="datetime-local" class="form-control" id="date" aria-describedby="emailHelp" placeholder="Masukkan Tanggal">
                @error('date')
                  <div class="text-danger">{{ $message }}</div>
                @enderror       
            </div>
            <button type="submit" class="btn form-control" id="search-btn">Cari</button>
          </form> 
        </div>
      </div>
    </div>
  </div>
@endsection