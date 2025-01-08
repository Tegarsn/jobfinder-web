<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Finder Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/index.css') }}">
</head>
<body>
    <div class="container">
        <div class="left-side">
            <img src="{{ asset('frontend/img/quality_restoration_20240926092451101.png') }}" alt="Login Illustration">
        </div>
        <div class="right-side">
            <h2>Selamat Datang di</h2>
            <h1><span class="job-finder">Job Finder</span></h1>

            <!-- Form Login -->
            <form action="{{ route('login.submit') }}" method="POST">
                @csrf <!-- Token CSRF Laravel -->
                
                <!-- Input Email -->
                <div class="input-group">
                    <label for="email">Email</label>
                    <div class="input-container">
                        <input type="email" id="email" name="email" placeholder="Masukkan email anda" required value="{{ old('email') }}">
                        <i class="icon-email"></i>
                    </div>
                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                
                <!-- Input Password -->
                <div class="input-group">
                    <label for="password">Password</label>
                    <div class="input-container">
                        <input type="password" id="password" name="password" placeholder="Masukkan password anda" required>
                        <i class="icon-password"></i>
                    </div>
                    @error('password')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                
                <!-- Remember Me -->
                <div class="remember-me">
                    <input type="checkbox" id="remember-me" name="remember">
                    <label for="remember-me">Ingat Saya</label>
                </div>

                <!-- Button Login -->
                <button type="submit" class="login-btn">Login</button>
            </form>

            <p class="signup-link">
                Belum Punya Akun? <a href="{{ route('Registerform') }}">Daftar Sekarang</a>
            </p>
        </div>
    </div>
</body>
</html>




<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Finder Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/css/index.css')}}">
</head>
<body>
    <div class="container">
        <div class="left-side">
            <img src="assets/images/login-illustration.png" alt="Login Illustration">
        </div>
        <div class="right-side">
            <h2>Selamat Datang di</h2>
            <h1><span class="job-finder">Job Finder</span></h1>

            <form action="#" method="post">
                <div class="input-group">
                    <label for="email">Email</label>
                    <div class="input-container">
                        <input type="email" id="email" placeholder="Masukkan email anda" required>
                        <i class="icon-email"></i>
                    </div>
                </div>
                
                <div class="input-group">
                    <label for="password">Password</label>
                    <div class="input-container">
                        <input type="password" id="password" placeholder="Masukkan password anda" required>
                        <i class="icon-password"></i>
                    </div>
                </div>                
                <div class="remember-me">
                    <input type="checkbox" id="remember-me">
                    <label for="remember-me">Ingat Saya</label>
                </div>

                <button type="submit" class="login-btn" href="#">Login</button>
            </form>

            <p class="signup-link">
                Belum Punya Akun? <a href="{{ route('Registerform')}}">Daftar Sekarang</a>
            </p>
        </div>
    </div>
</body>
</html> -->
