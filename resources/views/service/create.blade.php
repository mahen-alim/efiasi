@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Tambah Detailing</h6>
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
            <form action="/service" method="POST" enctype="multipart/form-data" class="dropzone">
              @csrf
              <div class="form-group">
                  <label for="exampleInputPrice">Tipe Layanan</label>
                  <select name="type" class="form-control" id="exampleInputPrice" placeholder="Masukkan tipe layanan">
                      <option value="" disabled selected>Pilih Tipe Layanan</option>
                      <option value="Detailing Interior">Detailing Interior</option>
                      <option value="Detailing Eksterior">Detailing Eksterior</option>
                      <option value="Detailing Kaca Mobil">Detailing Kaca Mobil</option>
                      <option value="Detailing Engine Bay">Detailing Engine Bay</option>
                      <option value="Detailing Velg & Ban">Detailing Velg & Ban</option>
                  </select>              
              </div>
              <div class="form-group">
                  <label for="exampleInputSparepart">Suku Cadang</label>
                  <select name="sparepart" class="form-control" id="exampleInputSparepart" placeholder="Masukkan suku cadang">
                      <option value="" disabled selected>Pilih Suku Cadang</option>
                      <option value="Microfiber">Kain Mikrofiber</option>
                      <option value="Car Shampoo">Sampo Mobil</option>
                      <option value="Wax or Sealant">Pengilap atau Sealant</option>
                      <option value="Detailing Brushes">Sikat Detailing</option>
                      <option value="Clay Bar">Bar Clay</option>
                      <option value="Interior Cleaners">Pembersih Interior</option>
                      <option value="Glass Cleaners">Pembersih Kaca</option>
                      <option value="Tar Remover">Tar Remover</option>
                      <option value="Metal Polish">Metal Polish</option>
                      <option value="Wheel Cleaner">Wheel Cleaner</option>
                      <option value="Tire Brush">Tire Brush</option>
                  </select>    
              </div>
          
              <div class="form-group">
                  <label for="exampleInputQty">Jumlah Suku Cadang</label>
                  <input name="qty" type="number" class="form-control" id="exampleInputQty" aria-describedby="emailHelp" placeholder="Masukkan Jumlah Suku Cadang">
              </div>
          
              <div class="form-group">
                  <label for="exampleInputPrice">Harga</label>
                  <input name="price" type="number" class="form-control" id="exampleInputPrice" aria-describedby="emailHelp" placeholder="Masukkan Harga">
              </div>
              
              <div class="form-group">
                  <label for="exampleInputFile">Foto Sparepart</label>
                  <!-- Tambahkan class dropzone dan ganti name dengan id -->
                  <div id="image-upload" class="dz-default dz-message dropzoneDragArea">
                      <span>Unggah Foto</span>
                  </div>
                  <div class="dropzone-previews"></div>
              </div> 
          
              <div class="form-group">
                  <button type="submit" class="btn form-control" id="search-btn">Simpan</button>
              </div>
          </form>
          
          
          <script type="text/javascript">
            Dropzone.option.imageUpload = {
                maxFilesize: 10,
                acceptedFiles: ".jpeg, .jpg, .png, .gif",
                addRemoveLinks: true,
                createImageThumbnails: true,
                autoProcessQueue: false,
                previewsContainer: 'div.dropzone-previews',
                uploadMultiple: false,
                parallelUploads: 1,
                maxFiles: 1,
                init: function() {
                    var myDropzone = this;
        
                    $("#search-btn").click(function (e) {
                        e.preventDefault();
                        myDropzone.processQueue();
                    });
        
                    this.on('sending', function(file, xhr, formData) {
        
                        var data = $('#image-upload').serializeArray();
                        $.each(data, function(key, el) {
                            formData.append(el.name, el.value);
                        });
                    });
                }
            };
            </script>
                     
    
        </div>
    </div>
</div>
@endsection