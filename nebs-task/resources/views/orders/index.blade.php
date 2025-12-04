@extends('layouts.layout')
@section('title', 'Orders')
@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/v/bs5/dt-1.13.8/r-2.5.0/datatables.min.css" />

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
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

    .table thead th {
        color: var(--text-strong) !important;
        border-color: var(--border) !important;
    }

    .table tbody td {
        color: var(--text) !important;
        border-color: var(--border) !important;
        vertical-align: middle;
    }

    html[data-theme="dark"] .table tbody tr:nth-child(odd) {
        background: rgba(255, 255, 255, .02)
    }

    html[data-theme="light"] .table tbody tr:nth-child(odd) {
        background: #f7f9fc
    }

    .table tbody tr:hover {
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
</style>

<div class="card p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="m-0">
            @if(auth()->user()->role == 'admin')
                All Orders
            @else
                My Orders
            @endif
        </h5>
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
        <table id="ordersTable" class="table table-hover align-middle" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    @if(auth()->user()->role == 'admin')
                        <th>User</th>
                    @endif
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>
                @forelse($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    @if(auth()->user()->role == 'admin')
                        <td>{{ $order->user->name ?? 'N/A' }}</td>
                    @endif

                    <td>{{ $order->product->name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>${{ $order->product->price }}</td>
                    <td>${{ $order->quantity * $order->product->price }}</td>
                    <td>{{ $order->created_at->format('d M Y - h:i A') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-3">
                        No Orders Found
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/r-2.5.0/datatables.min.js"></script>
<script>
    const dt = $('#ordersTable').DataTable({
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
            }
        ],
        order: [[1, 'desc']],
        pageLength: parseInt($('#pageLen').val(), 10) || 10,
        lengthMenu: [[10,25,50,100,-1],[10,25,50,100,'All']],
        dom: "<'row'<'col-12'tr>>" + "<'row'<'col-sm-6'i><'col-sm-6 text-md-end'p>>",
        language: {
            info: "Showing _START_ to _END_ of _TOTAL_ orders",
            emptyTable: "No Orders found."
        }
    });

          // ✅ Searching
        $('#tableSearch').on('keyup', function () {
            dt.search(this.value).draw();
        });
        </script>



</script>

@endsection
