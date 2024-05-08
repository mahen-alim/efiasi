@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Tambah Operasional</h6>
        </div>
        <div class="card-body px-4 pt-0 pb-2">
            <form action="{{ route('dashboard.operational.store') }}" method="POST" >
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Jenis Biaya <span style="color: red;">*</span></label>
                  <input name="type_cost" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Jenis Biaya">
                  @error('type_cost')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror 
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Biaya <span style="color: red;">*</span></label>
                    <input name="nominal" type="number" class="form-control" id="exampleInputNominal" aria-describedby="emailHelp" placeholder="Masukkan Biaya">
                    @error('nominal')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror 
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPrice">Kategori <span style="color: red;">*</span></label>
                    <select name="category" class="form-control" id="exampleInputPrice" placeholder="Masukkan Kategori">
                        <option value="" disabled selected>Pilih Kategori</option>
                        <option value="Administrasi">Administrasi</option>
                        <option value="Bahan Baku & Persediaan">Bahan Baku & Persediaan</option>
                        <option value="Keamanan">Keamanan</option>
                        <option value="Asuransi">Asuransi</option>
                        <option value="Penyusutan">Penyusutan</option>
                        <option value="Pemeliharaan & Perbaikan">Pemeliharaan & Perbaikan</option>
                        <option value="Transportasi">Transportasi</option>
                        <option value="Penggajian">Penggajian</option>
                    </select>
                    @error('category')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror 
                  </div>
                  <div class="form-group">
                    <label for="exampleInputDescription">Catatan <span style="color: red;">*</span></label>
                    <input type="text" name="description" class="form-control" id="exampleInputEmail" placeholder="Masukkan Catatan"></input>
                    @error('description')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror 
                  </div>          
                  <div class="form-group">
                    <button type="submit" class="btn form-control" id="search-btn">Simpan</button>      
                  </div>                      
              </form>
        </div>
    </div>
</div>
@endsection