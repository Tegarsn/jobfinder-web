<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <!-- Link to Google Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <!-- Link to Material Icons Outlined -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/gaphic.css') }}">
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="navbar-left">
                <a href="coba.html"><img src=" {{asset ('frontend/img/quality_restoration_20240926111905403.png') }}" alt="Logo"></a>
            </div>
            <div class="navbar-right">
                <a href="#" class="lowongan-pekerjaan">Lowongan Pekerjaan</a>
                <span class="material-icons-outlined icon-mail">mail_outline</span>
                <span class="material-icons-outlined icon-bell">notifications_none</span>
                <a href="#" class="freelancer">Daftar Freelancer</a>
                <a href="profile.html" class="profile-circle">
                    <img src="profile.png" alt="Profile">
                </a>
            </div>
        </nav>
    </header>

    <section class="home">
        <div class="home-img">
            <img src="{{ asset('frontend/img/quality_restoration_20240930161550433.png') }}" alt="home">
        </div>
    </section>

    <section class="categories">
        <div class="container">
            <a href="graphic_design.html" class="category-item active">
                <span class="material-icons-outlined">brush</span>Graphics & Design
            </a>
            <a href="code-programming.html" class="category-item"><span class="material-icons-outlined">code</span> Code
                & Programming</a>
            <a href="digital-marketing.html" class="category-item"><span
                    class="material-icons-outlined">trending_up</span> Digital Marketing</a>
            <a href="video-animation.html" class="category-item"><span class="material-icons-outlined">videocam</span>
                Video & Animation</a>
            <a href="music-audio.html" class="category-item"><span class="material-icons-outlined">audiotrack</span>
                Music & Audio</a>
            <a href="business.html" class="category-item"><span class="material-icons-outlined">business_center</span>
                Business</a>
            <a href="writing-translation.html" class="category-item"><span
                    class="material-icons-outlined">translate</span> Writing & Translation</a>
            <a href="data-science.html" class="category-item"><span class="material-icons-outlined">science</span> Data
                & Science</a>
        </div>
    </section>

    <hr class="section-divider">

    <section class="graphic-design-section">
        <h2>Explore Your Graphic & Design</h2>
        <div class="design-container">
            <div class="design-item">
                <img src=" {{ asset ('frontend/img/1_OaC2biS7B9fjX_NwAARAqA.jpg') }}" alt="Logo And Brand Design">
                <h3>Logo And Brand Design</h3>
            </div>
            <div class="design-item">
                <img src="{{ asset ('frontend/img/2820590.jpg') }}" alt="Architecture Design">
                <h3>Architecture Design</h3>
            </div>
            <div class="design-item">
                <img src="{{ asset ('frontend/img/OIP (1).jpeg') }}" alt="Design Interior">
                <h3>Design Interior</h3>
            </div>
            <div class="design-item">
                <img src="{{ asset ('frontend/img/web-app-design.png') }}" alt="Web And App Design">
                <h3>Web And App Design</h3>
            </div>
            <div class="design-item">
                <img src="assets/img/3d-design.png" alt="3D Design">
                <h3>3D Design</h3>
            </div>
            <div class="design-item">
                <img src="assets/img/art-illustrator-design.png" alt="Art And Illustrator Design">
                <h3>Art And Illustrator Design</h3>
            </div>
            <div class="design-item">
                <img src="assets/img/photo-editor.png" alt="Photo Editor">
                <h3>Photo Editor</h3>
            </div>
            <div class="design-item">
                <img src="assets/img/fashion-editor.png" alt="Fashion Editor">
                <h3>Fashion Editor</h3>
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