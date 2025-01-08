<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Freelancer</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        img {
            max-width: 900px;
            height: auto;
        }
        .container {
            margin-top: 20px;
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            color: #343a40;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        img {
            max-width: 150px;
            max-height: 150px;
            border-radius: 5px;
            cursor: pointer; 
        }
        .btn-back {
            display: inline-block;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-back:hover {
            background-color: #0056b3;
        }
      
        .modal-lg {
            max-width: 80%; 
        }

        .modal-body img {
            max-width: 100%; 
            height: auto; 
        }
        .btn-terima, .btn-tolak {
            margin-left: 10px; 
        }

        .btn a {
            text-decoration: none;
            color: inherit;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Detail Freelancer</h1>

        <div class="form-group">
            <label>Nama:</label>
            <input type="text" value="{{ $freelancer->nama }}" readonly>
        </div>

        <div class="form-group">
            <label>Tanggal Lahir:</label>
            <input type="text" value="{{ \Carbon\Carbon::parse($freelancer->tanggal_lahir)->format('d-m-Y') }}" readonly>
        </div>

        <div class="form-group">
            <label>Gender:</label>
            <input type="text" value="{{ $freelancer->gender }}" readonly>
        </div>

        <div class="form-group">
            <label>Alamat:</label>
            <textarea readonly>{{ $freelancer->alamat }}</textarea>
        </div>

        <div class="form-group">
            <label>Kota:</label>
            <input type="text" value="{{ $freelancer->kota }}" readonly>
        </div>

        <div class="form-group">
            <label>Kode Pos:</label>
            <input type="text" value="{{ $freelancer->kode_pos }}" readonly>
        </div>

        <div class="form-group">
            <label>Skill:</label>
            <input type="text" value="{{ $freelancer->skill }}" readonly>
        </div>

        <div class="form-group">
            <label>Telepon:</label>
            <input type="text" value="{{ $freelancer->telepon }}" readonly>
        </div>

        <div class="form-group">
            <label>Foto KTP:</label>
            <br>
            <img src="{{ asset('storage/' . $freelancer->foto_ktp) }}" alt="Foto KTP" data-toggle="modal" data-target="#imageModal">
        </div>

        <div class="d-flex justify-content-center mt-3">
            <a href="{{ route('datafreelancer') }}" class="btn-back">Kembali</a>
            <form action="{{ route('freelancer.terima', $freelancer->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success btn-terima">Terima</button>
            </form>
            <form action="{{ route('freelancer.destroy', $freelancer->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus freelancer ini?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-tolak">Tolak</button>
    </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document"> <!-- Tambahkan kelas modal-lg di sini -->
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageModalLabel">Foto KTP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center"> <!-- Tambahkan kelas text-center untuk menengahkan gambar -->
                    <img src="{{ asset('storage/' . $freelancer->foto_ktp) }}" alt="Foto KTP" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
