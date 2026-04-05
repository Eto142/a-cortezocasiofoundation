<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Support Alexandria Ocasio-Cortez's fight for universal healthcare, climate action, free college, and workers' rights.">
    <title>@yield('title', 'Alexandria Ocasio-Cortez – Fight for Everyone')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --red:       #d62828;
            --dark-red:  #a81f1f;
            --navy:      #0a2463;
            --dark-navy: #071547;
            --gold:      #f7c948;
            --light:     #f4f5fa;
            --text:      #1a1a2e;
            --muted:     #6b7280;
        }

        *, *::before, *::after { box-sizing: border-box; }
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Inter', sans-serif;
            color: var(--text);
            overflow-x: hidden;
            background: #fff;
        }

        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: var(--navy); border-radius: 3px; }

        /* ──────────────────────── NAVBAR ──────────────────────── */
        #mainNav {
            position: fixed;
            top: 0; left: 0; right: 0;
            z-index: 9999;
            padding: .9rem 0;
            transition: background .35s ease, box-shadow .35s ease, padding .3s ease;
        }
        #mainNav.nav-transparent { background: transparent; }
        #mainNav.nav-solid {
            background: var(--dark-navy);
            box-shadow: 0 2px 24px rgba(0,0,0,.45);
            padding: .65rem 0;
        }

        .nav-brand {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.65rem;
            color: #fff;
            text-decoration: none;
            letter-spacing: 2px;
            line-height: 1;
        }
        .nav-brand strong { color: var(--gold); }

        .nav-link-item {
            color: rgba(255,255,255,.78);
            font-weight: 500;
            font-size: .9rem;
            text-decoration: none;
            padding: .4rem .7rem;
            border-radius: 5px;
            transition: color .2s, background .2s;
            letter-spacing: .2px;
        }
        .nav-link-item:hover { color: #fff; background: rgba(255,255,255,.1); }
        .nav-link-item.active { color: var(--gold) !important; }

        .nav-cta {
            background: var(--red);
            color: #fff !important;
            padding: .52rem 1.4rem;
            border-radius: 5px;
            font-weight: 800;
            font-size: .9rem;
            text-decoration: none;
            letter-spacing: .3px;
            transition: background .2s, transform .15s, box-shadow .2s;
            box-shadow: 0 4px 16px rgba(214,40,40,.4);
        }
        .nav-cta:hover {
            background: var(--dark-red);
            transform: translateY(-1px);
            box-shadow: 0 8px 22px rgba(214,40,40,.45);
        }

        .mobile-toggle {
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            padding: .2rem;
            cursor: pointer;
            line-height: 1;
        }
        .mobile-drawer {
            display: none;
            background: #08113a;
            border-top: 1px solid rgba(255,255,255,.07);
        }
        .mobile-drawer.open { display: block; }
        .mobile-drawer a {
            display: flex;
            align-items: center;
            gap: .6rem;
            padding: .85rem 1.5rem;
            color: rgba(255,255,255,.78);
            text-decoration: none;
            font-size: .95rem;
            font-weight: 500;
            border-bottom: 1px solid rgba(255,255,255,.05);
            transition: background .15s;
        }
        .mobile-drawer a:hover { background: rgba(255,255,255,.05); color: #fff; }
        .mobile-drawer .mob-cta {
            color: var(--gold) !important;
            font-weight: 800;
        }

        /* ──────────────────────── LIVE TOASTS ──────────────────────── */
        #toastStack {
            position: fixed;
            bottom: 1.4rem;
            left: 1.4rem;
            z-index: 99999;
            display: flex;
            flex-direction: column-reverse;
            gap: .55rem;
            pointer-events: none;
            max-width: 310px;
            width: calc(100vw - 2.8rem);
        }
        .donation-toast {
            background: white;
            border-left: 4px solid #22c55e;
            border-radius: 12px;
            padding: .85rem 1rem;
            box-shadow: 0 10px 40px rgba(0,0,0,.18);
            display: flex;
            align-items: center;
            gap: .8rem;
            animation: toastSlideIn .4s cubic-bezier(.22,.68,0,1.2) forwards;
            pointer-events: auto;
        }
        .donation-toast.hiding {
            animation: toastSlideOut .38s ease forwards;
        }
        @keyframes toastSlideIn {
            from { opacity: 0; transform: translateX(-28px) scale(.96); }
            to   { opacity: 1; transform: translateX(0) scale(1); }
        }
        @keyframes toastSlideOut {
            from { opacity: 1; transform: translateX(0) scale(1); }
            to   { opacity: 0; transform: translateX(-28px) scale(.96); }
        }

        .t-avatar {
            width: 42px; height: 42px;
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-weight: 800; font-size: .95rem; color: white;
            flex-shrink: 0;
        }
        .t-body { flex: 1; min-width: 0; }
        .t-name {
            font-weight: 700; font-size: .86rem; color: #111;
            margin: 0 0 .08rem;
            white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }
        .t-sub { font-size: .75rem; color: var(--muted); margin: 0; }
        .t-amount { font-weight: 900; font-size: .98rem; color: #16a34a; flex-shrink: 0; }
        .t-close {
            background: none; border: none; cursor: pointer;
            color: #bbb; font-size: .85rem; padding: 0 0 0 .15rem;
            line-height: 1; align-self: flex-start; flex-shrink: 0;
        }

        /* ──────────────────────── LIVE DOT ──────────────────────── */
        .live-dot {
            width: 8px; height: 8px;
            background: #22c55e;
            border-radius: 50%;
            display: inline-block;
            animation: livePulse 1.9s ease infinite;
        }
        @keyframes livePulse {
            0%, 100% { box-shadow: 0 0 0 0 rgba(34,197,94,.55); }
            55%       { box-shadow: 0 0 0 6px rgba(34,197,94,0); }
        }

        /* ──────────────────────── FOOTER ──────────────────────── */
        .site-footer {
            background: #05081c;
            color: rgba(255,255,255,.45);
            font-size: .87rem;
            padding: 3.5rem 0 2rem;
        }
        .footer-brand {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.85rem;
            color: white;
            letter-spacing: 2px;
            line-height: 1;
        }
        .footer-brand strong { color: var(--gold); }
        .footer-col-title {
            font-size: .7rem; font-weight: 700; text-transform: uppercase;
            letter-spacing: .12em; color: rgba(255,255,255,.3);
            margin-bottom: .85rem;
        }
        .footer-link {
            color: rgba(255,255,255,.5); text-decoration: none;
            transition: color .2s; display: block; margin-bottom: .5rem;
            font-size: .88rem;
        }
        .footer-link:hover { color: var(--gold); }
        .footer-social a {
            color: rgba(255,255,255,.45); font-size: 1.1rem;
            text-decoration: none; transition: color .2s;
        }
        .footer-social a:hover { color: var(--gold); }
        .footer-divider { border-color: rgba(255,255,255,.07); }

        /* ──────────────────────── PROGRESS BAR ──────────────────────── */
        .prog-bar-outer {
            height: 8px; background: rgba(255,255,255,.12);
            border-radius: 99px; overflow: hidden;
        }
        .prog-bar-inner {
            height: 100%;
            background: linear-gradient(90deg, var(--gold), #f59e0b);
            border-radius: 99px;
            transition: width 1.5s cubic-bezier(.22,.68,0,1);
        }

        /* ──────────────────────── UTILS ──────────────────────── */
        .section-overline {
            font-size: .72rem; font-weight: 800; letter-spacing: 4px;
            text-transform: uppercase; color: var(--red);
            margin-bottom: .55rem;
        }
        .section-title {
            font-family: 'Bebas Neue', sans-serif;
            font-size: clamp(2.2rem, 5vw, 4rem);
            color: var(--dark-navy);
            letter-spacing: 2px; line-height: 1;
        }
        .btn-red {
            background: var(--red); color: white;
            font-weight: 800; font-size: 1rem;
            padding: .9rem 2.2rem; border-radius: 7px;
            text-decoration: none; border: none; cursor: pointer;
            display: inline-flex; align-items: center; gap: .5rem;
            transition: background .2s, transform .15s, box-shadow .2s;
            box-shadow: 0 6px 22px rgba(214,40,40,.45);
            letter-spacing: .3px;
        }
        .btn-red:hover {
            background: var(--dark-red); color: white;
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(214,40,40,.45);
        }
        .btn-outline-light-custom {
            background: rgba(255,255,255,.08);
            color: white; padding: .9rem 2.2rem;
            border-radius: 7px; font-weight: 600; font-size: 1rem;
            text-decoration: none; border: 1px solid rgba(255,255,255,.25);
            display: inline-flex; align-items: center; gap: .5rem;
            transition: background .2s, color .2s, border-color .2s;
        }
        .btn-outline-light-custom:hover {
            background: rgba(255,255,255,.15); color: white;
            border-color: rgba(255,255,255,.45);
        }
    </style>

    @stack('styles')
</head>
<body>

    {{-- ── NAVBAR ── --}}
    <nav id="mainNav" class="nav-@yield('navStyle', 'solid')">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between gap-3">

                <a href="{{ route('home') }}" class="nav-brand">AOC&nbsp;<strong>2026</strong></a>

                {{-- Desktop --}}
                <div class="d-none d-lg-flex align-items-center gap-1">
                    <a href="{{ route('home') }}"         class="nav-link-item @yield('navHome')">Home</a>
                    <a href="{{ route('home') }}#causes"  class="nav-link-item">Causes</a>
                    <a href="{{ route('home') }}#mission" class="nav-link-item">Mission</a>
                    <a href="{{ route('donate') }}"       class="nav-cta ms-3 @yield('navDonate')">
                        <i class="bi bi-heart-fill me-1"></i>Donate Now
                    </a>
                </div>

                {{-- Mobile toggle --}}
                <button class="mobile-toggle d-lg-none" id="mobileToggle" onclick="toggleMobile()" aria-label="Menu">
                    <i class="bi bi-list" id="mobileIcon"></i>
                </button>
            </div>
        </div>

        {{-- Mobile drawer --}}
        <div class="mobile-drawer" id="mobileDrawer">
            <div class="container px-0">
                <a href="{{ route('home') }}"><i class="bi bi-house me-2"></i>Home</a>
                <a href="{{ route('home') }}#causes"><i class="bi bi-flag me-2"></i>Causes</a>
                <a href="{{ route('home') }}#mission"><i class="bi bi-book me-2"></i>Mission</a>
                <a href="{{ route('donate') }}" class="mob-cta"><i class="bi bi-heart-fill me-2"></i>Donate Now</a>
            </div>
        </div>
    </nav>

    {{-- Live donation toasts --}}
    <div id="toastStack" aria-live="polite"></div>

    @yield('content')

    {{-- ── FOOTER ── --}}
    <footer class="site-footer">
        <div class="container">
            <div class="row gy-4">

                <div class="col-lg-4 mb-2">
                    <div class="footer-brand mb-2">AOC&nbsp;<strong>2026</strong></div>
                    <p style="color:rgba(255,255,255,.5); font-size:.9rem; line-height:1.75; max-width:320px;">
                        Fighting for universal healthcare, climate justice, free college,
                        and workers' rights — powered entirely by people like you.
                    </p>
                    <div class="d-flex gap-3 footer-social mt-3">
                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>

                <div class="col-6 col-sm-4 col-lg-2 offset-lg-2">
                    <div class="footer-col-title">Navigate</div>
                    <a href="{{ route('home') }}"         class="footer-link">Home</a>
                    <a href="{{ route('home') }}#causes"  class="footer-link">Our Causes</a>
                    <a href="{{ route('home') }}#mission" class="footer-link">Mission</a>
                    <a href="{{ route('donate') }}"       class="footer-link">Donate</a>
                </div>

                <div class="col-6 col-sm-4 col-lg-2">
                    <div class="footer-col-title">Causes</div>
                    <a href="#" class="footer-link">Medicare for All</a>
                    <a href="#" class="footer-link">Green New Deal</a>
                    <a href="#" class="footer-link">Free College</a>
                    <a href="#" class="footer-link">Workers' Rights</a>
                </div>

                <div class="col-12 col-sm-4 col-lg-2">
                    <div class="footer-col-title">Take Action</div>
                    <a href="{{ route('donate') }}" class="footer-link">Donate Now</a>
                    <a href="#" class="footer-link">Volunteer</a>
                    <a href="#" class="footer-link">Spread the Word</a>
                    <a href="#" class="footer-link">Contact</a>
                </div>

            </div>

            <hr class="footer-divider my-4">

            <div class="d-flex flex-column flex-md-row justify-content-between gap-2">
                <p class="mb-0" style="font-size:.76rem; color:rgba(255,255,255,.28); max-width:520px;">
                    Paid for by people-powered movement. Not authorized by any candidate or candidate's committee.
                    Contributions are not tax-deductible. This site is for demonstration purposes.
                </p>
                <p class="mb-0" style="font-size:.76rem; color:rgba(255,255,255,.28); flex-shrink:0;">
                    © {{ date('Y') }} AOC 2026 · All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    /* ── Mobile nav ── */
    function toggleMobile() {
        const drawer = document.getElementById('mobileDrawer');
        const icon   = document.getElementById('mobileIcon');
        drawer.classList.toggle('open');
        icon.className = drawer.classList.contains('open') ? 'bi bi-x-lg' : 'bi bi-list';
    }

    /* ── Navbar scroll transparency ── */
    (function () {
        const nav = document.getElementById('mainNav');
        if (!nav.classList.contains('nav-transparent')) return;
        function update() {
            if (window.scrollY > 60) {
                nav.classList.replace('nav-transparent', 'nav-solid');
            } else {
                nav.classList.replace('nav-solid', 'nav-transparent');
            }
        }
        window.addEventListener('scroll', update, { passive: true });
    })();

    /* ── Donor pool ── */
    const DONORS = [
        { name: 'Sarah M.',   city: 'Brooklyn, NY',      amount: 25,  initials: 'SM' },
        { name: 'James T.',   city: 'Chicago, IL',       amount: 50,  initials: 'JT' },
        { name: 'Maria G.',   city: 'Los Angeles, CA',   amount: 100, initials: 'MG' },
        { name: 'David K.',   city: 'Austin, TX',        amount: 15,  initials: 'DK' },
        { name: 'Rachel L.',  city: 'Seattle, WA',       amount: 35,  initials: 'RL' },
        { name: 'James T.',    city: 'Chicago, IL',        amount: 250,  initials: 'JT' },
        { name: 'Ashley R.',  city: 'Austin, TX',         amount: 150,  initials: 'AR' },
        { name: 'Brandon K.', city: 'Seattle, WA',        amount: 500,  initials: 'BK' },
        { name: 'Michelle D.', city: 'Denver, CO',        amount: 100,  initials: 'MD' },
        { name: 'Tyler W.',   city: 'Phoenix, AZ',        amount: 1000, initials: 'TW' },
        { name: 'Samantha L.', city: 'Atlanta, GA',       amount: 250,  initials: 'SL' },
        { name: 'Kevin H.',   city: 'Miami, FL',          amount: 200,  initials: 'KH' },
        { name: 'Rachel M.',  city: 'Minneapolis, MN',    amount: 100,  initials: 'RM' },
        { name: 'Daniel F.',  city: 'Portland, OR',       amount: 2500, initials: 'DF' },
        { name: 'Lauren B.',  city: 'Philadelphia, PA',   amount: 150,  initials: 'LB' },
        { name: 'Chris N.',   city: 'San Diego, CA',      amount: 500,  initials: 'CN' },
        { name: 'Jessica P.', city: 'Detroit, MI',        amount: 100,  initials: 'JP' },
        { name: 'Matthew G.', city: 'Boston, MA',         amount: 300,  initials: 'MG' },
        { name: 'Amanda S.',  city: 'Las Vegas, NV',      amount: 100,  initials: 'AS' },
        { name: 'Joshua C.',  city: 'Columbus, OH',       amount: 1000, initials: 'JC' },
        { name: 'Megan W.',   city: 'Nashville, TN',      amount: 250,  initials: 'MW' },
        { name: 'Ryan H.',    city: 'San Antonio, TX',    amount: 100,  initials: 'RH' },
        { name: 'Stephanie T.', city: 'Baltimore, MD',    amount: 5000, initials: 'ST' },
        { name: 'Nathan A.',  city: 'Sacramento, CA',     amount: 200,  initials: 'NA' },
        { name: 'Rebecca J.', city: 'Kansas City, MO',    amount: 150,  initials: 'RJ' },
        { name: 'Andrew C.',  city: 'New York, NY',       amount: 2500, initials: 'AC' },
        { name: 'Brittany M.', city: 'Houston, TX',       amount: 100,  initials: 'BM' },
        { name: 'Jonathan L.', city: 'San Francisco, CA', amount: 500,  initials: 'JL' },
        { name: 'Nicole R.',  city: 'Charlotte, NC',      amount: 250,  initials: 'NR' },
        { name: 'Eric D.',    city: 'Indianapolis, IN',   amount: 100,  initials: 'ED' },
    ];

    const AVATAR_COLORS = ['#0a2463','#1d4ed8','#7c3aed','#0369a1','#047857','#b91c1c','#92400e'];

    function avatarColor(name) {
        let s = 0;
        for (let i = 0; i < name.length; i++) s += name.charCodeAt(i);
        return AVATAR_COLORS[s % AVATAR_COLORS.length];
    }

    let dIdx = Math.floor(Math.random() * DONORS.length);

    /* ── Toast display ── */
    const toastStack = document.getElementById('toastStack');

    function showToast() {
        const d = DONORS[dIdx % DONORS.length];
        dIdx++;

        const el = document.createElement('div');
        el.className = 'donation-toast';
        el.setAttribute('role', 'alert');
        el.innerHTML = `
            <div class="t-avatar" style="background:${avatarColor(d.name)}">${d.initials}</div>
            <div class="t-body">
                <p class="t-name">${d.name} <span style="color:#9ca3af;font-weight:400">from</span> ${d.city}</p>
                <p class="t-sub"><span class="live-dot" style="width:6px;height:6px"></span>&nbsp;just donated</p>
            </div>
            <span class="t-amount">$${d.amount}</span>
            <button class="t-close" onclick="dismissToast(this)" aria-label="Close">×</button>
        `;
        toastStack.prepend(el);

        /* Auto-dismiss after 6 s */
        setTimeout(() => dismissToast(el.querySelector('.t-close')), 6000);

        /* Notify live feed on donate page if present */
        if (window.liveFeed) window.liveFeed.push(d);
        if (window.counterAdd) window.counterAdd(d.amount);
    }

    function dismissToast(btn) {
        const toast = btn.closest ? btn.closest('.donation-toast') : btn.parentElement;
        if (!toast || toast.classList.contains('hiding')) return;
        toast.classList.add('hiding');
        setTimeout(() => toast.remove(), 400);
    }

    /* Start: first toast at 4 s, then random 10-20 s intervals */
    function scheduleToast() {
        const delay = Math.floor(Math.random() * 10000) + 10000;
        setTimeout(() => { showToast(); scheduleToast(); }, delay);
    }
    setTimeout(() => { showToast(); scheduleToast(); }, 4000);

    /* ── Count-up animation (Intersection Observer) ── */
    const counterObs = new IntersectionObserver(entries => {
        entries.forEach(e => {
            if (e.isIntersecting && !e.target.dataset.done) {
                e.target.dataset.done = '1';
                const target = +e.target.dataset.target;
                const pre    = e.target.dataset.prefix  || '';
                const suf    = e.target.dataset.suffix  || '';
                const dur    = +(e.target.dataset.dur   || 2000);
                const start  = performance.now();
                (function tick(now) {
                    const p = Math.min((now - start) / dur, 1);
                    const v = Math.floor(p * p * (3 - 2 * p) * target);
                    e.target.textContent = pre + v.toLocaleString() + suf;
                    if (p < 1) requestAnimationFrame(tick);
                })(start);
            }
        });
    }, { threshold: .4 });

    document.querySelectorAll('[data-target]').forEach(el => counterObs.observe(el));
    </script>

    @stack('scripts')
</body>
</html>
