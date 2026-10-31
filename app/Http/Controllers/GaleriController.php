<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class GaleriController extends Controller
{
    /** READ: daftar semua galeri. */
    public function index(): View
    {
        $galeris = Galeri::with('user')->latest()->paginate(9);

        return view('galeri.index', compact('galeris'));
    }

    /** CREATE: form tambah. */
    public function create(): View
    {
        return view('galeri.create');
    }

    /** CREATE: simpan data + file. */
    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate($this->rules(fotoWajib: true), $this->messages());

        $data['foto'] = $request->file('foto')->store('galeri', 'public');
        $data['user_id'] = $request->user()->id;

        Galeri::create($data);

        return redirect()->route('galeri.index')->with('status', 'Foto wisata berhasil ditambahkan.');
    }

    /** READ: detail satu data. */
    public function show(Galeri $galeri): View
    {
        return view('galeri.show', compact('galeri'));
    }

    /** UPDATE: form ubah. */
    public function edit(Galeri $galeri): View
    {
        $this->pastikanPemilik($galeri);

        return view('galeri.edit', compact('galeri'));
    }

    /** UPDATE: simpan perubahan; file lama dihapus jika diganti. */
    public function update(Request $request, Galeri $galeri): RedirectResponse
    {
        $this->pastikanPemilik($galeri);

        $data = $request->validate($this->rules(fotoWajib: false), $this->messages());

        $fotoLama = null;
        if ($request->hasFile('foto')) {
            $fotoLama = $galeri->foto;
            $data['foto'] = $request->file('foto')->store('galeri', 'public');
        } else {
            unset($data['foto']);
        }

        $galeri->update($data);

        // Hapus file lama dari storage setelah data baru tersimpan.
        if ($fotoLama) {
            Storage::disk('public')->delete($fotoLama);
        }

        return redirect()->route('galeri.index')->with('status', 'Data galeri berhasil diperbarui.');
    }

    /** DELETE: hapus data beserta file di storage. */
    public function destroy(Galeri $galeri): RedirectResponse
    {
        $this->pastikanPemilik($galeri);

        Storage::disk('public')->delete($galeri->foto);
        $galeri->delete();

        return redirect()->route('galeri.index')->with('status', 'Data galeri berhasil dihapus.');
    }

    /** Unduh file foto. */
    public function unduh(Galeri $galeri): StreamedResponse
    {
        abort_unless(Storage::disk('public')->exists($galeri->foto), 404);

        $ext = pathinfo($galeri->foto, PATHINFO_EXTENSION);

        return Storage::disk('public')->download($galeri->foto, str($galeri->judul)->slug().'.'.$ext);
    }

    private function rules(bool $fotoWajib): array
    {
        return [
            'judul' => ['required', 'string', 'max:150'],
            'lokasi' => ['required', 'string', 'max:150'],
            'deskripsi' => ['nullable', 'string', 'max:2000'],
            // Validasi jenis (jpg/jpeg/png/webp) dan ukuran (maks 2 MB = 2048 KB)
            'foto' => [$fotoWajib ? 'required' : 'nullable', 'file', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ];
    }

    private function messages(): array
    {
        return [
            'foto.required' => 'Foto wajib diunggah.',
            'foto.image' => 'File harus berupa gambar.',
            'foto.mimes' => 'Foto harus berformat JPG, JPEG, PNG, atau WEBP.',
            'foto.max' => 'Ukuran foto maksimal 2 MB.',
            'foto.uploaded' => 'Foto gagal diunggah. Pastikan ukurannya tidak lebih dari 2 MB.',
        ];
    }

    /** Hanya pembuat data yang boleh mengubah/menghapus. */
    private function pastikanPemilik(Galeri $galeri): void
    {
        abort_unless($galeri->user_id === auth()->id(), 403, 'Anda bukan pemilik data ini.');
    }
}
