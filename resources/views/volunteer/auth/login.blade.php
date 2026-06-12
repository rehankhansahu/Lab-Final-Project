<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — Event Volunteer Manager</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        :root {
            --bg-base:#f8f9fc;--bg-card:#ffffff;--bg-nav:#ffffff;--border:#e2e8f0;
            --text-primary:#0f172a;--text-sub:#475569;--text-muted:#94a3b8;
            --accent:#6366f1;--accent-hover:#4f46e5;--accent-light:rgba(99,102,241,0.08);
            --input-bg:#ffffff;--input-border:#cbd5e1;--input-color:#0f172a;--placeholder:#94a3b8;
            --btn-ghost-border:#cbd5e1;--btn-ghost-color:#475569;
        }
        [data-theme="dark"] {
            --bg-base:#0f1117;--bg-card:#1a1d27;--bg-nav:#1a1d27;--border:#2d3148;
            --text-primary:#f1f5f9;--text-sub:#94a3b8;--text-muted:#64748b;
            --accent:#6366f1;--accent-hover:#818cf8;--accent-light:rgba(99,102,241,0.1);
            --input-bg:#252836;--input-border:#3d4263;--input-color:#e2e8f0;--placeholder:#475569;
            --btn-ghost-border:#3d4263;--btn-ghost-color:#cbd5e1;
        }
        *,*::before,*::after{box-sizing:border-box;}
        body{background-color:var(--bg-base);color:var(--text-primary);min-height:100vh;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;transition:background-color .25s,color .25s;}
        .site-nav{background-color:var(--bg-nav);border-bottom:1px solid var(--border);padding:13px 0;transition:background-color .25s;}
        .nav-brand{font-size:16px;font-weight:700;color:var(--text-primary);text-decoration:none;display:flex;align-items:center;gap:8px;}
        .nav-brand i{color:var(--accent);font-size:20px;}
        .nav-actions{display:flex;align-items:center;gap:8px;}
        .nav-btn{display:inline-flex;align-items:center;gap:6px;padding:7px 15px;font-size:13.5px;font-weight:500;border-radius:7px;text-decoration:none;border:1px solid transparent;cursor:pointer;transition:all .18s;}
        .nav-btn-ghost{background:transparent;border-color:var(--btn-ghost-border);color:var(--btn-ghost-color);}
        .nav-btn-ghost:hover{border-color:var(--accent);color:var(--accent);background:var(--accent-light);}
        .nav-btn-solid{background:var(--accent);border-color:var(--accent);color:#fff;}
        .nav-btn-solid:hover{background:var(--accent-hover);color:#fff;}
        .nav-btn-admin{background:transparent;border-color:var(--border);color:var(--text-muted);font-size:12.5px;padding:7px 12px;}
        .nav-btn-admin:hover{border-color:var(--accent);color:var(--accent);background:var(--accent-light);}
        .theme-btn{background:transparent;border:1px solid var(--border);color:var(--text-sub);border-radius:7px;padding:7px 10px;cursor:pointer;font-size:15px;transition:all .18s;line-height:1;}
        .theme-btn:hover{border-color:var(--accent);color:var(--accent);}
        .page-wrap{min-height:calc(100vh - 56px);display:flex;align-items:center;justify-content:center;padding:40px 16px;}
        .auth-card{background:var(--bg-card);border:1px solid var(--border);border-radius:14px;padding:40px 36px;width:100%;max-width:420px;box-shadow:0 4px 24px rgba(0,0,0,0.06);transition:background-color .25s,border-color .25s;}
        .auth-logo{width:44px;height:44px;background:var(--accent-light);border-radius:10px;display:flex;align-items:center;justify-content:center;font-size:20px;color:var(--accent);margin-bottom:18px;}
        .auth-title{font-size:22px;font-weight:700;color:var(--text-primary);margin-bottom:4px;}
        .auth-sub{font-size:14px;color:var(--text-sub);margin-bottom:28px;}
        .form-label{font-size:13px;font-weight:500;color:var(--text-sub);margin-bottom:6px;}
        .form-control{background:var(--input-bg);border:1px solid var(--input-border);border-radius:8px;color:var(--input-color);font-size:14px;padding:9px 13px;transition:all .18s;}
        .form-control::placeholder{color:var(--placeholder);}
        .form-control:focus{background:var(--input-bg);border-color:var(--accent);color:var(--input-color);box-shadow:0 0 0 3px rgba(99,102,241,.15);}
        .form-control.is-invalid{border-color:#ef4444;}
        .invalid-feedback{font-size:12px;color:#ef4444;}
        .form-check-input:checked{background-color:var(--accent);border-color:var(--accent);}
        .form-check-label{font-size:13px;color:var(--text-sub);}
        .btn-submit{background:var(--accent);border:none;color:#fff;border-radius:8px;padding:10px 0;font-size:15px;font-weight:600;width:100%;cursor:pointer;transition:background .18s;}
        .btn-submit:hover{background:var(--accent-hover);}
        .divider{border-color:var(--border);margin:22px 0;}
        .auth-footer{text-align:center;font-size:13.5px;color:var(--text-muted);}
        .auth-footer a{color:var(--accent);text-decoration:none;font-weight:500;}
        .auth-footer a:hover{text-decoration:underline;}
        .alert-error{background:rgba(239,68,68,0.08);border:1px solid rgba(239,68,68,0.25);border-radius:8px;padding:12px 16px;color:#ef4444;font-size:13.5px;margin-bottom:20px;}
    </style>
</head>
<body>

<nav class="site-nav">
    <div class="container d-flex justify-content-between align-items-center">
        <a href="{{ route('home') }}" class="nav-brand">
            <i class="bi bi-people-fill"></i><span>EVM</span>
        </a>
        <div class="nav-actions">
            <button class="theme-btn" id="themeToggle"><i class="bi bi-sun-fill" id="themeIcon"></i></button>
            <a href="{{ route('volunteer.login') }}" class="nav-btn nav-btn-ghost">
                <i class="bi bi-box-arrow-in-right"></i>Login
            </a>
            <a href="{{ route('volunteer.register') }}" class="nav-btn nav-btn-solid">
                <i class="bi bi-person-plus"></i>Register
            </a>
            <a href="{{ route('admin.login') }}" class="nav-btn nav-btn-admin">
                <i class="bi bi-shield-lock"></i>Admin
            </a>
        </div>
    </div>
</nav>

<div class="page-wrap">
    <div class="auth-card">
        <div class="auth-logo"><i class="bi bi-box-arrow-in-right"></i></div>
        <h1 class="auth-title">Welcome back</h1>
        <p class="auth-sub">Sign in to your volunteer account.</p>

        @if($errors->any())
            <div class="alert-error">
                @foreach($errors->all() as $e)<div>{{ $e }}</div>@endforeach
            </div>
        @endif

        @if(session('success'))
            <div style="background:rgba(34,197,94,0.08);border:1px solid rgba(34,197,94,0.25);border-radius:8px;padding:12px 16px;color:#22c55e;font-size:13.5px;margin-bottom:20px;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('volunteer.login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}" placeholder="john@example.com" required autofocus>
                @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                       placeholder="Your password" required>
                @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror
            </div>
            <div class="mb-4 form-check">
                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
            <button type="submit" class="btn-submit">Sign In</button>
        </form>

        <hr class="divider">
        <div class="auth-footer">Don't have an account? <a href="{{ route('volunteer.register') }}">Register free</a></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const html=document.documentElement,btn=document.getElementById('themeToggle'),icon=document.getElementById('themeIcon'),saved=localStorage.getItem('evm_theme')||'dark';
    function applyTheme(t){html.setAttribute('data-theme',t);icon.className=t==='dark'?'bi bi-sun-fill':'bi bi-moon-fill';localStorage.setItem('evm_theme',t);}
    applyTheme(saved);
    btn.addEventListener('click',()=>applyTheme(html.getAttribute('data-theme')==='dark'?'light':'dark'));
</script>
</body>
</html>