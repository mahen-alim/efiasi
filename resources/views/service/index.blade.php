@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Detailing Table</h6>
        <div class="d-flex">
          <form action="{{ url('service/search') }}" method="GET" class="flex-grow-1 me-10">
            <div class="d-flex">
                <input type="text" class="form-control me-2" name="name" placeholder="Search by service type" style="height: 40px; width: 30%;">
                <button type="submit" class="btn" id="search-btn"><img src="{{ asset('img/search_new.png') }}" alt=""></button>
            </div>
          </form> 
          <a href="{{ route('dashboard.service.create') }}" class="btn btn-primary align-self-end" id="add-btn">Tambah Data</a>
        </div>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-4">
          <table class="table align-items-center mb-0">
            <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Servis</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Durasi Pengerjaan</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Foto</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                </tr>
            </thead>
            <tbody class="hoverable">
              @foreach ($service as $index => $serve)
                <tr>
                  <td class="px-4">{{ $index + 1 }}</td>
                  <td class="px-4">{{ $serve->tipe_service }}</td>
                  <td class="px-4">{{ $serve->duration }} Jam</td>
                  <td class="px-4">{{ $serve->price }}</td>
                  <td class="px-4">
                    <img src="{{ $serve->file }}" alt="Image" style="width: 60px; height: 60px;">
                  </td>
                  <td class="px-4 d-flex">
                    <a href="{{ route('dashboard.service.edit', $serve->id) }}" class="btn" id="btn-edit">Edit</a>
                    <form action="{{ route('dashboard.service.destroy', $serve->id) }}" method="POST">
                        @method('delete')
                        @csrf
                        <input type="submit" class="btn" id="btn-cancel" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"
                            value="Delete">
                    </form>
                  </td>                
                </tr>
              @endforeach
            </tbody>
        </table>     
        <div class="pagination justify-content-center">     
          @if ($service instanceof \Illuminate\Pagination\LengthAwarePaginator)
              {{ $service->links() }}
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection