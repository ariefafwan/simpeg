@extends('admin.app')

@section('body')

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Daftar Pegawai</h1>
    <div class="row">
    <div class="container">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="category-table" class="table table-dark table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Username</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">NIPPOS</th>
                                <th class="text-center">Kantor</th>
                                <th class="text-center">Divisi</th>
                                <th class="text-center">Nomor Handphone</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($pegawai as $index => $row)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->email }}</td>
                                <td>{{ $row->nippos }}</td>
                                <td>{{ $row->kantor }}</td>
                                <td>
                                    <div class="btn-group">
                                        <form id="user-update-form-{{$row->id}}" action="{{ route('userset.update',$row->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')                                            
                                            <select class="form-select" name="divisi_id" id="divisi_id" aria-label="Floating label select example" required>
                                                <option selected aria-required="true">{{ $row->divisi->name }}</option>
                                                    @foreach($divisi as $div)
                                                    <option value="{{ $div->id }}">{{ $div->name }}</option>
                                                    @endforeach
                                            </select>
                                        </form>
                                        <a href="javascript:void(0)" class="btn btn-success ml-3"
                                            onclick="event.preventDefault();
                                                document.getElementById('user-update-form-{{$row->id}}').submit();">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                        </a>
                                    </div>    
                                </td>
                                <td>{{ $row->nmrhp }}</td>
                            </tr>
                            @endforeach
                        </tbody>                        
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection