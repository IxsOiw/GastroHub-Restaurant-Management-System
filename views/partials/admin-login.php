<!doctype html>
<html lang="sk">
 
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bistro · Admin Login</title>
 
  <link rel="shortcut icon" href="/assets/bistro.png" type="image/x-icon" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Khula:wght@300;400;600;700;800&display=swap" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="/css/admin.css" />
</head>
 
<body>
 
  <div class="login-card">
 
    <!-- ── Top bar ── -->
    <div class="login-top">
      <img src="/assets/bistro-white.png" alt="Bistro logo" />
      <h1>Admin Panel</h1>
      <p>Prihlás sa pre správu reštaurácie</p>
    </div>
 
    <!-- ── Form ── -->
    <div class="login-body">
 
      <!-- Error (zobrazí sa pri zlom hesle z PHP) -->
      <div class="error-msg" id="error-msg">
        <i class="bi bi-exclamation-circle"></i>
        Nesprávne meno alebo heslo.
      </div>
 
      <form action="/admin/login" method="POST">
 
        <!-- CSRF token — doplniť v PHP -->
        <!-- <input type="hidden" name="csrf_token" value="<?= $csrfToken ?>"> -->
 
        <div style="display:flex; flex-direction:column; gap:18px;">
 
          <div class="field">
            <label for="email">Email</label>
            <div class="input-wrap">
              <i class="bi bi-person"></i>
              <input
                type="email"
                id="email"
                name="email"
                placeholder="admin@bistro.sk"
                autocomplete="email"
                required
              />
            </div>
          </div>
 
          <div class="field">
            <label for="password">Heslo</label>
            <div class="input-wrap">
              <i class="bi bi-lock"></i>
              <input
                type="password"
                id="password"
                name="password"
                placeholder="••••••••"
                autocomplete="current-password"
                required
              />
              <button type="button" class="toggle-pw" onclick="togglePassword()" aria-label="Zobraziť heslo">
                <i class="bi bi-eye" id="pw-icon"></i>
              </button>
            </div>
          </div>
 
          <button type="submit" class="btn-login">
            Prihlásiť sa
          </button>
 
        </div>
 
      </form>
 
    </div>
 
    <div class="login-footer">
      <a href="/"><i class="bi bi-arrow-left"></i> Späť na web</a>
    </div>
 
  </div>
 
  <script>
    function togglePassword() {
      const input = document.getElementById('password');
      const icon  = document.getElementById('pw-icon');
      const show  = input.type === 'password';
      input.type  = show ? 'text' : 'password';
      icon.className = show ? 'bi bi-eye-slash' : 'bi bi-eye';
    }
  </script>
 
</body>
</html>
