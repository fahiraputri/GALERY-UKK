@extends('layouts.app')

@section('content')
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                        <div class="col-md-9">
                            <div class="row"></div>
                            <div class="col-md-12">
                                @if($errors->any())
                                @foreach($errors->all() as $error)
                                <div class="alert alert-danger">
                                    <strong>Error</strong> {{$error}}
                                </div>
                                @endforeach
                                @endif
                                <button data-toggle="collapse" class="btn btn-success" data-target="#demo">Tambah
                                    gambar</button>
                                <div id="demo" class="collapse">
                                    <form action="{{route('images.store')}}" method="post" id="123image_upload_form"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="caption">Keterangan gambar</label>
                                            <input type="text" name="caption" class="form-control"
                                                placeholder="Masukan keterangan" id="caption">
                                        </div>
                                        <div class="form-group">
                                            <label for="sel1">Pilih kategori</label>
                                            <select name="category" class="form-control" id="category">
                                                <option value="">Pilih kategori</option>
                                                <option value="Hewan">Hewan</option>
                                                <option value="Tumbuhan">Tumbuhan</option>
                                                <option value="Buah">Buah</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Unggah gambar</label>
                                            <div class="preview-zone hidden">
                                                <div class="box box-solid">
                                                    <div class="box-header with-border">
                                                        <div><b>Preview</b></div>
                                                        <div class="box-tools pull-right">
                                                            <button type="button"
                                                                class="btn btn-danger btn-xs remove-preview">
                                                                <i class="fa fa-times"></i> Batal
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="box-body"></div>
                                                </div>
                                            </div>
                                            <div class="dropzone-wrapper">
                                                <div class="dropzone-desc">
                                                    <i class="glyphicon glyphicon-download-alt"></i>
                                                    <p>Pilih file gambar</p>
                                                </div>
                                                <input type="file" name="image" class="dropzone">
                                            </div>
                                            <div id="image_error"></div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                        <a href="{{route('welcome')}}" class="btn btn-primary">Kembali</a>                                  
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <div class="row">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection

            @section('js')
            <script type="text/javascript">
            $("#image_upload_form").validate({
                rules: {
                    caption: {
                        required: true,
                        maxlength: 255
                    },
                    category: {
                        required: true,
                    },
                    image: {
                        required: true,
                        extension: "png|jpeg|jpg|bmp"
                    }

                },
                messages: {
                    caption: {
                        required: "Please enter an image caption",
                        maxlength: "Max. 255 character allowed."
                    },
                    category: {
                        required: "Please select a category.",
                    },
                    image: {
                        required: "Please upload an image.",
                        extension: "Only jpeg, jpg, png, bmp image allowed."
                    }
                },
                errorPlacement: function(error, element) {
                    if (element.attr('name') == "image") {
                        error.insertAfter("#image_error");
                    } else {
                        error.insertAfter(element);
                    }
                }

            });

            function readFile(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {

                        var valiImageType = ['image/png', 'image/bmp', 'image/jpeg', 'image/jpg'];

                        if (!valiImageType.includes(input.files[0]['type'])) {
                            var htmlPreview =
                                '<p> image preview not available </p>' +
                                '<p>' + input.files[0].name + '</p>';
                        } else {
                            var htmlPreview =
                                '<img width="70%" height="300" src="' + e.target.result + '" />' +
                                '<p>' + input.files[0].name + '</p>';
                        }
                        var wrapperZone = $(input).parent();
                        var previewZone = $(input).parent().parent().find('.preview-zone');
                        var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find(
                            '.box-body');

                        wrapperZone.removeClass('dragover');
                        previewZone.removeClass('hidden');
                        boxZone.empty();
                        boxZone.append(htmlPreview);
                    };

                    reader.readAsDataURL(input.files[0]);
                }
            }

            function reset(e) {
                e.wrap('<form>').closest('form').get(0).reset();
                e.unwrap();
            }

            $(".dropzone").change(function() {
                readFile(this);
            });

            $('.dropzone-wrapper').on('dragover', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).addClass('dragover');
            });

            $('.dropzone-wrapper').on('dragleave', function(e) {
                e.preventDefault();
                e.stopPropagation();
                $(this).removeClass('dragover');
            });

            $('.remove-preview').on('click', function() {
                var boxZone = $(this).parents('.preview-zone').find('.box-body');
                var previewZone = $(this).parents('.preview-zone');
                var dropzone = $(this).parents('.form-group').find('.dropzone');
                boxZone.empty();
                previewZone.addClass('hidden');
                reset(dropzone);
            });
            </script>
            @endsection