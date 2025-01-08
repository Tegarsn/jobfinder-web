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

        <div class="processing-container">
    <i class="fas fa-clock"></i>
    <p>Pendaftaran anda sedang diproses...</p>
</div>
<style>
.processing-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 60vh; /* Menggunakan tinggi penuh layar */
    text-align: center;
    background-color: #f9f9f9;
    color: #333; /* Warna teks yang lebih tegas */
    font-family: 'Poppins', sans-serif;
}

.processing-container i {
    font-size: 6rem; /* Ukuran ikon lebih besar */
    color: #ff9800; /* Warna oranye untuk ikon */
    margin-bottom: 20px; /* Jarak antara ikon dan teks */
}

.processing-container p {
    font-size: 1.5rem; /* Ukuran teks lebih besar */
    font-weight: bold; /* Teks dibuat lebih tebal */
}


</style>
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