<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $profile->name }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; }

        body {
            background: linear-gradient(135deg, #0f172a 0%, #1e3a5f 60%, #0f172a 100%);
            font-family: 'Inter', 'Segoe UI', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 2rem 1rem;
        }

        /* Subtle animated background dots */
        body::before {
            content: '';
            position: fixed;
            inset: 0;
            background-image: radial-gradient(rgba(255,255,255,.04) 1px, transparent 1px);
            background-size: 32px 32px;
            pointer-events: none;
        }

        .card-wrap {
            width: 100%;
            max-width: 400px;
            position: relative;
            z-index: 1;
        }

        .profile-card {
            background: rgba(255,255,255,.06);
            backdrop-filter: blur(18px);
            -webkit-backdrop-filter: blur(18px);
            border: 1px solid rgba(255,255,255,.12);
            border-radius: 20px;
            padding: 2.5rem 2rem 2rem;
            text-align: center;
            color: #fff;
        }

        /* Avatar ring */
        .avatar-ring {
            width: 90px; height: 90px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3b82f6, #8b5cf6);
            display: flex; align-items: center; justify-content: center;
            margin: 0 auto 1.4rem;
            font-size: 2rem;
            font-weight: 700;
            color: #fff;
            box-shadow: 0 0 0 4px rgba(59,130,246,.25), 0 8px 24px rgba(59,130,246,.3);
        }

        .profile-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: #fff;
            margin-bottom: .3rem;
            letter-spacing: -.3px;
        }

        .profile-email {
            font-size: .88rem;
            color: rgba(255,255,255,.55);
            margin-bottom: 2rem;
        }

        .divider {
            border: none;
            border-top: 1px solid rgba(255,255,255,.1);
            margin: 0 0 1.6rem;
        }

        .btn-writeup {
            display: block;
            width: 100%;
            background: linear-gradient(135deg, #3b82f6, #6366f1);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: .75rem 1rem;
            font-size: .95rem;
            font-weight: 600;
            cursor: pointer;
            letter-spacing: .01em;
            transition: opacity .15s, transform .1s;
            box-shadow: 0 4px 18px rgba(99,102,241,.35);
        }
        .btn-writeup:hover  { opacity: .9; transform: translateY(-1px); }
        .btn-writeup:active { transform: translateY(0); }

        /* Copy row */
        .copy-row {
            display: flex;
            align-items: center;
            gap: .5rem;
            background: rgba(255,255,255,.07);
            border: 1px solid rgba(255,255,255,.1);
            border-radius: 10px;
            padding: .55rem .8rem;
            margin-top: .9rem;
        }
        .copy-row .link-text {
            flex: 1;
            font-size: .75rem;
            color: rgba(255,255,255,.45);
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            text-align: left;
        }
        .btn-copy {
            background: rgba(255,255,255,.1);
            border: none;
            border-radius: 6px;
            padding: .3rem .7rem;
            font-size: .75rem;
            font-weight: 600;
            color: rgba(255,255,255,.75);
            cursor: pointer;
            white-space: nowrap;
            transition: background .15s, color .15s;
            display: flex; align-items: center; gap: .3rem;
        }
        .btn-copy:hover  { background: rgba(255,255,255,.18); color: #fff; }
        .btn-copy.copied { background: rgba(34,197,94,.2); color: #4ade80; }

        /* Modal */
        .modal-dialog { max-width: 640px; }
        .modal-content {
            border-radius: 16px;
            border: none;
            box-shadow: 0 20px 60px rgba(0,0,0,.3);
        }
        .modal-header {
            border-bottom: 1px solid #f0f4f8;
            padding: 1.25rem 1.5rem;
        }
        .modal-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #111827;
        }
        .modal-body {
            color: #374151;
            line-height: 1.9;
            font-size: .95rem;
            white-space: pre-wrap;
            padding: 1.25rem 1.5rem 1.75rem;
        }
        .modal-footer { display: none; }
    </style>
</head>
<body>

<div class="card-wrap">
    <div class="profile-card">
        <div class="avatar-ring">{{ strtoupper(substr($profile->name, 0, 1)) }}</div>
        <div class="profile-name">{{ $profile->name }}</div>
        @if($profile->email)
        <div class="profile-email">{{ $profile->email }}</div>
        @else
        <div style="margin-bottom:2rem;"></div>
        @endif
        <hr class="divider">

        <button class="btn-writeup" data-bs-toggle="modal" data-bs-target="#writeupModal">
            ✦ &nbsp;Read Writeup
        </button>

       
    </div>
</div>

<!-- Writeup modal -->
<div class="modal fade" id="writeupModal" tabindex="-1" aria-labelledby="writeupModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="writeupModalLabel">{{ $profile->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">{{ $profile->writeup }}</div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function copyLink() {
        const link = document.getElementById('profileLink').textContent.trim();
        navigator.clipboard.writeText(link).then(() => {
            const btn = document.getElementById('copyBtn');
            btn.classList.add('copied');
            btn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16"><path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/></svg> Copied!`;
            setTimeout(() => {
                btn.classList.remove('copied');
                btn.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" viewBox="0 0 16 16"><path d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/><path d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5h3zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/></svg> Copy link`;
            }, 2000);
        });
    }
</script>
</body>
</html>
