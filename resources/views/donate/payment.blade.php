@extends('layouts.public')
@section('title', 'Complete Your Donation – Alexandria Ocasio-Cortez 2026')
@section('navStyle', 'solid')
@section('navDonate', 'active')

@push('styles')
<style>
.payment-hero {
    background: linear-gradient(150deg, #05091e 0%, #0a2463 55%, #163785 100%);
    padding: 6rem 0 4rem;
    text-align: center;
    position: relative; overflow: hidden;
}
.payment-hero::before {
    content: ''; position: absolute; inset: 0;
    background-image: radial-gradient(rgba(255,255,255,.04) 1px, transparent 1px);
    background-size: 28px 28px; pointer-events: none;
}
.payment-hero > .container { position: relative; z-index: 2; }
.ph-eyebrow {
    font-size: .73rem; font-weight: 800; letter-spacing: 4px;
    text-transform: uppercase; color: var(--gold); margin-bottom: .75rem;
}
.ph-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(2.5rem, 6vw, 4.5rem);
    color: white; letter-spacing: 3px; line-height: 1; margin-bottom: .75rem;
}
.ph-title span { color: #4ade80; }
.ph-sub { color: rgba(255,255,255,.68); font-size: 1.05rem; max-width: 520px; margin: 0 auto; }

/* ── Main ── */
.payment-main { background: #f3f4f9; padding: 3.5rem 0 5rem; }

/* Summary card */
.summary-pill {
    background: var(--navy); color: white;
    border-radius: 14px; padding: 1.4rem 1.8rem;
    display: flex; align-items: center; justify-content: space-between;
    flex-wrap: wrap; gap: 1rem; margin-bottom: 2rem;
    box-shadow: 0 4px 20px rgba(10,36,99,.25);
}
.sp-label { font-size: .8rem; color: rgba(255,255,255,.55); margin-bottom: .2rem; }
.sp-value { font-weight: 800; font-size: 1.05rem; color: white; }
.sp-amount { font-family: 'Bebas Neue', sans-serif; font-size: 2.2rem; color: var(--gold); letter-spacing: 1px; }

/* Method cards */
.method-card {
    background: white; border-radius: 18px;
    border: 2px solid #e5e7eb;
    overflow: hidden;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 16px rgba(0,0,0,.06);
}
.method-card-header {
    padding: 1.2rem 1.6rem;
    background: #f9fafb;
    border-bottom: 1.5px solid #e5e7eb;
    display: flex; align-items: center; gap: .75rem;
}
.method-icon {
    width: 42px; height: 42px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.25rem; flex-shrink: 0;
}
.method-icon.bank     { background: #dbeafe; color: #1d4ed8; }
.method-icon.giftcard { background: #fef3c7; color: #d97706; }
.method-card-header h5 { font-weight: 800; font-size: 1.05rem; color: var(--dark-navy); margin: 0; }
.method-card-body { padding: 1.6rem; }

/* Detail rows */
.detail-row {
    display: flex; justify-content: space-between; align-items: flex-start;
    padding: .65rem 0; border-bottom: 1px solid #f3f4f9; gap: 1rem;
}
.detail-row:last-of-type { border-bottom: none; }
.dr-label { font-size: .82rem; color: #6b7280; font-weight: 500; flex-shrink: 0; min-width: 140px; }
.dr-value {
    font-size: .95rem; font-weight: 700; color: var(--dark-navy);
    text-align: right; word-break: break-all;
}
.copy-btn {
    background: none; border: 1px solid #d1d5db; border-radius: 6px;
    padding: .15rem .5rem; font-size: .72rem; color: #6b7280; cursor: pointer;
    transition: all .15s; margin-left: .5rem; white-space: nowrap;
}
.copy-btn:hover { background: #f3f4f9; border-color: var(--navy); color: var(--navy); }

/* Instructions box */
.instructions-box {
    background: #f0f4ff; border-left: 4px solid var(--navy);
    border-radius: 0 8px 8px 0; padding: 1rem 1.2rem;
    font-size: .88rem; color: #374151; line-height: 1.75; margin-top: 1rem;
}
.instructions-box strong { color: var(--dark-navy); display: block; margin-bottom: .3rem; }

/* Giftcard instructions box */
.giftcard-box {
    background: #fffbeb; border-left: 4px solid #d97706;
    border-radius: 0 8px 8px 0; padding: 1rem 1.2rem;
    font-size: .88rem; color: #374151; line-height: 1.75; margin-top: 1rem;
}
.giftcard-box strong { color: #92400e; display: block; margin-bottom: .3rem; }

/* No methods configured */
.no-methods {
    background: white; border-radius: 18px; padding: 3rem;
    text-align: center; color: #6b7280;
    box-shadow: 0 2px 16px rgba(0,0,0,.06);
}
.no-methods i { font-size: 3rem; color: #d1d5db; display: block; margin-bottom: 1rem; }

/* Notice */
.notice-strip {
    background: #ecfdf5; border: 1px solid #a7f3d0;
    border-radius: 12px; padding: 1rem 1.25rem;
    display: flex; align-items: flex-start; gap: .75rem;
    margin-bottom: 1.75rem; font-size: .88rem; color: #065f46; line-height: 1.6;
}
.notice-strip i { font-size: 1.1rem; flex-shrink: 0; margin-top: .1rem; }
</style>
@endpush

@section('content')

{{-- ── Hero ── --}}
<section class="payment-hero">
    <div class="container">
        <p class="ph-eyebrow">Step Complete</p>
        <h1 class="ph-title">Almost <span>There!</span></h1>
        <p class="ph-sub">Your donation has been registered. Please complete your payment using one of the methods below.</p>
    </div>
</section>

{{-- ── Main ── --}}
<section class="payment-main">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">

                {{-- Donation Summary --}}
                <div class="summary-pill">
                    <div>
                        <div class="sp-label">Donor</div>
                        <div class="sp-value">{{ $donation->name }}</div>
                    </div>
                    <div>
                        <div class="sp-label">Email</div>
                        <div class="sp-value">{{ $donation->email }}</div>
                    </div>
                    <div>
                        <div class="sp-label">Frequency</div>
                        <div class="sp-value">{{ $donation->frequency === 'monthly' ? 'Monthly' : 'One-Time' }}</div>
                    </div>
                    <div style="text-align:right;">
                        <div class="sp-label">Amount Due</div>
                        <div class="sp-amount">${{ number_format($donation->amount, 2) }}</div>
                    </div>
                </div>

                {{-- Notice --}}
                <div class="notice-strip">
                    <i class="bi bi-info-circle-fill"></i>
                    <div>
                        After completing your payment, please allow 1–2 business days for confirmation.
                        Keep a screenshot or reference of your transfer for your records.
                    </div>
                </div>

                @php
                    $anyEnabled = $settings->bank_enabled || $settings->giftcard_enabled;
                @endphp

                @if(!$anyEnabled)
                <div class="no-methods">
                    <i class="bi bi-hourglass-split"></i>
                    <h5 class="fw-bold text-dark mb-2">Payment Methods Coming Soon</h5>
                    <p class="mb-0">Our team is setting up payment options. You will receive an email at <strong>{{ $donation->email }}</strong> with instructions shortly.</p>
                </div>
                @endif

                {{-- ── Bank Transfer ── --}}
                @if($settings->bank_enabled)
                <div class="method-card">
                    <div class="method-card-header">
                        <div class="method-icon bank"><i class="bi bi-bank"></i></div>
                        <h5>Bank Transfer</h5>
                    </div>
                    <div class="method-card-body">

                        @if($settings->bank_name)
                        <div class="detail-row">
                            <span class="dr-label">Bank Name</span>
                            <span class="dr-value">{{ $settings->bank_name }}</span>
                        </div>
                        @endif

                        @if($settings->account_name)
                        <div class="detail-row">
                            <span class="dr-label">Account Name</span>
                            <span class="dr-value">
                                {{ $settings->account_name }}
                                <button class="copy-btn" onclick="copyText('{{ $settings->account_name }}', this)">Copy</button>
                            </span>
                        </div>
                        @endif

                        @if($settings->account_number)
                        <div class="detail-row">
                            <span class="dr-label">Account Number</span>
                            <span class="dr-value">
                                {{ $settings->account_number }}
                                <button class="copy-btn" onclick="copyText('{{ $settings->account_number }}', this)">Copy</button>
                            </span>
                        </div>
                        @endif

                        @if($settings->routing_number)
                        <div class="detail-row">
                            <span class="dr-label">Routing Number</span>
                            <span class="dr-value">
                                {{ $settings->routing_number }}
                                <button class="copy-btn" onclick="copyText('{{ $settings->routing_number }}', this)">Copy</button>
                            </span>
                        </div>
                        @endif

                        <div class="detail-row">
                            <span class="dr-label">Amount</span>
                            <span class="dr-value" style="color:var(--red);">${{ number_format($donation->amount, 2) }}</span>
                        </div>

                        @if($settings->bank_instructions)
                        <div class="instructions-box">
                            <strong><i class="bi bi-info-circle me-1"></i>Instructions</strong>
                            {{ $settings->bank_instructions }}
                        </div>
                        @endif

                    </div>
                </div>
                @endif

                {{-- ── Gift Card ── --}}
                @if($settings->giftcard_enabled)
                <div class="method-card">
                    <div class="method-card-header">
                        <div class="method-icon giftcard"><i class="bi bi-gift"></i></div>
                        <h5>Gift Card{{ $settings->giftcard_type ? ' — ' . $settings->giftcard_type : '' }}</h5>
                    </div>
                    <div class="method-card-body">

                        @if($settings->giftcard_type)
                        <div class="detail-row">
                            <span class="dr-label">Gift Card Type</span>
                            <span class="dr-value">{{ $settings->giftcard_type }}</span>
                        </div>
                        @endif

                        @if($settings->giftcard_email)
                        <div class="detail-row">
                            <span class="dr-label">Send Code To</span>
                            <span class="dr-value">
                                {{ $settings->giftcard_email }}
                                <button class="copy-btn" onclick="copyText('{{ $settings->giftcard_email }}', this)">Copy</button>
                            </span>
                        </div>
                        @endif

                        <div class="detail-row">
                            <span class="dr-label">Amount</span>
                            <span class="dr-value" style="color:var(--red);">${{ number_format($donation->amount, 2) }}</span>
                        </div>

                        @if($settings->giftcard_instructions)
                        <div class="giftcard-box">
                            <strong><i class="bi bi-info-circle me-1"></i>Instructions</strong>
                            {{ $settings->giftcard_instructions }}
                        </div>
                        @endif

                    </div>
                </div>
                @endif

                {{-- Back link --}}
                <div class="text-center mt-3">
                    <a href="{{ route('donate') }}" class="text-muted" style="font-size:.85rem;">
                        <i class="bi bi-arrow-left me-1"></i>Back to Donate Page
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
function copyText(text, btn) {
    navigator.clipboard.writeText(text).then(() => {
        const orig = btn.textContent;
        btn.textContent = 'Copied!';
        btn.style.color = '#10b981';
        btn.style.borderColor = '#10b981';
        setTimeout(() => {
            btn.textContent = orig;
            btn.style.color = '';
            btn.style.borderColor = '';
        }, 2000);
    });
}
</script>
@endpush
