<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\DataLaundryNonMember;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class DataLaundryNonMemberController extends Controller
{
    public function index(): View
    {
        $datalaundrynonmember = DataLaundryNonMember::latest()->paginate(10);
        return view('datalaundrynonmember.index', compact('datalaundrynonmember'));
    }

    public function create(): View
    {
        $pegawai = Pegawai::all();
        return view('datalaundrynonmember.create', compact('pegawai'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'tgl_transaksi' => 'required|date', 
            'nama_customer' => 'required|min:5',
            'alamat' => 'required|min:5',
            'no_telp' => 'required|min:5',
            'id_pegawai' => 'required|exists:pegawai,id',
            'keterangan' => 'required|min:5',
            'status_laundry' => 'required',
            'status_pembayaran' => 'required',
            'lokasi_kirim' => 'required|min:5'
        ]);

        DataLaundryNonMember::create([
            'tgl_transaksi' => $request->tgl_transaksi,
            'nama_customer' => $request->nama_customer,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_pegawai' => $request->id_pegawai,
            'keterangan' => $request->keterangan,
            'status_laundry' => $request->status_laundry,
            'status_pembayaran' => $request->status_pembayaran,
            'lokasi_kirim' => $request->lokasi_kirim,
        ]);

        return redirect()->route('datalaundrynonmember.index')->with('success', 'Data laundry non-member berhasil ditambahkan!');
    }

    public function show(string $id): View
    {
        $datalaundrynonmember = DataLaundryNonMember::findOrFail($id);
        return view('datalaundrynonmember.show', compact('datalaundrynonmember'));
    }

    public function edit(string $id): View
    {
        $datalaundrynonmember = DataLaundryNonMember::findOrFail($id);
        $pegawai = Pegawai::all();
        return view('datalaundrynonmember.edit', compact('datalaundrynonmember', 'pegawai'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'tgl_transaksi' => 'required|date', 
            'nama_customer' => 'required|min:5',
            'alamat' => 'required|min:5',
            'no_telp' => 'required|min:5',
            'id_pegawai' => 'required|exists:pegawai,id',
            'keterangan' => 'required|min:5',
            'status_laundry' => 'required',
            'status_pembayaran' => 'required',
            'lokasi_kirim' => 'required|min:5'
        ]);

        $datalaundrynonmember = DataLaundryNonMember::findOrFail($id);
        $datalaundrynonmember->update([
            'tgl_transaksi' => $request->tgl_transaksi,
            'nama_customer' => $request->nama_customer,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_pegawai' => $request->id_pegawai,
            'keterangan' => $request->keterangan,
            'status_laundry' => $request->status_laundry,
            'status_pembayaran' => $request->status_pembayaran,
            'lokasi_kirim' => $request->lokasi_kirim,
        ]);

        return redirect()->route('datalaundrynonmember.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(string $id): RedirectResponse
    {
        $datalaundrynonmember = DataLaundryNonMember::findOrFail($id);
        $datalaundrynonmember->delete();
        return redirect()->route('datalaundrynonmember.index')->with('success', 'Data berhasil dihapus!');
    }
}
