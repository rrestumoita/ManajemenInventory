@extends('layouts.app', ['title' => 'Tambah Produk'])
@section('content')

<div class="w-2/4 mx-auto">
    @if (session()->has('success'))
    <div id="alert-3" class="flex items-center p-3 mb-1 text-white rounded-lg bg-green-400 dark:bg-gray-800 dark:text-green-400" role="alert">
        <span class="text-3xl"><i class="bi bi-check2-circle"></i></span>
        <span class="sr-only">Info</span>
        <div class="ms-3 text-sm font-medium">
            {{ session('success') }}
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-green-400 text-white rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-800 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @elseif (session()->has('fail'))
    <div id="alert-2" class="flex items-center p-3 mb-1 text-white rounded-lg bg-red-700" role="alert">
        <i class="bi bi-exclamation-triangle-fill text-3xl"></i>
        <span class="sr-only">Info</span>
        <div class="ms-3 text-sm font-medium">
            {{ session('fail') }}
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-700 text-white rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-800 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @endif

    <form action="{{ route('tambah') }}" method="post" enctype="multipart/form-data" class="p-2">
        @csrf
        <div class="mx-5 mb-3">
            <div class="mb-3">
                <label for="namaProduk" class="block mb-2 text-sm font-medium text-gray-900">Nama Produk</label>
                <div class="mt-2">
                    <input type="text" name="namaProduk" id="namaProduk" class="block p-2.5 w-full text-sm rounded-lg border bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Nama Produk" required></input>
                </div>
                @error('namaProduk')
                <div>
                    <p class="text-red-500 text-base">{{ $message }}</p>
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kategori" class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
                <div class="mt-2">
                    <input type="text" name="kategori" id="kategori" class="block p-2.5 w-full text-sm rounded-lg border bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Kategori Produk" required></input>
                </div>
                @error('kategori')
                <div>
                    <p class="text-red-500 text-base">{{ $message }}</p>
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="harga" class="block mb-2 text-sm font-medium text-gray-900">Harga</label>
                <div class="mt-2">
                    <input type="text" name="harga" id="harga" class="block p-2.5 w-full text-sm rounded-lg border bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Harga Produk" required></input>
                </div>
                @error('harga')
                <div>
                    <p class="text-red-500 text-base">{{ $message }}</p>
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="stok" class="block mb-2 text-sm font-medium text-gray-900">Stok Produk</label>
                <div class="mt-2">
                    <input type="text" name="stok" id="stok" class="block p-2.5 w-full text-sm rounded-lg border bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Stok Produk" required></input>
                </div>
                @error('stok')
                <div>
                    <p class="text-red-500 text-base">{{ $message }}</p>
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="lokasi" class="block mb-2 text-sm font-medium text-gray-900">Lokasi Produk</label>
                <div class="mt-2">
                    <input type="text" name="lokasi" id="lokasi" class="block p-2.5 w-full text-sm rounded-lg border bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Lokasi Produk" required></input>
                </div>
                @error('lokasi')
                <div>
                    <p class="text-red-500 text-base">{{ $message }}</p>
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900">Keterangan Produk</label>
                <div class="mt-2">
                    <input type="text" name="keterangan" id="keterangan" class="block p-2.5 w-full text-sm rounded-lg border bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Keterangan Produk" required></input>
                </div>
                @error('keterangan')
                <div>
                    <p class="text-red-500 text-base">{{ $message }}</p>
                </div>
                @enderror
            </div>

            <button type="submit" class="w-full text-center text-white text-lg font-bold tracking-wider uppercase bg-gradient-to-br from-purple-600 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 rounded-lg px-5 py-2.5 me-2 mb-2 mt-5">
                Tambah
            </button>
        </div>
    </form>
</div>

@endsection