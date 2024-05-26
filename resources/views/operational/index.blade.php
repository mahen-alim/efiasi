@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Operational Table</h6>
        <div class="d-flex justify-content-between align-items-end flex-wrap">
          <form action="{{ url('operational/search') }}" method="GET" class="flex-grow-1 me-3 mb-2 mb-lg-0">
            <div class="d-flex">
                <input type="text" class="form-control me-2" name="name" placeholder="Search by cost type" style="height: 40px; width: 220px;">
                <button type="submit" class="btn" id="search-btn"><img src="{{ asset('img/search_new.png') }}" alt=""></button>
            </div>
          </form> 
          <a href="{{ route('dashboard.operational.create') }}" class="btn btn-primary float-end" id="add-btn">Tambah Data</a>
        </div>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-4">
          <table class="table align-items-center mb-0">
            <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jenis Biaya</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Biaya</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>
                </tr>
            </thead>
            <tbody class="hoverable">
                @foreach ($operational as $index => $operate)
                <tr>
                  <td class="px-4">{{ $index + 1 }}</td>
                  <td class="px-4">{{ $operate->type_cost }}</td>
                  <td class="px-4">{{ $operate->nominal }}</td>
                  <td class="px-4">{{ $operate->category }}</td>
                  <td class="px-4 d-flex">
                    <a href="{{ route('dashboard.operational.edit', $operate->id) }}" class="btn" id="btn-edit">Edit</a>
                    <form action="{{ route('dashboard.operational.destroy', $operate->id) }}" method="POST">
                        @method('delete')
                        @csrf
                        <input type="submit" class="btn" id="btn-cancel" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"
                            value="Hapus">
                    </form>
                  </td>                
                </tr>
                @endforeach
            </tbody>
        </table>    
        <div class="pagination justify-content-center">
          @if ($operational instanceof \Illuminate\Pagination\LengthAwarePaginator)
              {{ $operational->links() }}
          @endif
        </div>    
      </div>
    </div>
  </div>
</div>
@endsection