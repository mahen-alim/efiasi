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
                <h1 class="text-center">Dropzone Image Upload in Laravel</h1><br>
                <form action="{{ route('dropzone.store') }}" method="POST" name="file" files="true" enctype="multipart/form-data" class="dropzone" id="image-upload">
                @csrf
                <div>
                    <h3 class="text-center">Upload Multiple Images</h3>
                </div>
                </form>
                <button type="button" id="button" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    Dropzone.option.imageUpload = {
        maxFilesize: 10,
        acceptedFiles: ".jpeg, .jpg, .png, .gif",
        addRemoveLinks: true,
        createImageThumbnails: true,
        autoProcessQueue: false,
        init: function() {
            var myDropzone = this;

            $("#button").click(function (e) {
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
    
</body>
</html>