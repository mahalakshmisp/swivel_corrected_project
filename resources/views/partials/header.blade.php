{{-- resources/views/partials/header.blade.php --}}
{{-- Swivtrek header shared styles --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
<style>
  .navbar { background: #fff; padding: 12px 30px; border-bottom: 1px solid #ddd; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05); position: sticky; top: 0; z-index: 999; }
  .title { font-size: 28px; font-weight: 800; color: #7e3d9c; font-family: 'Outfit', sans-serif; }
  .buttons button { margin-left: 15px; background-color: #7e3d9c; color: white; font-weight: bold; border: none; padding: 10px 22px; border-radius: 25px; cursor: pointer; transition: background 0.3s ease; font-family: 'Outfit', sans-serif; }
  .buttons button:hover { background-color: #9b59b6; }

  /* Enhance login modal to classic login design */
  .auth-modal .modal-content{border-radius:14px;border:none;box-shadow:0 20px 48px rgba(0,0,0,.25)}
  .auth-modal .modal-header{border-bottom:none}
  .auth-modal .form-label{font-weight:600}
  .auth-modal .btn-primary{background-color:#7e3d9c;border-color:#7e3d9c}
  .auth-modal .btn-primary:hover{background-color:#9b59b6;border-color:#9b59b6}
</style>

<div class="navbar">
    <div class="title">Swivtrek</div>
    <div class="buttons">
        @guest
            <button type="button" data-bs-toggle="modal" data-bs-target="#loginModal">LOGIN</button>
            <a href="{{ route('register.redirect', ['to' => url()->current()]) }}"><button>SIGN UP</button></a>
        @endguest
        @auth
            <span>Welcome, {{ Auth::user()->name }}!</span>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <input type="hidden" name="intended" id="logoutIntended">
                <button type="submit">LOGOUT</button>
            </form>
        @endauth
    </div>
</div>

@guest
    {{-- Bootstrap CSS (ensure available for modal) --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    {{-- Login Modal (keep popup only for login) --}}
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered auth-modal">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="loginModalLabel">Login</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="POST" action="{{ route('login') }}" id="loginForm">
            @csrf
            <input type="hidden" name="intended" id="loginIntended">
            <div class="modal-body">
              @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
              @endif

              @if ($errors->any() && request()->is('login'))
                <div class="alert alert-danger">
                  <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif

              <div class="mb-3">
                <label for="loginEmail" class="form-label">Email address</label>
                <input type="email" class="form-control form-control-lg" id="loginEmail" name="email" placeholder="you@example.com" required autofocus>
              </div>

              <div class="mb-2">
                <label for="loginPassword" class="form-label">Password</label>
                <input type="password" class="form-control form-control-lg" id="loginPassword" name="password" placeholder="••••••••" required>
              </div>

              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1" id="remember" name="remember">
                  <label class="form-check-label" for="remember">Remember me</label>
                </div>
                @if (Route::has('password.request'))
                  <a class="small" href="{{ route('password.request') }}">Forgot password?</a>
                @endif
              </div>

              <button type="submit" class="btn btn-primary w-100 py-2">Login</button>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    {{-- Bootstrap JS bundle --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        const current = window.location.href;
        const li = document.getElementById('loginIntended');
        const oi = document.getElementById('logoutIntended');
        if (li) li.value = current;
        if (oi) oi.value = current;
      });
    </script>
@endguest
