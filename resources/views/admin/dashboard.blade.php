@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')
@section('page-title', 'Dashboard')

@section('content')

<div class="row g-3 mb-4">
    <div class="col-sm-6 col-xl-4">
        <div class="stat-card">
            <div class="icon-wrap" style="background:#dbeafe; color:#3b82f6;">
                <i class="bi bi-person-lines-fill"></i>
            </div>
            <div>
                <div class="stat-value">{{ $totalProfiles }}</div>
                <div class="stat-label">Total Entries</div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-xl-4">
        <div class="stat-card">
            <div class="icon-wrap" style="background:#dcfce7; color:#16a34a;">
                <i class="bi bi-calendar3"></i>
            </div>
            <div>
                <div class="stat-value">{{ $recentCount }}</div>
                <div class="stat-label">Added This Month</div>
            </div>
        </div>
    </div>
</div>

<!-- Recent Entries Table -->
<div class="table-card">
    <div class="table-card-header">
        <span><i class="bi bi-clock-history me-2"></i>Recent Entries</span>
        <a href="{{ route('admin.names.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Link</th>
                    <th>Created</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentProfiles as $profile)
                <tr>
                    <td class="fw-semibold">{{ $profile->name }}</td>
                    <td class="text-muted small">/profiles/{{ $profile->slug }}</td>
                    <td class="text-muted small">{{ $profile->created_at->format('M j, Y') }}</td>
                    <td>
                        <a href="{{ route('admin.names.edit', $profile) }}" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-pencil"></i>
                        </a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted py-4">
                        No entries yet. <a href="{{ route('admin.names.create') }}">Add one</a>.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection