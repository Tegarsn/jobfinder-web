<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href=" {{ asset ('frontend/css/pemesanan.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
            
            <span>Status Freelancer: {{ $freelancerStatus ?? 'Tidak aktif' }}</span>

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
    header {
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
</header>
    <section class="product-card">
        <div class="product-imgs">
            <div class="img-display">
                <div class="img-showcase">
                    <img src=" {{ asset('storage/' . $getjasa->gambar_jasa) }}" alt="shoe image">
                </div>
            </div>
            
        </div>
        <div class="product-content">
            <h3 class="product-title">{{ $getjasa->nama_jasa}}</h3>
            <div class="product-rating">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                <span>4.7(21)</span>
            </div>

            <div class="col text-center">
                <div class="card mb-3 mt-3 rounded-3 shadow-sm border-primary">
                    <div class="card-header py-3 border">
                        <h4 class="my-0 fw-normal">Price</h4>
                    </div>
                    <div class="card-body">
                        <h3 class="card-title pricing-card-title">Rp.{{$getjasa->harga_jasa}}</h3>
                        <ul class="list-unstyled mt-3 mb-2">
                            <li>30 users included</li>
                            <li>15 GB of storage</li>
                            <li>Phone and email support</li>
                            <li>Help center access</li>
                        </ul>
                        <button type="button" class="w-50 btn btn-lg btn-primary"><a href="{{ route('checkout', $getjasa->id)}}" style="color: white; text-decoration: none;">CheckOut</a></button>
                    </div>
                </div>
            </div>

            <div class="product-detail">
                <h3>About This Item:</h3>
                <p>{{ $getjasa->deskripsi_jasa}}</p>
            </div>
        </div>
    </section>

    <!-- Profile and Reviews Container -->
    <div class="profile-reviews-container">
        <!-- Freelancer Profile -->
        <div class="freelancer-profile">
            <!-- Profile Picture -->
            <div class="profile-image">
                <img src="assets/img/OIP (1).jpeg" alt="Profile Image">
            </div>

            <!-- Profile Information (Name, Field, Rating) -->
             
            <div class="profile-info">
                <h2 class="name">{{ $getnama->user_name}}</h2>
                <p class="field">Web Developer</p>
                <p class="rating">Rating: <span class="rating-value">4.5</span> ★</p>
            </div>
        </div>
        <!-- Profile Description -->
        <div class="profile-description">
            <div class="profile-details">
            <p><strong>Email:</strong>{{ $getnama->freelancers_email}}</p>
                <p><strong>From:</strong> Jakarta, Indonesia</p>
                <p><strong>Member Since:</strong> {{ \Carbon\Carbon::parse($getnama->freelancers_created_at)->format('Y') }}</p>
                <p><strong>Languages:</strong> English, Indonesian</p>
                <p><strong>Description:</strong></p>
                <p class="description-text">{{ $getnama->freelancers_skill}}</p>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="reviews-section">
            <h3>Client Reviews</h3>

            <div class="review">
                <div class="review-header">
                    <span class="review-author">John Doe</span>
                    <div class="review-rating">
                        <span>⭐⭐⭐⭐⭐</span>
                    </div>
                </div>
                <p class="review-text">"Wahyu did a fantastic job! Very professional and always on time. Highly
                    recommend!"</p>
            </div>

            <div class="review">
                <div class="review-header">
                    <span class="review-author">Jane Smith</span>
                    <div class="review-rating">
                        <span>⭐⭐⭐⭐⭐</span>
                    </div>
                </div>
                <p class="review-text">"Great experience working with Wahyu. Always clear communication and great
                    results."</p>
            </div>
        </div>
    </div>

    <!-- Related Products Section -->
    <div class="related-products">
        <h3>Related Products</h3><br>
        <div class="row mb-2">
            <div class="col-md-6">
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary-emphasis">World</strong>
                        <h3 class="mb-0">Featured post</h3>
                        <div class="mb-1 text-body-secondary">Nov 12</div>
                        <p class="card-text mb-auto">This is a wider card with supporting text below as a natural
                            lead-in to additional content.</p>
                        <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
                            Continue reading
                            <svg class="bi">
                                <use xlink:href="#chevron-right" />
                            </svg>
                        </a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg"
                            role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                            focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef"
                                dy=".3em">Thumbnail</text>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div
                    class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-success-emphasis">Design</strong>
                        <h3 class="mb-0">Post title</h3>
                        <div class="mb-1 text-body-secondary">Nov 11</div>
                        <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to
                            additional content.</p>
                        <a href="#" class="icon-link gap-1 icon-link-hover stretched-link">
                            Continue reading
                            <svg class="bi">
                                <use xlink:href="#chevron-right" />
                            </svg>
                        </a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg"
                            role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                            focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef"
                                dy=".3em">Thumbnail</text>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/pemesanan.js"></script>
    <script src="https://kit.fontawesome.com/a0e92a2da7.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>