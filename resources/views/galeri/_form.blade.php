@php $edit = isset($galeri); @endphp
@csrf
@if ($edit) @method('PUT') @endif

<label for="judul">Judul</label>
<input type="text" id="judul" name="judul" value="{{ old('judul', $galeri->judul ?? '') }}" required>
@error('judul') <div class="err">{{ $message }}</div> @enderror

<label for="lokasi">Lokasi Wisata</label>
<input type="text" id="lokasi" name="lokasi" value="{{ old('lokasi', $galeri->lokasi ?? '') }}" placeholder="mis. Gunung Papandayan" required>
@error('lokasi') <div class="err">{{ $message }}</div> @enderror

<label for="deskripsi">Deskripsi</label>
<textarea id="deskripsi" name="deskripsi">{{ old('deskripsi', $galeri->deskripsi ?? '') }}</textarea>
@error('deskripsi') <div class="err">{{ $message }}</div> @enderror

<label for="foto">Foto {{ $edit ? '(kosongkan jika tidak ingin mengganti)' : '' }}</label>
@if ($edit)
  <img class="preview" src="{{ $galeri->foto_url }}" alt="{{ $galeri->judul }}">
@endif
<input type="file" id="foto" name="foto" accept=".jpg,.jpeg,.png,.webp" {{ $edit ? '' : 'required' }}>
<div class="hint">Format JPG, JPEG, PNG, atau WEBP. Ukuran maksimal 2 MB.</div>
@error('foto') <div class="err">{{ $message }}</div> @enderror

<div class="form-actions">
  <button type="submit" class="btn">{{ $edit ? 'Simpan Perubahan' : 'Simpan' }}</button>
  <a href="{{ route('galeri.index') }}" class="btn btn-light">Batal</a>
</div>
