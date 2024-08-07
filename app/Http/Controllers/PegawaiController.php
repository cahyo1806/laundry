<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class PegawaiController extends Controller
{
    public function show(string $id):View {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.show', compact('pegawai'));
    }

    public function index(): View
    {
       $pegawai = Pegawai::latest()->paginate(10);
       return view('pegawai.index',compact('pegawai'));
    }

    public function create(): View
    {
        return view('pegawai.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id_pegawai' => 'required|min:5|unique:pegawai,id_pegawai',
            'nama_pegawai' => 'required|min:5',
            'password' => 'required|min:5',
            'alamat' => 'required|min:5',
            'no_hp' => 'required|min:5',
            'jabatan' => 'required',
        ]);

        Pegawai::create([
            'id_pegawai' => $request->id_pegawai,
            'nama_pegawai' => $request->nama_pegawai,
            'password' => md5($request->password),
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'jabatan' => $request->jabatan,
        ]);

        return redirect()->route('pegawai.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pegawai = Pegawai::findOrFail($id);

        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'id_pegawai' => 'required|min:5|unique:pegawai,id_pegawai',
            'nama_pegawai' => 'required|min:5',
            'password' => 'required|min:5',
            'alamat' => 'required|min:5',
            'no_hp' => 'required|min:5',
            'jabatan' => 'required',
        ]);

        $pegawai = Pegawai::findOrFail($id);
        $pegawai->update([
            'id_pegawai' => $request->id_pegawai,
            'nama_pegawai' => $request->nama_pegawai,
            'password' => md5($request->password),
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'jabatan' => $request->jabatan,
            ]);

        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }


}