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
            <form action="{{route('dashboard.service.update', $service->id) }}" method="POST" >
              @method('PUT')
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Tipe Layanan</label>
                      <select name="type" class="form-control" id="exampleInputPrice" placeholder="Masukkan tipe layanan">
                        <option value="Detailing Interior" {{ $service->tipe_service == 'Detailing Interior' ? 'selected' : '' }}>Detailing Interior</option>
                        <option value="Detailing Eksterior" {{ $service->tipe_service == 'Detailing Eksterior' ? 'selected' : '' }}>Detailing Eksterior</option>
                        <option value="Detailing Kaca Mobil" {{ $service->tipe_service == 'Detailing Kaca Mobil' ? 'selected' : '' }}>Detailing Kaca Mobil</option>
                        <option value="Detailing Engine Bay" {{ $service->tipe_service == 'Detailing Engine Bay' ? 'selected' : '' }}>Detailing Engine Bay</option>
                        <option value="Detailing Velg & Ban" {{ $service->tipe_service == 'Detailing Velg & Ban' ? 'selected' : '' }}>Detailing Velg & Ban</option>
                    </select>  
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Deskripsi Layanan</label>
                    <textarea name="description" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Deskripsi Layanan">{{ $service->description}}</textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Manfaat Layanan</label>
                  <textarea name="benefit" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Manfaat Layanan">{{ $service->benefit}}</textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Durasi Pengerjaan</label>
                  <input name="duration" type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Durasi Pengerjaan" value="{{ $service->duration}}">
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