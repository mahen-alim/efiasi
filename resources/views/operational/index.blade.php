@extends('layouts.master')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Operational Table</h6>
        <a href="operational/create" class="btn btn-primary float-end">Tambah Data</a>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
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
                    <a href="/operational/{{ $operate->id}}/edit" class="btn btn-warning" style="margin-right: 20px;">Edit</a>
                    <form action="/operational/{{ $operate->id }}" method="POST">
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