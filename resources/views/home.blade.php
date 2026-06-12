<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Volunteer Manager</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        /* ── LIGHT THEME ── */
        :root {
            --bg-base:       #f8f9fc;
            --bg-card:       #ffffff;
            --bg-nav:        #ffffff;
            --bg-feature:    #ffffff;
            --bg-steps:      #f1f4fb;
            --bg-cta:        #eef0fd;
            --border:        #e2e8f0;
            --border-accent: #c7d2fe;
            --text-primary:  #0f172a;
            --text-sub:      #475569;
            --text-muted:    #94a3b8;
            --accent:        #6366f1;
            --accent-hover:  #4f46e5;
            --accent-light:  rgba(99,102,241,0.1);
            --accent-border: rgba(99,102,241,0.25);
            --btn-outline-bg:      transparent;
            --btn-outline-border:  #cbd5e1;
            --btn-outline-color:   #475569;
            --btn-outline-hover-border: #6366f1;
            --btn-outline-hover-color:  #4f46e5;
            --stat-bg:       #f1f4fb;
            --shadow:        0 1px 3px rgba(0,0,0,0.07), 0 1px 2px rgba(0,0,0,0.04);
        }

        /* ── DARK THEME ── */
        [data-theme="dark"] {
            --bg-base:       #0f1117;
            --bg-card:       #1a1d27;
            --bg-nav:        #1a1d27;
            --bg-feature:    #1a1d27;
            --bg-steps:      #1a1d27;
            --bg-cta:        #1e1b4b;
            --border:        #2d3148;
            --border-accent: #3730a3;
            --text-primary:  #f1f5f9;
            --text-sub:      #94a3b8;
            --text-muted:    #64748b;
            --accent:        #6366f1;
            --accent-hover:  #818cf8;
            --accent-light:  rgba(99,102,241,0.12);
            --accent-border: rgba(99,102,241,0.3);
            --btn-outline-bg:      transparent;
            --btn-outline-border:  #3d4263;
            --btn-outline-color:   #cbd5e1;
            --btn-outline-hover-border: #6366f1;
            --btn-outline-hover-color:  #818cf8;
            --stat-bg:       #252836;
            --shadow:        0 1px 3px rgba(0,0,0,0.4);
        }

        *, *::before, *::after { box-sizing: border-box; }
        body {
            background-color: var(--bg-base);
            color: var(--text-primary);
            min-height: 100vh;
            transition: background-color 0.25s, color 0.25s;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        /* NAV */
        .site-nav {
            background-color: var(--bg-nav);
            border-bottom: 1px solid var(--border);
            padding: 14px 0;
            position: sticky;
            top: 0;
            z-index: 300;
            transition: background-color 0.25s, border-color 0.25s;
        }
        .nav-brand {
            font-size: 16px;
            font-weight: 700;
            color: var(--text-primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .nav-brand i { color: var(--accent); font-size: 20px; }
        .nav-actions { display: flex; align-items: center; gap: 8px; }

        /* Unified nav buttons */
        .nav-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 16px;
            font-size: 13.5px;
            font-weight: 500;
            border-radius: 7px;
            text-decoration: none;
            border: 1px solid transparent;
            cursor: pointer;
            transition: all 0.18s;
            white-space: nowrap;
        }
        .nav-btn-ghost {
            background: transparent;
            border-color: var(--btn-outline-border);
            color: var(--btn-outline-color);
        }
        .nav-btn-ghost:hover {
            border-color: var(--btn-outline-hover-border);
            color: var(--btn-outline-hover-color);
            background: var(--accent-light);
        }
        .nav-btn-solid {
            background: var(--accent);
            border-color: var(--accent);
            color: #fff;
        }
        .nav-btn-solid:hover {
            background: var(--accent-hover);
            border-color: var(--accent-hover);
            color: #fff;
        }
        .nav-btn-admin {
            background: transparent;
            border-color: var(--border);
            color: var(--text-muted);
            font-size: 12.5px;
            padding: 7px 13px;
        }
        .nav-btn-admin:hover {
            border-color: var(--btn-outline-hover-border);
            color: var(--accent);
            background: var(--accent-light);
        }

        /* Theme toggle */
        .theme-btn {
            background: var(--stat-bg);
            border: 1px solid var(--border);
            color: var(--text-sub);
            border-radius: 7px;
            padding: 7px 10px;
            cursor: pointer;
            font-size: 15px;
            transition: all 0.18s;
            line-height: 1;
        }
        .theme-btn:hover { border-color: var(--accent); color: var(--accent); }

        /* HERO */
        .hero {
            background-color: var(--bg-card);
            border-bottom: 1px solid var(--border);
            padding: 88px 0 72px;
            text-align: center;
            transition: background-color 0.25s;
        }
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--accent-light);
            color: var(--accent);
            border: 1px solid var(--accent-border);
            border-radius: 50px;
            padding: 5px 16px;
            font-size: 12.5px;
            font-weight: 500;
            margin-bottom: 22px;
            letter-spacing: 0.4px;
        }
        .hero-title {
            font-size: clamp(30px, 5vw, 54px);
            font-weight: 800;
            color: var(--text-primary);
            line-height: 1.15;
            margin-bottom: 18px;
            letter-spacing: -0.5px;
        }
        .hero-title span { color: var(--accent); }
        .hero-sub {
            font-size: 16.5px;
            color: var(--text-sub);
            max-width: 500px;
            margin: 0 auto 34px;
            line-height: 1.7;
        }
        .hero-btns { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; }

        /* Primary CTA button (larger) */
        .btn-cta-solid {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 26px;
            font-size: 15px;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            background: var(--accent);
            color: #fff;
            border: 1px solid var(--accent);
            transition: all 0.18s;
        }
        .btn-cta-solid:hover { background: var(--accent-hover); border-color: var(--accent-hover); color: #fff; transform: translateY(-1px); }
        .btn-cta-outline {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 26px;
            font-size: 15px;
            font-weight: 500;
            border-radius: 8px;
            text-decoration: none;
            background: transparent;
            color: var(--text-sub);
            border: 1px solid var(--btn-outline-border);
            transition: all 0.18s;
        }
        .btn-cta-outline:hover { border-color: var(--accent); color: var(--accent); background: var(--accent-light); }

        /* STATS */
        .stats-bar {
            background-color: var(--stat-bg);
            border-bottom: 1px solid var(--border);
            padding: 32px 0;
            transition: background-color 0.25s;
        }
        .stat-item { text-align: center; }
        .stat-num {
            font-size: 30px;
            font-weight: 800;
            color: var(--accent);
            line-height: 1;
            margin-bottom: 5px;
        }
        .stat-lbl {
            font-size: 12px;
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.8px;
        }

        /* FEATURES */
        .features { padding: 80px 0; background-color: var(--bg-base); transition: background-color 0.25s; }
        .section-eyebrow {
            font-size: 11.5px;
            font-weight: 700;
            color: var(--accent);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }
        .section-heading {
            font-size: clamp(22px, 3vw, 34px);
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 12px;
        }
        .section-desc { color: var(--text-sub); font-size: 15.5px; line-height: 1.7; }
        .feat-card {
            background: var(--bg-feature);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 26px;
            height: 100%;
            transition: border-color 0.2s, transform 0.2s, background-color 0.25s;
        }
        .feat-card:hover { border-color: var(--accent); transform: translateY(-3px); }
        .feat-icon {
            width: 46px; height: 46px;
            background: var(--accent-light);
            border-radius: 10px;
            display: flex; align-items: center; justify-content: center;
            font-size: 20px; color: var(--accent);
            margin-bottom: 16px;
        }
        .feat-title { font-size: 15px; font-weight: 600; color: var(--text-primary); margin-bottom: 7px; }
        .feat-desc  { font-size: 13.5px; color: var(--text-muted); line-height: 1.65; margin: 0; }

        /* STEPS */
        .steps { padding: 80px 0; background-color: var(--bg-steps); border-top: 1px solid var(--border); border-bottom: 1px solid var(--border); transition: background-color 0.25s; }
        .step-num {
            width: 38px; height: 38px;
            background: var(--accent-light);
            border: 1px solid var(--accent-border);
            border-radius: 50%;
            display: flex; align-items: center; justify-content: center;
            font-size: 14px; font-weight: 700; color: var(--accent);
            margin: 0 auto 14px;
        }
        .step-title { font-size: 14px; font-weight: 600; color: var(--text-primary); margin-bottom: 5px; }
        .step-desc  { font-size: 12.5px; color: var(--text-muted); line-height: 1.6; }

        /* CTA BOX */
        .cta-sec { padding: 88px 0; background-color: var(--bg-base); transition: background-color 0.25s; }
        .cta-box {
            background: var(--bg-cta);
            border: 1px solid var(--border-accent);
            border-radius: 16px;
            padding: 56px 40px;
            max-width: 620px;
            margin: 0 auto;
            text-align: center;
            transition: background-color 0.25s;
        }
        .cta-title { font-size: 27px; font-weight: 700; color: var(--text-primary); margin-bottom: 10px; }
        .cta-desc  { color: var(--text-sub); font-size: 15px; margin-bottom: 28px; }

        /* FOOTER */
        .site-footer {
            background: var(--bg-nav);
            border-top: 1px solid var(--border);
            padding: 22px 0;
            text-align: center;
            transition: background-color 0.25s;
        }
        .site-footer p { color: var(--text-muted); font-size: 13px; margin: 0; }
        .site-footer a { color: var(--text-muted); text-decoration: none; }
        .site-footer a:hover { color: var(--accent); }

        /* RESPONSIVE NAV collapse */
        @media (max-width: 576px) {
            .nav-btn-text { display: none; }
            .nav-btn { padding: 7px 10px; }
        }
    </style>
</head>
<body>

<!-- NAV -->
<nav class="site-nav">
    <div class="container d-flex justify-content-between align-items-center gap-2">
        <a href="{{ route('home') }}" class="nav-brand">
            <i class="bi bi-people-fill"></i>
            <span>EVM</span>
        </a>
        <div class="nav-actions flex-wrap">
            <button class="theme-btn" id="themeToggle" title="Toggle theme">
                <i class="bi bi-sun-fill" id="themeIcon"></i>
            </button>
            <a href="{{ route('volunteer.login') }}" class="nav-btn nav-btn-ghost">
                <i class="bi bi-box-arrow-in-right"></i><span class="nav-btn-text">Login</span>
            </a>
            <a href="{{ route('volunteer.register') }}" class="nav-btn nav-btn-solid">
                <i class="bi bi-person-plus"></i><span class="nav-btn-text">Register</span>
            </a>
            <a href="{{ route('admin.login') }}" class="nav-btn nav-btn-admin">
                <i class="bi bi-shield-lock"></i><span class="nav-btn-text">Admin</span>
            </a>
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="container">
        <div class="hero-badge"><i class="bi bi-stars"></i>Volunteer Management Platform</div>
        <h1 class="hero-title">Manage Events.<br>Empower <span>Volunteers.</span></h1>
        <p class="hero-sub">Apply to events, get assigned roles, track your attendance, and earn participation certificates — all in one place.</p>
        <div class="hero-btns">
            <a href="{{ route('volunteer.register') }}" class="btn-cta-solid">
                <i class="bi bi-person-plus"></i>Get Started Free
            </a>
            <a href="{{ route('volunteer.login') }}" class="btn-cta-outline">
                <i class="bi bi-box-arrow-in-right"></i>Sign In
            </a>
        </div>
    </div>
</section>

<!-- STATS -->
<div class="stats-bar">
    <div class="container">
        <div class="row g-3 justify-content-center">
            <div class="col-6 col-md-3"><div class="stat-item"><div class="stat-num">6+</div><div class="stat-lbl">Volunteer Roles</div></div></div>
            <div class="col-6 col-md-3"><div class="stat-item"><div class="stat-num">PDF</div><div class="stat-lbl">Certificates</div></div></div>
            <div class="col-6 col-md-3"><div class="stat-item"><div class="stat-num">100%</div><div class="stat-lbl">Free to Join</div></div></div>
            <div class="col-6 col-md-3"><div class="stat-item"><div class="stat-num">Live</div><div class="stat-lbl">Status Tracking</div></div></div>
        </div>
    </div>
</div>

<!-- FEATURES -->
<section class="features">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <div class="section-eyebrow">Platform Features</div>
                <h2 class="section-heading">Everything you need to volunteer effectively</h2>
                <p class="section-desc">A complete system for event organizers and volunteers — from application to certificate.</p>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-md-4"><div class="feat-card"><div class="feat-icon"><i class="bi bi-calendar-check"></i></div><div class="feat-title">Browse & Apply</div><p class="feat-desc">View all available events and submit your application with a single click.</p></div></div>
            <div class="col-md-4"><div class="feat-card"><div class="feat-icon"><i class="bi bi-tag"></i></div><div class="feat-title">Role Assignment</div><p class="feat-desc">Admin assigns specific roles like Registration Desk, Stage Management, Photography, and more.</p></div></div>
            <div class="col-md-4"><div class="feat-card"><div class="feat-icon"><i class="bi bi-check2-square"></i></div><div class="feat-title">Attendance Tracking</div><p class="feat-desc">Admin marks your attendance as Present or Absent for each event you participate in.</p></div></div>
            <div class="col-md-4"><div class="feat-card"><div class="feat-icon"><i class="bi bi-award"></i></div><div class="feat-title">PDF Certificates</div><p class="feat-desc">Download your official participation certificate as a PDF for every event you attended.</p></div></div>
            <div class="col-md-4"><div class="feat-card"><div class="feat-icon"><i class="bi bi-speedometer2"></i></div><div class="feat-title">Admin Dashboard</div><p class="feat-desc">Super Admin gets a complete dashboard with stats, approvals, and management tools.</p></div></div>
            <div class="col-md-4"><div class="feat-card"><div class="feat-icon"><i class="bi bi-person-check"></i></div><div class="feat-title">Real-time Status</div><p class="feat-desc">Track your application status — Pending, Approved, or Rejected — at any time.</p></div></div>
        </div>
    </div>
</section>

<!-- HOW IT WORKS -->
<section class="steps">
    <div class="container">
        <div class="text-center mb-5">
            <div class="section-eyebrow">How It Works</div>
            <h2 class="section-heading">Simple 5-step process</h2>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-6 col-md-2 text-center"><div class="step-num">1</div><div class="step-title">Register</div><p class="step-desc">Create your free account.</p></div>
            <div class="col-6 col-md-2 text-center"><div class="step-num">2</div><div class="step-title">Apply</div><p class="step-desc">Apply to events that interest you.</p></div>
            <div class="col-6 col-md-2 text-center"><div class="step-num">3</div><div class="step-title">Get Approved</div><p class="step-desc">Admin reviews your application.</p></div>
            <div class="col-6 col-md-2 text-center"><div class="step-num">4</div><div class="step-title">Attend</div><p class="step-desc">Show up and get attendance marked.</p></div>
            <div class="col-6 col-md-2 text-center"><div class="step-num">5</div><div class="step-title">Certificate</div><p class="step-desc">Download your PDF certificate.</p></div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-sec">
    <div class="container">
        <div class="cta-box">
            <h2 class="cta-title">Ready to start volunteering?</h2>
            <p class="cta-desc">Create your free account and start applying to events today.</p>
            <div class="hero-btns">
                <a href="{{ route('volunteer.register') }}" class="btn-cta-solid"><i class="bi bi-person-plus"></i>Create Free Account</a>
                <a href="{{ route('volunteer.login') }}" class="btn-cta-outline"><i class="bi bi-box-arrow-in-right"></i>Sign In</a>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="site-footer">
    <p>&copy; {{ date('Y') }} Event Volunteer Manager <span style="margin:0 8px;opacity:.4">·</span> <a href="{{ route('admin.login') }}">Admin Panel</a></p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const html  = document.documentElement;
    const btn   = document.getElementById('themeToggle');
    const icon  = document.getElementById('themeIcon');
    const saved = localStorage.getItem('evm_theme') || 'dark';

    function applyTheme(t) {
        html.setAttribute('data-theme', t);
        icon.className = t === 'dark' ? 'bi bi-sun-fill' : 'bi bi-moon-fill';
        localStorage.setItem('evm_theme', t);
    }

    applyTheme(saved);
    btn.addEventListener('click', () => applyTheme(html.getAttribute('data-theme') === 'dark' ? 'light' : 'dark'));
</script>
</body>
</html>