@extends('layouts.layout')
@section('title', 'Edit Product')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />

<style>
/* SAME STYLE AS YOUR PDF PAGE — FULL THEME */
:root {
    --bg:#0b1220; --surface:#0e152a; --card:#0f1a32; --card-2:#0b1326;
    --border:#1e2a44; --text:#e8eef7; --text-strong:#fff; --text-soft:#c8d3e6;
    --muted:#9aa9c3; --brand:#6366f1; --brand-2:#4f46e5; --focus:rgba(99,102,241,.50);
    --input-bg:#0c152b; --input-border:#293855; --input-ph:#8aa0bf;
    --success:#22c55e; --danger:#ef4444; --shadow:0 18px 40px rgba(0,0,0,.22);
}
/* FORCE INPUT TEXT VISIBLE IN DARK MODE */
html[data-theme="dark"] input.form-control,
html[data-theme="dark"] textarea.form-control,
html[data-theme="dark"] select.form-select {
    color: #ffffff !important;        /* White text */
    background-color: #112342 !important; /* Slight dark background */
}

body { background:var(--bg); color:var(--text); font:400 14px Inter, sans-serif }
.card { background:var(--card); border:1px solid var(--border); border-radius:16px; box-shadow:var(--shadow) }
.card-title { color:var(--text-strong) }
.form-label { color:var(--text-soft); font-weight:600 }
.form-control, .form-select, textarea {
    background:var(--input-bg)!important; border:1px solid var(--input-border);
    color:var(--text); border-radius:12px; padding:.6rem .75rem;
}
.form-control::placeholder { color:var(--input-ph) }
.form-control:focus, .form-select:focus, textarea:focus {
    border-color:var(--brand); box-shadow:0 0 0 .2rem var(--focus);
}
.btn-primary { background:linear-gradient(135deg,var(--brand),var(--brand-2)); border:0 }
.btn-primary:hover { filter:brightness(1.05) }
</style>

@section('content')
<div class="card p-3">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h5 class="card-title m-0">Edit Product</h5>
        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Back</a>
    </div>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-3">

            {{-- Product Name --}}
            <div class="col-md-4">
                <label class="form-label">Product Name <span class="text-danger">*</span></label>
                <input type="text" name="name" class="form-control"
                       value="{{ old('name', $product->name) }}" required>
                @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- Price --}}
            <div class="col-md-4">
                <label class="form-label">Price <span class="text-danger">*</span></label>
                <input type="number" name="price" class="form-control"
                       value="{{ old('price', $product->price) }}" required>
                @error('price') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

           

            {{-- Product Image --}}
            <div class="col-md-4">
                <label class="form-label">Product Image</label>
                <input type="file" name="image" class="form-control" accept="image/*">

                <div class="small mt-1">
                    @if ($product->image)
                        Current:  
                        <a href="{{ asset('uploads/products/'.$product->image) }}" target="_blank">
                            View Image
                        </a>
                    @endif
                </div>
                @error('image') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- Description --}}
            <div class="col-12">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description', $product->description) }}</textarea>
                @error('description') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- Published --}}
            <div class="col-md-3">
                <div class="form-check mt-2">
                    <input type="checkbox" class="form-check-input" name="published" value="1" id="published"
                        {{ old('published', $product->published) ? 'checked' : '' }}>
                    <label for="published" class="form-check-label">Published</label>
                </div>
                @error('published') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- Buttons --}}
            <div class="col-12 d-flex justify-content-end gap-2">
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Cancel</a>
                <button class="btn btn-primary" type="submit">
                    <i class="bi bi-save me-1"></i> Update
                </button>
            </div>

        </div>
    </form>
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
