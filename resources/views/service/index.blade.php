@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Service Table</h6>
        <a href="service/create" class="btn btn-primary float-end">Tambah Data</a>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
                <tr>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No.</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sparepart</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Price</th>
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                </tr>
            </thead>
            <tbody class="hoverable">
                @foreach ($service as $serve)
                <tr>
                  <td class="px-4">{{ $serve->id }}</td>
                  <td class="px-4">{{ $serve->tipe_service }}</td>
                  <td class="px-4">{{ $serve->sparepart }}</td>
                  <td class="px-4">{{ $serve->price }}</td>
                  <td class="px-4 d-flex">
                    <a href="/service/{{ $serve->id}}/edit" class="btn btn-warning" style="margin-right: 20px;">Edit</a>
                    <form action="/service/{{ $serve->id }}" method="POST">
                        @method('delete')
                        @csrf
                        <input type="submit" class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')"
                            value="Delete">
                    </form>
                  </td>                
                </tr>
                @endforeach
            </tbody>
        </table>        
        </div>
      </div>
    </div>
  </div>
</div>
@endsection