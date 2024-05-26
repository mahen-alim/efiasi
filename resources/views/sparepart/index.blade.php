@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Variasi Table</h6>
        <div class="d-flex justify-content-between align-items-end flex-wrap">
          <form action="{{ url('sparepart/search') }}" method="GET" class="flex-grow-1 me-3 mb-2 mb-lg-0">
            <div class="d-flex">
                <input type="text" class="form-control me-2" name="name" placeholder="Search by variation name" style="height: 40px; width: 220px;">
                <button type="submit" class="btn" id="search-btn"><img src="{{ asset('img/search_new.png') }}" alt=""></button>
            </div>
          </form>         
          <a href="{{ route('dashboard.sparepart.create') }}" class="btn btn-primary align-self-end" id="add-btn">Tambah Data</a>
        </div>        
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-4">
          <table class="table align-items-center mb-0">
            <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Variasi</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jumlah</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Merek</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Harga</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                </tr>
            </thead>
            <tbody class="hoverable">
                @foreach ($sparepart as $index => $spare)
                <tr>
                  <td class="px-4">{{ $index + 1 }}</td>
                  <td class="px-4">{{ $spare->name }}</td>
                  <td class="px-4">{{ $spare->jumlah }}</td>
                  <td class="px-4">{{ $spare->merk }}</td>
                  <td class="px-4">{{ $spare->price }}</td>
                  <td class="px-4 d-flex">
                    <a href="{{ route('dashboard.sparepart.edit', $spare->id) }}" class="btn" id="btn-edit">Edit</a>
                    <form action="{{ route('dashboard.sparepart.destroy', $spare->id) }}" method="POST">
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
          @if ($sparepart instanceof \Illuminate\Pagination\LengthAwarePaginator)
              {{ $sparepart->links() }}
          @endif
        </div>    
        </div>
      </div>
    </div>
  </div>
</div>
@endsection