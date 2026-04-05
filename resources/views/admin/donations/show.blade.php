@extends('admin.layouts.app')

@section('title', 'Donation #' . $donation->id)
@section('page-title', 'Donation Detail')

@section('content')

<div class="row g-4">

    {{-- ── Left: Donor Info ── --}}
    <div class="col-lg-8">

        <div class="table-card mb-4">
            <div class="table-card-header">
                <span><i class="bi bi-person-circle me-2"></i>Donor Information</span>
                <span class="text-muted small">#{{ $donation->id }}</span>
            </div>
            <div class="p-4">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="detail-label">Full Name</div>
                        <div class="detail-value">{{ $donation->name }}</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="detail-label">Email Address</div>
                        <div class="detail-value">
                            <a href="mailto:{{ $donation->email }}">{{ $donation->email }}</a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="detail-label">Phone</div>
                        <div class="detail-value">{{ $donation->phone ?: '–' }}</div>
                    </div>
                    <div class="col-sm-6">
                        <div class="detail-label">ZIP Code</div>
                        <div class="detail-value">{{ $donation->zip_code ?: '–' }}</div>
                    </div>
                    @if($donation->message)
                    <div class="col-12">
                        <div class="detail-label">Message</div>
                        <div class="detail-value" style="background:#f9fafb; border-radius:8px; padding:.75rem 1rem; font-style:italic; color:#374151;">
                            "{{ $donation->message }}"
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="table-card">
            <div class="table-card-header">
                <span><i class="bi bi-currency-dollar me-2"></i>Donation Details</span>
            </div>
            <div class="p-4">
                <div class="row g-3">
                    <div class="col-sm-4">
                        <div class="detail-label">Amount</div>
                        <div class="detail-value" style="font-size:1.6rem; color:#16a34a; font-weight:900;">
                            ${{ number_format($donation->amount, 2) }}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="detail-label">Frequency</div>
                        <div class="detail-value">
                            <span class="badge {{ $donation->frequency === 'monthly' ? 'bg-primary' : 'bg-secondary' }}" style="font-size:.85rem; padding:.4em .8em;">
                                {{ $donation->frequency === 'monthly' ? 'Monthly' : 'One-Time' }}
                            </span>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="detail-label">Submitted</div>
                        <div class="detail-value">{{ $donation->created_at->format('M j, Y g:ia') }}</div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- ── Right: Status Management ── --}}
    <div class="col-lg-4">

        <div class="table-card mb-3">
            <div class="table-card-header"><span><i class="bi bi-toggle2-on me-2"></i>Status</span></div>
            <div class="p-4">
                <div class="mb-3">
                    @if($donation->status === 'completed')
                        <span class="badge bg-success" style="font-size:.9rem; padding:.5em 1em;">Completed</span>
                    @elseif($donation->status === 'cancelled')
                        <span class="badge bg-danger" style="font-size:.9rem; padding:.5em 1em;">Cancelled</span>
                    @else
                        <span class="badge bg-warning text-dark" style="font-size:.9rem; padding:.5em 1em;">Pending</span>
                    @endif
                </div>

                <form action="{{ route('admin.donations.status', $donation) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label class="form-label fw-semibold small">Update Status</label>
                        <select name="status" class="form-select form-select-sm">
                            <option value="pending"   {{ $donation->status === 'pending'   ? 'selected' : '' }}>Pending</option>
                            <option value="completed" {{ $donation->status === 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $donation->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm w-100 fw-semibold">
                        <i class="bi bi-save me-1"></i> Save Status
                    </button>
                </form>
            </div>
        </div>

        <div class="table-card">
            <div class="p-4">
                <a href="{{ route('admin.donations.index') }}" class="btn btn-outline-secondary btn-sm w-100 mb-2">
                    <i class="bi bi-arrow-left me-1"></i> Back to List
                </a>
                <form action="{{ route('admin.donations.destroy', $donation) }}" method="POST"
                      onsubmit="return confirm('Delete this donation record? This cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm w-100">
                        <i class="bi bi-trash me-1"></i> Delete Record
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>

@push('styles')
<style>
.detail-label { font-size:.75rem; text-transform:uppercase; letter-spacing:.06em; color:#9ca3af; margin-bottom:.25rem; font-weight:600; }
.detail-value  { font-size:.95rem; color:#111827; font-weight:500; }
</style>
@endpush

@endsection
