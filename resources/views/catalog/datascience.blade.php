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
    <link rel="stylesheet" href=" {{ asset ('frontend/css/writing_translate.css' ) }}">
</head>

<body>
<header>
    <nav class="navbar">
        <div class="navbar-left">
            <a href="{{ route('landing') }}">
                <img src="{{ asset('frontend/img/quality_restoration_20240926111905403.png') }}" alt="Logo">
            </a>
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
    h header {
        position: sticky;
        top: 0;
        z-index: 1000;
        background-color: white;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .navbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding : 10px 20px;
    }
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

    <section class="home">
        <div class="home-img">
            <img src=" {{ asset ('frontend/img/Banner 3.png') }}" alt="home">
        </div>
    </section>

    <section class="categories">
    <div class="container">
        <a href="{{ route('graphicdesign') }}" class="category-item">
                <span class="material-icons-outlined">brush</span>Graphics & Design
            </a>
            <a href="{{ route('codeprograming') }}" class="category-item"><span class="material-icons-outlined">code</span> Code
                & Programming</a>
            <a href="{{ route ('digitalmarketing')}}" class="category-item"><span
                    class="material-icons-outlined">trending_up</span> Digital Marketing</a>
            <a href="{{ route('videoanimation') }}" class="category-item"><span class="material-icons-outlined">videocam</span>
                Video & Animation</a>
            <a href="{{ route('musicaudio')}}" class="category-item"><span class="material-icons-outlined">audiotrack</span>
                Music & Audio</a>
            <a href="{{ route ('bussiness') }}" class="category-item"><span class="material-icons-outlined">business_center</span>
                Business</a>
            <a href="{{ route ('writingtranslation') }}" class="category-item"><span
                    class="material-icons-outlined">translate</span> Writing & Translation</a>
            <a href="{{ route ('datascience') }} " class="category-item active"><span class="material-icons-outlined">science</span> Data
                & Science</a>
        </div>
    </section>

    <hr class="section-divider">

    <section class="graphic-design-section">
        <h2>Explore Your Data Science</h2>
        <div class="design-container">
            <a href="catalog 8/data_sains.html" class="design-item">
                <img src="{{ asset ('frontend/images/datascience/science.jpg') }}" alt="Data Science">
                <h3>Data Science</h3>
            </a>
            <a href="catalog 8/data_analis.html" class="design-item">
                <img src="{{ asset ('frontend/images/datascience/Analysis.jpg') }}" alt="Data Analysis">
                <h3>Data Analysis</h3>
            </a>
            <a href="catalog 8/data_manajemen.html" class="design-item">
                <img src="{{ asset ('frontend/images/datascience/management.jpg') }}" alt="Data Management">
                <h3>Data Management</h3>
            </a>
            <a href="catalog 8/data_entry.html" class="design-item">
                <img src="{{ asset ('frontend/images/datascience/Entry.jpg') }}" alt="Data Entry">
                <h3>Data Entry</h3>
            </a>
            <a href="catalog 8/data_typing.html" class="design-item">
                <img src="{{ asset ('frontend/images/datascience/typing.jpg') }}" alt="Data Typinng">
                <h3>Data Typing</h3>
            </a>
            <a href="catalog 8/database.html" class="design-item">
                <img src="{{ asset ('frontend/images/datascience/Database.jpg') }}" alt="Database">
                <h3>Database</h3>
            </a>
            <a href="catalog 8/data_typing.html" class="design-item">
                <img src="{{ asset ('frontend/images/datascience/visualization.jpg') }}" alt="Data Visualization">
                <h3>Data Visualization</h3>
            </a>
            <a href="catalog 8/database.html" class="design-item">
                <img src="{{ asset ('frontend/images/datascience/machine.jpg') }}" alt="Machine Learning Models">
                <h3>Machine Learning Models</h3>
            </a>
            </div>
        </div>
    </section>


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
    <script src="assets/js/coba.js"></script>
</body>

</html>