<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-t">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Fashion Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
      /* CSS kustom untuk layout login */
      html,
      body {
        height: 100%;
      }

      body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      /* Wrapper untuk form login */
      .form-signin {
        width: 100%;
        max-width: 400px;
        padding: 15px;
        margin: auto;
      }

      .form-signin .checkbox {
        font-weight: 400;
      }

      .form-signin .form-floating:focus-within {
        z-index: 2;
      }

      /* Atur input agar berdekatan */
      .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }

      .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
    </style>
</head>
<body class="text-center">

<main class="form-signin">
  <form>
    {{-- Anda bisa ganti ini dengan logo --}}
    <i class="bi bi-shop-window fs-1 mb-4"></i> 
    <h1 class="h3 mb-3 fw-normal">FASHION ADMIN</h1>
    <h2 class="h5 mb-3 fw-light">Please sign in</h2>

    {{-- Alert untuk error (contoh) --}}
    {{-- 
    @if ($errors->any())
        <div class="alert alert-danger text-start" role="alert">
            Login failed. Please check your credentials.
        </div>
    @endif 
    --}}

    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" required>
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    
    {{-- Arahkan action form ke route login Anda --}}
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    
    <p class="mt-5 mb-3 text-muted">&copy; {{ date('Y') }}</p>
  </form>
</main>

</body>
</html>