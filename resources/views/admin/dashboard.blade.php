@extends('admin.layouts.app')

@section('title', 'Dashboard – Donation Admin')
@section('page-title', 'Dashboard')

@section('content')

{{-- ── Stat Cards ── --}}
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="icon-wrap" style="background:#dbeafe; color:#3b82f6;">
                <i class="bi bi-heart-fill"></i>
            </div>
            <div>
                <div class="stat-value">{{ number_format($totalDonations) }}</div>
                <div class="stat-label">Total Donations</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="icon-wrap" style="background:#dcfce7; color:#16a34a;">
                <i class="bi bi-currency-dollar"></i>
            </div>
            <div>
                <div class="stat-value">${{ number_format($totalRaised, 2) }}</div>
                <div class="stat-label">Total Raised</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="icon-wrap" style="background:#fef3c7; color:#d97706;">
                <i class="bi bi-hourglass-split"></i>
            </div>
            <div>
                <div class="stat-value">{{ number_format($pendingCount) }}</div>
                <div class="stat-label">Pending</div>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="icon-wrap" style="background:#d1fae5; color:#059669;">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <div>
                <div class="stat-value">{{ number_format($completedCount) }}</div>
                <div class="stat-label">Completed</div>
            </div>
        </div>
    </div>
</div>

{{-- ── This Month Banner ── --}}
<div class="table-card mb-4 p-4" style="background:linear-gradient(135deg,#0a2463,#1d4ed8); border:none;">
    <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
        <div>
            <div style="color:rgba(255,255,255,.6); font-size:.8rem; text-transform:uppercase; letter-spacing:1px; margin-bottom:.3rem;">This Month's Contributions</div>
            <div style="font-size:2.4rem; font-weight:900; color:#fbbf24; font-family:'Bebas Neue',sans-serif; letter-spacing:2px;">
                ${{ number_format($thisMonthRaised, 2) }}
            </div>
        </div>
        <a href="{{ route('admin.donations.index') }}" class="btn btn-light fw-semibold px-4">
            <i class="bi bi-list-ul me-1"></i> View All Donations
        </a>
    </div>
</div>

{{-- ── Recent Donations ── --}}
<div class="table-card">
    <div class="table-card-header">
        <span><i class="bi bi-clock-history me-2"></i>Recent Donations</span>
        <a href="{{ route('admin.donations.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Amount</th>
                    <th>Frequency</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentDonations as $d)
                <tr>
                    <td class="text-muted small">{{ $d->id }}</td>
                    <td class="fw-semibold">{{ $d->name }}</td>
                    <td class="text-muted small">{{ $d->email }}</td>
                    <td class="fw-bold text-success">${{ number_format($d->amount, 2) }}</td>
                    <td>
                        <span class="badge {{ $d->frequency === 'monthly' ? 'bg-primary' : 'bg-secondary' }} badge-status">
                            {{ $d->frequency === 'monthly' ? 'Monthly' : 'One-Time' }}
                        </span>
                    </td>
                    <td>
                        @if($d->status === 'completed')
                            <span class="badge bg-success badge-status">Completed</span>
                        @elseif($d->status === 'cancelled')
                            <span class="badge bg-danger badge-status">Cancelled</span>
                        @else
                            <span class="badge bg-warning text-dark badge-status">Pending</span>
                        @endif
                    </td>
                    <td class="text-muted small">{{ $d->created_at->format('M j, Y') }}</td>
                    <td>
                        <a href="{{ route('admin.donations.show', $d) }}" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-eye"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted py-4">No donations yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection