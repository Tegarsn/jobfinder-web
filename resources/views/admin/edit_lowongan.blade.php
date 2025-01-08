<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Job Finder Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/css/upload_lowongan.css') }}">
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <h1> <img src="{{ asset('frontend/img/quality_restoration_20240926111905403.png') }}" alt="Logo"></h1>
            <ul>
                <li>
                    <a href="#">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('datafreelancer') }}">
                        <i class="fab fa-black-tie"></i>
                        Freelancer
                    </a>
                </li>
                <li>
                    <a href="{{ route('lowongan') }}">
                        <i class="fas fa-briefcase"></i>
                        Lowongan Pekerjaan
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-clipboard-list"></i>
                        Jasa
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-user"></i>
                        Pengguna
                    </a>
                </li>
                {{-- <li>
                    <a href="#">
                        <i class="fas fa-chart-line"></i>
                        Progress
                    </a>
                </li> --}}
            </ul>
        </div>
        <div class="main-content">
            <div class="header">
                <div class="search-bar">
                    <input placeholder="Type here..." type="text" />
                    <i class="fas fa-search"></i>
                </div>
                <div class="user-actions">
                    <a href="#">Sign In</a>
                    <a href="#"><i class="fas fa-cog"></i></a>
                </div>
            </div>
            <div class="card">
                <h2>Job Finder Dashboard Admin</h2>
                <p>Built by developers</p>
            </div>
            <div class="card">
                <h2>Tambah Lowongan Pekerjaan</h2>
                <form action="{{ route('lowongan.update', $lowongan->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Lowongan</label>
                        <input type="text" id="nama" name="nama" value="{{ $lowongan->nama }}" required>
                    </div>
                    <div class="form-group">
                        <label for="perusahaan">Perusahaan</label>
                        <input type="text" id="perusahaan" name="perusahaan" value="{{ $lowongan->perusahaan }}" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea id="deskripsi" name="deskripsi" required>{{ $lowongan->deskripsi }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" id="kategori" name="kategori" value="{{ $lowongan->kategori }}" required>
                    </div>
                    <div class="form-group">
                        <label for="posisi">Posisi</label>
                        <input type="text" id="posisi" name="posisi" value="{{ $lowongan->posisi }}" required>
                    </div>
                    <div class="form-group">
                        <label for="gaji">Gaji</label>
                        <input type="number" id="gaji" name="gaji" value="{{ $lowongan->gaji }}" required>
                    </div>
                    <div class="form-group">
                        <label for="kota">Kota</label>
                        <input type="text" id="kota" name="kota" value="{{ $lowongan->kota }}" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" id="alamat" name="alamat" value="{{ $lowongan->alamat }}" required>
                    </div>
                    <button type="submit" class="btn-submit">Update Lowongan</button>
                </form>
            </div>

        </div>
    </div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
</body>

</html>