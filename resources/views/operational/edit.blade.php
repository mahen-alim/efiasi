@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Edit Operasional</h6>
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
            <form action="/operational/{{ $operational->id }}" method="POST" >
              @method('put')
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Jenis Biaya</label>
                  <input name="type_cost" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Jenis Biaya" value="{{ $operational->type_cost}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Biaya</label>
                    <input name="nominal" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Biaya" value="{{ $operational->nominal}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputCategory">Kategori Biaya</label>
                    <select name="category" class="form-control" id="exampleInputCategory" placeholder="Masukkan Kategori" >
                        <option value="Administrasi" {{ $operational->category == 'Administrasi' ? 'selected' : '' }}>Administrasi</option>
                        <option value="Produksi" {{ $operational->category == 'Produksi' ? 'selected' : '' }}>Produksi</option>
                        <option value="Penjualan" {{ $operational->category == 'Penjualan' ? 'selected' : '' }}>Penjualan</option>
                    </select>
                </div>                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Catatan</label>
                    <input name="description" type="textarea" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Catatan" value="{{ $operational->description}}">
                  </div>
                <button type="submit" class="btn btn-primary">Edit</button>
              </form>
        </div>
    </div>
</div>
@endsection