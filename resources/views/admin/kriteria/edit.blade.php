@extends('admin.app')

@section('body')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Kriteria</h1>

        <form action="{{ route('kriteria.update',$kriteria->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="col-md-6 mb-2">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Nama Kriteria</label>
                            <input type="text" name="name" value="{{ $kriteria->name }}" class="form-control" id="name" required>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-success btn-flat">Edit</button>
                </div>
            </div>

        </form>
</div>
@endsection