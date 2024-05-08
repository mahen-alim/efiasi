@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card mb-4">
        <div class="card-header pb-0">
          <h6>Tambah Detailing</h6>
        </div>
        <div class="card-body px-4 pt-0 pb-2">
            <form method="POST" action="{{ route('dashboard.service.store') }}"  id="formDropzone" class="dropzone" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="exampleInputPrice">Tipe Layanan <span style="color: red;">*</span></label>
                    <select name="type" class="form-control" id="exampleInputServiceType" placeholder="Masukkan Tipe Layanan">
                        <option value="" disabled selected>Pilih Tipe Layanan</option>
                        <option value="Detailing Interior">Detailing Interior</option>
                        <option value="Detailing Eksterior">Detailing Eksterior</option>
                        <option value="Detailing Kaca Mobil">Detailing Kaca Mobil</option>
                        <option value="Detailing Ruang Mesin">Detailing Ruang Mesin</option>
                        <option value="Detailing Velg & Ban">Detailing Velg & Ban</option>
                    </select>  
                    @error('type')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror              
                </div>
                <div class="form-group">
                    <label for="exampleInputSparepart">Deskripsi Layanan<span style="color: red;">*</span></label>
                    <textarea name="description" class="form-control" id="exampleInputSparepart" placeholder="Masukkan Deskripsi Layanan"></textarea>    
                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror  
                </div>
                <div class="form-group">
                    <label for="exampleInputSparepart">Manfaat Layanan<span style="color: red;">*</span></label>
                    <textarea name="benefit" class="form-control" id="exampleInputSparepart" placeholder="Masukkan Manfaat Layanan"></textarea>    
                    @error('benefit')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror  
                </div>

                <div class="form-group">
                    <label for="exampleInputQty">Durasi Pengerjaan<span style="color: red;">*</span></label>
                    <input name="duration" type="number" class="form-control" id="exampleInputDuration" aria-describedby="emailHelp" placeholder="Masukkan Durasi Pengerjaan">
                    @error('duration')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror  
                </div>
            
                <div class="form-group">
                    <label for="exampleInputPrice">Harga <span style="color: red;">*</span></label>
                    <input name="price" type="number" class="form-control" id="exampleInputPrice" aria-describedby="emailHelp" placeholder="Masukkan Harga" disabled>
                    @error('price')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror  
                </div>  
            
                <div class="form-group mb-4">
                    <label class="form-label text-muted opacity-75 fw-medium" for="formImage">Foto Detailing <span style="color: red;">*</span></label>
                    <div class="dropzone-drag-area form-control" id="previews">
                        <div class="dz-message text-muted opacity-50" data-dz-message>
                            <span>Drag file here to upload</span>
                        </div>    
                    </div>
                    @error('file')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>             
            
                <button class="btn form-control" id="search-btn" type="submit">
                    <span class="spinner-border spinner-border-sm d-none me-2" aria-hidden="true"></span>
                    Simpan
                </button>
            
            </form>
            
            <!-- Scripts -->
            <script src="{{ asset('js/jquery.js') }}"></script>
            <script src="{{ asset('js/dropzone.js') }}"></script>
            <script>
                Dropzone.autoDiscover = false;
            
                $('#formDropzone').dropzone({
                    addRemoveLinks: true,
                    autoProcessQueue: false,       
                    uploadMultiple: false,
                    parallelUploads: 1,
                    maxFiles: 1,
                    acceptedFiles: '.jpeg, .jpg, .png, .gif',
                    previewsContainer: "#previews",
                    init: function() 
                    {
                        myDropzone = this;
            
                        // when file is dragged in
                        this.on('addedfile', function(file) { 
                            $('.dropzone-drag-area').removeClass('is-invalid').next('.invalid-feedback').hide();
                        });
                    },
                    success: function(file, response) 
                    {
                        // hide form and show success message
                        $('#formDropzone').fadeOut(600);
                        setTimeout(function() {
                            $('#successMessage').removeClass('d-none');
                            window.location.href = '/service-index';
                        }, 600);
                    }
                });
            
                $('#search-btn').on('click', function(event) {
                    event.preventDefault();
                    var $this = $(this);
                    
                    // show submit button spinner
                    $this.children('.spinner-border').removeClass('d-none');
                    
                    // validate form & submit if valid
                    if ($('#formDropzone')[0].checkValidity() === false) {
                        event.stopPropagation();
            
                        // show error messages & hide button spinner    
                        $('#formDropzone').addClass('was-validated'); 
                        $this.children('.spinner-border').addClass('d-none');
    
                        // if dropzone is empty show error message
                        if (!myDropzone.getQueuedFiles().length > 0) {                        
                            $('.dropzone-drag-area').addClass('is-invalid').next('.invalid-feedback').show();
                        }
                    } else {
                        // if everything is ok, submit the form
                        myDropzone.processQueue();
                    }
                });
    
            </script>
              
                     
    
        </div>
    </div>
</div>
@endsection