@extends('admin.layouts.app')

@section('title', 'Add New Name')
@section('page-title', 'Add New Name')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="table-card p-4">
            <h6 class="fw-semibold mb-4">New Entry</h6>
            <form action="{{ route('admin.names.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label fw-semibold">Name</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                           class="form-control @error('name') is-invalid @enderror"
                           placeholder="Enter a name">
                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email <span class="text-muted fw-normal">(optional)</span></label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="Enter an email address">
                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Writeup</label>
                    <textarea name="writeup" rows="10"
                              class="form-control @error('writeup') is-invalid @enderror"
                              placeholder="Write the content for this name...">{{ old('writeup') }}</textarea>
                    @error('writeup')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Save Entry</button>
                    <a href="{{ route('admin.names.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
