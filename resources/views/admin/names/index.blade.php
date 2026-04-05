@extends('admin.layouts.app')

@section('title', 'Manage Names')
@section('page-title', 'Names & Writeups')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="fw-semibold mb-0">All Entries</h5>
    <a href="{{ route('admin.names.create') }}" class="btn btn-primary btn-sm">
        <i class="bi bi-plus-lg me-1"></i> Add New Name
    </a>
</div>

<div class="table-card">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Link</th>
                    <th>Created</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($profiles as $profile)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="fw-semibold">{{ $profile->name }}</td>
                    <td>
                        <a href="{{ url('/profiles/' . $profile->slug) }}" target="_blank" class="text-muted small">
                            /profiles/{{ $profile->slug }}
                        </a>
                        <button class="btn btn-sm btn-outline-primary ms-2 copy-btn"
                                data-link="{{ url('/profiles/' . $profile->slug) }}">
                            <i class="bi bi-clipboard me-1"></i> Copy Link
                        </button>
                    </td>
                    <td class="text-muted small">{{ $profile->created_at->format('M d, Y') }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.names.edit', $profile) }}" class="btn btn-sm btn-outline-secondary me-1">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.names.destroy', $profile) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Delete this entry?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted py-4">No entries yet. <a href="{{ route('admin.names.create') }}">Create one</a>.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('styles')
<style>
    .copy-btn { font-size: .85rem; vertical-align: middle; }
    .copy-btn.copied { color: #16a34a !important; }
</style>
@endpush

@push('scripts')
<script>
    document.querySelectorAll('.copy-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            navigator.clipboard.writeText(btn.dataset.link).then(() => {
                btn.innerHTML = '<i class="bi bi-clipboard-check me-1"></i> Copied!';
                btn.classList.remove('btn-outline-primary');
                btn.classList.add('btn-success');
                setTimeout(() => {
                    btn.innerHTML = '<i class="bi bi-clipboard me-1"></i> Copy';
                    btn.classList.remove('btn-success');
                    btn.classList.add('btn-outline-primary');
                }, 2000);
            });
        });
    });
</script>
@endpush
