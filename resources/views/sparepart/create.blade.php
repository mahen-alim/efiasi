@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Tambah Variasi</h6>
        </div>
        <div class="card-body px-4 pt-0 pb-2">
            <form action="{{ route('dashboard.sparepart.store') }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Tipe Variasi <span style="color: red;">*</span></label>
                  <select name="type" class="form-control" id="exampleInputTypeVariation" placeholder="Masukkan Tipe Variasi">
                    <option value="" disabled selected>Pilih Tipe Variasi</option>
                    <option value="Variasi Lampu Mobil">Variasi Lampu Mobil</option>
                    <option value="Variasi Audio Mobil">Variasi Audio Mobil</option>
                    <option value="Variasi Stiker Mobil">Variasi Stiker Mobil</option>
                    <option value="Variasi Velg Mobil">Variasi Velg Mobil</option>
                    <option value="Variasi Kaca Mobil">Variasi Kaca Mobil</option>
                  </select>  
                    @error('type')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror   
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Variasi <span style="color: red;">*</span></label>
                  <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Nama Barang">
                  @error('name')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror   
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah Variasi <span style="color: red;">*</span></label>
                    <input name="jumlah" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Jumlah Barang">
                    @error('jumlah')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror   
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Merek Variasi <span style="color: red;">*</span></label>
                    <input name="merk" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Merek Barang">
                    @error('merk')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror   
                  </div>

                  <div class="form-group">
                    <label for="examplInputPriceVariation">Harga Pemasangan <span style="color: red;">*</span></label>
                    <input name="price" type="number" class="form-control" id="examplInputPriceVariation" aria-describedby="emailHelp" placeholder="Masukkan Harga Variasi">
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