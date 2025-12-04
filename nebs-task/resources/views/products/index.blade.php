@extends('layouts.layout')
@section('title', 'Resources')
@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-1.13.8/r-2.5.0/datatables.min.css" />

@if (session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
@endif



 <style>
        html[data-theme="dark"] {
            --text: #eaf0ff;
            --text-strong: #fff;
            --muted: #b3c0da;
            --border: #213255;
            --card: #0f1a32;
            --input-bg: #0c152b;
            --input-border: #293855;
            --brand: #6366f1;
            --brand-2: #4f46e5
        }

        html[data-theme="light"] {
            --text: #182231;
            --text-strong: #0d1526;
            --muted: #53627a;
            --border: #dfe6f1;
            --card: #fff;
            --input-bg: #fff;
            --input-border: #d9e2ef;
            --brand: #6366f1;
            --brand-2: #4f46e5
        }

        .btn-brand {
            background: #0D6EFD;
            color: #fff;
            border: 0;
            border-radius: 12px;
            padding: .5rem .9rem;
            box-shadow: 0 8px 18px rgba(13, 110, 253, .25)
        }

        .btn-brand:hover {
            filter: brightness(1.05);
            color: #fff
        }

        .btn-action {
            border: 1px solid var(--border);
            background: color-mix(in oklab, var(--text) 6%, transparent);
            color: var(--text);
            border-radius: 10px;
            padding: .35rem .6rem
        }

        html[data-theme="light"] .btn-action {
            background: #f3f6ff;
            border-color: #cfd9f0;
            color: #334155
        }

        .btn-action:hover {
            border-color: var(--brand);
            background: color-mix(in oklab, var(--brand) 14%, transparent);
            color: var(--text-strong)
        }

        .dropdown-menu.user-actions {
            min-width: 180px;
            background: var(--card);
            color: var(--text);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: .35rem 0;
            box-shadow: 0 12px 28px rgba(0, 0, 0, .18);
            margin-top: .25rem
        }

        .dropdown-menu.user-actions .dropdown-item {
            color: var(--text);
            display: flex;
            align-items: center;
            gap: .5rem;
            padding: .45rem .75rem
        }

        .dropdown-menu.user-actions .dropdown-item .bi {
            color: var(--muted)
        }

        .dropdown-menu.user-actions .dropdown-item:hover {
            background: color-mix(in oklab, var(--brand) 12%, transparent)
        }

        .dropdown-menu.user-actions .dropdown-divider {
            border-top-color: var(--border)
        }

        #usersTable thead th {
            color: var(--text-strong) !important;
            border-color: var(--border) !important
        }

        #usersTable tbody td {
            color: var(--text) !important;
            border-color: var(--border) !important
        }

        .table th,
        .table td {
            vertical-align: middle;
             color: #fff !important;
        }

        #usersTable th:nth-child(1),
        #usersTable td:nth-child(1) {
            text-align: center;
            width: 64px
        }

        html[data-theme="dark"] #usersTable tbody tr:nth-child(odd) {
            background: rgba(255, 255, 255, .02)
        }

        html[data-theme="light"] #usersTable tbody tr:nth-child(odd) {
            background: #f7f9fc
        }

        #usersTable tbody tr:hover {
            background: color-mix(in oklab, var(--brand) 12%, transparent);
            outline: 1px solid color-mix(in oklab, var(--brand) 26%, var(--border))
        }

        .toolbar .form-control,
        .toolbar .form-select {
            background: var(--input-bg);
            color: var(--text);
            border: 1px solid var(--input-border)
        }

        .toolbar .form-control::placeholder {
            color: var(--muted)
        }

        .dataTables_wrapper .dataTables_info {
            color: var(--muted) !important
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button {
            background: var(--card) !important;
            color: var(--text) !important;
            border: 1px solid var(--border) !important;
            border-radius: 8px;
            margin: 0 .125rem
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background: color-mix(in oklab, var(--brand) 35%, transparent) !important;
            color: #fff !important;
            border-color: var(--brand) !important
        }

        table.dataTable.dtr-inline.collapsed>tbody>tr>td.dtr-control:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th.dtr-control:before {
            background: linear-gradient(135deg, var(--brand), var(--brand-2));
            color: #fff;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, .15)
        }
    </style>

<div class="card p-3">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h5 class="card-title m-0">Products</h5>

        {{-- Admin-only Add Product button --}}
        @can('product-add')
        <a href="{{ route('products.create') }}" class="btn-brand" style="text-decoration:none;">
            <i class="bi bi-plus-circle me-1"></i> Add Product
        </a>
        @endcan
    </div>

    {{-- Toolbar --}}
    <div class="toolbar row g-2 align-items-center mb-2">
        <div class="col-12 col-md-3">
            <div class="d-flex align-items-center gap-2">
                <label class="small mb-0 text-muted">Show</label>
                <select id="pageLen" class="form-select form-select-sm w-auto">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="-1">All</option>
                </select>
                <span class="small text-muted">entries</span>
            </div>
        </div>

        <div class="col-12 col-md-6 d-flex justify-content-center">
            <input id="tableSearch" class="form-control" placeholder="Search …" style="max-width:420px">
        </div>
        <div class="col-12 col-md-3"></div>
    </div>

    {{-- DataTable --}}
    <div class="table-responsive">
        <table id="productsTable" class="table table-hover align-middle" style="width:100%">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($products as $product)
                <tr>
                    <td></td>

                    <td>{{ $product->name }}</td>

                    <td>${{ $product->price }}</td>

                    <td>{{ Str::limit($product->description, 40) }}</td>

                    <td>
                        @if($product->image)
                            <img src="{{ asset($product->image) }}" width="40" class="rounded">
                        @else
                            <span class="text-muted small">No Image</span>
                        @endif
                    </td>

                    <td class="text-end">
                        <div class="dropdown">
                            <button class="btn btn-action btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>

                            <ul class="dropdown-menu dropdown-menu-end user-actions">

                                {{-- View (everyone) --}}
                                <li>
                                    <a class="dropdown-item" href="{{ route('products.show', $product->id) }}">
                                        <i class="bi bi-eye"></i> View
                                    </a>
                                </li>

                                {{-- Edit (admin only) --}}
                                @can('product-edit')
                                <li>
                                    <a class="dropdown-item" href="{{ route('products.edit', $product->id) }}">
                                        <i class="bi bi-pencil"></i> Edit
                                    </a>
                                </li>
                                @endcan

                                {{-- Delete (admin only) --}}
                                @can('product-delete')
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('products.destroy', $product->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Delete this product?')">
                                        @csrf @method('DELETE')
                                        <button class="dropdown-item text-danger">
                                            <i class="bi bi-trash"></i> Delete
                                        </button>
                                    </form>
                                </li>
                                @endcan

                                {{-- Order (only general user) --}}
                                @role('user')
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('orders.store', $product->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="quantity" value="1">
                                        <button class="dropdown-item">
                                            <i class="bi bi-bag"></i> Order
                                        </button>
                                    </form>
                                </li>
                                @endrole
                            </ul>
                        </div>
                    </td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/r-2.5.0/datatables.min.js"></script>
<script>

    //for Searching Product
    const dt = $('#productsTable').DataTable({
        responsive: {
            details: { type: 'column', target: 0 }
        },
        columnDefs: [
            {
                className: 'dtr-control',
                orderable: false,
                searchable: false,
                targets: 0,
                render: (data, type, row, meta) => meta.row + meta.settings._iDisplayStart + 1
            },
            { targets: -1, orderable: false, searchable: false },
            { responsivePriority: 1, targets: 1 }, // Title
            { responsivePriority: 2, targets: 2 }  // Slug
        ],
        order: [[1, 'asc']],
        pageLength: parseInt($('#pageLen').val(), 10) || 10,
        lengthMenu: [[10,25,50,100,-1],[10,25,50,100,'All']],
        dom: "<'row'<'col-12'tr>>" + "<'row'<'col-sm-6'i><'col-sm-6 text-md-end'p>>",
        language: {
            info: "Showing _START_ to _END_ of _TOTAL_ resources",
            emptyTable: "No PDFs found."
        }
    });


     // ✅ Searching
        $('#tableSearch').on('keyup', function () {
            dt.search(this.value).draw();
        });
        </script>

@endsection
