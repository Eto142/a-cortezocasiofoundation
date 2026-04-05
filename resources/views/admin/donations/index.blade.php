@extends('admin.layouts.app')

@section('title', 'All Donations')
@section('page-title', 'All Donations')

@section('content')

{{-- ── Filters ── --}}
<div class="table-card mb-4 p-3">
    <form method="GET" action="{{ route('admin.donations.index') }}" class="row g-2 align-items-end">
        <div class="col-sm-5">
            <input type="text" name="search" class="form-control form-control-sm"
                   placeholder="Search name or email…" value="{{ request('search') }}">
        </div>
        <div class="col-sm-3">
            <select name="status" class="form-select form-select-sm">
                <option value="">All Statuses</option>
                <option value="pending"   {{ request('status') === 'pending'   ? 'selected' : '' }}>Pending</option>
                <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-sm btn-primary">Filter</button>
            <a href="{{ route('admin.donations.index') }}" class="btn btn-sm btn-outline-secondary ms-1">Reset</a>
        </div>
    </form>
</div>

{{-- ── Table ── --}}
<div class="table-card">
    <div class="table-card-header">
        <span><i class="bi bi-heart-fill me-2 text-danger"></i>Donations
            <span class="badge bg-secondary ms-2" style="font-size:.72rem;">{{ $donations->total() }}</span>
        </span>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Amount</th>
                    <th>Frequency</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($donations as $d)
                <tr>
                    <td class="text-muted small">{{ $d->id }}</td>
                    <td class="fw-semibold">{{ $d->name }}</td>
                    <td class="text-muted small">{{ $d->email }}</td>
                    <td class="text-muted small">{{ $d->phone ?: '–' }}</td>
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
                    <td class="text-muted small">{{ $d->created_at->format('M j, Y g:ia') }}</td>
                    <td>
                        <a href="{{ route('admin.donations.show', $d) }}" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-eye"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="text-center text-muted py-5">No donations found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @if($donations->hasPages())
    <div class="p-3 border-top">
        {{ $donations->links() }}
    </div>
    @endif
</div>

@endsection
