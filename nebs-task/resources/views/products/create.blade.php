@extends('layouts.layout')
@section('title', 'Add Product')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />

<style>
    :root {
        --bg: #0b1220;
        --surface: #0e152a;
        --card: #0f1a32;
        --border: #1e2a44;
        --text: #e8eef7;
        --text-soft: #c8d3e6;
        --input-bg: #0c152b;
        --input-border: #293855;
        --input-ph: #8aa0bf;
        --brand: #6366f1;
        --focus: rgba(99,102,241, .50);
        --shadow: 0 18px 40px rgba(0,0,0,.22);
    }

    /* html[data-theme="light"] {
        --bg:#f7f9fc; --surface:#fff; --card:#fff;
        --border:#e6edf4; --text:#0f172a;
        --input-bg:#fff; --input-border:#d9e2ef; --input-ph:#8793a3;
    } */

        /* FORCE INPUT TEXT VISIBLE IN DARK MODE */
html[data-theme="dark"] input.form-control,
html[data-theme="dark"] textarea.form-control,
html[data-theme="dark"] select.form-select {
    color: #e6eeeeff !important;        /* White text */
    background-color: #112342 !important; /* Slight dark background */
}

    body {
        background: var(--bg);
        color: var(--text);
        font: 100 12px/1.25 Inter, ui-sans-serif, system-ui;
    }

    .card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 16px;
        box-shadow: var(--shadow);
    }

    .form-label { color: var(--text-soft); font-weight: 600; }
    .form-control, .form-select {
        background: var(--input-bg)!important;
        color: var(--text); border: 1px solid var(--input-border);
        border-radius: 12px; padding: .6rem .75rem;
    }

    .form-control::placeholder {
        color: var(--input-ph);
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--brand), #4f46e5);
        border: 0;
    }
</style>

@section('content')
<div class="card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="m-0 white" style="color:white;">Add New Product</h4>
        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Back</a>
    </div>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row g-3">

            {{-- Product Name --}}
            <div class="col-md-6">
                <label class="form-label">Product Name *</label>
                <input type="text" name="name" class="form-control"
                       value="{{ old('name') }}" placeholder="Enter product name" required>
                @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- Price --}}
            <div class="col-md-3">
                <label class="form-label">Price *</label>
                <input type="number" name="price" class="form-control"
                       value="{{ old('price') }}" placeholder="0" required>
                @error('price') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            

            {{-- Product Image --}}
            <div class="col-md-3">
                <label class="form-label">Product Image *</label>
                <input type="file" name="image" class="form-control" accept="image/*" required>
                @error('image') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

          

            {{-- Description --}}
            <div class="col-12">
                <label class="form-label">Description</label>
                <textarea name="description" class="form-control" rows="3"
                    placeholder="Write product description">{{ old('description') }}</textarea>
                @error('description') <div class="text-danger small">{{ $message }}</div> @enderror
            </div>

            {{-- Submit --}}
            <div class="col-12 d-flex justify-content-end gap-2">
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Cancel</a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Save Product
                </button>
            </div>

        </div>
    </form>
</div>
@endsection
