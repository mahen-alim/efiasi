<!DOCTYPE html>
<html lang="en">
<head>
    <title>Request dengan Input Laravel</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center">Form Validation dengan Laravel</h1>
                <form action="/formulir/proses" method="POST">
                    @csrf
                    <div class="form-group mt-5">
                        <label for="nama" class="control-label">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" class="form-control
                        {{ $errors->has('nama') ? 'is-invalid' : '' }}" placeholder="Nama Lengkap">
                        @if ($errors->has('nama'))
                            <span class="text-danger small">
                                <p>{{ $errors->first('nama') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="form-group mt-3">
                        <label for="alamat" class="control-label">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3" class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}"
                        placeholder="Alamat" value="{{ old('alamat') }}"></textarea>
                        @if ($errors->has('alamat'))
                            <span class="text-danger small">
                                <p>{{ $errors->first('alamat') }}</p>
                            </span>
                        @endif
                    </div>
                    <input type="submit" value="Simpan" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>

   
</body>
</html>