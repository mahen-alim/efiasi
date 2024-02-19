@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Edit Detailing</h6>
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
            <form action="/service/{{ $service->id }}" method="POST" >
              @method('put')
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Tipe Layanan</label>
                  <input name="type" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan tipe layanan" value="{{ $service->tipe_service}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Suku Cadang</label>
                    <input name="sparepart" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Suku Cadang" value="{{ $service->sparepart}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Harga</label>
                    <input name="price" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Harga" value="{{ $service->price}}">
                  </div>
                <button type="submit" class="btn form-control" id="search-btn">Simpan Perubahan</button>
              </form>
        </div>
    </div>
</div>
@endsection