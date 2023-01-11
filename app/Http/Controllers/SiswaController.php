<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Siswa;
use App\Models\User;
use App\Models\Mapel;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_siswa = Siswa::where('namedepan','LIKE','%'.$request->cari.'%')->get();
        }else{
            $data_siswa = Siswa::all();
        }
        return view('siswa.index',compact(['data_siswa']));
    }

    public function create(Request $request)
    {
        $this->validate($request,[
            'namedepan' => 'required|min:5',
            'namabelakang' => 'required',
            'email' => 'required|email|unique:users',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'avatar' => 'mimes:jpg,png'


        ]);
        // Insert ke table Users
        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->namedepan;
        $user->email = $request->email;
        $user->password = bcrypt('rahasia');
        $user->remember_token = Str::random(60);
        $user->save();

        // Insert ke table Siswa
        $request->request->add(['user_id' => $user->id ]);
        $siswa = Siswa::create($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses','Data Berhasil Diinput');
    }

    public function edit ($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa/edit',compact(['siswa']));
    }

    public function update (Request $request,$id)
    {
        $siswa = Siswa::find($id);
        $siswa->update($request->all());
        if($request->hasFile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses','Data Berhasil diupdate');
    }

    public function delete ($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect('/siswa')->with('sukses','Data Berhasil dihapus');
    }

    public function profile ($id)
    {
        $siswa = Siswa::find($id);
        $matapelajaran = Mapel::all();

        // menyiapkan data untuk chart
        $categories = [];
        $data = [];
        
        foreach($matapelajaran as $mp){
            if($siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()){
                $categories[] = $mp->nama;
                $data[] = $siswa->mapel()->wherePivot('mapel_id',$mp->id)->first()->pivot->nilai;
            }
        };
        // dd($data);
        return view('siswa.profile',compact(['siswa','matapelajaran','categories','data']));
    }

    public function addnilai(Request $request,$idsiswa)
    {
        $siswa = Siswa::find($idsiswa);
        if($siswa->mapel()->where('mapel_id',$request->mapel)->exists()){
            return redirect('siswa/'.$idsiswa.'/profile')->with('error','Data mata pelajaran sudah ada');
        }
        $siswa->mapel()->attach($request->mapel,['nilai' => $request->nilai]);
        return redirect('siswa/'.$idsiswa.'/profile')->with('sukses','Data nilai berhasil diinput'); 
    }

    public function deletenilai($idsiswa,$idmapel)
    {
        $siswa = Siswa::find($idsiswa);
        $siswa->mapel()->detach($idmapel);
        return redirect()->back()->with('sukses', 'Data nilai berhasil dihapus');
    }
}

