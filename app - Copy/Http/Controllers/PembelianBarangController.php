<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\PembelianBarang;
use App\Models\Pegawai;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PembelianBarangController extends Controller
{
    public function index(): View
    {
        $pembelianbarang = PembelianBarang::latest()->paginate(10);
        return view('pembelianbarang.index', compact('pembelianbarang'));
    }

    public function create(): View
    {
        $pegawai = Pegawai::all();
        $barang = Barang::all();
        return view('pembelianbarang.create', compact('pegawai', 'barang'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'kode_barang' => 'required|exists:barang,kode_barang', // Memastikan kode_barang ada di tabel barang
            'id_pegawai' => 'required|integer|exists:pegawai,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:1'
        ]);

        PembelianBarang::create([
            'kode_barang' => $request->kode_barang,
            'id_pegawai' => $request->id_pegawai,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah
        ]);

        return redirect()->route('pembelianbarang.index')->with('success', 'Pembelian barang berhasil ditambahkan!');
    }

    public function show(string $id): View
    {
        $pembelianbarang = PembelianBarang::findOrFail($id);
        return view('pembelianbarang.show', compact('pembelianbarang'));
    }

    public function edit(string $id): View
    {
        $pembelianbarang = PembelianBarang::findOrFail($id);
        $pegawai = Pegawai::all();
        $barang = Barang::all();
        return view('pembelianbarang.edit', compact('pembelianbarang', 'pegawai', 'barang'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $pembelianbarang = PembelianBarang::findOrFail($id);

        $request->validate([
            'kode_barang' => [
                'required',
                'exists:barang,kode_barang', // Memastikan kode_barang ada di tabel barang
                'unique:barang,kode_barang,' . $pembelianbarang->kode_barang . ',kode_barang', // Validasi update
            ],
            'id_pegawai' => 'required|integer|exists:pegawai,id',
            'tanggal' => 'required|date',
            'jumlah' => 'required|integer|min:1'
        ]);

        $pembelianbarang->update([
            'kode_barang' => $request->kode_barang,
            'id_pegawai' => $request->id_pegawai,
            'tanggal' => $request->tanggal,
            'jumlah' => $request->jumlah
        ]);

        return redirect()->route('pembelianbarang.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy(string $id): RedirectResponse
    {
        $pembelianbarang = PembelianBarang::findOrFail($id);
        $pembelianbarang->delete();
        return redirect()->route('pembelianbarang.index')->with('success', 'Data berhasil dihapus!');
    }
}
