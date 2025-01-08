<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Freelancer</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <!-- External CSS -->
    <link rel="stylesheet" href="{{ asset ('frontend/css/daftar_freelance.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet" />
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="navbar-left">
                <a href="coba.html"><img src="{{ asset ('frontend/img/quality_restoration_20240926111905403.png') }}" alt="Logo"></a>
            </div>
            <div class="navbar-right">
                <a href="#" class="lowongan-pekerjaan">Lowongan Pekerjaan</a>
                <span class="material-icons-outlined icon-mail">mail_outline</span>
                <span class="material-icons-outlined icon-bell">notifications_none</span>
                <a href="#" class="profile-circle">
                    <img src="profile.png" alt="Profile">
                </a>
            </div>
        </nav>
    </header>
    <div class="container">
        <h1>
            Daftar Freelancer
        </h1>
        <p>
            Tell us a bit about yourself. This information will appear on your public profile, so that potential buyers
            can get to know you better.
        </p>
        <hr />
        <!-- <div class="form-group">
            <label for="first-name">
                Name
            </label>
            <div class="input-group">
                <input id="first-name" placeholder="First name" type="text" />
                <input id="last-name" placeholder="Last name" type="text" />
            </div>
        </div> -->
        <form action="{{ route('freelancers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="username">Nama</label>
        <input id="username" name="nama" value="{{ old('nama') }}" placeholder="Sesuaikan dengan nama yang ada pada ktp" type="text" />
        @error('nama')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="tanggal_lahir">Tanggal Lahir</label>
        <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" placeholder="Sesuaikan tanggal lahir di ktp">
        @error('tanggal_lahir')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="gender">Gender</label>
        <select id="gender" name="gender">
            <option value="" disabled selected>Pilih jenis kelamin</option>
            <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
            <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
        </select>
        @error('gender')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" id="alamat" name="alamat" value="{{ old('alamat') }}" placeholder="Sesuaikan alamat yang ada di ktp anda">
        @error('alamat')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="kota">Kota</label>
        <input type="text" id="kota" name="kota" value="{{ old('kota') }}" placeholder="Sesuaikan kota yang ada di ktp anda">
        @error('kota')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="kode_pos">Kode Pos</label>
        <input type="number" id="kode_pos" name="kode_pos" value="{{ old('kode_pos') }}" placeholder="kode pos">
        @error('kode_pos')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="skill">Skill</label>
        <textarea id="skill" name="skill" placeholder="Jelaskan skill dan kemampuan anda">{{ old('skill') }}</textarea>
        @error('skill')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="telepon">Telepon</label>
        <input type="number" id="telepon" name="telepon" value="{{ old('telepon') }}" placeholder="Masukkan nomor telepon anda">
        @error('telepon')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="foto_ktp">Ktp/ID</label>
        <label class="file-label" for="foto_ktp">
            <div class="placeholder show">
                <i class="fas fa-id-card"></i>
                <span>Upload Ktp/ID</span>
            </div>
            <img alt="Ktp/ID Preview" class="hide" id="ktp-id-preview" src="#" style="display: none; max-width: 80%; max-height: 100%; margin-top: 5px; cursor: pointer; display: block;" />
            <input name="foto_ktp" accept="image/*" id="foto_ktp" type="file" required />
        </label>
        @error('foto_ktp')
            <div class="error">{{ $message }}</div>
        @enderror
    </div>

    <button class="submit-btn">Submit Freelancer</button>
</form>

            <script>
document.getElementById('foto_ktp').addEventListener('change', function(event) {
    const file = event.target.files[0]; // Get the selected file
    const preview = document.getElementById('ktp-id-preview'); // Get the image element

    if (file) {
        const reader = new FileReader(); // Create a FileReader instance

        reader.onload = function(e) {
            preview.src = e.target.result; // Set the image source to the file result
            preview.style.display = 'block'; // Show the image
        }

        reader.readAsDataURL(file); // Read the file as a data URL
    } else {
        preview.src = '#'; // Reset the src if no file is selected
        preview.style.display = 'none'; // Hide the image
    }
});
</script>
 <!-- <div class="form-group">
            <label for="foto_ktp">
                Ktp/ID
            </label>
            <label class="file-label" for="foto_ktp">
                <div class="placeholder show">
                    <i class="fas fa-id-card">
                    </i>
                    <span>
                        Upload Ktp/ID
                    </span>
                </div>
                <img alt="Ktp/ID Preview" class="hide" id="ktp-id-preview" src="#" />
                <input name="foto_ktp" accept="image/*" id="foto_ktp" type="file"  required/>
            </label>
        </div> -->
        <!-- <div class="form-group">
    <label for="foto_ktp">Ktp/ID</label>
    <label class="file-label" for="foto_ktp">
        <div class="placeholder show">
            <i class="fas fa-id-card"></i>
            <span>Upload Ktp/ID</span>
        </div>
        <img alt="Ktp/ID Preview" class="hide" id="ktp-id-preview" src="#" style="display: none; max-width: 8000px; margin-top: 5px;" />
        <input name="foto_ktp" accept="image/*" id="foto_ktp" type="file" required />
    </label>
</div> -->
        
    </div>
    <div class="footer">
        <div class="footer-links">
            <div>
                <h4>
                    Categories
                </h4>
                <ul>
                    <li>
                        <a href="#">
                            Graphics &amp; Design
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Digital Marketing
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Writing &amp; Translation
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Video &amp; Animation
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Music &amp; Audio
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Programming &amp; Tech
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Data
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Business
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <h4>
                    About
                </h4>
                <ul>
                    <li>
                        <a href="#">
                            Careers
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Press &amp; News
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Partnerships
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Privacy Policy
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Terms of Service
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Intellectual Property Claims
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Investor Relations
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <h4>
                    Support
                </h4>
                <ul>
                    <li>
                        <a href="#">
                            Help &amp; Support
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Trust &amp; Safety
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <h4>
                    Community
                </h4>
                <ul>
                    <li>
                        <a href="#">
                            Customer Success Stories
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Community Hub
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Forum
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Events
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Blog
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Influencers
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Affiliates
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Podcast
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Invite a Friend
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Become a Seller
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Community Standards
                        </a>
                    </li>
                </ul>
            </div>
            <div>
                <h4>
                    More From Job Finder
                </h4>
                <ul>
                    <li>
                        <a href="#">
                            Get Inspired
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            ClearVoice
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Content Marketing
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Workspace
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Invoice Software
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Learn
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Online Courses
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Working Not Working
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-second">
        <div class="footer-container">
            <div class="social-icons">
                <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                <a href="#" target="_blank"><i class="fa fa-instagram"></i></a>
            </div>
    
            <div class="footer-path">
                <a href="#">Beranda</a>
                <a href="#">Berita</a>
                <a href="#">Tentang Kami</a>
                <a href="#">Hubungi Kami</a>
            </div>

            <div class="footer-copyright">
                &copy; 2024 JobFinder. All rights reserved.
            </div>
        </div>
    </div>
    <script>
        document.getElementById('profile-picture').addEventListener('change', function (event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.getElementById('profile-picture-preview');
                img.src = e.target.result;
                img.classList.add('show');
                document.querySelector('.file-label .placeholder').classList.add('hide');
            };
            reader.readAsDataURL(file);
        });

        document.getElementById('ktp-id').addEventListener('change', function (event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            reader.onload = function (e) {
                const img = document.getElementById('ktp-id-preview');
                img.src = e.target.result;
                img.classList.add('show');
                document.querySelector('.file-label .placeholder').classList.add('hide');
            };
            reader.readAsDataURL(file);
        });
    </script>
    <script src="https://kit.fontawesome.com/a0e92a2da7.js" crossorigin="anonymous"></script>
</body>

</html>