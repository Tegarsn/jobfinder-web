<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Freelancer</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Ganti dengan CSS yang Anda butuhkan -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            margin-top: 20px;
        }

        h1 {
            text-align: center;
            color: #343a40;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        img {
            max-width: 100px;
            max-height: 100px;
            border-radius: 5px; /* Menambahkan sudut bulat pada gambar */
        }

        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }

        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: white;
            text-decoration: none;
            margin-right: 5px;
        }

        .btn-accept {
            background-color: #28a745; /* Warna hijau untuk accept */
        }

        .btn-decline {
            background-color: #dc3545; /* Warna merah untuk decline */
        }
        .status-pengajuan {
    background-color: red;
    color: white; /* Warna teks tetap putih untuk kontras */
    padding: 5px;
    border-radius: 5px;
}

.status-aktif {
    background-color: green;
    color: white; /* Warna teks putih agar terlihat jelas */
    padding: 5px;
    border-radius: 5px;
}


    </style>
</head>
<body>
    <div class="container">
        <h1>Data Freelancer</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Gender</th>
                    <th>Alamat</th>
                    <th>Kota</th>
                    <th>Kode Pos</th>
                    <th>Skill</th>
                    <th>Telepon</th>
                    <th>Status</th>
                    <th>Foto KTP</th>
                    <th>Action</th> <!-- Tambahkan kolom untuk aksi -->
                </tr>
            </thead>
            <tbody>
                @foreach($freelancers as $freelancer)
                    <tr>
                        <td>{{ $freelancer->nama }}</td>
                        <td>{{ \Carbon\Carbon::parse($freelancer->tanggal_lahir)->format('d-m-Y') }}</td>
                        <td>{{ $freelancer->gender }}</td>
                        <td>{{ $freelancer->alamat }}</td>
                        <td>{{ $freelancer->kota }}</td>
                        <td>{{ $freelancer->kode_pos }}</td>
                        <td>{{ $freelancer->skill }}</td>
                        <td>{{ $freelancer->telepon }}</td>
                        <td>
                            <span class="{{ $freelancer->status == 'pengajuan' ? 'status-pengajuan' : ($freelancer->status == 'aktif' ? 'status-aktif' : '') }}">
                                {{ $freelancer->status }}
                            </span>
                        </td>
                        <td>
                        <img src="{{ asset('storage/' . $freelancer->foto_ktp) }}" alt="Foto KTP" class="img-fluid" onerror="this.onerror=null; this.src='/images/default.png';">

                            <!-- <img src="{{ asset('storage/' . $freelancer->foto_ktp) }}" alt="Foto KTP" class="img-fluid"> -->
                          


                        </td>
                        <td>
    <a href="{{ route('viewfreelancer', $freelancer->id) }}" class="btn btn-accept">View</a>
</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
