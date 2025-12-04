@extends('layouts.layout')
@section('title', 'Setting')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet" />

<style>
    /* ---------- THEME TOKENS (ACCESSIBLE) ---------- */
    :root {
        /* dark defaults */
        --bg: #0b1220;
        --surface: #0e152a;
        --card: #0f1a32;
        --card-2: #0b1326;
        --border: #1e2a44;
        --text: #e8eef7;
        --text-strong: #fff;
        --text-soft: #c8d3e6;
        --muted: #9aa9c3;
        --brand: #6366f1;
        --brand-2: #4f46e5;
        --focus: rgba(99, 102, 241, .50);
        --input-bg: #0c152b;
        --input-border: #293855;
        --input-ph: #8aa0bf;
        --success: #22c55e;
        --danger: #ef4444;
        --shadow: 0 18px 40px rgba(0, 0, 0, .22);
    }

    html[data-theme="light"] {
        --bg: #f7f9fc;
        --surface: #fff;
        --card: #fff;
        --card-2: #f5f7fb;
        --border: #e6edf4;
        --text: #0f172a;
        --text-strong: #0b1320;
        --text-soft: #243244;
        --muted: #66748b;
        --brand: #6366f1;
        --brand-2: #4f46e5;
        --focus: rgba(99, 102, 241, .35);
        --input-bg: #fff;
        --input-border: #d9e2ef;
        --input-ph: #8793a3;
        --shadow: 0 12px 28px rgba(10, 21, 40, .08);
    }

    html,
    body {
        height: 100%
    }

    body {
        background: var(--bg);
        color: var(--text);
        font: 400 14px/1.45 Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, Arial
    }

    /* Cards / sections */
    .card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 16px;
        box-shadow: var(--shadow)
    }

    .card-title {
        color: var(--text-strong)
    }

    .section-title {
        margin: 4px 0 4px;
        font-size: .80rem;
        font-weight: 700;
        letter-spacing: .04em;
        color: var(--muted);
        text-transform: uppercase
    }

    .section-divider {
        height: 1px;
        background: var(--border);
        margin: 8px 0 16px
    }

    /* Form controls */
    .form-label {
        color: var(--text-soft);
        font-weight: 600;
        font-size: .86rem
    }

    .form-control,
    .form-select,
    textarea {
        background: var(--input-bg) !important;
        color: var(--text);
        border: 1px solid var(--input-border);
        border-radius: 12px;
        padding: .6rem .75rem
    }

    .form-control::placeholder {
        color: var(--input-ph);
        opacity: 1
    }

    .form-control:focus,
    .form-select:focus,
    textarea:focus {
        border-color: var(--brand);
        box-shadow: 0 0 0 .2rem var(--focus);
        background: var(--input-bg);
        color: var(--text)
    }

    .form-check-input {
        background-color: var(--input-bg);
        border-color: var(--input-border)
    }

    .form-check-input:checked {
        background-color: var(--brand);
        border-color: var(--brand)
    }

    .input-hint {
        color: var(--muted);
        font-size: .78rem
    }

    /* Buttons */
    .btn-primary {
        background: linear-gradient(135deg, var(--brand), var(--brand-2));
        border: 0
    }

    .btn-primary:hover {
        filter: brightness(1.05)
    }

    .btn-outline-secondary {
        color: var(--muted);
        border-color: var(--border)
    }

    .btn-outline-secondary:hover {
        background: color-mix(in oklab, var(--brand) 10%, transparent);
        color: var(--text)
    }

    /* Alerts */
    .alert-success {
        background: color-mix(in oklab, var(--success) 12%, transparent);
        border-color: color-mix(in oklab, var(--success) 30%, transparent);
        color: color-mix(in oklab, var(--success) 85%, white);
        border-radius: 12px
    }

    /* Preview card */
    .preview-card .hero {
        background: linear-gradient(180deg, color-mix(in oklab, var(--brand) 22%, transparent), transparent);
        border: 1px dashed var(--border);
        border-radius: 12px
    }

    .preview-meta .bi {
        color: var(--muted)
    }

    @media (min-width:1200px) {
        .sticky-xl-top {
            position: sticky;
            top: 76px;
            z-index: 1
        }
    }

    /* ===== Readability boost for DARK theme only ===== */
    html[data-theme="dark"] {
        /* text colors (brighter) */
        --text: #f3f7ff;
        /* body text */
        --text-strong: #ffffff;
        /* titles */
        --text-soft: #d7e4ff;
        /* labels */
        --muted: #b9c7df;
        /* helper / small text */

        /* inputs (slightly lighter bg + stronger border/placeholder) */
        --input-bg: #112342;
        /* was too dark */
        --input-border: #4b6187;
        --input-ph: #cadaf2;

        /* section/card borders a bit lighter */
        --border: #2b3e62;
    }

    /* Force components to use the brighter tokens */
    html[data-theme="dark"] .form-label {
        color: var(--text-soft);
        font-weight: 600;
    }

    html[data-theme="dark"] .text-muted {
        color: var(--muted) !important;
    }

    html[data-theme="dark"] .section-title {
        color: var(--muted);
    }

    html[data-theme="dark"] .card-title {
        color: var(--text-strong);
    }

    html[data-theme="dark"] .form-control,
    html[data-theme="dark"] .form-select,
    html[data-theme="dark"] textarea {
        color: var(--text);
        background: var(--input-bg) !important;
        border: 1px solid var(--input-border);
    }

    html[data-theme="dark"] .form-control::placeholder,
    html[data-theme="dark"] textarea::placeholder {
        color: var(--input-ph);
        opacity: 1;
        /* ensure visible */
    }

    html[data-theme="dark"] .form-control:disabled,
    html[data-theme="dark"] .form-select:disabled,
    html[data-theme="dark"] textarea:disabled {
        color: color-mix(in oklab, var(--text) 70%, black);
        background: color-mix(in oklab, var(--input-bg) 85%, black);
        border-color: color-mix(in oklab, var(--input-border) 80%, black);
    }

    html[data-theme="dark"] .form-select,
    html[data-theme="dark"] .form-select option {
        color: var(--text);
        background: var(--input-bg);
    }

    html[data-theme="dark"] .form-check-label {
        color: var(--text-soft);
    }

    /* Focus ring stays clear/accessible */
    .form-control:focus,
    .form-select:focus,
    textarea:focus {
        border-color: var(--brand);
        box-shadow: 0 0 0 .2rem var(--focus);
    }
</style>

@section('content')

    @if (session('status'))
        <div class="alert alert-success container-sm">{{ session('status') }}</div>
    @endif

    <div class="row g-3">
        <div class="col-12 col-xl-12">
            <div class="card p-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="m-0 text-muted">Profile Update</h5>
                    <span class="text-muted small">Update your Profile </span>
                </div>

                <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    @method('patch')

                    {{-- Branding --}}
                    {{-- <div class="section-title">Branding</div> --}}
                    <div class="section-divider"></div>

                    <div class="col-md-3">
                        <label class="form-label">Name</label>
                        <input id="name" type="text" name="name" class="form-control"
                            value="{{ old('name', $user->name) }}" required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label"> Email</label>
                        <input id="email" type="email" name="email" class="form-control"
                            value="{{ old('email', $user->email) }}">

                    </div>
                    <div class="col-md-3">
                        <label class="form-label"> Phone</label>
                        <input id="phone" type="text" name="phone" class="form-control"
                            value="{{ old('phone', $user->phone) }}">

                    </div>
                    <div class="col-md-3">
                        <label class="form-label"> Address</label>
                        <input id="address" type="text" name="address" class="form-control"
                            value="{{ old('address', $user->address) }}">

                    </div>
                    <div class="col-md-3">
                        <label class="form-label"> NID</label>
                        <input id="nid" type="text" name="nid" class="form-control"
                            value="{{ old('nid', $user->nid) }}">

                    </div>
                    <div class="col-md-3">
                        <label class="form-label"> Private Notes</label>
                        <input id="private_notes" type="text" name="private_notes" class="form-control"
                            value="{{ old('private_notes', $user->private_notes) }}">

                    </div>

                    <div class="col-12 d-flex justify-content-end pt-1">
                        <button class="btn btn-primary"><i class="bi bi-save me-1"></i> Save Settings</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    /* Ensure theme attribute exists (default dark) */
    (function() {
        const root = document.documentElement;
        const saved = localStorage.getItem('theme');
        const initial = (saved === 'light' || saved === 'dark') ?
            saved :
            (root.getAttribute('data-theme') || 'dark');
        root.setAttribute('data-theme', initial);

        // Optional toggle support (works only if an element with id="themeToggle" exists)
        const btn = document.getElementById('themeToggle');
        if (!btn) return; // No toggle button on this page/layout

        function render() {
            const t = root.getAttribute('data-theme') || 'dark';
            btn.innerHTML = t === 'dark' ? '<i class="bi bi-brightness-high"></i>' :
                '<i class="bi bi-moon-stars"></i>';
            btn.title = t === 'dark' ? 'Switch to light' : 'Switch to dark';
        }

        function setTheme(t) {
            root.setAttribute('data-theme', t);
            localStorage.setItem('theme', t);
            render();
        }

        render();
        btn.addEventListener('click', () => setTheme(root.getAttribute('data-theme') === 'dark' ? 'light' :
            'dark'));
    })();

    /* Live preview bindings */
    (function() {
        const bind = (id, target, transform = v => v || '') => {
            const el = document.getElementById(id),
                pv = document.getElementById(target);
            if (!el || !pv) return;
            const update = () => pv.textContent = transform(el.value);
            el.addEventListener('input', update);
            update();
        };
        bind('f_company_name', 'pv_name');
        bind('f_company_email', 'pv_email', v => v || 'no-reply@example.com');
        bind('f_address', 'pv_addr');
        bind('f_city', 'pv_city');
        bind('f_postal', 'pv_postal');
        bind('f_phone', 'pv_phone');
        bind('f_timezone', 'pv_tz');
        bind('f_currency', 'pv_cur');

        const themeSel = document.getElementById('f_theme');
        if (themeSel) {
            const pvTheme = document.getElementById('pv_theme');
            const upd = () => pvTheme.textContent = themeSel.value.charAt(0).toUpperCase() + themeSel.value.slice(
                1);
            themeSel.addEventListener('change', upd);
            upd();
        }
    })();

    /* Logo preview */
    (function() {
        const logo = document.getElementById('f_logo');
        const pv = document.getElementById('pv_logo');
        if (!logo || !pv) return;
        logo.addEventListener('change', () => {
            const file = logo.files?.[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = e => pv.src = e.target.result;
            reader.readAsDataURL(file);
        });
    })();
</script>
