<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Anggota;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = Anggota::all();
        return view('admin.anggota.index', compact('anggota'));
    }

    // nanti bisa ditambah create, store, edit, update, delete
}
