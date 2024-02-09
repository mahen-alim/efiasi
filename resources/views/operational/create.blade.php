@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Tambah Operasional</h6>
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
            <form action="/operational" method="POST" >
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Jenis Biaya</label>
                  <input name="type_cost" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Jenis Biaya">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Biaya</label>
                    <input name="nominal" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Biaya">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPrice">Kategori</label>
                    <select name="category" class="form-control" id="exampleInputPrice" placeholder="Masukkan Kategori">
                        <option value="Administrasi">Administrasi</option>
                        <option value="Produksi">Produksi</option>
                        <option value="Penjualan">Penjualan</option>
                        <!-- Tambahkan opsi lain sesuai kebutuhan -->
                    </select>
                    <div class="form-group">
                      <label for="exampleInputDescription">Catatan</label>
                      <textarea name="description" class="form-control" id="exampleInputDescription" rows="3" placeholder="Masukkan Catatan"></textarea>
                    </div>                  
                </div>                
                <button type="submit" class="btn btn-primary">Tambahkan</button>
              </form>
        </div>
    </div>
</div>
@endsection