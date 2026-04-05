@extends('layouts.public')
@section('title', 'Donate – Alexandria Ocasio-Cortez 2026')
@section('navStyle', 'solid')
@section('navDonate', 'active')

@push('styles')
<style>
/* ── Page Hero ── */
.donate-hero {
    background: linear-gradient(150deg, #05091e 0%, #0a2463 55%, #163785 100%);
    padding: 7.5rem 0 5rem;
    position: relative; overflow: hidden;
    text-align: center;
}
.donate-hero::before {
    content: ''; position: absolute; inset: 0;
    background-image: radial-gradient(rgba(255,255,255,.04) 1px, transparent 1px);
    background-size: 28px 28px; pointer-events: none;
}
.donate-hero > .container { position: relative; z-index: 2; }

.dh-eyebrow {
    font-size: .73rem; font-weight: 800; letter-spacing: 4px;
    text-transform: uppercase; color: var(--gold);
    margin-bottom: .75rem;
}
.dh-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(3rem, 8vw, 6rem);
    color: white; letter-spacing: 3px; line-height: .95;
    margin-bottom: 1rem;
}
.dh-title span { color: var(--red); }
.dh-sub {
    color: rgba(255,255,255,.68); font-size: 1.08rem; line-height: 1.75;
    max-width: 560px; margin: 0 auto 2.2rem;
}

/* Progress bar strip */
.progress-strip {
    background: rgba(255,255,255,.07);
    border-top: 1px solid rgba(255,255,255,.08);
    padding: 1.4rem 0;
}
.prog-label { color: rgba(255,255,255,.7); font-size: .85rem; margin-bottom: .55rem; }
.prog-label strong { color: white; font-weight: 800; }
.prog-track {
    height: 10px; background: rgba(255,255,255,.12); border-radius: 99px; overflow: hidden;
}
.prog-fill {
    height: 100%;
    background: linear-gradient(90deg, var(--gold), #f59e0b);
    border-radius: 99px;
    transition: width 1.8s cubic-bezier(.22,.68,0,1);
}
.prog-stats {
    display: flex; justify-content: space-between;
    margin-top: .55rem; font-size: .78rem;
}
.prog-stats .left { color: rgba(255,255,255,.55); }
.prog-stats .right { color: #4ade80; font-weight: 700; display: flex; align-items: center; gap: .35rem; }

/* ── Main layout ── */
.donate-main { padding: 3.5rem 0 5rem; background: #f3f4f9; }

/* ── Donation form card ── */
.form-card {
    background: white; border-radius: 20px;
    box-shadow: 0 4px 30px rgba(0,0,0,.09);
    overflow: hidden;
}
.form-section {
    padding: 2rem 2.2rem;
    border-bottom: 1px solid #f0f0f4;
}
.form-section:last-child { border-bottom: none; }
.fs-title {
    font-weight: 800; font-size: 1rem; color: var(--dark-navy);
    margin-bottom: 1.25rem; display: flex; align-items: center; gap: .55rem;
}
.fs-title .fs-num {
    width: 28px; height: 28px; border-radius: 50%;
    background: var(--navy); color: white;
    display: flex; align-items: center; justify-content: center;
    font-size: .78rem; font-weight: 800; flex-shrink: 0;
}

/* Frequency toggle */
.freq-toggle {
    display: flex; background: #f3f4f9; border-radius: 10px; padding: 4px; gap: 4px;
    margin-bottom: 1.5rem;
}
.freq-btn {
    flex: 1; padding: .65rem; border: none; border-radius: 8px; cursor: pointer;
    font-weight: 700; font-size: .9rem; transition: all .2s;
    background: transparent; color: #6b7280;
}
.freq-btn.active {
    background: var(--navy); color: white;
    box-shadow: 0 2px 10px rgba(10,36,99,.3);
}
.freq-badge {
    display: inline-block; background: var(--gold); color: #111;
    font-size: .62rem; font-weight: 900; padding: .1rem .45rem;
    border-radius: 20px; margin-left: .4rem; text-transform: uppercase;
    letter-spacing: .5px;
}

/* Amount grid */
.amount-grid-form {
    display: grid; grid-template-columns: repeat(3, 1fr); gap: .6rem;
    margin-bottom: .75rem;
}
.amt-btn-form {
    border: 1.5px solid #e5e7eb; background: white;
    color: var(--dark-navy); font-weight: 700; font-size: 1rem;
    padding: .75rem .5rem; border-radius: 9px; cursor: pointer;
    transition: all .15s; text-align: center;
    position: relative;
}
.amt-btn-form:hover {
    border-color: var(--navy); background: #f0f4ff; color: var(--navy);
}
.amt-btn-form.active {
    border-color: var(--red); background: #fff1f2; color: var(--red);
    box-shadow: 0 0 0 3px rgba(214,40,40,.12);
}
.amt-btn-form .popular-badge {
    position: absolute; top: -8px; left: 50%; transform: translateX(-50%);
    background: var(--red); color: white;
    font-size: .58rem; font-weight: 900; padding: .15rem .5rem;
    border-radius: 20px; text-transform: uppercase; letter-spacing: .5px;
    white-space: nowrap;
}

.custom-amt-wrap {
    position: relative;
}
.custom-amt-wrap .dollar-sign {
    position: absolute; left: .9rem; top: 50%; transform: translateY(-50%);
    font-weight: 700; color: #6b7280; font-size: 1.05rem;
    pointer-events: none;
}
.custom-amt-input {
    width: 100%; padding: .75rem .75rem .75rem 1.9rem;
    border: 1.5px solid #e5e7eb; border-radius: 9px;
    font-size: 1rem; font-weight: 600; color: var(--dark-navy);
    transition: border-color .2s, box-shadow .2s;
    outline: none;
}
.custom-amt-input:focus {
    border-color: var(--red);
    box-shadow: 0 0 0 3px rgba(214,40,40,.1);
}

/* Form inputs */
.form-label-custom {
    font-weight: 600; font-size: .85rem; color: #374151; margin-bottom: .4rem;
    display: block;
}
.form-control-custom {
    width: 100%;
    padding: .75rem 1rem;
    border: 1.5px solid #e5e7eb; border-radius: 9px;
    font-size: .97rem; color: var(--dark-navy); background: white;
    transition: border-color .2s, box-shadow .2s; outline: none;
    font-family: inherit;
}
.form-control-custom:focus {
    border-color: var(--navy);
    box-shadow: 0 0 0 3px rgba(10,36,99,.1);
}
.form-control-custom.is-error { border-color: var(--red) !important; }
.field-error { font-size: .78rem; color: var(--red); margin-top: .3rem; }

/* Submit button */
.btn-submit-donate {
    width: 100%; background: var(--red); color: white; border: none;
    padding: 1.1rem; border-radius: 12px; font-size: 1.12rem;
    font-weight: 900; cursor: pointer; letter-spacing: .5px;
    display: flex; align-items: center; justify-content: center; gap: .6rem;
    transition: background .2s, transform .15s, box-shadow .2s;
    box-shadow: 0 8px 28px rgba(214,40,40,.42);
}
.btn-submit-donate:hover {
    background: var(--dark-red);
    transform: translateY(-2px);
    box-shadow: 0 14px 36px rgba(214,40,40,.45);
}
.btn-submit-donate:disabled {
    opacity: .7; cursor: not-allowed; transform: none;
}

/* Security strip */
.security-strip {
    background: #f9fafb; border-top: 1px solid #f0f0f4;
    padding: 1rem 2.2rem;
    display: flex; align-items: center; gap: .5rem; flex-wrap: wrap;
}
.security-strip span { font-size: .76rem; color: #9ca3af; }
.security-strip i { color: #10b981; }

/* Disclaimer */
.form-disclaimer {
    font-size: .76rem; color: #9ca3af; line-height: 1.65; margin-top: .6rem;
    text-align: center; padding: 0 .5rem;
}

/* ── Success message ── */
.success-banner {
    background: linear-gradient(135deg, #065f46, #047857);
    border-radius: 16px; padding: 2.5rem;
    text-align: center; color: white;
    box-shadow: 0 8px 30px rgba(4,120,87,.3);
}
.success-banner .success-icon {
    width: 72px; height: 72px; border-radius: 50%;
    background: rgba(255,255,255,.2); display: flex;
    align-items: center; justify-content: center;
    font-size: 2rem; margin: 0 auto 1.25rem;
}
.success-banner h3 { font-family: 'Bebas Neue', sans-serif; font-size: 2.2rem; letter-spacing: 2px; margin-bottom: .5rem; }
.success-banner p { color: rgba(255,255,255,.82); font-size: .97rem; margin: 0; line-height: 1.7; }

/* ── Right column: activity panel ── */
.activity-card {
    background: var(--dark-navy); border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 40px rgba(7,21,71,.35);
}
.act-card-header {
    padding: 1.2rem 1.4rem;
    border-bottom: 1px solid rgba(255,255,255,.08);
    display: flex; align-items: center; justify-content: space-between;
}
.act-card-title {
    font-size: .8rem; font-weight: 800; text-transform: uppercase;
    letter-spacing: 1.5px; color: rgba(255,255,255,.85);
}
.act-counter-badge {
    background: var(--red); color: white; border-radius: 20px;
    padding: .15rem .65rem; font-size: .72rem; font-weight: 800;
}

.act-stream {
    max-height: 340px; overflow-y: auto;
}
.act-stream::-webkit-scrollbar { width: 3px; }
.act-stream::-webkit-scrollbar-thumb { background: rgba(255,255,255,.15); border-radius: 2px; }

.act-row {
    display: flex; align-items: center; gap: .75rem;
    padding: .8rem 1.4rem;
    border-bottom: 1px solid rgba(255,255,255,.04);
    transition: background .15s;
}
.act-row:last-child { border-bottom: none; }
.act-row:hover { background: rgba(255,255,255,.04); }
.act-row.flash { animation: rowFlash .5s ease; }
@keyframes rowFlash { from { background: rgba(74,222,128,.15); } to { background: transparent; } }

.ar-av {
    width: 40px; height: 40px; border-radius: 50%; color: white;
    font-weight: 800; font-size: .85rem; flex-shrink: 0;
    display: flex; align-items: center; justify-content: center;
}
.ar-info { flex: 1; min-width: 0; }
.ar-name { font-size: .87rem; font-weight: 600; color: rgba(255,255,255,.9);
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.ar-loc  { font-size: .72rem; color: rgba(255,255,255,.42); }
.ar-amt  { font-weight: 900; font-size: .92rem; color: #4ade80; flex-shrink: 0; }
.ar-ago  { font-size: .69rem; color: rgba(255,255,255,.28); flex-shrink: 0; margin-left: .35rem; }

/* Impact card */
.impact-card {
    background: white; border-radius: 20px;
    padding: 1.75rem 1.8rem;
    box-shadow: 0 4px 20px rgba(0,0,0,.07);
    margin-top: 1.25rem;
}
.impact-card h6 {
    font-weight: 800; font-size: .85rem; color: var(--dark-navy);
    text-transform: uppercase; letter-spacing: 1px; margin-bottom: 1.1rem;
}
.impact-row {
    display: flex; align-items: flex-start; gap: .8rem;
    padding: .65rem 0; border-bottom: 1px solid #f5f5f8;
    cursor: pointer; transition: background .1s;
}
.impact-row:last-child { border-bottom: none; }
.impact-row.highlighted { background: #fff8f0; border-radius: 8px; padding-left: .5rem; }
.ir-amt {
    font-family: 'Bebas Neue', sans-serif; font-size: 1.6rem;
    color: var(--red); letter-spacing: 1px; line-height: 1;
    width: 56px; flex-shrink: 0; text-align: right;
}
.ir-desc strong { display: block; font-size: .88rem; color: var(--dark-navy); font-weight: 700; }
.ir-desc small  { font-size: .78rem; color: #6b7280; line-height: 1.4; }

/* Donors count */
.donors-count-card {
    background: linear-gradient(135deg, var(--navy), #163785);
    border-radius: 20px; padding: 1.6rem 1.8rem;
    text-align: center; color: white; margin-top: 1.25rem;
}
.dc-num {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 3rem; color: var(--gold); letter-spacing: 2px; line-height: 1;
}
.dc-sub { font-size: .82rem; color: rgba(255,255,255,.62); margin-top: .25rem; }
</style>
@endpush

@section('content')

{{-- ── Page Hero ── --}}
<section class="donate-hero">
    <div class="container">
        <p class="dh-eyebrow">Take Action Today</p>
        <h1 class="dh-title">Make a <span>Difference</span></h1>
        <p class="dh-sub">
            Your donation powers this people-first movement. No corporate money.
            No special interests. Just people fighting for a better future — together.
        </p>
        <div class="d-flex align-items-center justify-content-center gap-3 flex-wrap" style="font-size:.82rem; color:rgba(255,255,255,.55);">
            <span><i class="bi bi-shield-lock-fill text-warning me-1"></i>Secure &amp; Encrypted</span>
            <span><i class="bi bi-people-fill text-warning me-1"></i>84,291 Donors</span>
            <span><i class="bi bi-bank text-warning me-1"></i>No Corporate PACs</span>
        </div>
    </div>

    <div class="progress-strip mt-4">
        <div class="container">
            <div class="prog-label">
                <strong>$<span id="pRaised" data-target="4847293" data-dur="1800">4,847,293</span></strong> raised of $10,000,000 goal
            </div>
            <div class="prog-track">
                <div class="prog-fill" id="pFill" style="width:0%"></div>
            </div>
            <div class="prog-stats">
                <span class="left"><span data-target="84291" data-dur="1600">84,291</span> donors · Avg gift: $27</span>
                <span class="right"><span class="live-dot" style="width:7px;height:7px"></span> Live — people donating now</span>
            </div>
        </div>
    </div>
</section>

{{-- ── Main Content ── --}}
<section class="donate-main">
    <div class="container">
        <div class="row gy-4 align-items-start">

            {{-- ── LEFT: Donation Form ── --}}
            <div class="col-lg-7">

                @if(session('success'))
                <div class="success-banner mb-4">
                    <div class="success-icon"><i class="bi bi-check-lg"></i></div>
                    <h3>Thank You!</h3>
                    <p>{{ session('success') }}<br>
                    Your support means the world to this movement. Together we will win.</p>
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-danger mb-4" style="border-radius:12px;">
                    <strong>Please fix the following:</strong>
                    <ul class="mb-0 mt-1">
                        @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('donate.store') }}" method="POST" id="donateForm">
                    @csrf

                    <div class="form-card">

                        {{-- Step 1: Frequency --}}
                        <div class="form-section">
                            <div class="fs-title"><span class="fs-num">1</span>Donation Frequency</div>
                            <div class="freq-toggle">
                                <button type="button" class="freq-btn active" id="freqOnce"
                                        onclick="setFreq('one_time')">
                                    One-Time
                                </button>
                                <button type="button" class="freq-btn" id="freqMonthly"
                                        onclick="setFreq('monthly')">
                                    Monthly <span class="freq-badge">Best</span>
                                </button>
                            </div>
                            <input type="hidden" name="frequency" id="freqInput" value="one_time">
                        </div>

                        {{-- Step 2: Amount --}}
                        <div class="form-section">
                            <div class="fs-title"><span class="fs-num">2</span>Choose Your Amount</div>

                            <div class="amount-grid-form" id="amtGrid">
                                <button type="button" class="amt-btn-form" data-a="10">$10</button>
                                <button type="button" class="amt-btn-form" data-a="25">
                                    <span class="popular-badge">Popular</span>$25
                                </button>
                                <button type="button" class="amt-btn-form" data-a="50">$50</button>
                                <button type="button" class="amt-btn-form" data-a="100">$100</button>
                                <button type="button" class="amt-btn-form" data-a="250">$250</button>
                                <button type="button" class="amt-btn-form" data-a="500">$500</button>
                            </div>

                            <div class="custom-amt-wrap mt-2">
                                <span class="dollar-sign">$</span>
                                <input type="number" class="custom-amt-input" id="customAmt"
                                       placeholder="Enter custom amount" min="1" max="50000"
                                       value="{{ old('amount', request('amount', '')) }}"
                                       oninput="syncCustomAmt(this.value)">
                            </div>
                            <input type="hidden" name="amount" id="amountHidden" value="{{ old('amount', request('amount', '25')) }}">
                            @error('amount')<p class="field-error">{{ $message }}</p>@enderror
                        </div>

                        {{-- Step 3: Personal Info --}}
                        <div class="form-section">
                            <div class="fs-title"><span class="fs-num">3</span>Your Information</div>
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label class="form-label-custom">First &amp; Last Name <span style="color:var(--red)">*</span></label>
                                    <input type="text" name="name" class="form-control-custom @error('name') is-error @enderror"
                                           placeholder="Alexandria Ocasio" value="{{ old('name') }}" required>
                                    @error('name')<p class="field-error">{{ $message }}</p>@enderror
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label-custom">Email Address <span style="color:var(--red)">*</span></label>
                                    <input type="email" name="email" class="form-control-custom @error('email') is-error @enderror"
                                           placeholder="you@email.com" value="{{ old('email') }}" required>
                                    @error('email')<p class="field-error">{{ $message }}</p>@enderror
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label-custom">ZIP Code</label>
                                    <input type="text" name="zip_code" class="form-control-custom"
                                           placeholder="10001" maxlength="10" value="{{ old('zip_code') }}">
                                    @error('zip_code')<p class="field-error">{{ $message }}</p>@enderror
                                </div>
                                <div class="col-sm-6">
                                    <label class="form-label-custom">Phone (optional)</label>
                                    <input type="tel" name="phone" class="form-control-custom"
                                           placeholder="+1 (555) 000-0000" value="{{ old('phone') }}">
                                </div>
                                <div class="col-12">
                                    <label class="form-label-custom">Message of Support (optional)</label>
                                    <textarea name="message" rows="3" class="form-control-custom"
                                              placeholder="Share why you're donating today…" style="resize:vertical">{{ old('message') }}</textarea>
                                </div>
                            </div>
                        </div>

                        {{-- Step 4: Payment ── admin configures gateway --}}
                        <div class="form-section">
                            <div class="fs-title"><span class="fs-num">4</span>Payment Details</div>

                            <div class="p-4 rounded-3 text-center" style="background:#f8faff; border:1.5px dashed #c7d7f8;">
                                <i class="bi bi-credit-card-2-front" style="font-size:2rem; color:var(--navy); opacity:.6; display:block; margin-bottom:.75rem;"></i>
                                <p class="mb-1" style="font-weight:700; color:var(--dark-navy); font-size:.95rem;">
                                    Secure Payment Processing
                                </p>
                                <p class="mb-0" style="color:#6b7280; font-size:.85rem; line-height:1.65;">
                                    Payment gateway is configured by the site administrator.<br>
                                    Your information is fully encrypted and secure.
                                </p>
                                <div class="d-flex justify-content-center gap-3 mt-3 flex-wrap">
                                    <img src="https://cdn.jsdelivr.net/npm/payment-icons@1.1.0/min/flat/visa.svg"       alt="Visa"       height="26" style="border-radius:4px; box-shadow:0 1px 4px rgba(0,0,0,.15)">
                                    <img src="https://cdn.jsdelivr.net/npm/payment-icons@1.1.0/min/flat/mastercard.svg" alt="Mastercard" height="26" style="border-radius:4px; box-shadow:0 1px 4px rgba(0,0,0,.15)">
                                    <img src="https://cdn.jsdelivr.net/npm/payment-icons@1.1.0/min/flat/amex.svg"       alt="Amex"       height="26" style="border-radius:4px; box-shadow:0 1px 4px rgba(0,0,0,.15)">
                                    <img src="https://cdn.jsdelivr.net/npm/payment-icons@1.1.0/min/flat/paypal.svg"     alt="PayPal"     height="26" style="border-radius:4px; box-shadow:0 1px 4px rgba(0,0,0,.15)">
                                </div>
                            </div>
                        </div>

                        {{-- Submit --}}
                        <div class="form-section">
                            <button type="submit" class="btn-submit-donate" id="submitBtn">
                                <i class="bi bi-heart-fill"></i>
                                <span id="submitText">Donate $25 Now</span>
                                <i class="bi bi-arrow-right"></i>
                            </button>
                            <p class="form-disclaimer mt-3">
                                By donating you agree that this contribution is made from personal funds and is not being
                                reimbursed. Contributions are not tax-deductible.
                            </p>
                        </div>

                        {{-- Security --}}
                        <div class="security-strip">
                            <i class="bi bi-shield-lock-fill" style="color:#10b981"></i>
                            <span>256-bit SSL encryption</span>
                            <span class="mx-2">·</span>
                            <i class="bi bi-eye-slash-fill" style="color:#10b981"></i>
                            <span>We never share your data</span>
                            <span class="mx-2">·</span>
                            <i class="bi bi-clock-fill" style="color:#10b981"></i>
                            <span>Cancel monthly anytime</span>
                        </div>

                    </div>
                </form>
            </div>

            {{-- ── RIGHT: Activity + Impact ── --}}
            <div class="col-lg-5" style="position:sticky; top:100px;">

                {{-- Live activity --}}
                <div class="activity-card">
                    <div class="act-card-header">
                        <span class="act-card-title">
                            <span class="live-dot me-2"></span>Live Donors
                        </span>
                        <span class="act-counter-badge" id="liveCount">+84,291</span>
                    </div>

                    <div class="act-stream" id="donorFeed">
                        @php
                        $live = [
                            ['n'=>'Nina V.',    'c'=>'New York, NY',       'a'=>250,'i'=>'NV','bg'=>'#1d4ed8','t'=>'Just now'],
                            ['n'=>'Marcus J.',  'c'=>'Houston, TX',        'a'=>45, 'i'=>'MJ','bg'=>'#7c3aed','t'=>'12s ago'],
                            ['n'=>'Sophie H.',  'c'=>'San Francisco, CA',  'a'=>100,'i'=>'SH','bg'=>'#047857','t'=>'31s ago'],
                            ['n'=>'Aisha P.',   'c'=>'Atlanta, GA',        'a'=>40, 'i'=>'AP','bg'=>'#b45309','t'=>'1m ago'],
                            ['n'=>'Jake W.',    'c'=>'Denver, CO',         'a'=>150,'i'=>'JW','bg'=>'#0369a1','t'=>'1m ago'],
                            ['n'=>'Rachel L.',  'c'=>'Seattle, WA',        'a'=>35, 'i'=>'RL','bg'=>'#b91c1c','t'=>'2m ago'],
                            ['n'=>'Maria G.',   'c'=>'Los Angeles, CA',    'a'=>100,'i'=>'MG','bg'=>'#1d4ed8','t'=>'2m ago'],
                            ['n'=>'Carlos R.',  'c'=>'Miami, FL',          'a'=>200,'i'=>'CR','bg'=>'#7c3aed','t'=>'3m ago'],
                        ];
                        @endphp
                        @foreach($live as $d)
                        <div class="act-row">
                            <div class="ar-av" style="background:{{ $d['bg'] }}">{{ $d['i'] }}</div>
                            <div class="ar-info">
                                <div class="ar-name">{{ $d['n'] }}</div>
                                <div class="ar-loc"><i class="bi bi-geo-alt-fill me-1" style="font-size:.62rem"></i>{{ $d['c'] }}</div>
                            </div>
                            <span class="ar-amt">${{ $d['a'] }}</span>
                            <span class="ar-ago">{{ $d['t'] }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>

                {{-- Donor count card --}}
                <div class="donors-count-card">
                    <div class="dc-num" data-target="{{ $recentCount + 84291 }}" data-dur="1800">{{ number_format($recentCount + 84291) }}</div>
                    <div class="dc-sub">people have donated to this movement</div>
                    <div class="mt-2" style="font-size:.78rem; color:rgba(255,255,255,.45);">Add your name — join the fight</div>
                </div>

                {{-- Impact card --}}
                <div class="impact-card">
                    <h6><i class="bi bi-lightning-fill text-warning me-2"></i>Your Impact</h6>
                    <div class="impact-row" onclick="selectAmt(10)">
                        <div class="ir-amt">$10</div>
                        <div class="ir-desc">
                            <strong>Funds outreach materials</strong>
                            <small>Reaches 50+ voters with our message</small>
                        </div>
                    </div>
                    <div class="impact-row highlighted" onclick="selectAmt(25)">
                        <div class="ir-amt">$25</div>
                        <div class="ir-desc">
                            <strong>Powers a phone-banking session</strong>
                            <small>Connects us with 120+ constituents</small>
                        </div>
                    </div>
                    <div class="impact-row" onclick="selectAmt(50)">
                        <div class="ir-amt">$50</div>
                        <div class="ir-desc">
                            <strong>Fuels a community town hall</strong>
                            <small>Organizes one neighborhood event</small>
                        </div>
                    </div>
                    <div class="impact-row" onclick="selectAmt(100)">
                        <div class="ir-amt">$100</div>
                        <div class="ir-desc">
                            <strong>Trains a new volunteer</strong>
                            <small>Multiplies our organizing capacity</small>
                        </div>
                    </div>
                    <div class="impact-row" onclick="selectAmt(250)">
                        <div class="ir-amt">$250</div>
                        <div class="ir-desc">
                            <strong>Launches a district ad campaign</strong>
                            <small>Spreads the message to 10,000+ people</small>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
/* ── Progress bar ── */
setTimeout(() => {
    const fill = document.getElementById('pFill');
    if (fill) fill.style.width = '48%';
}, 400);

/* ── Frequency toggle ── */
function setFreq(val) {
    document.getElementById('freqInput').value = val;
    ['Once','Monthly'].forEach(k => {
        document.getElementById('freq' + k).classList.remove('active');
    });
    document.getElementById(val === 'one_time' ? 'freqOnce' : 'freqMonthly').classList.add('active');
    updateSubmitLabel();
}

/* ── Amount selection ── */
let selectedAmt = {{ request('amount', 25) }};

document.querySelectorAll('#amtGrid .amt-btn-form').forEach(btn => {
    btn.addEventListener('click', function() {
        document.querySelectorAll('#amtGrid .amt-btn-form').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        selectedAmt = +this.dataset.a;
        document.getElementById('amountHidden').value = selectedAmt;
        document.getElementById('customAmt').value = '';
        updateSubmitLabel();
    });
});

function syncCustomAmt(val) {
    document.querySelectorAll('#amtGrid .amt-btn-form').forEach(b => b.classList.remove('active'));
    selectedAmt = val || 0;
    document.getElementById('amountHidden').value = val;
    updateSubmitLabel();
}

function selectAmt(a) {
    document.querySelectorAll('#amtGrid .amt-btn-form').forEach(btn => {
        btn.classList.toggle('active', +btn.dataset.a === a);
    });
    selectedAmt = a;
    document.getElementById('amountHidden').value = a;
    document.getElementById('customAmt').value = '';
    updateSubmitLabel();
    document.getElementById('donateForm').scrollIntoView({ behavior: 'smooth', block: 'start' });
}

function updateSubmitLabel() {
    const txt  = document.getElementById('submitText');
    const freq = document.getElementById('freqInput').value;
    const sfx  = freq === 'monthly' ? '/mo' : '';
    txt.textContent = selectedAmt > 0 ? `Donate $${selectedAmt}${sfx} Now` : 'Donate Now';
}

/* Pre-select amount from URL or default to $25 */
(function() {
    const preAmt = {{ request('amount', 25) }};
    const btn = document.querySelector(`#amtGrid .amt-btn-form[data-a="${preAmt}"]`);
    if (btn) btn.classList.add('active');
    document.getElementById('amountHidden').value = preAmt;
    updateSubmitLabel();
})();

/* ── Live donor feed ── */
const AVATAR_BG = ['#0a2463','#1d4ed8','#7c3aed','#0369a1','#047857','#b91c1c','#92400e'];
function avBg(name) {
    let s = 0; for (let i = 0; i < name.length; i++) s += name.charCodeAt(i);
    return AVATAR_BG[s % AVATAR_BG.length];
}

let donorCount = {{ $recentCount + 84291 }};

window.liveFeed = {
    push(d) {
        const feed = document.getElementById('donorFeed');
        if (!feed) return;
        donorCount++;
        const el = document.createElement('div');
        el.className = 'act-row flash';
        el.innerHTML = `
            <div class="ar-av" style="background:${avBg(d.name)}">${d.initials}</div>
            <div class="ar-info">
                <div class="ar-name">${d.name}</div>
                <div class="ar-loc"><i class="bi bi-geo-alt-fill me-1" style="font-size:.62rem"></i>${d.city}</div>
            </div>
            <span class="ar-amt">$${d.amount}</span>
            <span class="ar-ago">Just now</span>
        `;
        feed.prepend(el);
        while (feed.children.length > 15) feed.lastElementChild.remove();

        const badge = document.getElementById('liveCount');
        if (badge) badge.textContent = '+' + donorCount.toLocaleString();
    }
};

window.counterAdd = function(amount) {
    const el = document.getElementById('pRaised');
    if (!el) return;
    const cur = parseInt(el.textContent.replace(/,/g, '')) || 4847293;
    el.textContent = (cur + amount).toLocaleString();
};
</script>
@endpush
