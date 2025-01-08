<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Finder</title>
    <!-- Link to Google Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <!-- Link to Material Icons Outlined -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset ('frontend/css/logo.css') }}">
</head>
<body>
    <!-- Navbar -->
    <header>
        <nav class="navbar">
            <div class="navbar-left">
                <a href="{{ route('landing') }} "><img src="{{ asset ('frontend/img/quality_restoration_20240926111905403.png') }}" alt="Logo"></a>
                <div class="search-bar">
                    <form>
                        <input type="text" name="search" id="search" placeholder="Masukkan Kata Kunci">
                        <input type="submit" name="submit" value="Cari">
                    </form>
                </div>
            </div>
            <div class="navbar-right">
            <a href="#" class="lowongan-pekerjaan">Lowongan Pekerjaan</a>
            <span class="material-icons-outlined icon-mail">mail_outline</span>
            <span class="material-icons-outlined icon-bell">notifications_none</span>
            <!-- <a href="{{ route('daftarfreelance') }}" class="freelancer">Daftar Freelancer</a> -->
            <p>Status Freelancer: {{ $freelancerStatus ?? 'Tidak aktif' }}</p>

            @if(isset($freelancerStatus) && $freelancerStatus === 'aktif')
                <a href="{{ route('Dashboardfreelance') }}" class="freelancer">Dashboard</a>
            @else
                <a href="{{ route('daftarfreelance') }}" class="freelancer">Daftar Freelancer</a>
            @endif


            <!-- Profile Dropdown -->
            <div class="profile-dropdown">
                <a href="javascript:void(0);" class="profile-circle" onclick="toggleDropdown()">
                    <img src="profile.png" alt="Profile">
                </a>
                <div id="profileDropdownContent" class="dropdown-content">
                    <a href="profile.html">Profil</a>
                    <a href="#"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- CSS -->
<style>
   .profile-circle {
    width: 40px; 
    height: 40px;
    display: inline-block; 
}
    .profile-dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        background-color: #f9f9f9;
        min-width: 120px;
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }
    .img-landscape {
        width: 100%; /* Lebar penuh dari container */
        height: 200px; /* Tinggi yang tetap untuk tampilan landscape */
        object-fit: cover; /* Memastikan gambar memenuhi area tanpa distorsi */
        object-position: center; /* Posisi fokus gambar */
        border-radius: 5px; /* (Opsional) Sudut melengkung */
    }
    .card {
    width: 300px;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 10px;
    transition: background-color 0.3s ease, transform 0.3s ease;
  }

  .card:hover {
    background-color: #f0f8ff;
    transform: translateY(-5px);
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  }

    .card-footer{
        margin-top:20px;
    }
</style>
<!-- Javascript untuk dropdown -->
<script>
    function toggleDropdown() {
        var dropdownContent = document.getElementById("profileDropdownContent");
        dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
    }

    // Close dropdown if clicked outside
    window.onclick = function(event) {
        if (!event.target.matches('.profile-circle img')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            for (var i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.style.display === "block") {
                    openDropdown.style.display = "none";
                }
            }
        }
    }
</script>

    <nav class="breadcrumb">
        <a href="{{ route('graphicdesign') }}"><i class="fas fa-home"></i></a>
        <span>/</span>
        <a href="{{ route('graphicdesign') }}">Graphic Design</a>
    </nav>

    <!-- Home Section -->
    <section class="home">
        <div class="home-content">
            <h1>Explore Your Web & App Design Worker</h1>
            <p>Transform your visions into reality with captivating design!</p>
        </div>

        <div class="home-img">
            <img src="../assets/img/quality_restoration_20240926092451101.png" alt="">
        </div>
    </section>

    <hr class="section-divider">

    <!-- Filters -->
    <section class="filters">
        <div class="filter-buttons">
            <select>
                <option value="worker">Worker Details</option>
                <option value="experience">Experience</option>
                <option value="skills">Skills</option>
            </select>
            <select>
                <option value="budget">Budget</option>
                <option value="low">Below $50</option>
                <option value="mid">From $50 - $150</option>
                <option value="high">Above $150</option>
            </select>
            <select>
                <option value="lead-time">Lead Time</option>
                <option value="1day">Within 1 Day</option>
                <option value="1week">Within 1 Week</option>
                <option value="1month">Within 1 Month</option>
            </select>
        </div>
        <p class="results-count">102,000 Results</p>
    </section>

    <!-- Cards Section -->
    <section class="cards">
    <div class="card-container">
        @foreach($getjasa as $getjasa)
        <div class="card">
            <img src="{{ asset('storage/' . $getjasa->gambar_jasa) }}" alt="Foto JASA" 
                class="img-fluid img-landscape" onerror="this.onerror=null; this.src='/images/default.png';">
            <div class="card-content">
                <p>{{ $getjasa->nama_jasa }}</p>
                <div class="profile-photo">
                <!-- Menampilkan nama pengguna yang login -->
                    <!-- <a href="#">
                        <img src="profile.png" alt="User Photo">
                    </a> -->
                </div>
            </div>
            <div class="card-footer">
                <span>4.5 Rating</span>
                <span>{{ $getjasa->harga_jasa }} Rp</span>
                <a href="">Detail</a>
            </div>
            <div class="card-footer">
            <p>{{ $user->name }}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>

    <!-- Footer -->
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

    <script src="https://kit.fontawesome.com/a0e92a2da7.js" crossorigin="anonymous"></script>
</body>
</html>
