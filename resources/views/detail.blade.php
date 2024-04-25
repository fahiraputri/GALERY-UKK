@extends('layouts.app')
@section('content')
<body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">
                <i class="fas fa-film mr-2"></i>
                Foto                
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <button type="button" class="btn btn-outline-primary btn-top-right">Kembali</button> -->
            <a href="{{route('welcome')}}" class="btn btn-primary navbar-brand">Kembali</a>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
            </ul>
            </div>
        </div>
    </nav>
            </div> 
            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                <div class="tm-bg-gray tm-video-details">
                    <p class="mb-4">
                        <div class="card" style="width: 18rem;">
                    <img src="{{asset('storage/images/'.$image->image)}}" class="card-img-top" alt="Image" >
                    <div class="card-body">
                        <h5 class="card-title">Keterangan</h5>
                        <p>{{$image->caption}}</p>
                        <h5 class="card-title">Ketegori</h5>
                        <p>{{$image->category}}</p>
                        <div class="card my-4">
                            <!-- <h5 class="card-header">Tinggalkan Komentar:</h5> -->
                            <!-- <div class="card-body"> -->
                                <form action="" method="post">
                                    @csrf
                                    <!-- <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
                                    <div class="d-grid gap-2">
                                     <button class="btn btn-primary btn-sm" type="button">Komen</button>

                                    <input class="form-control" type="text" name="komentar"></input> -->
                                    </div>
                                     </div>
                                    </div>
                                    <a href="{{route('welcome')}}" class="btn btn-primary navbar-brand">Kembali</a>                                    <!-- <button type="button" class="btn btn-primary d-flex justify-content-right m-3 float-right">Submit</button> -->
                                    <!-- <button onclick="submitComment()">Submit</button> -->


                                </form>
                            <!-- </div> -->
                        </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="row mb-4">
           
        </div>
         
        </div> <!-- row -->
    </div> <!-- container-fluid, tm-container-content -->

    <script src="js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
</body>
</html>
@endsection
