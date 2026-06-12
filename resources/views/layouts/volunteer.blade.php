<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Event Volunteer Manager')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        :root {
            --bg-base:#f4f6f9;--bg-sidebar:#ffffff;--bg-topbar:#ffffff;--bg-card:#ffffff;
            --border:#e2e8f0;--text-primary:#0f172a;--text-sub:#475569;--text-muted:#94a3b8;
            --sidebar-link:#64748b;--sidebar-link-hover-bg:rgba(99,102,241,0.06);--sidebar-link-hover:#374151;
            --sidebar-active-bg:rgba(99,102,241,0.1);--sidebar-active:#6366f1;--sidebar-active-border:#6366f1;
            --accent:#6366f1;--table-head:#f8fafc;--table-border:#e2e8f0;--table-hover:rgba(99,102,241,0.04);
            --input-bg:#ffffff;--input-border:#cbd5e1;--input-color:#0f172a;
            --section-color:#94a3b8;
        }
        [data-theme="dark"] {
            --bg-base:#0f1117;--bg-sidebar:#1a1d27;--bg-topbar:#1a1d27;--bg-card:#1a1d27;
            --border:#2d3148;--text-primary:#f1f5f9;--text-sub:#94a3b8;--text-muted:#64748b;
            --sidebar-link:#94a3b8;--sidebar-link-hover-bg:rgba(99,102,241,0.08);--sidebar-link-hover:#e2e8f0;
            --sidebar-active-bg:rgba(99,102,241,0.12);--sidebar-active:#818cf8;--sidebar-active-border:#6366f1;
            --accent:#6366f1;--table-head:#252836;--table-border:#2d3148;--table-hover:rgba(99,102,241,0.06);
            --input-bg:#252836;--input-border:#3d4263;--input-color:#e2e8f0;
            --section-color:#475569;
        }

        *,*::before,*::after{box-sizing:border-box;}
        body{background-color:var(--bg-base);color:var(--text-primary);min-height:100vh;font-family:-apple-system,BlinkMacSystemFont,'Segoe UI',Roboto,sans-serif;transition:background-color .25s,color .25s;}

        .topnav{background-color:var(--bg-topbar);border-bottom:1px solid var(--border);padding:12px 24px;display:flex;justify-content:space-between;align-items:center;position:sticky;top:0;z-index:200;transition:background-color .25s,border-color .25s;}
        .topnav .brand{font-size:15px;font-weight:700;color:var(--text-primary);text-decoration:none;display:flex;align-items:center;gap:8px;}
        .topnav .brand i{color:var(--accent);}
        .topnav .right{display:flex;align-items:center;gap:10px;}
        .topnav .user-label{font-size:13px;color:var(--text-muted);}
        .topnav .user-label span{color:var(--text-sub);}

        .theme-btn{background:transparent;border:1px solid var(--border);color:var(--text-sub);border-radius:7px;padding:5px 9px;cursor:pointer;font-size:14px;transition:all .18s;line-height:1;}
        .theme-btn:hover{border-color:var(--accent);color:var(--accent);}

        .layout-wrap{display:flex;min-height:calc(100vh - 49px);}

        .sidebar{width:210px;flex-shrink:0;background-color:var(--bg-sidebar);border-right:1px solid var(--border);padding-top:14px;position:sticky;top:49px;height:calc(100vh - 49px);overflow-y:auto;transition:background-color .25s,border-color .25s;}
        .sidebar .nav-section{font-size:10px;text-transform:uppercase;color:var(--section-color);padding:12px 20px 4px;letter-spacing:1.2px;font-weight:600;}
        .sidebar a{color:var(--sidebar-link);text-decoration:none;display:flex;align-items:center;gap:10px;padding:9px 20px;font-size:13.5px;border-left:3px solid transparent;transition:all .15s;}
        .sidebar a:hover{background-color:var(--sidebar-link-hover-bg);color:var(--sidebar-link-hover);}
        .sidebar a.active{background-color:var(--sidebar-active-bg);color:var(--sidebar-active);border-left-color:var(--sidebar-active-border);}

        .page-content{flex:1;padding:28px;background-color:var(--bg-base);}

        .card{background-color:var(--bg-card);border:1px solid var(--border) !important;transition:background-color .25s,border-color .25s;}
        .table{color:var(--text-primary);}
        .table thead th{background-color:var(--table-head);color:var(--text-sub);border-color:var(--table-border);}
        .table td,.table th{border-color:var(--table-border);}
        .table-hover tbody tr:hover{background-color:var(--table-hover);}
        h5,h6{color:var(--text-primary);}
        .text-muted{color:var(--text-muted) !important;}
        .form-control,.form-select{background-color:var(--input-bg);border-color:var(--input-border);color:var(--input-color);}
        .form-control:focus,.form-select:focus{background-color:var(--input-bg);border-color:var(--accent);color:var(--input-color);box-shadow:0 0 0 3px rgba(99,102,241,.15);}
        .form-label{color:var(--text-sub);font-size:13px;}

        .alert-success{background-color:rgba(34,197,94,0.08);border-color:rgba(34,197,94,0.25);color:#22c55e;}
        .alert-danger{background-color:rgba(239,68,68,0.08);border-color:rgba(239,68,68,0.25);color:#ef4444;}
        .alert-info,.alert-secondary{background-color:rgba(99,102,241,0.07);border-color:rgba(99,102,241,0.2);color:var(--accent);}

        .badge.bg-success{background-color:#16a34a !important;}
        .badge.bg-danger{background-color:#dc2626 !important;}
        .badge.bg-warning{background-color:#d97706 !important;color:#fff !important;}
        .badge.bg-primary{background-color:#6366f1 !important;}
    </style>
</head>
<body>

<div class="topnav">
    <a href="{{ route('volunteer.dashboard') }}" class="brand">
        <i class="bi bi-people-fill"></i>Event Volunteer Manager
    </a>
    <div class="right">
        <button class="theme-btn" id="themeToggle"><i class="bi bi-sun-fill" id="themeIcon"></i></button>
        <span class="user-label d-none d-md-inline"><i class="bi bi-person-circle me-1"></i><span>{{ Auth::guard('web')->user()->name }}</span></span>
        <form action="{{ route('volunteer.logout') }}" method="POST" class="d-inline">
            @csrf
            <button class="btn btn-outline-secondary btn-sm" type="submit" style="font-size:12px;">
                <i class="bi bi-box-arrow-left me-1"></i>Logout
            </button>
        </form>
    </div>
</div>

<div class="layout-wrap">
    <div class="sidebar">
        <div class="nav-section">Menu</div>
        <a href="{{ route('volunteer.dashboard') }}"    class="{{ request()->routeIs('volunteer.dashboard') ? 'active' : '' }}"><i class="bi bi-house"></i>Dashboard</a>
        <a href="{{ route('volunteer.events') }}"       class="{{ request()->routeIs('volunteer.events*') ? 'active' : '' }}"><i class="bi bi-calendar-event"></i>Available Events</a>
        <a href="{{ route('volunteer.applications') }}"  class="{{ request()->routeIs('volunteer.applications') ? 'active' : '' }}"><i class="bi bi-clipboard"></i>My Applications</a>
        <a href="{{ route('volunteer.roles') }}"         class="{{ request()->routeIs('volunteer.roles') ? 'active' : '' }}"><i class="bi bi-tag"></i>My Roles</a>
        <a href="{{ route('volunteer.attendance') }}"   class="{{ request()->routeIs('volunteer.attendance') ? 'active' : '' }}"><i class="bi bi-check2-square"></i>My Attendance</a>
        <a href="{{ route('volunteer.certificates') }}"  class="{{ request()->routeIs('volunteer.certificates') ? 'active' : '' }}"><i class="bi bi-award"></i>My Certificates</a>
    </div>

    <div class="page-content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show"><i class="bi bi-check-circle me-2"></i>{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show"><i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
        @endif
        @yield('content')
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