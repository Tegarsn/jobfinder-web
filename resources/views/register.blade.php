<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Finder - Buat Akun</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/register.css') }}">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1>Buat Akun Anda</h1>
            <p>Sudah Punya Akun? <a href="{{route('formlogin')}}">Masuk Sekarang</a></p>

            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Registration Form -->
            <form action="{{ route('register') }}" method="POST">
                @csrf  <!-- CSRF token for security -->
                <div class="input-group">
                    <label for="name">Nama</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan Nama Anda">
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan Email Anda">
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan Password Anda">
                    <span class="password-hint">Gunakan 8 karakter atau lebih dengan campuran huruf, angka & simbol</span>
                </div>
                <div class="input-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password Anda">
                </div>
                <button type="submit">Buat Akun</button>
            </form>

            <p class="terms">
                Dengan membuat akun, Anda menyetujui 
                <a href="#">Ketentuan Penggunaan</a> dan 
                <a href="#">Kebijakan Privasi</a>.
            </p>
        </div>
    </div>
</body>
</html>
