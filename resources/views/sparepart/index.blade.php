@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Sparepart Table</h6>
        <a href="sparepart/create" class="btn btn-primary float-end">Tambah Data</a>
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
                    <a href="/sparepart/{{ $spare->id}}/edit" class="btn btn-warning" style="margin-right: 20px;">Edit</a>
                    <form action="/sparepart/{{ $spare->id }}" method="POST">
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