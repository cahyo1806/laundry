<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\DataLaundryMember;
use App\Models\Member;
use App\Models\Pegawai;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DataLaundryMemberController extends Controller
{
    public function index(): View
    {
        $datalaundrymember = DataLaundryMember::latest()->paginate(10);
        return view('datalaundrymember.index', compact('datalaundrymember'));
    }

    public function create(): View
    {
        $member = Member::all();
        $pegawai = Pegawai::all();
        return view('datalaundrymember.create', compact('member', 'pegawai'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'tgl_transaksi' => 'required|date', 
            'member_id' => 'required|exists:member,id',
            'id_pegawai' => 'required|exists:pegawai,id',
            'keterangan' => 'required|min:5',
            'status_laundry' => 'required',
            'status_pembayaran' => 'required',
            'lokasi_kirim' => 'required|min:5'
        ]);

        DataLaundryMember::create([
            'tgl_transaksi' => $request->tgl_transaksi,
            'member_id' => $request->member_id,
            'id_pegawai' => $request->id_pegawai,
            'keterangan' => $request->keterangan,
            'status_laundry' => $request->status_laundry,
            'status_pembayaran' => $request->status_pembayaran,
            'lokasi_kirim' => $request->lokasi_kirim
        ]);

        return redirect()->route('datalaundrymember.index')->with('success', 'Data laundry member berhasil ditambahkan!');
    }

    public function show(string $id): View
    {
        $datalaundrymember = DataLaundryMember::findOrFail($id);
        return view('datalaundrymember.show', compact('datalaundrymember'));
    }

    public function edit(string $id): View
    {
        $datalaundrymember = DataLaundryMember::findOrFail($id);
        $member = Member::all();
        $pegawai = Pegawai::all();
        return view('datalaundrymember.edit', compact('datalaundrymember', 'member', 'pegawai'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'tgl_transaksi' => 'required|date', 
            'member_id' => 'required|exists:member,id',
            'id_pegawai' => 'required|exists:pegawai,id',
            'keterangan' => 'required|min:5',
            'status_laundry' => 'required',
            'status_pembayaran' => 'required',
            'lokasi_kirim' => 'required|min:5'
        ]);

        $datalaundrymember = DataLaundryMember::findOrFail($id);
        $datalaundrymember->update([
            'tgl_transaksi' => $request->tgl_transaksi,
            'member_id' => $request->member_id,
            'id_pegawai' => $request->id_pegawai,
            'keterangan' => $request->keterangan,
            'status_laundry' => $request->status_laundry,
            'status_pembayaran' => $request->status_pembayaran,
            'lokasi_kirim' => $request->lokasi_kirim
        ]);

        return redirect()->route('datalaundrymember.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(string $id): RedirectResponse
    {
        $datalaundrymember = DataLaundryMember::findOrFail($id);
        $datalaundrymember->delete();
        return redirect()->route('datalaundrymember.index')->with('success', 'Data berhasil dihapus!');
    }
}
