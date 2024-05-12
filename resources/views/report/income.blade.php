@extends('layouts.master')

@section('content')
  <div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Formulir Rekap Pendapatan</h6>
          <form action="{{ route('dashboard.report.income.table') }}" method="GET">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Jenis Pendapatan</label>
                <select name="income_type" class="form-control" id="exampleInputService" placeholder="Pilih Jenis Pendapatan">
                  <option value="" disabled selected>Pilih Jenis Pendapatan</option>
                  <option value="Detailing Interior">Detailing Interior</option>
                  <option value="Detailing Eksterior">Detailing Eksterior</option>
                  <option value="Detailing Kaca Mobil">Detailing Kaca Mobil</option>
                  <option value="Detailing Ruang Mesin">Detailing Ruang Mesin</option>
                  <option value="Detailing Velg & Ban">Detailing Velg & Ban</option>
                </select>   
                @error('income_type')
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