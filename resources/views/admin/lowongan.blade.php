<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Job Finder Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('frontend/css/lowongan.css') }}">
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
                <h2>Data Tabel Lowongan Pekerjaan</h2>
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lowongan</th>
                            <th>Perusahaan</th>
                            <th>Deskripsi</th>
                            <th>Kategori</th>
                            <th>Posisi</th>
                            <th>Gaji</th>
                            <th>Kota</th>
                            <th>Alamat</th>
                            <th>Gambar</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lowongans as $lowongan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $lowongan->nama}}</td>
                            <td>{{ $lowongan->perusahaan }}</td>
                            <td>{{ $lowongan->deskripsi }}</td>
                            <td>{{ $lowongan->kategori }}</td>
                            <td>{{ $lowongan->posisi }}</td>
                            <td>{{ $lowongan->gaji }}</td>
                            <td>{{ $lowongan->kota }}</td>
                            <td>{{ $lowongan->alamat }}</td>
                            <td><img src="{{ asset('storage/'.$lowongan->gambar) }}" alt="gambar" width="100"></td>
                            <td>
                                <a href="{{ route('lowongan.edit', $lowongan->id) }}" class="btn-edit">Edit</a>
                                <form action="{{ route('lowongan.delete', $lowongan->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus lowongan ini?')">Hapus</button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
                <button class="btn-add">
                    <a href="{{ route('upload_lowongan') }}" style="text-decoration: none; color: inherit;">
                        Tambah Lowongan
                    </a>
                </button>
            </div>
        </div>
    </div>
</body>

</html>