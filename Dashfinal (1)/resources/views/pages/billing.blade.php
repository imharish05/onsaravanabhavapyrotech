@extends('layout.app')
@section('main_content')

<style>
    /* ===== Billing Page Premium Styles ===== */
    .billing-stats-row {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        margin-bottom: 28px;
    }

    .billing-stat-card {
        flex: 1;
        min-width: 200px;
        background: linear-gradient(135deg, #2e356b 0%, #3b4491 100%);
        border-radius: 16px;
        padding: 22px 24px;
        color: #fff;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(46, 53, 107, 0.18);
        transition: transform 0.28s cubic-bezier(.4,0,.2,1), box-shadow 0.28s;
    }

    .billing-stat-card:hover {
        transform: translateY(-6px) scale(1.02);
        box-shadow: 0 16px 48px rgba(46, 53, 107, 0.28);
    }

    .billing-stat-card.green {
        background: linear-gradient(135deg, #1d976c 0%, #2fd18a 100%);
    }

    .billing-stat-card.amber {
        background: linear-gradient(135deg, #e8a838 0%, #eec76b 100%);
    }

    .billing-stat-card.red {
        background: linear-gradient(135deg, #e74c3c 0%, #f17c6e 100%);
    }

    .billing-stat-card .stat-icon {
        position: absolute;
        right: 18px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 48px;
        opacity: 0.15;
    }

    .billing-stat-card .stat-label {
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        opacity: 0.85;
        margin-bottom: 6px;
    }

    .billing-stat-card .stat-value {
        font-size: 28px;
        font-weight: 800;
        letter-spacing: -0.5px;
        line-height: 1.1;
    }

    .billing-stat-card .stat-sub {
        font-size: 12px;
        opacity: 0.7;
        margin-top: 4px;
    }

    /* Page Title */
    .billing-page-title {
        font-size: 26px;
        font-weight: 800;
        color: #2e356b;
        letter-spacing: -0.5px;
        display: flex;
        align-items: center;
        gap: 12px;
        margin-bottom: 8px;
    }

    .billing-page-title i {
        font-size: 28px;
        color: #eebe6c;
    }

    .billing-page-subtitle {
        font-size: 14px;
        color: #8892b3;
        margin-bottom: 24px;
    }

    /* Table Card */
    .billing-table-card {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 4px 24px rgba(46, 53, 107, 0.08);
        padding: 0;
        overflow: hidden;
    }

    .billing-table-card .card-header-custom {
        background: linear-gradient(90deg, #2e356b 0%, #3b4491 100%);
        padding: 18px 28px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
    }

    .billing-table-card .card-header-custom h5 {
        color: #fff;
        font-weight: 700;
        font-size: 18px;
        margin: 0;
    }

    .billing-table-card .card-header-custom .header-badge {
        background: rgba(255,255,255,0.18);
        color: #eebe6c;
        font-size: 12px;
        font-weight: 700;
        padding: 5px 14px;
        border-radius: 20px;
        letter-spacing: 0.5px;
    }

    .billing-table-card .card-body {
        padding: 24px 28px;
    }

    /* Status Badges */
    .badge-billing {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 12px;
        font-weight: 700;
        padding: 5px 14px;
        border-radius: 20px;
        letter-spacing: 0.3px;
    }

    .badge-billing.delivered {
        background: rgba(29, 151, 108, 0.12);
        color: #1d976c;
    }

    .badge-billing.pending {
        background: rgba(232, 168, 56, 0.12);
        color: #d49a2a;
    }

    .badge-billing.cancelled {
        background: rgba(231, 76, 60, 0.12);
        color: #e74c3c;
    }

    .badge-billing.processing {
        background: rgba(52, 152, 219, 0.12);
        color: #3498db;
    }

    .badge-billing.dispatch {
        background: rgba(155, 89, 182, 0.12);
        color: #9b59b6;
    }

    .badge-billing i {
        font-size: 8px;
    }

    /* Table Enhancements */
    #billing-table thead th {
        background: #f8f9fd;
        color: #2e356b;
        font-weight: 700;
        font-size: 12.5px;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        border-bottom: 2px solid #e8ecf4;
        padding: 14px 16px;
        white-space: nowrap;
    }

    #billing-table tbody td {
        padding: 14px 16px;
        font-size: 13.5px;
        color: #444;
        vertical-align: middle;
        border-bottom: 1px solid #f0f2f8;
    }

    #billing-table tbody tr {
        transition: background 0.2s;
    }

    #billing-table tbody tr:hover {
        background: #f5f7ff;
    }

    .order-id-link {
        color: #2e356b;
        font-weight: 700;
        text-decoration: none;
        transition: color 0.2s;
    }

    .order-id-link:hover {
        color: #eebe6c;
        text-decoration: underline;
    }

    .customer-info .name {
        font-weight: 700;
        color: #2e356b;
        font-size: 13.5px;
    }

    .customer-info .phone {
        font-size: 12px;
        color: #8892b3;
        margin-top: 2px;
    }

    .amount-cell {
        font-weight: 800;
        color: #1d976c;
        font-size: 14px;
    }

    .amount-cell .currency {
        font-size: 12px;
        font-weight: 600;
        opacity: 0.7;
    }

    .date-cell {
        font-size: 13px;
        color: #666;
    }

    .date-cell .time {
        font-size: 11px;
        color: #aab3cc;
        display: block;
        margin-top: 2px;
    }

    /* Action Buttons */
    .billing-action-btn {
        width: 34px;
        height: 34px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border: none;
        font-size: 14px;
        transition: all 0.22s;
        margin-right: 4px;
    }

    .billing-action-btn.btn-view {
        background: rgba(46, 53, 107, 0.1);
        color: #2e356b;
    }

    .billing-action-btn.btn-view:hover {
        background: #2e356b;
        color: #fff;
        transform: scale(1.12);
    }

    .billing-action-btn.btn-print {
        background: rgba(29, 151, 108, 0.1);
        color: #1d976c;
    }

    .billing-action-btn.btn-print:hover {
        background: #1d976c;
        color: #fff;
        transform: scale(1.12);
    }

    .billing-action-btn.btn-status {
        background: rgba(232, 168, 56, 0.1);
        color: #d49a2a;
    }

    .billing-action-btn.btn-status:hover {
        background: #e8a838;
        color: #fff;
        transform: scale(1.12);
    }

    /* Chart Section */
    .billing-chart-card {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 4px 24px rgba(46, 53, 107, 0.08);
        padding: 24px;
        margin-bottom: 28px;
    }

    .billing-chart-card h5 {
        font-weight: 700;
        color: #2e356b;
        margin-bottom: 16px;
        font-size: 16px;
    }

    /* Filter Row */
    .billing-filter-row {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-bottom: 20px;
    }

    .billing-filter-btn {
        border: 2px solid #e8ecf4;
        background: #fff;
        color: #2e356b;
        font-weight: 700;
        font-size: 13px;
        padding: 8px 20px;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.22s;
    }

    .billing-filter-btn:hover,
    .billing-filter-btn.active {
        background: #2e356b;
        color: #eebe6c;
        border-color: #2e356b;
    }

    .billing-filter-btn .count {
        background: rgba(238, 190, 108, 0.2);
        color: #eebe6c;
        font-size: 11px;
        font-weight: 800;
        padding: 2px 8px;
        border-radius: 10px;
        margin-left: 6px;
    }

    .billing-filter-btn.active .count {
        background: rgba(238, 190, 108, 0.35);
    }

    /* Summary Footer */
    .billing-summary-footer {
        background: linear-gradient(135deg, #f8f9fd 0%, #e8ecf4 100%);
        border-radius: 14px;
        padding: 20px 28px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 16px;
        margin-top: 20px;
    }

    .billing-summary-footer .summary-item {
        text-align: center;
    }

    .billing-summary-footer .summary-item .label {
        font-size: 12px;
        color: #8892b3;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .billing-summary-footer .summary-item .value {
        font-size: 22px;
        font-weight: 800;
        color: #2e356b;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .billing-stats-row {
            flex-direction: column;
        }
        .billing-stat-card {
            min-width: 100%;
        }
        .billing-table-card .card-body {
            padding: 12px;
        }
        .billing-summary-footer {
            flex-direction: column;
            text-align: center;
        }
    }

    /* Pulse animation for stat cards */
    @keyframes statPulse {
        0% { box-shadow: 0 8px 32px rgba(46, 53, 107, 0.18); }
        50% { box-shadow: 0 8px 32px rgba(46, 53, 107, 0.28); }
        100% { box-shadow: 0 8px 32px rgba(46, 53, 107, 0.18); }
    }

    /* Fade in animation */
    @keyframes fadeSlideUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fade-slide-up {
        animation: fadeSlideUp 0.5s ease forwards;
    }

    .fade-slide-up:nth-child(1) { animation-delay: 0.05s; }
    .fade-slide-up:nth-child(2) { animation-delay: 0.1s; }
    .fade-slide-up:nth-child(3) { animation-delay: 0.15s; }
    .fade-slide-up:nth-child(4) { animation-delay: 0.2s; }

    /* Invoice serial badge */
    .serial-badge {
        background: #f0f2f8;
        color: #2e356b;
        font-weight: 700;
        font-size: 12px;
        width: 30px;
        height: 30px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
</style>

<div class="container-fluid">
    <!-- Page Title -->
    <div class="row mb-2">
        <div class="col-12">
            <div class="billing-page-title fade-slide-up">
                <i class="fas fa-file-invoice-dollar"></i>
                Billing & Invoices
            </div>
            <p class="billing-page-subtitle fade-slide-up">Manage all billing records, invoices, and payment tracking in one place.</p>
        </div>
    </div>

    @php
        // Recalculate stats to match dashboard logic (Complete/Paid)
        $totalBilledFiltered = \App\Models\ProductOrder::whereIn('status', ['Complete ', 'Paid'])->sum('total');
        $paidCountFiltered = \App\Models\ProductOrder::whereIn('status', ['Complete ', 'Paid'])->count();
    @endphp

    <!-- Stats Row -->
    <div class="billing-stats-row">
        <div class="billing-stat-card fade-slide-up">
            <div class="stat-icon"><i class="fas fa-rupee-sign"></i></div>
            <div class="stat-label">Total Revenue</div>
            <div class="stat-value">₹{{ number_format($totalBilledFiltered, 2) }}</div>
            <div class="stat-sub">{{ $totalOrders }} total invoices</div>
        </div>
        <div class="billing-stat-card green fade-slide-up">
            <div class="stat-icon"><i class="fas fa-calendar-day"></i></div>
            <div class="stat-label">Today's Billing</div>
            <div class="stat-value">₹{{ number_format($todayBilled, 2) }}</div>
            <div class="stat-sub">{{ $todayOrders }} orders today</div>
        </div>
        <div class="billing-stat-card amber fade-slide-up">
            <div class="stat-icon"><i class="fas fa-clock"></i></div>
            <div class="stat-label">Pending Orders</div>
            <div class="stat-value">{{ $pendingCount }}</div>
            <div class="stat-sub">Awaiting processing</div>
        </div>
        <div class="billing-stat-card red fade-slide-up">
            <div class="stat-icon"><i class="fas fa-check-double"></i></div>
            <div class="stat-label">Completed</div>
            <div class="stat-value">{{ $paidCountFiltered }}</div>
            <div class="stat-sub">Delivered successfully</div>
        </div>
    </div>

    <!-- Chart + Quick Stats Row -->
    <div class="row mb-4">
        <div class="col-lg-8">
            <div class="billing-chart-card fade-slide-up">
                <h5><i class="fas fa-chart-area me-2" style="color: #eebe6c;"></i> Monthly Revenue Overview</h5>
                <div id="billing-revenue-chart" style="min-height: 280px;"></div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="billing-chart-card fade-slide-up" style="height: calc(100% - 28px);">
                <h5><i class="fas fa-chart-pie me-2" style="color: #eebe6c;"></i> Order Status Distribution</h5>
                <div id="billing-status-chart" style="min-height: 260px;"></div>
            </div>
        </div>
    </div>

    <!-- Billing Table -->
    <div class="billing-table-card fade-slide-up">
        <div class="card-header-custom">
            <div>
                <h5><i class="fas fa-receipt me-2"></i> All Invoices</h5>
                <span class="header-badge mt-2 d-inline-block">{{ $totalOrders }} Records</span>
            </div>
            <div>
                <a href="{{ route('billing.create') }}" class="btn btn-warning fw-bold text-dark px-4 py-2" style="border-radius: 10px;">
                    <i class="fas fa-plus-circle me-1"></i> New Bill / Order
                </a>
            </div>
        </div>
        <div class="card-body">
            <!-- Unified Filter Bar -->
            <div class="row mb-4 bg-light p-3 mx-0 rounded-4 align-items-end" style="border: 1px solid #e8ecf4;">
                <div class="col-lg-3">
                    <label class="form-label fw-bold small text-muted text-uppercase mb-1">
                        <i class="fas fa-filter me-1"></i> Order Status
                    </label>
                    <select id="statusFilter" class="form-select border-0 shadow-sm" style="border-radius: 10px; height: 42px;">
                        <option value="">All Statuses</option>
                        @foreach ($status as $stat)
                            <option value="{{ $stat->order_status }}">{{ $stat->order_status }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-2">
                    <label class="form-label fw-bold small text-muted text-uppercase mb-1">
                        <i class="fas fa-layer-group me-1"></i> Order Type
                    </label>
                    <select id="typeFilter" class="form-select border-0 shadow-sm" style="border-radius: 10px; height: 42px;">
                        <option value="">All Types</option>
                        <option value="online">Online Order</option>
                        <option value="billing">Billing Order</option>
                    </select>
                </div>
                <div class="col-lg-2">
                    <label class="form-label fw-bold small text-muted text-uppercase mb-1">
                        <i class="far fa-calendar-alt me-1"></i> Start Date
                    </label>
                    <input type="date" id="startDateFilter" class="form-control border-0 shadow-sm" style="border-radius: 10px; height: 42px;">
                </div>
                <div class="col-lg-2">
                    <label class="form-label fw-bold small text-muted text-uppercase mb-1">
                        <i class="far fa-calendar-check me-1"></i> End Date
                    </label>
                    <input type="date" id="endDateFilter" class="form-control border-0 shadow-sm" style="border-radius: 10px; height: 42px;">
                </div>
                <div class="col-lg-3 d-flex gap-2 mt-3 mt-lg-0">
                    <button id="applyFilter" class="btn btn-dark fw-bold w-100" style="border-radius: 10px; height: 42px;">
                        <i class="fas fa-search me-1"></i> Apply
                    </button>
                    <button id="resetFilter" class="btn btn-outline-secondary fw-bold w-100" style="border-radius: 10px; height: 42px;">
                        <i class="fas fa-undo me-1"></i> Reset
                    </button>
                </div>
            </div>

            <!-- Data Table -->
            <table id="billing-table" class="table table-bordered dt-responsive nowrap w-100">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Invoice Date</th>
                        <th>Order No</th>
                        <th>Customer</th>
                        <th>Sub Total</th>
                        <th>Shipping</th>
                        <th>Total Amount</th>
                        <th>Type</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($billings as $bill)
                    <tr>
                        <td><span class="serial-badge">{{ $i++ }}</span></td>
                        <td class="date-cell" data-order="{{ $bill->created_at->timestamp }}">
                            {{ $bill->created_at->format('d M Y') }}
                            <span class="time">{{ $bill->created_at->format('h:i A') }}</span>
                        </td>
                        <td>
                            <a href="/ordersolt/{{ $bill->oeder_id }}" class="order-id-link">
                                #{{ $bill->oeder_id }}
                            </a>
                        </td>
                        <td>
                            <div class="customer-info">
                                <div class="name">{{ $bill->name }}</div>
                                <div class="phone"><i class="fas fa-phone-alt me-1"></i>{{ $bill->phone_number }}</div>
                            </div>
                        </td>
                        <td class="amount-cell">
                            <span class="currency">₹</span>{{ number_format($bill->sub_total ?? 0, 2) }}
                        </td>
                        <td>
                            <span style="font-size:13px; color:#666;">₹{{ number_format($bill->shipping ?? 0, 2) }}</span>
                        </td>
                        <td class="amount-cell">
                            <span class="currency">₹</span>{{ number_format($bill->total, 2) }}
                        </td>
                        <td>
                            @if(($bill->order_source ?? 'online') == 'billing')
                                <span class="badge bg-soft-info text-info border-info fw-bold" style="font-size: 11px; padding: 4px 10px; border-radius: 6px;">
                                    <i class="fas fa-file-invoice me-1"></i> BILLING
                                </span>
                            @else
                                <span class="badge bg-soft-primary text-primary border-primary fw-bold" style="font-size: 11px; padding: 4px 10px; border-radius: 6px;">
                                    <i class="fas fa-globe me-1"></i> ONLINE
                                </span>
                            @endif
                            <span class="d-none">{{ $bill->order_source ?? 'online' }}</span>
                        </td>
                        <td>
                            @php
                                $statusClass = 'pending';
                                if($bill->status == 'Delivered' || $bill->status == 'Paid' || $bill->status == 'Complete ') $statusClass = 'delivered';
                                elseif($bill->status == 'Cancelled' || $bill->status == 'Rejected') $statusClass = 'cancelled';
                                elseif($bill->status == 'Dispatch') $statusClass = 'dispatch';
                                elseif($bill->status == 'Processing') $statusClass = 'processing';
                            @endphp
                            <span class="badge-billing {{ $statusClass }}">
                                <i class="fas fa-circle"></i>
                                {{ $bill->status }}
                            </span>
                        </td>
                        <td>
                            <a href="/ordersolt/{{ $bill->oeder_id }}" class="billing-action-btn btn-view" title="View Details">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="/pdf/{{ $bill->oeder_id }}/{{ $bill->user_id }}" target="_blank" class="billing-action-btn btn-print" title="Print Invoice">
                                <i class="fas fa-print"></i>
                            </a>
                            <button type="button" class="billing-action-btn btn-status addstatusorder" data-bs-toggle="modal" data-bs-target="#billingStatusModal" data-id="{{ $bill->id }}" title="Update Status">
                                <i class="fas fa-edit"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Summary Footer -->
            <div class="billing-summary-footer">
                <div class="summary-item">
                    <div class="label">Total Invoices</div>
                    <div class="value">{{ $totalOrders }}</div>
                </div>
                <div class="summary-item">
                    <div class="label">Delivered</div>
                    <div class="value" style="color: #1d976c;">{{ $paidCountFiltered }}</div>
                </div>
                <div class="summary-item">
                    <div class="label">Pending</div>
                    <div class="value" style="color: #e8a838;">{{ $pendingCount }}</div>
                </div>
                <div class="summary-item">
                    <div class="label">Total Revenue</div>
                    <div class="value">₹{{ number_format($totalBilledFiltered, 2) }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Status Update Modal --}}
<div class="modal fade" id="billingStatusModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="billingStatusModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 16px; overflow: hidden; border: none;">
            <div class="modal-header" style="background: linear-gradient(90deg, #2e356b 0%, #3b4491 100%); border: none;">
                <h5 class="modal-title text-white fw-bold" id="billingStatusModalLabel">
                    <i class="fas fa-edit me-2"></i> Update Invoice Status
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/status/update" method="POST" id="billingUpdateStatus">
                @csrf
                <div class="modal-body" style="padding: 28px;">
                    <div class="mb-3">
                        <label for="billing_status_select" class="form-label fw-bold" style="color: #2e356b;">Order Status</label>
                        <select class="form-select" aria-label="Select Status" id="billing_status_select" name="status" style="border-radius: 10px; padding: 10px 14px; border: 2px solid #e8ecf4;">
                            <option selected disabled>Choose Order Status</option>
                            @foreach ($status as $stat)
                                <option value="{{ $stat->order_status }}">{{ $stat->order_status }}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="hidden" name="id" id="billing_status_id">
                </div>
                <div class="modal-footer" style="border: none; padding: 16px 28px;">
                    <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal" style="border-radius: 10px; font-weight: 600;">Cancel</button>
                    <button type="submit" class="btn px-4" id="billing_status_submit"
                        style="background: linear-gradient(135deg, #2e356b, #3b4491); color: #fff; border-radius: 10px; font-weight: 700;">
                        <i class="fas fa-save me-1"></i> Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
@section('scripts')
<script>
$(document).ready(function() {
    // Initialize DataTable
    var billingTable = $('#billing-table').DataTable({
        pageLength: 15,
        order: [[1, 'desc']],
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel me-1"></i> Excel',
                className: 'btn btn-sm',
                title: 'Billing_Report_{{ date("Y-m-d") }}',
                exportOptions: { columns: [0,1,2,3,4,5,6,7] }
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fas fa-file-pdf me-1"></i> PDF',
                className: 'btn btn-sm',
                title: 'Billing Report - {{ date("d M Y") }}',
                exportOptions: { columns: [0,1,2,3,4,5,6,7] }
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print me-1"></i> Print',
                className: 'btn btn-sm',
                title: 'Billing Report',
                exportOptions: { columns: [0,1,2,3,4,5,6,7] }
            },
            {
                extend: 'csvHtml5',
                text: '<i class="fas fa-file-csv me-1"></i> CSV',
                className: 'btn btn-sm',
                title: 'Billing_Report_{{ date("Y-m-d") }}',
                exportOptions: { columns: [0,1,2,3,4,5,6,7] }
            }
        ],
        language: {
            search: '<i class="fas fa-search"></i>',
            searchPlaceholder: 'Search invoices...',
            lengthMenu: 'Show _MENU_ entries',
            info: 'Showing _START_ to _END_ of _TOTAL_ invoices',
            paginate: {
                previous: '<i class="fas fa-chevron-left"></i>',
                next: '<i class="fas fa-chevron-right"></i>'
            }
        }
    });

    // Advanced Client-Side Filters
    // Date parsing helper for "d M Y" format (e.g., 06 Apr 2026)
    function parseBillingDate(dateStr) {
        if (!dateStr) return null;
        var parts = dateStr.trim().split(' ');
        if (parts.length < 3) return null;
        
        var day = parseInt(parts[0]);
        var monthName = parts[1];
        var year = parseInt(parts[2]);
        
        var months = {
            'Jan': 0, 'Feb': 1, 'Mar': 2, 'Apr': 3, 'May': 4, 'Jun': 5,
            'Jul': 6, 'Aug': 7, 'Sep': 8, 'Oct': 9, 'Nov': 10, 'Dec': 11
        };
        
        return new Date(year, months[monthName], day);
    }

    // Custom filtering function for DataTables
    $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
        var startDate = $('#startDateFilter').val();
        var endDate = $('#endDateFilter').val();
        var rawDate = data[1]; // Column 1: Date
        
        if (!startDate && !endDate) return true;
        
        var date = parseBillingDate(rawDate);
        if (!date) return true;
        
        var start = startDate ? new Date(startDate) : null;
        var end = endDate ? new Date(endDate) : null;
        
        if (start) {
            start.setHours(0,0,0,0);
            if (date < start) return false;
        }
        if (end) {
            end.setHours(23,59,59,999);
            if (date > end) return false;
        }
        
        return true;
    });

    // Handle Filter Clicks
    $('#applyFilter').on('click', function() {
        var status = $('#statusFilter').val();
        var type = $('#typeFilter').val();
        
        billingTable.column(8).search(status).draw(); // col 8: Status
        billingTable.column(7).search(type).draw();   // col 7: Type
    });

    // Handle Reset
    $('#resetFilter').on('click', function() {
        $('#statusFilter').val('');
        $('#typeFilter').val('');
        $('#startDateFilter').val('');
        $('#endDateFilter').val('');
        
        billingTable.column(8).search('').draw();
        billingTable.column(7).search('').draw();
    });

    // Status modal - set ID
    $(document).on('click', '.addstatusorder', function() {
        $('#billing_status_id').val($(this).attr('data-id'));
    });

    // Handle Status Update Submission
    $('#billingUpdateStatus').on('submit', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        $('#billing_status_submit').prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-1"></i> Special Saving...');
        
        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: formData,
            success: function(response) {
                if (response.status == 200) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: response.message,
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        location.reload();
                    });
                }
            },
            error: function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong while updating status.'
                });
                $('#billing_status_submit').prop('disabled', false).html('<i class="fas fa-save me-1"></i> Save Changes');
            }
        });
    });

    // Revenue Chart (ApexCharts)
    var monthlyData = @json($monthlyRevenue);
    var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
    var chartLabels = monthlyData.map(function(item) {
        return months[item.month - 1] + ' ' + item.year;
    });
    var chartValues = monthlyData.map(function(item) {
        return parseFloat(item.revenue);
    });

    if (chartLabels.length === 0) {
        chartLabels = ['No Data'];
        chartValues = [0];
    }

    var revenueChart = new ApexCharts(document.querySelector("#billing-revenue-chart"), {
        series: [{
            name: 'Revenue',
            data: chartValues
        }],
        chart: {
            type: 'area',
            height: 280,
            toolbar: { show: false },
            fontFamily: 'Montserrat, sans-serif'
        },
        colors: ['#2e356b'],
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                opacityFrom: 0.45,
                opacityTo: 0.05,
                stops: [0, 100]
            }
        },
        stroke: {
            curve: 'smooth',
            width: 3
        },
        dataLabels: { enabled: false },
        xaxis: {
            categories: chartLabels,
            labels: { style: { colors: '#8892b3', fontWeight: 600 } }
        },
        yaxis: {
            labels: {
                formatter: function(val) { return '₹' + val.toLocaleString(); },
                style: { colors: '#8892b3', fontWeight: 600 }
            }
        },
        tooltip: {
            y: { formatter: function(val) { return '₹' + val.toLocaleString('en-IN', {minimumFractionDigits: 2}); } }
        },
        grid: {
            borderColor: '#f0f2f8',
            strokeDashArray: 4
        }
    });
    revenueChart.render();

    // Status Pie Chart
    var statusChart = new ApexCharts(document.querySelector("#billing-status-chart"), {
        series: [{{ $paidCount }}, {{ $pendingCount }}, {{ $cancelledCount }}],
        chart: {
            type: 'donut',
            height: 260,
            fontFamily: 'Montserrat, sans-serif'
        },
        labels: ['Delivered', 'Pending', 'Cancelled'],
        colors: ['#1d976c', '#e8a838', '#e74c3c'],
        plotOptions: {
            pie: {
                donut: {
                    size: '60%',
                    labels: {
                        show: true,
                        total: {
                            show: true,
                            label: 'Total',
                            fontSize: '14px',
                            fontWeight: 800,
                            color: '#2e356b'
                        }
                    }
                }
            }
        },
        dataLabels: { enabled: false },
        legend: {
            position: 'bottom',
            fontWeight: 600,
            fontSize: '13px',
            labels: { colors: '#555' }
        },
        stroke: { width: 0 }
    });
    statusChart.render();
});
</script>
@endsection
