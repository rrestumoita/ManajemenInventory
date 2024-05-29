<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'namaProduk' => 'required|max:255',
            'kategori' => 'required|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'lokasi' => 'required|max:255',
            'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('fail', 'Gagal menambahkan produk baru');
        }

        Product::create([
            'nama_produk' => $request->namaProduk,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'lokasi' => $request->lokasi,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan');
    }

    public function viewIndex()
    {
        $products = Product::all();
        return view('produk.index', compact('products'));
    }

    public function delete($id)
    {
        $product = Product::where('id', $id)->first();

        if ($product) {
            $product->delete();
            return redirect()->back()->with('success', 'Produk berhasil dihapus');
        }

        return redirect()->back()->with('fail', 'Produk tidak ditemukan');
    }

    public function viewEdit($id)
    {
        $product = Product::where('id', $id)->first();

        if ($product) {
            return view('produk.edit', compact('product'));
        }

        return redirect()->back()->with('fail', 'Produk tidak ditemukan');
    }

    public function edit(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'namaProduk' => 'required|max:255',
            'kategori' => 'required|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'lokasi' => 'required|max:255',
            'keterangan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('fail', 'Gagal mengedit produk');
        }

        $product = Product::where('id', $id)->first();

        if ($product) {
            $product->nama_produk = $request->namaProduk;
            $product->kategori = $request->kategori;
            $product->harga = $request->harga;
            $product->stok = $request->stok;
            $product->lokasi = $request->lokasi;
            $product->keterangan = $request->keterangan;
            $product->save();

            return redirect()->back()->with('success', 'Produk berhasil diubah');
        }

        return redirect()->back()->with('fail', 'Produk tidak ditemukan');
    }
}
