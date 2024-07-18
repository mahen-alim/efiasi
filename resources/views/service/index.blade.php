@extends('layouts.master')

@section('content')
<style>
  /* The Modal (background) */
  .modal {
      display: none; /* Hidden by default */
      position: fixed; /* Stay in place */
      z-index: 5; /* Sit on top */
      padding-top: 100px; /* Location of the box */
      left: 0;
      top: 0;
      width: 100%; /* Full width */
      height: 100%; /* Full height */
      overflow: auto; /* Enable scroll if needed */
      background-color: rgb(0,0,0); /* Fallback color */
      background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
  }

  /* Modal Content (Image) */
  .modal-content {
      margin: auto;
      display: block;
      width: 50%; /* Reduce the width to make the image smaller */
      max-width: 300px; /* Reduce the max width to make the image smaller */
  }

  /* Caption of Modal Image */
  #caption {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 300px; /* Adjust the max width */
      text-align: center;
      color: #ccc;
      padding: 10px 0;
      height: 150px;
  }

  /* Add Animation - Zoom in the Modal */
  .modal-content, #caption {
      animation-name: zoom;
      animation-duration: 0.6s;
  }

  @keyframes zoom {
      from {transform: scale(0)}
      to {transform: scale(1)}
  }

  /* The Close Button */
  .close {
      position: absolute;
      top: 15px;
      right: 35px;
      color: #f1f1f1;
      font-size: 40px;
      font-weight: bold;
      transition: 0.3s;
  }

  .close:hover,
  .close:focus {
      color: #bbb;
      text-decoration: none;
      cursor: pointer;
  }

  .px-4 img:hover{
    cursor: pointer;
  }
</style>
<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header pb-0">
        <h6>Detailing Table</h6>
        <div class="d-flex justify-content-between align-items-end flex-wrap">
          <form action="{{ url('service/search') }}" method="GET" class="flex-grow-1 me-3 mb-2 mb-lg-0">
            <div class="d-flex">
              <input type="text" class="form-control me-2" name="name" placeholder="Search by service type" style="height: 40px; width: 220px;">
              <button type="submit" class="btn" id="search-btn"><img src="{{ asset('img/search_new.png') }}" alt=""></button>
            </div>
          </form>
          <a href="{{ route('dashboard.service.create') }}" class="btn btn-primary" id="add-btn">Tambah Data</a>
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
                  <img src="{{ $serve->file }}" alt="Image" style="width: 60px; height: 60px;" onclick="showModal(this);">
                </td>
                <td class="px-4 d-flex">
                  <a href="{{ route('dashboard.service.edit', $serve->id) }}" class="btn" id="btn-edit">Edit</a>
                  <form action="{{ route('dashboard.service.destroy', $serve->id) }}" method="POST">
                    @method('delete')
                    @csrf
                    <input type="submit" class="btn" id="btn-cancel" onclick="return confirm('Apakah anda yakin akan menghapus data ini?')" value="Delete">
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
          <!-- The Modal -->
          <div id="myModal" class="modal">
            <span class="close" onclick="closeModal()">&times;</span>
            <img class="modal-content" id="img01">
            <div id="caption"></div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>
<script>
  function showModal(img) {
      var modal = document.getElementById("myModal");
      var modalImg = document.getElementById("img01");
      var captionText = document.getElementById("caption");
      modal.style.display = "block";
      modalImg.src = img.src;
      captionText.innerHTML = img.alt;
  }

  function closeModal() {
      var modal = document.getElementById("myModal");
      modal.style.display = "none";
  }
</script>

@endsection