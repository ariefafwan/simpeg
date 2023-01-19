@extends('admin.app')

@section('body')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Hasil Penilaian</h1>
    <div class="row">
    <div class="container text-dark">
        
        Anda Belum Menilai Apapun, Silahkan Menilai :

        <div class="box-footer mb-3 mt-4">
            <a href="{{ route('hasil.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i>  CREATE NEW</a>
        </div>
        
        
    </div>
    </div>
</div>
@endsection