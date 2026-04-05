@extends('layouts.public')
@section('title', 'Alexandria Ocasio-Cortez – Fight for Everyone')
@section('navStyle', 'transparent')
@section('navHome', 'active')

@push('styles')
<style>
/* ════════════════════════ HERO ════════════════════════ */
.hero {
    min-height: 100vh;
    background: linear-gradient(145deg, #05091e 0%, #0a2463 45%, #133a8a 80%, #0a2463 100%);
    display: flex; align-items: center;
    position: relative; overflow: hidden;
    padding-top: 5rem;
}
.hero-glow {
    position: absolute; inset: 0; pointer-events: none;
    background:
        radial-gradient(ellipse 70vw 50vh at 70% 50%, rgba(22,55,133,.45) 0%, transparent 70%),
        radial-gradient(rgba(255,255,255,.035) 1px, transparent 1px);
    background-size: auto, 30px 30px;
}
.hero-red-slash {
    position: absolute; right: 0; top: 0; width: 42%; height: 100%;
    background: var(--red);
    clip-path: polygon(18% 0, 100% 0, 100% 100%, 0% 100%);
    opacity: .07; pointer-events: none;
}
.hero-content { position: relative; z-index: 3; }

.hero-eyebrow {
    font-size: .75rem; font-weight: 800; letter-spacing: 4.5px;
    text-transform: uppercase; color: var(--gold);
    display: flex; align-items: center; gap: .7rem; margin-bottom: 1.1rem;
}
.hero-eyebrow::before {
    content: ''; width: 28px; height: 2px; background: var(--gold);
}
.hero-title {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(4rem, 9.5vw, 8rem);
    line-height: .9; color: white; letter-spacing: 3px;
    margin-bottom: 1.4rem;
}
.hero-title .accent { color: var(--red); }
.hero-title .outline {
    -webkit-text-stroke: 2px rgba(255,255,255,.4);
    color: transparent;
}
.hero-tagline {
    font-size: clamp(1rem, 2vw, 1.2rem);
    color: rgba(255,255,255,.72); line-height: 1.75;
    max-width: 480px; margin-bottom: 2.2rem;
}
.hero-actions { display: flex; gap: .8rem; flex-wrap: wrap; margin-bottom: 2.5rem; }

/* Floating stats inside hero */
.hero-stats {
    display: flex; flex-wrap: wrap; gap: 1.5rem;
    padding-top: 2rem;
    border-top: 1px solid rgba(255,255,255,.1);
}
.h-stat { text-align: left; }
.h-stat-num {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 2.4rem; color: var(--gold); letter-spacing: 1px; line-height: 1;
}
.h-stat-lbl { font-size: .72rem; font-weight: 600; letter-spacing: 2px;
    text-transform: uppercase; color: rgba(255,255,255,.4); margin-top: .1rem; }

/* Hero image */
.hero-img-col { position: relative; z-index: 3; }
.hero-img-frame {
    position: relative;
}
.hero-img-frame::before {
    content: '';
    position: absolute; inset: -10px;
    border: 2px solid rgba(247,201,72,.2);
    border-radius: 22px; pointer-events: none; z-index: 1;
}
.hero-img-frame img {
    border-radius: 18px; width: 100%;
    max-height: 640px; object-fit: cover; object-position: top center;
    box-shadow: 0 32px 90px rgba(0,0,0,.55);
    display: block; position: relative; z-index: 2;
    filter: contrast(1.04) saturate(1.06);
}

/* Floating badges on photo */
.float-badge {
    position: absolute; z-index: 10;
    background: white; border-radius: 14px;
    padding: .7rem 1rem;
    box-shadow: 0 10px 35px rgba(0,0,0,.22);
    display: flex; align-items: center; gap: .65rem;
    min-width: 160px;
}
.float-badge.top-right { top: 7%; right: -18px; }
.float-badge.bottom-left { bottom: 14%; left: -18px; }
.fb-icon {
    width: 40px; height: 40px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.1rem; flex-shrink: 0;
}
.fb-text strong { display: block; font-size: .88rem; color: #111; font-weight: 800; line-height: 1.2; }
.fb-text small  { font-size: .7rem; color: #888; }

/* Scroll hint */
.scroll-hint {
    position: absolute; bottom: 2rem; left: 50%;
    transform: translateX(-50%);
    color: rgba(255,255,255,.35); font-size: .72rem;
    letter-spacing: 2.5px; text-transform: uppercase;
    display: flex; flex-direction: column; align-items: center; gap: .4rem;
    animation: bob 2.8s ease infinite;
}
@keyframes bob {
    0%, 100% { transform: translateX(-50%) translateY(0); }
    50%       { transform: translateX(-50%) translateY(8px); }
}

/* ════════════════════════ TICKER ════════════════════════ */
.ticker-wrap {
    background: var(--red); padding: .62rem 0; overflow: hidden; white-space: nowrap;
}
.ticker-track {
    display: inline-block;
    animation: tickerMove 32s linear infinite;
    font-size: .82rem; font-weight: 800; color: white;
    text-transform: uppercase; letter-spacing: 1.5px;
}
.ticker-track:hover { animation-play-state: paused; }
.t-sep { color: var(--gold); margin: 0 1.8rem; }
@keyframes tickerMove {
    from { transform: translateX(0); }
    to   { transform: translateX(-50%); }
}

/* ════════════════════════ STATS BAR ════════════════════════ */
.stats-bar { background: var(--dark-navy); padding: 2.8rem 0; border-bottom: 1px solid rgba(255,255,255,.06); }
.stat-num {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(2.2rem, 5vw, 3.6rem); color: white; letter-spacing: 2px; line-height: 1;
    display: block;
}
.stat-lbl {
    font-size: .72rem; font-weight: 700; letter-spacing: 2.5px;
    text-transform: uppercase; color: rgba(255,255,255,.38); margin-top: .25rem;
}
.stat-vr { width: 1px; height: 60px; background: rgba(255,255,255,.1); margin: auto; }

/* ════════════════════════ CAUSES ════════════════════════ */
.causes-section { padding: 6.5rem 0; background: #f3f4f9; }

.cause-card {
    background: white; border-radius: 18px;
    overflow: hidden; height: 100%;
    box-shadow: 0 2px 16px rgba(0,0,0,.06);
    transition: transform .28s cubic-bezier(.22,.68,0,1), box-shadow .28s;
    position: relative;
}
.cause-card::after {
    content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 3px;
    background: linear-gradient(90deg, var(--red), #f97316);
    transform: scaleX(0); transition: transform .3s; transform-origin: left;
}
.cause-card:hover { transform: translateY(-9px); box-shadow: 0 22px 55px rgba(0,0,0,.12); }
.cause-card:hover::after { transform: scaleX(1); }

.cause-header-img {
    height: 6px;
    background: linear-gradient(90deg, var(--navy), var(--red));
}
.cause-body { padding: 2rem 1.9rem 2.2rem; }
.cause-icon {
    width: 62px; height: 62px; border-radius: 16px;
    display: flex; align-items: center; justify-content: center;
    font-size: 1.65rem; color: white; margin-bottom: 1.4rem;
    box-shadow: 0 6px 20px rgba(0,0,0,.2);
}
.cause-card h4 { font-weight: 800; font-size: 1.1rem; color: var(--dark-navy); margin-bottom: .6rem; }
.cause-card p  { color: #6b7280; font-size: .92rem; line-height: 1.7; margin: 0 0 1.2rem; }
.cause-badge {
    display: inline-flex; align-items: center; gap: .35rem;
    font-size: .7rem; font-weight: 700; letter-spacing: .8px;
    text-transform: uppercase; padding: .3rem .8rem;
    border-radius: 20px; background: var(--light); color: var(--navy);
}

/* ════════════════════════ MISSION ════════════════════════ */
.mission-section { padding: 6.5rem 0; background: white; overflow: hidden; }
.mission-img-wrap { position: relative; }
.mission-img-wrap img {
    border-radius: 18px; width: 100%; max-height: 540px;
    object-fit: cover; object-position: top;
    box-shadow: 0 24px 70px rgba(0,0,0,.16);
}
.mission-corner-badge {
    position: absolute; bottom: 0; right: 0;
    background: var(--navy); border-radius: 18px 0 18px 0;
    padding: 1.4rem 1.6rem; text-align: center;
}
.mission-corner-badge .big {
    font-family: 'Bebas Neue', sans-serif;
    font-size: 2.8rem; color: var(--gold); line-height: 1;
}
.mission-corner-badge .small {
    font-size: .68rem; font-weight: 700; text-transform: uppercase;
    letter-spacing: 1px; color: rgba(255,255,255,.65); line-height: 1.4;
}
.mission-list { list-style: none; padding: 0; margin: 1.8rem 0 2.2rem; }
.mission-list li {
    display: flex; align-items: flex-start; gap: .9rem;
    padding: .85rem 0; border-bottom: 1px solid #f0f0f4;
    font-size: .97rem; color: #374151; line-height: 1.65;
}
.mission-list li:last-child { border-bottom: none; }
.ml-icon {
    width: 34px; height: 34px; border-radius: 9px; flex-shrink: 0;
    display: flex; align-items: center; justify-content: center; font-size: .9rem;
    margin-top: .05rem;
}
.mission-text {
    font-size: 1.05rem; color: #4b5563; line-height: 1.82;
}

/* ════════════════════════ LIVE DONORS ════════════════════════ */
.live-section {
    padding: 6.5rem 0;
    background: linear-gradient(160deg, #06102a 0%, #0a2463 50%, #06102a 100%);
    position: relative; overflow: hidden;
}
.live-section::before {
    content: ''; position: absolute; inset: 0;
    background-image: radial-gradient(rgba(255,255,255,.04) 1px, transparent 1px);
    background-size: 30px 30px; pointer-events: none;
}
.live-section > .container { position: relative; z-index: 2; }

.feed-panel {
    background: rgba(255,255,255,.05);
    border: 1px solid rgba(255,255,255,.09);
    border-radius: 18px; overflow: hidden;
}
.feed-panel-header {
    padding: 1rem 1.3rem;
    border-bottom: 1px solid rgba(255,255,255,.07);
    display: flex; align-items: center; justify-content: space-between;
}
.feed-panel-header .title {
    font-size: .78rem; font-weight: 800; text-transform: uppercase;
    letter-spacing: 1.8px; color: rgba(255,255,255,.85);
}
.feed-scroll {
    max-height: 400px; overflow-y: auto; padding: .4rem 0;
}
.feed-scroll::-webkit-scrollbar { width: 3px; }
.feed-scroll::-webkit-scrollbar-thumb { background: rgba(255,255,255,.15); }

.feed-item {
    display: flex; align-items: center; gap: .75rem;
    padding: .75rem 1.3rem;
    border-bottom: 1px solid rgba(255,255,255,.045);
    transition: background .15s;
}
.feed-item:last-child { border-bottom: none; }
.feed-item:hover { background: rgba(255,255,255,.04); }
.feed-item.new-flash { animation: flashRow .55s ease; }
@keyframes flashRow {
    from { background: rgba(74,222,128,.14); }
    to   { background: transparent; }
}
.fi-avatar {
    width: 38px; height: 38px; border-radius: 50%; color: white;
    display: flex; align-items: center; justify-content: center;
    font-weight: 800; font-size: .85rem; flex-shrink: 0;
}
.fi-info { flex: 1; min-width: 0; }
.fi-name { font-size: .87rem; font-weight: 600; color: rgba(255,255,255,.9);
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
.fi-loc  { font-size: .73rem; color: rgba(255,255,255,.42); }
.fi-amount { font-weight: 900; font-size: .92rem; color: #4ade80; flex-shrink: 0; }
.fi-time   { font-size: .7rem; color: rgba(255,255,255,.28); flex-shrink: 0; margin-left: .4rem; }

/* ════════════════════════ QUOTE BANNER ════════════════════════ */
.quote-banner {
    background: var(--red); padding: 4.5rem 0; text-align: center;
    position: relative; overflow: hidden;
}
.quote-banner::before {
    content: '"'; position: absolute; bottom: -40px; left: 3%;
    font-family: Georgia, serif; font-size: 18rem; color: rgba(255,255,255,.05);
    line-height: 1; pointer-events: none;
}
.quote-banner blockquote {
    font-family: 'Bebas Neue', sans-serif;
    font-size: clamp(1.9rem, 5vw, 3.4rem); color: white;
    letter-spacing: 2px; line-height: 1.12;
    max-width: 900px; margin: 0 auto;
    position: relative; z-index: 1;
}
.quote-banner cite {
    display: block; color: rgba(255,255,255,.65); font-style: normal;
    font-size: .85rem; font-weight: 600; letter-spacing: 3.5px;
    text-transform: uppercase; margin-top: 1.3rem;
}

/* ════════════════════════ HOMEPAGE CTA ════════════════════════ */
.home-cta-section {
    padding: 6.5rem 0;
    background: linear-gradient(150deg, var(--dark-navy), #163785, var(--dark-navy));
    position: relative; overflow: hidden;
}
.home-cta-section::before {
    content: ''; position: absolute; inset: 0;
    background-image: radial-gradient(rgba(255,255,255,.04) 1px, transparent 1px);
    background-size: 28px 28px; pointer-events: none;
}
.home-cta-section > .container { position: relative; z-index: 2; }

.amount-grid { display: flex; flex-wrap: wrap; gap: .6rem; margin-bottom: 2rem; }
.amt-btn {
    background: rgba(255,255,255,.09); border: 1.5px solid rgba(255,255,255,.28);
    color: white; font-weight: 700; font-size: .98rem;
    padding: .6rem 1.7rem; border-radius: 7px; cursor: pointer;
    transition: all .15s;
}
.amt-btn:hover, .amt-btn.active {
    background: white; border-color: white; color: var(--dark-navy);
}
.trust-row { display: flex; flex-wrap: wrap; gap: 1.2rem; margin-top: 1.3rem; }
.trust-item { display: flex; align-items: center; gap: .35rem;
    font-size: .78rem; color: rgba(255,255,255,.5); }
.trust-item i { color: var(--gold); }
</style>
@endpush

@section('content')

{{-- ══ HERO ══ --}}
<section class="hero">
    <div class="hero-glow"></div>
    <div class="hero-red-slash"></div>

    <div class="container py-5">
        <div class="row align-items-center gy-5">

            {{-- Copy --}}
            <div class="col-lg-6 hero-content">
                <p class="hero-eyebrow">People-Powered Movement</p>
                <h1 class="hero-title">
                    Alexandria<br>
                    <span class="accent">Ocasio-</span><br>
                    <span class="outline">Cortez</span>
                </h1>
                <p class="hero-tagline">
                    We're building a future that works for <em>everyone</em>  but
                    we can't do it alone. No corporations. No special interests.
                    Just people.
                </p>
                <div class="hero-actions">
                    <a href="{{ route('donate') }}" class="btn-red">
                        <i class="bi bi-heart-fill"></i> Donate Now
                    </a>
                    <a href="#mission" class="btn-outline-light-custom">
                        <i class="bi bi-play-circle"></i> Our Mission
                    </a>
                </div>
                <div class="hero-stats">
                    <div class="h-stat">
                        <div class="h-stat-num">
                            $<span data-target="4847293" data-prefix="" data-suffix="" data-dur="2200">0</span>
                        </div>
                        <div class="h-stat-lbl">Total Raised</div>
                    </div>
                    <div class="h-stat">
                        <div class="h-stat-num">
                            <span data-target="84291" data-dur="2000">0</span>
                        </div>
                        <div class="h-stat-lbl">Donors</div>
                    </div>
                    <div class="h-stat">
                        <div class="h-stat-num">
                            <span data-target="50" data-dur="1400">0</span>
                        </div>
                        <div class="h-stat-lbl">States</div>
                    </div>
                </div>
            </div>

            {{-- Portrait --}}
            <div class="col-lg-5 offset-lg-1 hero-img-col">
                <div class="hero-img-frame">
                    {{-- Floating badge top --}}
                    <div class="float-badge top-right d-none d-xl-flex">
                        <div class="fb-icon" style="background:#dcfce7">
                            <i class="bi bi-check-circle-fill" style="color:#16a34a"></i>
                        </div>
                        <div class="fb-text">
                            <strong>People-Funded</strong>
                            <small>No corporate PACs</small>
                        </div>
                    </div>

                    <img src="{{ asset('Alexandria_Ocasio-Cortez_.jpg') }}"
                         alt="Alexandria Ocasio-Cortez">

                    {{-- Floating badge bottom --}}
                    <div class="float-badge bottom-left d-none d-xl-flex">
                        <div class="fb-icon" style="background:#fef3c7">
                            <i class="bi bi-stars" style="color:#d97706"></i>
                        </div>
                        <div class="fb-text">
                            <strong>Fighting for You</strong>
                            <small>Since day one</small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="scroll-hint">
        <span>Scroll</span>
        <i class="bi bi-chevron-down"></i>
    </div>
</section>

{{-- ══ TICKER ══ --}}
<div class="ticker-wrap" aria-hidden="true">
    <div class="ticker-track">
        <span>Medicare for All</span><span class="t-sep">✦</span>
        <span>Green New Deal</span><span class="t-sep">✦</span>
        <span>Free Public College</span><span class="t-sep">✦</span>
        <span>Workers' Rights</span><span class="t-sep">✦</span>
        <span>Economic Justice</span><span class="t-sep">✦</span>
        <span>Climate Action</span><span class="t-sep">✦</span>
        <span>People Over Profits</span><span class="t-sep">✦</span>
        <span>Medicare for All</span><span class="t-sep">✦</span>
        <span>Green New Deal</span><span class="t-sep">✦</span>
        <span>Free Public College</span><span class="t-sep">✦</span>
        <span>Workers' Rights</span><span class="t-sep">✦</span>
        <span>Economic Justice</span><span class="t-sep">✦</span>
        <span>Climate Action</span><span class="t-sep">✦</span>
        <span>People Over Profits</span><span class="t-sep">✦</span>
    </div>
</div>

{{-- ══ STATS BAR ══ --}}
<div class="stats-bar">
    <div class="container">
        <div class="row text-center gy-3">
            <div class="col-6 col-md-3">
                <span class="stat-num">$<span data-target="4847293" data-dur="2200">4,847,293</span></span>
                <div class="stat-lbl">Raised This Year</div>
            </div>
            <div class="col-md-auto d-none d-md-block"><div class="stat-vr"></div></div>
            <div class="col-6 col-md-3">
                <span class="stat-num"><span data-target="84291" data-dur="2000">84,291</span></span>
                <div class="stat-lbl">Individual Donors</div>
            </div>
            <div class="col-md-auto d-none d-md-block"><div class="stat-vr"></div></div>
            <div class="col-6 col-md-3">
                <span class="stat-num"><span data-target="50" data-dur="1500">50</span></span>
                <div class="stat-lbl">States Organized</div>
            </div>
            <div class="col-md-auto d-none d-md-block"><div class="stat-vr"></div></div>
            <div class="col-6 col-md-2">
                <span class="stat-num">$<span data-target="27" data-dur="1200">27</span></span>
                <div class="stat-lbl">Average Gift</div>
            </div>
        </div>
    </div>
</div>

{{-- ══ CAUSES ══ --}}
<section class="causes-section" id="causes">
    <div class="container">
        <div class="text-center mb-5">
            <p class="section-overline">What We Stand For</p>
            <h2 class="section-title">Four Fights.<br>One Future.</h2>
        </div>

        <div class="row g-4">

            <div class="col-sm-6 col-xl-3">
                <div class="cause-card">
                    <div class="cause-header-img" style="background:linear-gradient(90deg,#0a2463,#1d4ed8)"></div>
                    <div class="cause-body">
                        <div class="cause-icon" style="background:linear-gradient(135deg,#1d4ed8,#0a2463)">
                            <i class="bi bi-heart-pulse-fill"></i>
                        </div>
                        <h4>Universal Healthcare</h4>
                        <p>Medicare for All  because no one should go broke just to stay alive. Healthcare is a human right, not a privilege reserved for the wealthy.</p>
                        <span class="cause-badge"><i class="bi bi-shield-check me-1"></i>Medicare for All</span>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="cause-card">
                    <div class="cause-header-img" style="background:linear-gradient(90deg,#065f46,#047857)"></div>
                    <div class="cause-body">
                        <div class="cause-icon" style="background:linear-gradient(135deg,#047857,#065f46)">
                            <i class="bi bi-globe-americas"></i>
                        </div>
                        <h4>Climate Action</h4>
                        <p>The Green New Deal creates millions of good-paying jobs while protecting our planet for future generations. The time for half-measures is over.</p>
                        <span class="cause-badge"><i class="bi bi-leaf me-1"></i>Green New Deal</span>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="cause-card">
                    <div class="cause-header-img" style="background:linear-gradient(90deg,#7c3aed,#6d28d9)"></div>
                    <div class="cause-body">
                        <div class="cause-icon" style="background:linear-gradient(135deg,#7c3aed,#6d28d9)">
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>
                        <h4>Free Public College</h4>
                        <p>Education should open doors, not close them with crushing debt. Every student deserves a real shot at success  regardless of their zip code.</p>
                        <span class="cause-badge"><i class="bi bi-book me-1"></i>Free College</span>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="cause-card">
                    <div class="cause-header-img" style="background:linear-gradient(90deg,#b45309,#d97706)"></div>
                    <div class="cause-body">
                        <div class="cause-icon" style="background:linear-gradient(135deg,#d97706,#b45309)">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h4>Workers' Rights</h4>
                        <p>Fair wages, dignity at work, and economic justice for every worker. No one who works full-time should live in poverty. Period.</p>
                        <span class="cause-badge"><i class="bi bi-hammer me-1"></i>Workers' Rights</span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ══ MISSION ══ --}}
<section class="mission-section" id="mission">
    <div class="container">
        <div class="row align-items-center gy-5">

            <div class="col-lg-5">
                <div class="mission-img-wrap">
                    <img src="{{ asset('Alexandria_Ocasio-Cortez_.jpg') }}" alt="Alexandria Ocasio-Cortez speaking">
                    <div class="mission-corner-badge">
                        <div class="big">2026</div>
                        <div class="small">Fight for<br>Everyone</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 offset-lg-1">
                <p class="section-overline">The Fight We're In</p>
                <h2 class="section-title" style="color:var(--dark-navy)">A System That<br>Puts People First</h2>
                <p class="mission-text mt-4">
                    Right now, millions of people are struggling with the basics: healthcare they can't afford,
                    education out of reach, jobs that don't pay enough, and a climate crisis that can't be ignored.
                </p>
                <p class="mission-text mt-3">
                    This movement is powered by <strong>people</strong>  not corporations, not special interests.
                    Every step forward depends on individuals like you who believe in a better future.
                </p>
                <ul class="mission-list mt-4">
                    <li>
                        <div class="ml-icon" style="background:#dbeafe"><i class="bi bi-heart-pulse" style="color:#1d4ed8"></i></div>
                        <span><strong>Universal healthcare</strong>  no one should go broke just to stay alive</span>
                    </li>
                    <li>
                        <div class="ml-icon" style="background:#d1fae5"><i class="bi bi-globe" style="color:#047857"></i></div>
                        <span><strong>Bold climate action</strong>  creating jobs while protecting our planet</span>
                    </li>
                    <li>
                        <div class="ml-icon" style="background:#ede9fe"><i class="bi bi-mortarboard" style="color:#7c3aed"></i></div>
                        <span><strong>Free public college</strong>  opening doors, not closing them with debt</span>
                    </li>
                    <li>
                        <div class="ml-icon" style="background:#fef3c7"><i class="bi bi-people" style="color:#d97706"></i></div>
                        <span><strong>Strong workers' rights</strong>  fair wages, dignity, and economic justice</span>
                    </li>
                </ul>
                <a href="{{ route('donate') }}" class="btn-red">
                    <i class="bi bi-heart-fill"></i>Join the Movement
                </a>
            </div>

        </div>
    </div>
</section>

{{-- ══ LIVE DONORS ══ --}}
<section class="live-section">
    <div class="container">
        <div class="row align-items-start gy-5">

            <div class="col-lg-5">
                <p class="section-overline" style="color:var(--gold)">Real-Time Activity</p>
                <h2 class="section-title" style="color:white;">People Donating<br><span style="color:var(--gold)">Right Now</span></h2>
                <p style="color:rgba(255,255,255,.65); font-size:1.05rem; line-height:1.8; margin:1.5rem 0 2rem;">
                    Every few seconds, someone new joins this movement.
                    These are real people  workers, students, parents  who believe
                    we deserve better. Will you be next?
                </p>
                <a href="{{ route('donate') }}" class="btn-red">
                    <i class="bi bi-heart-fill"></i> Add Your Name
                </a>
                <div class="mt-4 p-4 rounded-3" style="background:rgba(255,255,255,.06); border:1px solid rgba(255,255,255,.1);">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="live-dot"></span>
                        <span style="color:rgba(255,255,255,.8); font-size:.82rem; font-weight:700; text-transform:uppercase; letter-spacing:1.5px;">Goal Progress</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span style="color:rgba(255,255,255,.9); font-weight:700;">
                            $<span id="raisedAmt" data-target="4847293" data-dur="2000">4,847,293</span> raised
                        </span>
                        <span style="color:rgba(255,255,255,.45); font-size:.85rem;">of $10M goal</span>
                    </div>
                    <div class="prog-bar-outer">
                        <div class="prog-bar-inner" id="progressBar" style="width:0%"></div>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <span style="color:rgba(255,255,255,.45); font-size:.78rem;">48% funded</span>
                        <span style="color:#4ade80; font-size:.78rem; font-weight:700;">
                            <span class="live-dot" style="width:6px;height:6px;margin-right:4px;"></span>Active now
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 offset-lg-1">
                <div class="feed-panel">
                    <div class="feed-panel-header">
                        <span class="title">
                            <span class="live-dot me-2"></span>Live Donations
                        </span>
                        <span style="color:rgba(255,255,255,.4); font-size:.75rem;">Updates every few seconds</span>
                    </div>
                    <div class="feed-scroll" id="homeFeed">

                        @php
                        $seed = [
                            ['n'=>'Nina V.',    'c'=>'New York, NY',       'a'=>250, 'i'=>'NV', 't'=>'2m ago',  'bg'=>'#1d4ed8'],
                            ['n'=>'Sophie H.',  'c'=>'San Francisco, CA',  'a'=>100, 'i'=>'SH', 't'=>'5m ago',  'bg'=>'#7c3aed'],
                            ['n'=>'Jake W.',    'c'=>'Denver, CO',         'a'=>150, 'i'=>'JW', 't'=>'8m ago',  'bg'=>'#047857'],
                            ['n'=>'Maria G.',   'c'=>'Los Angeles, CA',    'a'=>100, 'i'=>'MG', 't'=>'11m ago', 'bg'=>'#b45309'],
                            ['n'=>'Carlos R.',  'c'=>'Miami, FL',          'a'=>200, 'i'=>'CR', 't'=>'14m ago', 'bg'=>'#0369a1'],
                            ['n'=>'Priya N.',   'c'=>'Boston, MA',         'a'=>10,  'i'=>'PN', 't'=>'17m ago', 'bg'=>'#b91c1c'],
                            ['n'=>'Tamara B.',  'c'=>'Philadelphia, PA',   'a'=>25,  'i'=>'TB', 't'=>'21m ago', 'bg'=>'#1d4ed8'],
                            ['n'=>'Omar F.',    'c'=>'Detroit, MI',        'a'=>75,  'i'=>'OF', 't'=>'25m ago', 'bg'=>'#7c3aed'],
                        ];
                        @endphp

                        @foreach($seed as $d)
                        <div class="feed-item">
                            <div class="fi-avatar" style="background:{{ $d['bg'] }}">{{ $d['i'] }}</div>
                            <div class="fi-info">
                                <div class="fi-name">{{ $d['n'] }}</div>
                                <div class="fi-loc"><i class="bi bi-geo-alt-fill me-1" style="font-size:.65rem"></i>{{ $d['c'] }}</div>
                            </div>
                            <span class="fi-amount">${{ $d['a'] }}</span>
                            <span class="fi-time">{{ $d['t'] }}</span>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ══ QUOTE BANNER ══ --}}
<section class="quote-banner">
    <div class="container">
        <blockquote>
            "Together, We Can Build a System<br>That Puts People First."
        </blockquote>
        <cite> Alexandria Ocasio-Cortez</cite>
    </div>
</section>

{{-- ══ HOME CTA ══ --}}
<section class="home-cta-section" id="donate-cta">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <p class="section-overline" style="color:var(--gold); text-align:center; justify-content:center; display:flex;">Take Action</p>
                <h2 class="section-title" style="color:white; margin-bottom:.8rem;">Chip In for a Better Future</h2>
                <p style="color:rgba(255,255,255,.7); font-size:1.05rem; max-width:560px; margin:0 auto 2.5rem; line-height:1.8;">
                    Even a small donation helps us reach more people, organize stronger,
                    and push these ideas into reality. Your support means everything.
                </p>

                <div class="amount-grid justify-content-center" id="homeAmounts">
                    <button class="amt-btn" data-v="10">$10</button>
                    <button class="amt-btn active" data-v="25">$25</button>
                    <button class="amt-btn" data-v="50">$50</button>
                    <button class="amt-btn" data-v="100">$100</button>
                    <button class="amt-btn" data-v="250">$250</button>
                    <button class="amt-btn" data-v="0">Other</button>
                </div>

                <a href="{{ route('donate') }}" class="btn-red" id="homeDonateLnk" style="font-size:1.1rem; padding:1rem 3rem;">
                    <i class="bi bi-heart-fill"></i><span>Donate $25 Now</span>
                </a>

                <div class="trust-row justify-content-center">
                    <span class="trust-item"><i class="bi bi-shield-fill-check"></i> Secure &amp; Encrypted</span>
                    <span class="trust-item"><i class="bi bi-people-fill"></i> People-Funded Only</span>
                    <span class="trust-item"><i class="bi bi-bank"></i> No Corporate Money</span>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
/* ── Amount pills on homepage ── */
document.querySelectorAll('#homeAmounts .amt-btn').forEach(btn => {
    btn.addEventListener('click', function () {
        document.querySelectorAll('#homeAmounts .amt-btn').forEach(b => b.classList.remove('active'));
        this.classList.add('active');
        const v = this.dataset.v;
        const lnk = document.getElementById('homeDonateLnk');
        lnk.querySelector('span').textContent = v === '0'
            ? 'Choose Your Amount'
            : `Donate $${v} Now`;
        lnk.href = '{{ route('donate') }}' + (v !== '0' ? '?amount=' + v : '');
    });
});

/* ── Live feed: hook into global toast system ── */
const AVATAR_COLORS_PAGE = ['#0a2463','#1d4ed8','#7c3aed','#0369a1','#047857','#b91c1c','#92400e'];
function avColor(n) {
    let s = 0; for (let i = 0; i < n.length; i++) s += n.charCodeAt(i);
    return AVATAR_COLORS_PAGE[s % AVATAR_COLORS_PAGE.length];
}

let elapsedSeconds = 0;
setInterval(() => { elapsedSeconds++; }, 1000);

function fmtAgo(sec) {
    if (sec < 60) return 'Just now';
    return Math.floor(sec / 60) + 'm ago';
}

window.liveFeed = {
    push(d) {
        const feed = document.getElementById('homeFeed');
        if (!feed) return;
        const el = document.createElement('div');
        el.className = 'feed-item new-flash';
        el.innerHTML = `
            <div class="fi-avatar" style="background:${avColor(d.name)}">${d.initials}</div>
            <div class="fi-info">
                <div class="fi-name">${d.name}</div>
                <div class="fi-loc"><i class="bi bi-geo-alt-fill me-1" style="font-size:.65rem"></i>${d.city}</div>
            </div>
            <span class="fi-amount">$${d.amount}</span>
            <span class="fi-time">Just now</span>
        `;
        feed.prepend(el);
        // Keep max 12 items
        while (feed.children.length > 12) feed.lastElementChild.remove();
    }
};

/* ── Progress bar animate ── */
setTimeout(() => {
    const bar = document.getElementById('progressBar');
    if (bar) bar.style.width = '48%';
}, 400);

/* ── Live counter increment when donations come in ── */
window.counterAdd = function(amount) {
    const el = document.getElementById('raisedAmt');
    if (!el) return;
    const current = parseInt(el.textContent.replace(/,/g, '')) || 4847293;
    el.textContent = (current + amount).toLocaleString();
};
</script>
@endpush
