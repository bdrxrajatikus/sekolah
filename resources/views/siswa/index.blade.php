@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                   <div class="col-md-12">
                   <div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Data Siswa</h3>
                                    <div class="right">
                                        <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal"><i class="lnr lnr-plus-circle"></i></button>
                                    </div>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
                                            <th>NAMA DEPAN</th>
                                            <th>NAMA BELAKANG</th>
                                            <th>JENIS KELAMIN</th>
                                            <th>AGAMA</th>
                                            <th>ALAMAT</th>
                                            <th>RATA RATA NILAI</th>
                                            <th>UPDATE</th>
											</tr>
										</thead>
										<tbody>
                                        @foreach($data_siswa as $siswa)
                                        <tr>
                                            <td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->namedepan}}</a></td>
                                            <td><a href="/siswa/{{$siswa->id}}/profile">{{$siswa->namabelakang}}</a></td>
                                            <td>{{$siswa->jenis_kelamin}}</td>
                                            <td>{{$siswa->agama}}</td>
                                            <td>{{$siswa->alamat}}</td>
                                            <td>{{$siswa->ratanilai()}}</td>
                                            <td>
                                                <a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus ?')">Delete</a>
                                            </td>
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
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                    <form action="/siswa/create" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                    <div class="mb-3{{$errors->has('namedepan') ? ' has-error ' : ''}}">
                        <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
                        <input name="namedepan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan" value="{{old('namedepan')}}">
                        @if($errors->has('namedepan'))
                            <span class="help-block">{{$errors->first('namedepan')}}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
                        <input name="namabelakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang" value="{{old('namabelakang')}}">
                    </div>
                    <div class="mb-3{{$errors->has('email') ? ' has-error ' : ''}}">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{old('email')}}">
                        @if($errors->has('email'))
                            <span class="help-block">{{$errors->first('email')}}</span>
                        @endif
                    </div>
                    <div class="mb-3{{$errors->has('jenis_kelamin') ? ' has-error ' : ''}}">
                    <label for="exampleForControlSelect1">Pilih Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control" id="exampleFromControlSelect1">
                        <option selected>Jenis Kelamin</option>
                        <option value="L"{{(old('jenis_kelamin') == 'L') ? 'selected' : ''}}>Laki - Laki</option>
                        <option value="P"{{(old('jenis_kelamin') == 'P') ? 'selected' : ''}}>Perempuan</option>
                    </select>
                        @if($errors->has('jenis_kelamin'))
                            <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('agama') ? ' has-error ' : ''}}">
                    <label for="exampleForControlSelect1">Pilih Agama</label>
                    <select name="agama" class="form-control" aria-label="Default select example">
                        <option selected>Agama</option>
                        <option value="Islam"{{(old('agama') == 'Islam') ? 'selected' : ''}}>Islam</option>
                        <option value="Kristen"{{(old('agama') == 'Kristen') ? 'selected' : ''}}>Kristen</option>
                        <option value="Katholik"{{(old('agama') == 'Katholik') ? 'selected' : ''}}>Katholik</option>
                        <option value="Hindu"{{(old('agama') == 'Hindu') ? 'selected' : ''}}>Hindu</option>
                        <option value="Budha"{{(old('agama') == 'Budha') ? 'selected' : ''}}>Budha</option>
                        <option value="Konghuchu"{{(old('agama') == 'Konghuchu') ? 'selected' : ''}}>Konghuchu</option>
                    </select>
                        @if($errors->has('agama'))
                            <span class="help-block">{{$errors->first('agama')}}</span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('alamat')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1" class="form-label">Avatar</label>
                        <input type="file" name="avatar" class="form-control">
                    </div>
                    
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                    </div>
                </div>
@stop
@section('content1')
        @if(session('sukses'))
            <div class="alert alert-success" role="alert">
                {{session('sukses')}}
            </div>
        @endif
        <div class="row">
            <div class="col-6">
                <h1>Data Siswa</h1>
            </div>
            <div class="col-6">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Tambah Data Siswa
                </button>

                
            </div>
        
        <table class="table table-hover">
            <tr>
                <th>NAMA DEPAN</th>
                <th>NAMA BELAKANG</th>
                <th>JENIS KELAMIN</th>
                <th>AGAMA</th>
                <th>ALAMAT</th>
                <th>UPDATE</th>
            </tr>
            @foreach($data_siswa as $siswa)
            <tr>
                <td>{{$siswa->namedepan}}</td>
                <td>{{$siswa->namabelakang}}</td>
                <td>{{$siswa->jenis_kelamin}}</td>
                <td>{{$siswa->agama}}</td>
                <td>{{$siswa->alamat}}</td>
                <td>
                    <a href="/siswa/{{$siswa->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <a href="/siswa/{{$siswa->id}}/delete" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau dihapus ?')">Delete</a>
                </td>
            </tr>
            @endforeach
        </table>
        </div>
    </div>
  
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form action="/siswa/create" method="POST">
                        {{csrf_field()}}
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Depan</label>
                        <input name="namedepan" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Depan">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Belakang</label>
                        <input name="namabelakang" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Belakang">
                    </div>
                    <div class="form-group">
                    <label for="exampleForControlSelect1">Pilih Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select" aria-label="Default select example">
                        <option selected>Jenis Kelamin</option>
                        <option value="L">Laki - Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="exampleForControlSelect1">Pilih Agama</label>
                    <select name="agama" class="form-select" aria-label="Default select example">
                        <option selected>Agama</option>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katholik">Katholik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                        <option value="Konghuchu">Konghuchu</option>
                    </select>
                    </div>
                    <div class="form-group>
                        <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    </div>
                    </div>
                </div>
@endsection

    

