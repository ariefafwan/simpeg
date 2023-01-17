@extends('admin.app')

@section('body')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tambah Penilaian</h1>
    <hr>
    <div class="row">
    <div class="container">
    <form action="{{ route('hasil.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="user_id">Pilih Pegawai</label>
            <select class="form-select" aria-label="Default select example" name="user_id">
                <option selected>-- Pilih --</option>
                @foreach ($pegawai as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div>
        {{-- <div class="mb-3">
            <label for="dosen">Pilih Kriteria</label>
            <select class="form-select" aria-label="Default select example" name="kriteria_id">
                <option selected>-- Pilih --</option>
                @foreach ($kriteria as $row)
                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                @endforeach
            </select>
        </div> --}}
        <div class="mb-3">
            <label for="tgl">Tanggal Penilaian</label>
                <input type="date" id="tgl_nilai" name="tgl_nilai" min="2018-01-01" max="2030-12-31">
        </div>
        @foreach ($pertanyaan as $row)
            <div class="mb-3">
                <label for="pertanyaan" class="form-label text-dark">{{ $row->name }}</label>
                <div class="form-check">
                    <div class="row">
                        <div class="col">
                            <input type="radio" name="data[{{ $row->id }}]" id="data" value="6"
                                class="form-check-input">
                            <label for="data[]" class="form-check-label">Sangat Kurang Baik</label>
                        </div>
                        <div class="col">
                            <input type="radio" name="data[{{ $row->id }}]" id="data" value="7"
                                class="form-check-input">
                            <label for="data[]" class="form-check-label">Kurang Baik</label>
                        </div>
                        <div class="col">
                            <input type="radio" name="data[{{ $row->id }}]" id="data" value="8"
                                class="form-check-input">
                            <label for="data[]" class="form-check-label">Cukup</label>
                        </div>
                        <div class="col">
                            <input type="radio" name="data[{{ $row->id }}]" id="data" value="9"
                                class="form-check-input">
                            <label for="data[]" class="form-check-label">Baik</label>
                        </div>
                        <div class="col">
                            <input type="radio" name="data[{{ $row->id }}]" id="data" value="10"
                                class="form-check-input">
                            <label for="data[]" class="form-check-label">Sangat Baik</label>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="mb-3">
            <label for="saran" class="form-label">Saran</label>
            <textarea name="saran" id="saran" cols="30" rows="5" class="form-control"></textarea>
        </div>
        <button class="btn btn-primary mb-3" type="submit">Simpan</button>
    </form>
    {{-- <div class="mb-3">
                    <label for="pertanyaan" class="form-label">{{ $row->question }}</label>
                    <select name="data[]" class="form-select">
                        <option selected>-- Pilih --</option>
                        <option value='10'>Sangat Baik</option>
                        <option value='9'>Baik</option>
                        <option value='8'>Cukup</option>
                        <option value='7'>Kurang Baik</option>
                        <option value='6'>Sangat Kurang Baik</option>
                    </select>
                </div> --}}
    </div>
    </div>
</div>
@endsection
