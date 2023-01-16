@extends('admin.app')

@section('body')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Pertanyaan</h1>

        <form action="{{ route('pertanyaan.update',$pertanyaan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="col-md-6 mb-2">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Pertanyaan</label>
                            <input type="text" name="name" value="{{ $pertanyaan->name }}" class="form-control" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="">Kriteria</label>
                            <select class="form-select" name="kriteria_id" id="kriteria_id" aria-label="Floating label select example" required>
                                <option selected aria-required="true">-- Pilih Kriteria --</option>
                                    @foreach($kriteria as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                            </select>
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