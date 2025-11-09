<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"> {{-- Perbaikan: utf-8 --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Fashion Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
      /* ... CSS Anda (tidak berubah) ... */
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
  {{-- 
    1. Tambahkan method="POST"
    2. Tambahkan action yang mengarah ke route 'login' (yang akan ditangani oleh FrontAuthController)
  --}}
  <form method="POST" action="{{ route('login') }}">
    {{-- 3. Tambahkan @csrf untuk keamanan (WAJIB) --}}
    @csrf

    <i class="bi bi-shop-window fs-1 mb-4"></i> 
    <h1 class="h3 mb-3 fw-normal">FASHION ADMIN</h1>
    <h2 class="h5 mb-3 fw-light">Please sign in</h2>

    {{-- Alert untuk error login (dari controller) --}}
    @if(session('error'))
        <div class="alert alert-danger text-start" role="alert">
            {{ session('error') }}
        </div>
    @endif
    
    {{-- Alert untuk error validasi (jika email/password kosong) --}}
    @if ($errors->any())
        <div class="alert alert-danger text-start" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif 


    <div class="form-floating">
      {{-- 4. Tambahkan name="email" --}}
      <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      {{-- 5. Tambahkan name="password" --}}
      <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        {{-- 6. Tambahkan name="remember" --}}
        <input type="checkbox" name="remember"> Remember me
      </label>
    </div>
    
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    
    <p class="mt-5 mb-3 text-muted">&copy; {{ date('Y') }}</p>
  </form>
</main>

</body>
</html>
