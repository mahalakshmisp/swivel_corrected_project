<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password - Swivtrek</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Outfit', sans-serif;
            background: #f8f9fb;
        }

        .auth-wrap {
            min-height: calc(100vh - 70px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 16px;
        }

        .auth-card {
            width: 100%;
            max-width: 520px;
            border: none;
            border-radius: 16px;
            box-shadow: 0 16px 48px rgba(0, 0, 0, .12);
            overflow: hidden;
        }

        .auth-card .card-header {
            background: #fff;
            border-bottom: none;
            padding: 24px 28px;
        }

        .auth-card .card-header h1 {
            margin: 0;
            font-size: 22px;
            font-weight: 800;
            color: #7e3d9c;
        }

        .auth-card .card-body {
            padding: 28px;
            background: #fff;
        }

        .btn-primary {
            background-color: #7e3d9c;
            border-color: #7e3d9c;
        }

        .btn-primary:hover {
            background-color: #9b59b6;
            border-color: #9b59b6;
        }
    </style>
</head>

<body>
    @include('partials.header')

    <div class="auth-wrap">
        <div class="card auth-card">
            <div class="card-header">
                <h1>Forgot your password?</h1>
            </div>
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <p class="text-muted">Enter your email address and we will send you a password reset link.</p>

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input id="email" type="email" name="email" class="form-control form-control-lg"
                            placeholder="you@example.com" required autofocus>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2">Email Password Reset Link</button>
                </form>

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <a href="{{ route('login') }}" class="small">Back to Login</a>
                    <a href="{{ route('register') }}" class="small">Create an Account</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>