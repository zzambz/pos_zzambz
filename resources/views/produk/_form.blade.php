{{-- FOTO SAAT INI --}}
@if (!empty($produk->foto))
    <div class="mb-3">
        <label class="form-label">Foto Saat Ini</label><br>

        <img
            src="{{ asset('storage/' . $produk->foto) }}"
            width="150"
            class="img-thumbnail"
        >
    </div>
@endif

<div class="row">

    {{-- INPUT FOTO --}}
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Foto Produk</label>

            <input
                type="file"
                name="foto"
                onchange="previewImage(this)"
                class="form-control @error('foto') is-invalid @enderror"
            >

            @error('foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    {{-- PREVIEW FOTO --}}
    <div class="col-md-6">
        <div class="mb-3">
            <label class="form-label">Preview Foto</label><br>

            <img
                id="preview"
                src="{{ !empty($produk->foto) ? asset('storage/' . $produk->foto) : '' }}"
                class="img-thumbnail mt-2"
                width="150"
                style="{{ !empty($produk->foto) ? '' : 'display:none' }}"
            >
        </div>
    </div>

</div>

{{-- NAMA PRODUK --}}
<div class="mb-3">
    <label class="form-label">Nama Produk</label>

    <input type="text"
           name="name"
           class="form-control @error('name') is-invalid @enderror"
           value="{{ old('name', $produk->name ?? '') }}">

    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- HARGA BELI --}}
<div class="mb-3">
    <label class="form-label">Harga Beli</label>

    <input type="number"
           name="purchase_price"
           class="form-control @error('purchase_price') is-invalid @enderror"
           value="{{ old('purchase_price', $produk->purchase_price ?? '') }}">

    @error('purchase_price')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- HARGA JUAL --}}
<div class="mb-3">
    <label class="form-label">Harga Jual</label>

    <input type="number"
           name="selling_price"
           class="form-control @error('selling_price') is-invalid @enderror"
           value="{{ old('selling_price', $produk->selling_price ?? '') }}">

    @error('selling_price')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- STOK --}}
<div class="mb-3">
    <label class="form-label">Stok</label>

    <input type="number"
           name="stock"
           class="form-control @error('stock') is-invalid @enderror"
           value="{{ old('stock', $produk->stock ?? '') }}">

    @error('stock')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

{{-- BUTTON --}}
<div class="mt-4">
    <button class="btn btn-success" type="submit">
        Simpan
    </button>

    <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary">
        Kembali
    </a>
</div>

{{-- PREVIEW IMAGE SCRIPT --}}
<script>
function previewImage(input) {
    const preview = document.getElementById('preview');
    const file = input.files[0];

    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
    }
}
</script>