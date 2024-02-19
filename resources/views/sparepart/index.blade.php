@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Variasi Table</h6>
        <div class="d-flex">
          <form action="{{ url('/sparepart/search') }}" method="GET" class="flex-grow-1 me-10">
            <div class="d-flex">
                <input type="text" class="form-control me-2" name="name" placeholder="Search by sparepart name" style="height: 40px; width: 50%;">
                <button type="submit" class="btn" id="search-btn">Cari</button>
            </div>
          </form>         
          <a href="sparepart/create" class="btn btn-primary align-self-end" id="add-btn">Tambah Data</a>
        </div>        
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Sparepart</th>
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
                    <a href="/sparepart/{{ $spare->id}}/edit" class="btn btn-outline-warning" style="margin-right: 20px;">Edit</a>
                    <form action="/sparepart/{{ $spare->id }}" method="POST">
                        @method('delete')
                        @csrf
                        <input type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"
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