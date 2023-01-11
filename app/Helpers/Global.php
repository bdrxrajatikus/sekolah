<?php
use App\Models\Siswa;
use App\Models\Guru;

function rangking5Besar()
{
    $siswa = Siswa::all();
    $siswa->map(function($s){
        $s->ratanilai = $s->ratanilai();
        return $s;
    });
    $siswa = $siswa->sortByDesc('ratanilai')->take(5);
    return $siswa;
}

function totalSiswa()
{
    return Siswa::count();
}

function totalGuru()
{
    return Guru::count();
}