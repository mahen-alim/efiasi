@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Tambah Variasi</h6>
        </div>
        <div class="card-body px-4 pt-0 pb-2">
            <form action="{{ route('dashboard.sparepart.store') }}" method="POST" >
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Barang <span style="color: red;">*</span></label>
                  <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nama Barang">
                  @error('name')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror   
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah Barang <span style="color: red;">*</span></label>
                    <input name="jumlah" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Jumlah Barang">
                    @error('jumlah')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror   
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Merek Barang <span style="color: red;">*</span></label>
                    <input name="merk" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Merek Barang">
                    @error('merk')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror   
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Harga Barang <span style="color: red;">*</span></label>
                    <input name="price" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Harga Barang">
                    @error('price')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror   
                  </div>
                <button type="submit" class="btn form-control" id="search-btn">Simpan</button>
              </form>
        </div>
    </div>
</div>
@endsection