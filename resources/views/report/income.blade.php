@extends('layouts.master')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Formulir Rekap Pendapatan</h6>
          <form action="/report/income/table" method="GET">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Jenis Layanan</label>
                <select name="tipe_service" class="form-control" id="exampleInputService" placeholder="Pilih Jenis Layanan">
                    <option value="" disabled selected>Pilih Jenis Layanan</option>
                    <option value="Detailing Interior">Detailing Interior</option>
                    <option value="Detailing Eksterior">Detailing Eksterior</option>
                    <option value="Detailing Kaca">Detailing Kaca</option>
                    <!-- Tambahkan opsi lain sesuai kebutuhan -->
                </select>              
                <label for="exampleInputEmail1">Tanggal</label>
                <input name="date" type="datetime-local" class="form-control" id="date" aria-describedby="emailHelp" placeholder="Masukkan Tanggal">
            </div>
            <button type="submit" class="btn form-control" id="search-btn">Cari</button>
          </form> 
        </div>
      </div>
    </div>
  </div>
@endsection