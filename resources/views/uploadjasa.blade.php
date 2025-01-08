<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload Jasa</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/freelance.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/uploadjasa.css') }}">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="navbar-left">
                <a href="coba.html"><img src=" {{ asset('frontend/img/quality_restoration_20240926111905403.png') }}"
                        alt="Logo"></a>
                <a href="{{ route('Dashboardfreelance')}}" class="dashboard">Dashboard</a>
                <div class="custom-select">
                    <select>
                        <option value="">Growth &amp; Marketing</option>
                        <option value=""></option>
                    </select>
                </div>
            </div>
            <div class="navbar-right">
                <a href="#" class="lowongan-pekerjaan">Lowongan Pekerjaan</a>
                <span class="material-icons-outlined icon-mail">mail_outline</span>
                <span class="material-icons-outlined icon-bell">notifications_none</span>
                <a href="#" class="switch">Switch to Common</a>
                <a href="profile.html" class="profile-circle">
                    <img src="profile.png" alt="Profile">
                </a>
            </div>
        </nav>
    </header>

    <main>
        <section class="upload-jasa">
            <div class="container">
                <h2>Upload Jasa</h2>
                @if(session('success'))
        <div style="color: green; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tampilkan Error Validasi -->
    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form untuk Upload Jasa -->
    <form action="{{route ('uploadjasa.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="nama-jasa">Nama Jasa:</label>
        <input type="text" id="nama-jasa" name="nama_jasa" value="{{ old('nama_jasa')}}" required>
    </div>

    <div class="form-group">
        <label for="kategori-jasa">Kategori Jasa:</label>
        <select id="kategori-jasa" name="kategori_jasa" required onchange="updateSubKategori()">
            <option value="" disabled selected>-- Pilih Kategori Jasa --</option>
            <option value="graphicsdesign">Graphics &amp; Design</option>
            <option value="digitalmarketing">Digital Marketing</option>
            <option value="writingtranslation">Writing &amp; Translation</option>
            <option value="videoanimation">Video &amp; Animation</option>
            <option value="musicaudio">Music &amp; Audio</option>
            <option value="codeprograming">Code &amp; Progaming</option>
            <option value="datascience">Data Science</option>
            <option value="bussiness">Business</option>
        </select>
    </div>

    <div class="form-group">
        <label for="sub_kategorijasa">Sub Kategori Jasa:</label>
        <select id="sub_kategorijasa" name="sub_kategorijasa" required>
            <option value="" disabled selected>-- Pilih Sub Kategori Jasa --</option>
        </select>
    </div>

    <div class="form-group">
        <label for="harga-jasa">Harga Jasa (Rp):</label>
        <input type="number" id="harga_jasa" name="harga_jasa" value="{{ old('harga_jasa')}}">
    </div>

    <div class="form-group">
        <label for="deskripsi-jasa">Deskripsi Jasa:</label>
        <textarea id="deskripsi_jasa" name="deskripsi_jasa" rows="10">{{ old('deskripsi_jasa')}}</textarea>
    </div>

    <div class="form-group">
        <label for="gambar-jasa">Upload Gambar Jasa:</label>
        <input type="file" id="gambar-jasa" name="gambar_jasa" accept="image/*" required onchange="previewImage(event)">
    </div>

    <!-- Area untuk Menampilkan Pratinjau Gambar -->
    <div class="form-group">
        <img id="image-preview" src="" alt="Image Preview" style="max-width: 100%; height: auto; display: none;">
    </div>

    <button type="submit">Upload</button>
</form>

            </div>
        </section>
    </main>

    <footer>
        <div class="footer-container">
            <div class="social-icons">
                <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
            </div>

            <div class="footer-links">
                <a href="#">Beranda</a>
                <a href="#">Berita</a>
                <a href="#">Tentang Kami</a>
                <a href="#">Hubungi Kami</a>
            </div>

            <div class="footer-copyright">
                &copy; 2024 JobFinder. All rights reserved.
            </div>
        </div>
    </footer>
</body>
<script>
    const subKategoriOptions = {
        graphicsdesign: [
            { value: 'Logo And Brand Design', text: 'Logo And Brand Design' },
            { value: 'Architecture Design', text: 'Architecture Design' },
            { value: 'Design Interior', text: 'Design Interior'},
            { value: 'Web And App Design', text: 'Web And App Design'},
            { value: '3D Design', text: '3D Design'},
            { value: 'Art And Illustrator Design', text: 'Art And Illustrator Design'},
            { value: 'Photo Editor', text: 'Photo Editor'},
            { value: 'Fashion Editor', text: 'Fashion Editor'},
        ],
        digitalmarketing: [
            { value: 'Ecommerce Marketing', text: 'Ecommerce Marketing' },
            { value: 'Affiliate Marketing', text: 'Affiliate Marketing' },
            { value: 'Paid Social Media', text: 'Paid Social Media' },
            { value: 'Marketing Strategy', text: 'Marketing Strategy' },
            { value: 'Search Engine Optimization', text: 'Search Engine Optimization' },
            { value: 'Content Marketing', text: 'Content Marketing' },
            { value: 'Analytics And Tracking', text: 'Analytics And Tracking' },
            { value: 'Programmatic Advertising', text: 'Programmatic Advertising' },
        ],
        writingtranslation: [
            { value: 'Script Writing', text: 'Script Writing'},
            { value: 'Translation', text: 'Translation'},
            { value: 'Transcription', text: 'Transcription'},
            { value: 'Resume Writing', text: 'Resume Writing'},
            { value: 'Grant Writing', text: 'Grant Writing'},
            { value: 'Audio And Video Translation', text: 'Audio And Video Translation'},
            { value: 'Interpretation Services', text: 'Interpretation Services'},
            { value: 'Technical Writing', text: 'Technical Writing'},
            
        ],
        videoanimation: [
            { value: 'Video Editing', text: 'Video Editing'},
            { value: 'Visual Effect', text: 'Visual Effect'},
            { value: 'Subtitles & Captions', text: 'Subtitles & Captions'},
            { value: 'Subtitle & Captions', text: 'Subtitles & Captions'},
            { value: 'Animation', text: 'Animation'},
            { value: '3D Animation', text: '3D Animation'},
            { value: 'Storyboard Video', text: 'Storyboard Video'},
            { value: 'Motion Graphics', text: 'Motion Graphics'},
        ],
        codeprograming: [
            { value: 'Website Development', text: 'Website Development'},
            { value: 'Mobile Development', text: 'Mobile Development'},
            { value: 'AI Development', text: 'AI Development'},
            { value: 'Cybersecurity', text: 'Cybersecurity'},
            { value: 'Game Development', text: 'Game Development'},
            { value: 'Block Chain And Currency', text: 'Block Chain And Currency'},
            { value: 'Website maintenance', text: 'Website Maintenance'},
            { value: 'Api And Integrations', text: 'Api And Integrations'},
        ],
        musicaudio: [
            { value: 'Songwriters', text: 'Songwriters'},
            { value: 'Singer / Vocalist', text: 'Singer / Vocalist'},
            { value: 'Audio Tuning', text: 'Audio Tuning'},
            { value: 'Voice Over', text: 'Voice Over'},
            { value: 'Mixing And Mastering', text: 'Mixing And Mastering'},
            { value: 'Sound Design', text: 'Sound Design'},
            { value: 'Production Music', text: 'Production Music'},
            { value: 'Editing Audio', text: 'Editing Audio'},

        ],
        bussiness : [
            { value: 'HR Consultant', text: 'HR Consultant'},
            { value: 'Bussiness Plan', text: 'Bussiness Plan'},
            { value: 'Bussiness Consultant', text: 'Bussiness Consultant'},
            { value: 'Accounting And Bookeping', text: 'Accounting And Bookeping'},
            { value: 'Product Management', text: 'Product Management'},
            { value: 'Sales Consultant', text: 'Sales Consultant'},
            { value: 'Brand Strategy', text: 'Brand Strategy'},
            { value: 'Bussiness Idea Consultant', text: 'Bussiness Idea Consultant'},

        ],
        datascience : [
            { value: 'Data Science', text: 'Data Science'},
            { value: 'Data Analysis', text: 'Data Analysis'},
            { value: 'Data Management', text: 'Data Management'},
            { value: 'Data Entry', text: 'Data Entry'},
            { value: 'Data Typing', text: 'Data Typing'},
            { value: 'Database', text: 'Database'},
            { value: 'Data Visualization', text: 'Data Visualization'},
            { value: 'Machine Learning Models', text: 'Machine Learning Models'},
        ]
        // Tambahkan kategori lainnya jika diperlukan
    };

    function updateSubKategori() {
        const kategoriSelect = document.getElementById('kategori-jasa');
        const subKategoriSelect = document.getElementById('sub_kategorijasa');
        const selectedKategori = kategoriSelect.value;

        // Kosongkan pilihan sebelumnya
        subKategoriSelect.innerHTML = '<option value="" disabled selected>-- Pilih Sub Kategori Jasa --</option>';

        // Tambahkan opsi baru berdasarkan kategori yang dipilih
        if (subKategoriOptions[selectedKategori]) {
            subKategoriOptions[selectedKategori].forEach(option => {
                const opt = document.createElement('option');
                opt.value = option.value;
                opt.textContent = option.text;
                subKategoriSelect.appendChild(opt);
            });
        }
    }

    // Fungsi untuk menampilkan pratinjau gambar
    function previewImage(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.onload = function() {
            const imagePreview = document.getElementById('image-preview');
            imagePreview.src = reader.result; // Set gambar hasil pembacaan
            imagePreview.style.display = 'block'; // Tampilkan gambar
        };

        if (file) {
            reader.readAsDataURL(file); // Membaca file sebagai URL data
        }
    }
</script>
</html>