@extends('admin.app')

@section('body')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tambah Pertanyaan</h1>

        <form action="{{ route('pertanyaan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-md-6 mb-2">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">Pertanyaan</label>
                            <textarea name="name" id="name" cols="20" rows="8" class="form-control" required></textarea>
                        </div>
                        {{-- <div class="form-group">
                            <label for="">Kriteria</label>
                            <select class="form-select" name="kriteria_id" id="kriteria_id" aria-label="Floating label select example" required>
                                <option selected aria-required="true">-- Pilih Kriteria --</option>
                                    @foreach($kriteria as $row)
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                            </select>
                        </div> --}}
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-flat">Tambah</button>
                </div>
            </div>

        </form>
</div>
@endsection