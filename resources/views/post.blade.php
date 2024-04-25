@extends('layouts.app')

@section('content')

<div class="card my-4">
    <h5 class="card-header">Tinggalkan Komentar:</h5>
    <div class="card-body">
        <form action="" method="post">
            @csrf
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
            <div class="form-group">
                <p>Comment:</p>
                <input class="form-control" type="text" name="komentar"></input>
                
            </div>
            <input type="submit" class="btn btn-primary"></button>
        </form>
    </div>
</div>
@endsection