<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    // Metode untuk menampilkan formulir tambah data perusahaan
    public function create()
    {
        return view('suppliers.create');
    }

    public function viewIndex()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('s'));
    }

    // Metode untuk menyimpan data perusahaan baru
    public function store(Request $request)
    {
        // Validasi data yang dikirimkan oleh formulir
        $validator = $this->validateData($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('fail', 'Gagal menambahkan data supplier');
        }

        // Tambahkan data perusahaan baru
        Supplier::create([
            'nama_perusahaan' => $request->namaPerusahaan,
            'alamat_perusahaan' => $request->alamatPerusahaan,
            'nama_produk' => $request->namaProduk,
            'no_telepon' => $request->noTelepon,
        ]);

        return redirect()->back()->with('success', 'Data perusahaan berhasil ditambahkan');
    }

    // Metode untuk menampilkan formulir edit data perusahaan
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);

        return view('suppliers.edit', compact('supplier'));
    }

    // Metode untuk menyimpan perubahan pada data perusahaan yang diedit
    public function update(Request $request, $id)
    {
        // Validasi data yang dikirimkan oleh formulir
        $validator = $this->validateData($request);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('fail', 'Gagal mengedit data perusahaan');
        }

        // Cari data perusahaan berdasarkan ID
        $supplier = Supplier::findOrFail($id);

        // Update data perusahaan yang ditemukan
        $supplier->update([
            'nama_perusahaan' => $request->namaPerusahaan,
            'alamat_perusahaan' => $request->alamatPerusahaan,
            'nama_produk' => $request->namaProduk,
            'no_telepon' => $request->noTelepon,
        ]);

        return redirect()->back()->with('success', 'Data perusahaan berhasil diubah');
    }

    // Metode untuk menghapus data perusahaan
    public function delete($id)
    {
        $supplier = Supplier::findOrFail($id);

        $supplier->delete();

        return redirect()->back()->with('success', 'Data perusahaan berhasil dihapus');
    }

    // Metode untuk menampilkan semua data perusahaan
    public function index()
    {
        $suppliers = Supplier::all();

        return view('suppliers.index', compact('suppliers'));
    }

    // Metode untuk melakukan validasi data
    private function validateData(Request $request)
    {
        return Validator::make($request->all(), [
            'namaPerusahaan' => 'required|max:255',
            'alamatPerusahaan' => 'required|max:255',
            'namaProduk' => 'required|max:255',
            'noTelepon' => 'required|max:255',
        ]);
    }
}

