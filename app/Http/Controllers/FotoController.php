<?php

namespace App\Http\Controllers;

use App\Models\agenda;
use App\Models\foto;
use App\Models\informasi;
use App\Models\album;
use Illuminate\Http\Request;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexA(Request $request)
    {
        // Ambil parameter pencarian jika ada
        $search = $request->input('search');

        // Ambil semua foto dengan paginasi dan pencarian
        $foto = Foto::with('album')  // Load relasi album
            ->when($search, function ($query) use ($search) {
                return $query->where('judul', 'like', "%{$search}%") // Ganti 'judul' sesuai dengan kolom yang ingin dicari
                             ->orWhere('deskripsi', 'like', "%{$search}%"); // Ganti 'deskripsi' jika ingin mencari di kolom lain
            })->get(); // Ganti angka 10 dengan jumlah data per halaman yang diinginkan

        // Default ke view gallery
        return view('gallery', [
            'fotos' => $foto,
            'search' => $search, // Kirimkan parameter pencarian ke view
        ]);
    }


    public function indexB()
{
    $agendas = agenda::all();
    $informasis = informasi::all();
    $fotos = Foto::all(); // Mengambil semua foto
    $albums = Album::all(); // Mengambil semua album

    return view('dashboard', compact('fotos', 'albums','informasis','agendas'));
}


    public function index(Request $request)
    {
        // Ambil semua foto
        $search = $request->input('search');

        // Ambil semua foto dengan paginasi dan pencarian
        $fotos = foto::when($search, function ($query) use ($search) {
            return $query->where('judul', 'like', "%{$search}%") // Ganti 'judul' sesuai dengan kolom yang ingin dicari
                         ->orWhere('deskripsi', 'like', "%{$search}%"); // Ganti 'deskripsi' jika ingin mencari di kolom lain
        })->get(); // Ganti angka 10 dengan jumlah data per halaman yang diinginkan

        // Ambil data album untuk dropdown
        $albums = album::all();

        return view('crudFoto', compact('fotos', 'albums', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       // Ambil data album dari tabel album
    $albums = album::all();
    $fotos = foto::all();

    return view('foto.create',compact('fotos', 'albums'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'judul' => 'required|max:255',
        'deskripsi' => 'required',
        'AlbumID' => 'required|integer',
        'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:102400',
    ]);

    // Menyimpan file ke storage
    $filePath = $request->file('file')->store('uploads', 'public');


    // Menyimpan data ke database
    Foto::create([
        'judul' => $validatedData['judul'],
        'deskripsi' => $validatedData['deskripsi'],
        'AlbumID' => $validatedData['AlbumID'],
        'file' => $filePath,
    ]);

    return redirect()->route('foto.index')->with('success', 'Foto berhasil ditambahkan!');
}


    /**
     * Display the specified resource.
     */
    public function show($FotoID)
{
    // Mengambil foto beserta album terkait berdasarkan FotoID atau menampilkan error 404 jika tidak ditemukan
    $foto = Foto::with('album')->findOrFail($FotoID);

    // Return JSON response for AJAX, termasuk nama album
    return response()->json([
        'judul' => $foto->judul,
        'file' => $foto->file,
        'deskripsi' => $foto->deskripsi,
        'created_at' => $foto->created_at,
        'album' => $foto->album ? $foto->album->Nama : 'Album tidak tersedia',
    ]);
}




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(foto $foto)
    {
        return view('editFoto', compact('foto')); // Ganti dengan view form untuk edit foto
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, foto $foto)
{
    // Validasi input
    $request->validate([
        'judul' => 'required|string|max:255',
        'AlbumID' => 'required|integer',
        'deskripsi' => 'nullable|string',
        'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:102400', // Ubah dari required ke nullable
    ]);

    // Update judul dan deskripsi
    $foto->judul = $request->judul;
    $foto->deskripsi = $request->deskripsi;
    $foto->AlbumID = $request->AlbumID;

    // Jika ada file baru, upload dan update field 'file'
    if ($request->hasFile('file')) {
        // Hapus file lama
        if (\Storage::disk('public')->exists($foto->file)) {
            \Storage::disk('public')->delete($foto->file);
        }

        // Proses upload file baru
        $file = $request->file('file');
        $path = $file->store('uploads', 'public'); // Menyimpan file ke storage
        $foto->file = $path;
    }

    // Simpan perubahan
    $foto->save();

    return redirect()->route('foto.index')->with('success', 'Foto berhasil diperbarui.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foto $foto)
{
    // Cek apakah file foto benar-benar ada di storage sebelum menghapus
    if (\Storage::disk('public')->exists($foto->file)) {
        // Hapus file dari storage
        \Storage::disk('public')->delete($foto->file);
    }

    // Hapus record dari database
    $foto->delete();

    // Redirect kembali dengan pesan sukses
    return redirect()->route('foto.index')->with('success', 'Foto berhasil dihapus.');
}

}
