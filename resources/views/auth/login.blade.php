<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Perpustakaan Digital</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f1f5f9;
            font-family: Arial, sans-serif;
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            background: white;
            padding: 38px;
            border-radius: 18px;
            box-shadow: 0 10px 35px rgba(0,0,0,.07);
        }

        .logo {
            width: 58px;
            height: 58px;
            background: #dbeafe;
            color: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            font-size: 28px;
            margin: 0 auto 18px;
        }

        .form-control {
            padding: 12px;
            border-radius: 9px;
        }

        .btn-login {
            padding: 12px;
            border-radius: 9px;
            background: #2563eb;
            color: white;
            font-weight: bold;
            border: none;
        }

        .btn-login:hover {
            background: #1d4ed8;
            color: white;
        }
    </style>
</head>

<body>

<div class="login-card">

    <div class="text-center mb-4">
        <div class="logo">📚</div>
        <h4 class="fw-bold">Perpustakaan Digital</h4>
        <p class="text-secondary small">Silakan masuk ke akun Anda</p>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login.authenticate') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label fw-semibold">Email</label>
            <input
                type="email"
                name="email"
                class="form-control"
                placeholder="Masukkan email"
                value="{{ old('email') }}"
                required
                autofocus
            >
        </div>

        <div class="mb-3">
            <label class="form-label fw-semibold">Password</label>
            <input
                type="password"
                name="password"
                class="form-control"
                placeholder="Masukkan password"
                required
            >
        </div>

        <div class="mb-4">
            <label class="d-flex align-items-center gap-2">
                <input type="checkbox" name="remember" value="1">
                <span class="small text-secondary">Ingat saya</span>
            </label>
        </div>

        <button type="submit" class="btn btn-login w-100">
            Masuk
        </button>
    </form>

    <p class="text-center text-secondary small mt-4 mb-0">
        © {{ date('Y') }} Perpustakaan Digital
    </p>

</div>

</body>
</html>