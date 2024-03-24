@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Tambah Detailing</h6>
        </div>
        <div class="card-body px-4 pt-0 pb-2">
            <form action="/service" method="POST" name="demoform" id="demoform" class="dropzone" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                  <label for="exampleInputPrice">Tipe Layanan <span style="color: red;">*</span></label>
                  <select name="type" class="form-control" id="exampleInputPrice" placeholder="Masukkan tipe layanan">
                      <option value="" disabled selected>Pilih Tipe Layanan</option>
                      <option value="Detailing Interior">Detailing Interior</option>
                      <option value="Detailing Eksterior">Detailing Eksterior</option>
                      <option value="Detailing Kaca Mobil">Detailing Kaca Mobil</option>
                      <option value="Detailing Engine Bay">Detailing Engine Bay</option>
                      <option value="Detailing Velg & Ban">Detailing Velg & Ban</option>
                  </select>  
                  @error('type')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror              
              </div>
              <div class="form-group">
                  <label for="exampleInputSparepart">Suku Cadang <span style="color: red;">*</span></label>
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
                  @error('sparepart')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror  
              </div>
          
              <div class="form-group">
                  <label for="exampleInputQty">Jumlah Suku Cadang <span style="color: red;">*</span></label>
                  <input name="qty" type="number" class="form-control" id="exampleInputQty" aria-describedby="emailHelp" placeholder="Masukkan Jumlah Suku Cadang">
                  @error('qty')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror  
              </div>
          
              <div class="form-group">
                  <label for="exampleInputPrice">Harga <span style="color: red;">*</span></label>
                  <input name="price" type="number" class="form-control" id="exampleInputPrice" aria-describedby="emailHelp" placeholder="Masukkan Harga">
                  @error('price')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror  
              </div>  

              <div class="form-group">
                <label for="">Foto Sparepart <span style="color: red;">*</span></label>
                <div id="dropzoneDragArea" class="dz-default dz-message dropzoneDragArea" style="margin-top: 10px;">
                  <span>Upload file</span>
                </div>
                @error('file')
                  <div class="text-danger">{{ $message }}</div>
                @enderror 
                <div class="dropzone-previews"></div>
              </div>
              
            
              <button type="submit" class="btn form-control" id="search-btn" >Simpan</button>        
            </form>
            
          
            <script>
              Dropzone.autoDiscover = false;
              $(function() {
                  var myDropzone = new Dropzone("div#dropzoneDragArea", {
                      paramName: "file",
                      url: "{{ route('service.file') }}",
                      previewsContainer: 'div.dropzone-previews',
                      addRemoveLinks: true,
                      autoProcessQueue: false,
                      uploadMultiple: false,
                      parallelUploads: 1,
                      maxFiles: 1,
                      acceptedFiles: ".jpeg, .jpg, .png, .gif",
                      // The setting up of the dropzone
                      init: function() {
                          var myDropzone = this;
                          // Form submission
                          $("form[name='demoform']").submit(function(event) {
                              // Make sure the form isn't actually being sent.
                              event.preventDefault();
                              // Collect other form data
                              var formData = new FormData($(this)[0]);
                              // Submit form data
                              $.ajax({
                                  type: 'POST',
                                  url: $(this).attr('action'),
                                  data: formData,
                                  processData: false,  // Important!
                                  contentType: false,  // Important!
                                  success: function(response) {
                                      // If form data successfully submitted, process Dropzone queue
                                      myDropzone.processQueue();
                                  },
                                  error: function(xhr, status, error) {
                                      console.error(xhr.responseText);
                                  }
                              });
                          });
          
                          // Gets triggered when file is successfully uploaded
                          this.on("success", function(file, response) {
                              console.log(response); // Log server response (if any)
                              // Reset the form
                              $('#demoform')[0].reset();
                              // Reset Dropzone
                              $('.dropzone-previews').empty();
                              // Provide feedback to the user if needed
                              alert('File successfully uploaded!');
                          });
          
                      }
                  });
              });
          </script>
          
              
                     
    
        </div>
    </div>
</div>
@endsection