@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Formulir Rekap Keuangan</h6>
          <form action="/report/money/table" method="GET">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Kategori Keuangan</label>
                <select name="category" class="form-control" id="exampleInputPrice" placeholder="Pilih Kategori Keuangan">
                  <option value="" disabled selected>Pilih Kategori Keuangan</option>
                  <option value="Pendapatan">Pendapatan</option>
                  <option value="Pengeluaran">Pengeluaran</option>
                  <option value="Trans_Jual">Transaksi Penjualan</option>
                  <option value="Investasi">Investasi</option>
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