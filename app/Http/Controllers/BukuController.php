<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class BukuController extends Controller
{
    /**
     * Display list of books with filtering and search
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $query = Buku::query();

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('judul', 'like', "%{$search}%")
                ->orWhere('pengarang', 'like', "%{$search}%")
                ->orWhere('isbn', 'like', "%{$search}%");
        }

        // Filter by category
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->input('kategori'));
        }

        // Pagination
        $buku = $query->orderBy('created_at', 'desc')
            ->paginate(12)
            ->withQueryString();

        // Statistics
        $totalBuku = Buku::count();
        $bukuTersedia = Buku::where('stok', '>', 0)->count();
        $bukuHabis = Buku::where('stok', '=', 0)->count();

        // Get all categories for filter
        $kategori = Kategori::all();

        return view('perpustakaan.buku.index', [
            'buku' => $buku,
            'totalBuku' => $totalBuku,
            'bukuTersedia' => $bukuTersedia,
            'bukuHabis' => $bukuHabis,
            'kategori' => $kategori,
        ]);
    }

    /**
     * Display book detail
     *
     * @param Buku $buku
     * @return View
     */
    public function edit(Buku $buku): View
    {
        $kategori = Kategori::all();

        return view('perpustakaan.buku.edit', [
            'buku' => $buku,
            'kategori' => $kategori,
        ]);
    }

    public function update(Request $request, Buku $buku): RedirectResponse
    {
        $data = $request->validate([
            'kode_buku' => [
                'required',
                'max:20',
                Rule::unique('buku')->ignore($buku->id),
            ],
            'judul' => 'required|string|max:200',
            'kategori' => ['required', Rule::in(Kategori::pluck('nama_kategori')->toArray())],
            'pengarang' => 'required|string|max:100',
            'penerbit' => 'required|string|max:100',
            'tahun_terbit' => 'required|integer|min:1900|max:' . date('Y'),
            'isbn' => 'nullable|string|max:20',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'deskripsi' => 'nullable|string',
            'bahasa' => 'required|string|max:20',
        ]);

        $buku->update($data);

        return redirect('/buku')->with('success', 'Buku berhasil diperbarui.');
    }

    public function show(Buku $buku): View
    {
        // Get similar books from same category
        $bukuSerupa = Buku::where('kategori', $buku->kategori)
            ->where('id', '!=', $buku->id)
            ->limit(6)
            ->get();

        return view('perpustakaan.buku.show', [
            'buku' => $buku,
            'bukuSerupa' => $bukuSerupa,
        ]);
    }
}
