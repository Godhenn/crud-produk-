<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProdukService;
use Exception;

class ProdukController extends Controller
{
    protected $service;

    public function __construct(ProdukService $service)
    {
        $this->service = $service;
    }

    // 🔹 TAMPIL DATA
    public function index()
    {
        return response()->json($this->service->getAll());
    }

    // 🔹 TAMBAH DATA
    public function store(Request $request)
    {
        // VALIDASI
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|integer|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        try {
            $data = $this->service->create($validated);

            return response()->json([
                'message' => 'Data berhasil ditambahkan',
                'data' => $data
            ]);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Gagal tambah data'
            ], 500);
        }
    }

    // 🔹 UPDATE
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'sometimes|string',
            'harga' => 'sometimes|integer',
            'stok' => 'sometimes|integer',
        ]);

        try {
            $data = $this->service->update($id, $validated);

            return response()->json([
                'message' => 'Data berhasil diupdate',
                'data' => $data
            ]);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Gagal update'
            ], 500);
        }
    }

    // 🔹 HAPUS
    public function destroy($id)
    {
        try {
            $this->service->delete($id);

            return response()->json([
                'message' => 'Data berhasil dihapus'
            ]);

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Gagal hapus'
            ], 500);
        }
    }
}