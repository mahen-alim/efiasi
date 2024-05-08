@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Edit Variasi</h6>
        </div>
        <div class="card-body px-4 pt-0 pb-2">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('dashboard.sparepart.update', $sparepart->id) }}" method="POST" >
              @method('put')
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Tipe Variasi</label>
                  <select name="type" class="form-control" id="exampleInputPrice" placeholder="Masukkan Tipe Variasi">
                    <option value="" disabled selected>Pilih Tipe Variasi</option>
                    <option value="Variasi Lampu Mobil" {{ $sparepart->type == 'Variasi Lampu Mobil' ? 'selected' : '' }}>Variasi Lampu Mobil</option>
                    <option value="Variasi Stiker Mobil" {{ $sparepart->type == 'Variasi Stiker Mobil' ? 'selected' : '' }}>Variasi Stiker Mobil</option>
                    <option value="Variasi Velg Mobil" {{ $sparepart->type == 'Variasi Velg Mobil' ? 'selected' : '' }}>Variasi Velg Mobil</option>
                    <option value="Variasi Kaca Mobil" {{ $sparepart->type == 'Variasi Kaca Mobil' ? 'selected' : '' }}>Variasi Kaca Mobil</option>
                  </select>  
                    @error('type')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror 
                </div>  
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Barang</label>
                  <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan tipe layanan" value="{{ $sparepart->name}}">
                  @error('name')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror 
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah Barang</label>
                    <input name="jumlah" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Suku Cadang" value="{{ $sparepart->jumlah}}">
                    @error('jumlah')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror 
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Merek Barang</label>
                    <input name="merk" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Merek Barang" value="{{ $sparepart->merk}}">
                    @error('merk')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror 
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Harga Pemasangan</label>
                    <input name="price" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Harga" value="{{ $sparepart->price}}">
                    @error('price')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror 
                  </div>
                <button type="submit" class="btn form-control" id="search-btn">Simpan Perubahan</button>
              </form>
        </div>
    </div>
</div>
@endsection