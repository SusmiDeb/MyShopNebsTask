@extends('layouts.layout')

@section('content')

<style>
/* ==== SAME STYLE AS YOUR BEAUTIFUL PDF UI ==== */
.resource-wrap {
    display: grid;
    grid-template-columns: 1fr;
    gap: 18px;
}
@media (min-width: 992px){
    .resource-wrap { grid-template-columns: 1.4fr .8fr; align-items:start; }
}
.r-card {
    background: var(--card);
    border: 1px solid var(--border);
    border-radius: 16px;
    box-shadow:0 10px 26px rgba(0,0,0,.12);
}
.r-head {
    padding:16px 18px;
    border-bottom:1px solid var(--border);
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:8px;
    background:
        radial-gradient(1000px 160px at 10% -20%, color-mix(in oklab, var(--brand) 18%, transparent), transparent),
        radial-gradient(900px 150px at 90% -30%, color-mix(in oklab, var(--brand-2) 16%, transparent), transparent);
    border-radius:16px 16px 0 0;
}
.r-title{ font-size:1.15rem;font-weight:700;margin:0;color:var(--text-strong); }
.preview-wrap{ position:relative;padding:14px; }
.preview-box{
    border:1px solid var(--border);
    border-radius:14px;
    overflow:hidden;
    background:var(--card);
}
.meta-card { padding:16px; }
.meta-row{
    display:grid;
    grid-template-columns:110px 1fr;
    gap:8px;
    padding:8px 0;
}
.meta-label{ color:var(--muted);font-weight:600; }
.meta-value{ color:var(--text); }

.product-image{
    width:100%;
    max-height:420px;
    object-fit:cover;
    border-radius:14px;
    border:1px solid var(--border)
}
.btn-brand{
    background: var(--brand);
    color:#fff;
    border-radius:12px;
    padding:.55rem 1rem;
}



/* animated toast */
.custom-alert {
    background: #d4edda;
    border-left: 5px solid #28a745;
    color: #155724;
    padding: 12px 18px;
    border-radius: 8px;
    margin-bottom: 15px;
    font-size: 16px;
    font-weight: 600;
    display: flex;
    align-items: center;
    animation: fadeIn 0.3s ease-out, fadeOut 0.3s ease-in 3.2s forwards;
    box-shadow: 0 4px 10px rgba(0,0,0,0.07);
}

.custom-alert-text {
    margin-left: 6px;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to   { opacity: 1; transform: translateY(0); }
}

@keyframes fadeOut {
    from { opacity: 1; }
    to   { opacity: 0; transform: translateY(-10px); }
}



</style>

<div class="resource-wrap">
    <!-- {{-- Success Message --}} -->
  

    {{-- LEFT PANEL: Product Preview --}}
    <section class="r-card">
          @if(session('success'))
    <div class="custom-alert">
        <span class="custom-alert-text">
            ✅ {{ session('success') }}
        </span>
    </div>
    @endif
        
        <div class="r-head">
            <h5 class="r-title">{{ $product->name }}</h5>

            <div class="d-none d-md-flex" style="gap:8px;">
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">Back</a>
                @if(auth()->user()->hasRole('admin'))
                    <a href="{{ route('products.edit',$product) }}" class="btn btn-outline-secondary">Edit</a>
                @endif
            </div>
        </div>

        <div class="preview-wrap">

            {{-- Product Image --}}
            @if($product->image)
                <div class="preview-box p-2">
                    <img  src="{{ asset($product->image) }}" width="100" class="product-image">
                </div>
            @else
                <div class="alert alert-warning mt-3">No image uploaded.</div>
            @endif

            {{-- Description --}}
            @if($product->description)
                <div class="p-3 text-muted">
                    {{ $product->description }}
                </div>
            @endif

        </div>
    </section>

    {{-- RIGHT PANEL: Product Meta --}}
    <aside class="r-card meta-card">

        <div class="meta-row">
            <div class="meta-label">Price</div>
            <div class="meta-value">
                <strong>{{ number_format($product->price,2) }} ৳</strong>
            </div>
        </div>

        <div class="meta-row">
            <div class="meta-label">Uploaded</div>
            <div class="meta-value">   {{ optional($product->created_at)->format('d-m-Y') }}</div>
        </div>

        <div class="meta-row">
            <div class="meta-label">Updated</div>
            <div class="meta-value">{{ ($product->updated_at->diffForHumans()) }}</div>
        </div>

        {{-- Order Button --}}
        <div class="mt-3">
            @auth
                <form action="{{ route('orders.store', $product->id) }}" method="POST">

                    @csrf
                    @csrf
        
                    <label class="fw-bold mb-1">Quantity</label>
                    <label class="fw-bold mb-1">Quantity</label>
                    <input 
                        type="number" 
                        name="quantity" 
                        value="1" 
                        min="1" 
                        class="form-control mb-3 qty-input"
                    >

                    <button class="btn btn-primary w-100" 
                            style="border-radius: 10px; padding: 10px 0; font-weight:600;">
                        🛒 Order Now
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-brand w-100">Login to Order</a>
            @endauth
        </div>

    </aside>

</div>

@endsection
