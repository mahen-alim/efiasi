<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dropzone Image Upload in Laravel</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
    <script src="https:/cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center">Upload File dengan Laravel</h1><br>
                <div class="col-lg-8 mx-auto my-5">
                    {{-- Peringatan Jika Error --}}
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }} <br/>
                        @endforeach
                    </div>
                    @endif
                    <form action="{{ route('upload.file') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <b>File Gambar</b>
                        <input type="file" name="file">
                    </div>
                    <div class="form-group mt-3">
                        <b>Keterangan</b>
                        <textarea name="keterangan" class="form-control">
                        </textarea>
                    </div>
                    <input type="submit" value="Upload" class="btn btn-primary mt-5"></input>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>