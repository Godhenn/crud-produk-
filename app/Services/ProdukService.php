<?php

namespace App\Services;

use App\Models\Produk;

class ProdukService
{
    public function getAll()
    {
        return Produk::all();
    }

    public function create($data)
    {
        return Produk::create($data);
    }

    public function update($id, $data)
    {
        $produk = Produk::findOrFail($id);
        $produk->update($data);
        return $produk;
    }

    public function delete($id)
    {
        $produk = Produk::findOrFail($id);
        return $produk->delete();
    }
}