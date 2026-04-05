@extends('admin.layouts.app')

@section('title', 'Payment Settings')
@section('page-title', 'Payment Settings')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8">

        <form action="{{ route('admin.payment.update') }}" method="POST">
            @csrf
            @method('PUT')

            {{-- ── Bank Transfer ── --}}
            <div class="table-card mb-4">
                <div class="table-card-header">
                    <span><i class="bi bi-bank me-2"></i>Bank Transfer Details</span>
                    <div class="form-check form-switch mb-0">
                        <input class="form-check-input" type="checkbox" role="switch"
                               name="bank_enabled" id="bankEnabled" value="1"
                               {{ $settings->bank_enabled ? 'checked' : '' }}>
                        <label class="form-check-label" for="bankEnabled">
                            {{ $settings->bank_enabled ? 'Enabled' : 'Disabled' }}
                        </label>
                    </div>
                </div>
                <div class="p-4">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label class="form-label fw-semibold">Bank Name</label>
                            <input type="text" name="bank_name" class="form-control @error('bank_name') is-invalid @enderror"
                                   value="{{ old('bank_name', $settings->bank_name) }}"
                                   placeholder="e.g. Chase Bank">
                            @error('bank_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label fw-semibold">Account Holder Name</label>
                            <input type="text" name="account_name" class="form-control @error('account_name') is-invalid @enderror"
                                   value="{{ old('account_name', $settings->account_name) }}"
                                   placeholder="e.g. AOC 2026 Campaign Fund">
                            @error('account_name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label fw-semibold">Account Number</label>
                            <input type="text" name="account_number" class="form-control @error('account_number') is-invalid @enderror"
                                   value="{{ old('account_number', $settings->account_number) }}"
                                   placeholder="e.g. 000123456789">
                            @error('account_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label fw-semibold">Routing Number</label>
                            <input type="text" name="routing_number" class="form-control @error('routing_number') is-invalid @enderror"
                                   value="{{ old('routing_number', $settings->routing_number) }}"
                                   placeholder="e.g. 021000021">
                            @error('routing_number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Additional Instructions <span class="text-muted fw-normal">(optional)</span></label>
                            <textarea name="bank_instructions" rows="3" class="form-control @error('bank_instructions') is-invalid @enderror"
                                      placeholder="e.g. Use your full name as the transfer reference.">{{ old('bank_instructions', $settings->bank_instructions) }}</textarea>
                            @error('bank_instructions')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
            </div>

            {{-- ── Gift Card ── --}}
            <div class="table-card mb-4">
                <div class="table-card-header">
                    <span><i class="bi bi-gift me-2"></i>Gift Card Details</span>
                    <div class="form-check form-switch mb-0">
                        <input class="form-check-input" type="checkbox" role="switch"
                               name="giftcard_enabled" id="giftcardEnabled" value="1"
                               {{ $settings->giftcard_enabled ? 'checked' : '' }}>
                        <label class="form-check-label" for="giftcardEnabled">
                            {{ $settings->giftcard_enabled ? 'Enabled' : 'Disabled' }}
                        </label>
                    </div>
                </div>
                <div class="p-4">
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label class="form-label fw-semibold">Gift Card Type</label>
                            <input type="text" name="giftcard_type" class="form-control @error('giftcard_type') is-invalid @enderror"
                                   value="{{ old('giftcard_type', $settings->giftcard_type) }}"
                                   placeholder="e.g. Visa Gift Card, Amazon, eBay">
                            @error('giftcard_type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-sm-6">
                            <label class="form-label fw-semibold">Send Code To (Email)</label>
                            <input type="email" name="giftcard_email" class="form-control @error('giftcard_email') is-invalid @enderror"
                                   value="{{ old('giftcard_email', $settings->giftcard_email) }}"
                                   placeholder="donations@example.com">
                            @error('giftcard_email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Instructions for Donor</label>
                            <textarea name="giftcard_instructions" rows="3" class="form-control @error('giftcard_instructions') is-invalid @enderror"
                                      placeholder="e.g. Purchase a Visa gift card for your donation amount and email the card number and PIN to the address above.">{{ old('giftcard_instructions', $settings->giftcard_instructions) }}</textarea>
                            @error('giftcard_instructions')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold">
                <i class="bi bi-floppy me-1"></i> Save Payment Settings
            </button>
        </form>

    </div>
</div>

@push('scripts')
<script>
// Update toggle label text live
document.querySelectorAll('.form-check-input[role="switch"]').forEach(chk => {
    chk.addEventListener('change', function () {
        this.nextElementSibling.textContent = this.checked ? 'Enabled' : 'Disabled';
    });
});
</script>
@endpush

@endsection
