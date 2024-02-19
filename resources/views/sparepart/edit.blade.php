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
            <form action="/sparepart/{{ $sparepart->id }}" method="POST" >
              @method('put')
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama Barang</label>
                  <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan tipe layanan" value="{{ $sparepart->name}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Jumlah Barang</label>
                    <input name="jumlah" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Suku Cadang" value="{{ $sparepart->jumlah}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Merek Barang</label>
                    <input name="merk" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Merek Barang" value="{{ $sparepart->merk}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Harga Barang</label>
                    <input name="price" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Harga" value="{{ $sparepart->price}}">
                  </div>
                <button type="submit" class="btn form-control" id="search-btn">Simpan Perubahan</button>
              </form>
        </div>
    </div>
</div>
@endsection