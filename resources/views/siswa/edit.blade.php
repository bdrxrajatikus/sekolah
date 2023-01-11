@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Inputs</h3>
								</div>
								<div class="panel-body">
                                <form action="/siswa/{{$siswa->id}}/update" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
                                    <input name="namedepan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{$siswa->namedepan}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
                                    <input name="namabelakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{$siswa->namabelakang}}">
                                </div>
                                <div class="form-group">
                                <label for="exampleForControlSelect1">Pilih Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" aria-label="Default select example" value="{{$siswa->jenis_kelamin}}">
                                    <option selected>Jenis Kelamin</option>
                                    <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki - Laki</option>
                                    <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleForControlSelect1">Pilih Agama</label>
                                <select name="agama" class="form-control" aria-label="Default select example" value="{{$siswa->agama}}">
                                    <option selected>Agama</option>
                                    <option value="Islam" @if($siswa->agama == 'Islam') selected @endif>Islam</option>
                                    <option value="Kristen" @if($siswa->agama == 'Kristen') selected @endif>Kristen</option>
                                    <option value="Katholik" @if($siswa->agama == 'Katholik') selected @endif>Katholik</option>
                                    <option value="Hindu" @if($siswa->agama == 'Hindu') selected @endif>Hindu</option>
                                    <option value="Budha" @if($siswa->agama == 'Budha') selected @endif>Budha</option>
                                    <option value="Konghuchu" @if($siswa->agama == 'Konghuchu') selected @endif>Konghuchu</option>
                                </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$siswa->alamat}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1" class="form-label">Avatar</label>
                                    <input type="file" name="avatar" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-warning">Update</button>
                                </form>
								</div>
							</div>
                    </div>
                </div>
            </div>
        </div>
    </div>        
@stop
@section('content1')
        <h1>Edit Data Siswa</h1>
        @if(session('sukses'))
            <div class="alert alert-success" role="alert">
                {{session('sukses')}}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <form action="/siswa/{{$siswa->id}}/update" method="POST">
                        {{csrf_field()}}
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
                        <input name="namedepan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{$siswa->namedepan}}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
                        <input name="namabelakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{$siswa->namabelakang}}">
                    </div>
                    <div class="form-group">
                    <label for="exampleForControlSelect1">Pilih Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select" aria-label="Default select example" value="{{$siswa->jenis_kelamin}}">
                        <option selected>Jenis Kelamin</option>
                        <option value="L" @if($siswa->jenis_kelamin == 'L') selected @endif>Laki - Laki</option>
                        <option value="P" @if($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="exampleForControlSelect1">Pilih Agama</label>
                    <select name="agama" class="form-select" aria-label="Default select example">
                        <option selected>Agama</option>
                        <option value="Islam" @if($siswa->agama == 'Islam') selected @endif>Islam</option>
                        <option value="Kristen" @if($siswa->agama == 'Kristen') selected @endif>Kristen</option>
                        <option value="Katholik" @if($siswa->agama == 'Katholik') selected @endif>Katholik</option>
                        <option value="Hindu" @if($siswa->agama == 'Hindu') selected @endif>Hindu</option>
                        <option value="Budha" @if($siswa->agama == 'Budha') selected @endif>Budha</option>
                        <option value="Konghuchu" @if($siswa->agama == 'Konghuchu') selected @endif>Konghuchu</option>
                    </select>
                    </div>
                    <div class="form-group>
                        <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$siswa->alamat}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-warning">Update</button>
                    </form>
                    
                    
                </div>
                </div>
@endsection  

