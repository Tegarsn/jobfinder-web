<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Freelance</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    {{-- <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet" /> --}}
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/css/freelance.css') }}">
</head>

<body>

    <header>
        <nav class="navbar">
            <div class="navbar-left">
                <<a href="{{ route('landing') }}">
                <img src="{{ asset('frontend/img/quality_restoration_20240926111905403.png') }}" alt="Logo">
            </a>
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
                <a href="{{route ('formuploadjasa')}}" class="switch">Upload Jasa</a>
                <a href="profile.html" class="profile-circle">
                    <img src="profile.png" alt="Profile">
                </a>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="profile-card">
            <div class="profile-info">
                <img alt="Profile Picture" height="50"
                    src="https://storage.googleapis.com/a1aa/image/z5kehtkshhVjHiEzD0pFsbUDoMXyb4zoRZTGdbhPITx062zJA.jpg"
                    width="50" />
                <div>
                    <div class="name">
                        {{$user->name}}
                    </div>
                    <div class="status">
                        N/A
                    </div>
                </div>
            </div>
            <hr>
            <div class="stats">
                <div class="stat">
                    <div class="label">
                        Inbox response rate
                    </div>
                    <div id="myProgress1">
                        <div id="myBar1"></div>
                    </div>
                    <div class="value">
                        100%
                    </div>
                </div>
                <div class="stat">
                    <div class="label">
                        Inbox response time
                    </div>
                    <div id="myProgress2">
                        <div id="myBar2"></div>
                    </div>
                    <div class="value">
                        N/A
                    </div>
                </div>
                <div class="stat">
                    <div class="label">
                        Order response rate
                    </div>
                    <div id="myProgress3">
                        <div id="myBar3"></div>
                    </div>
                    <div class="value">
                        100%
                    </div>
                </div>
                <div class="stat">
                    <div class="label">
                        Delivered on time
                    </div>
                    <div id="myProgress4">
                        <div id="myBar4"></div>
                    </div>
                    <div class="value">
                        100%
                    </div>
                </div>
                <div class="stat">
                    <div class="label">
                        Order completion
                    </div>
                    <div id="myProgress5">
                        <div id="myBar5"></div>
                    </div>
                    <div class="value">
                        100%
                    </div>
                </div>
                <hr>
                <div class="stat">
                    <div class="label">
                        Earned in March
                    </div>
                    <div class="value">
                        $0
                    </div>
                </div>
                
            </div>
            
        </div>
        <div class="inbox">
            <span>
                Inbox
            </span>
            <div class="Viewall">
                <a href="#">View All</a>
            </div>
        </div>
        <div class="social-card">
            <div class="social-links">
                <span>
                    Like your social network
                </span>
                <div class="social">
                    <a href="#">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-youtube"></i>
                    </a>
                    <a href="#">
                        <i class="fab fa-pinterest"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="order">  
         <div style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
            @forelse ($orders as $order)
        <div style="border: 1px solid #ddd; border-radius: 15px; padding: 20px; width: 350px; box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); background-color: #fff; transition: transform 0.3s; hover:transform: scale(1.05);">
            <!-- Header Card -->
            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 15px;">
                <h3 style="margin: 0; color: #333;">{{ $order->nama_user }}</h3>
                <span style="background-color: {{ $order->status_pembayaran === 'Lunas' ? '#28a745' : '#dc3545' }}; color: white; padding: 5px 10px; border-radius: 15px; font-size: 12px;">
                    {{ $order->status_pembayaran === 'Lunas' ? 'Lunas' : 'Belum Lunas' }}
                </span>
            </div>

            <!-- Informasi Order -->
            <p><strong>Nama Jasa:</strong> {{ $order->nama_jasa }}</p>
            <p><strong>Email:</strong> {{ $order->email }}</p>
            <p><strong>Phone:</strong> {{ $order->phone }}</p>
            <p><strong>Deskripsi:</strong> {{ $order->deskripsi_order }}</p>
            <p><strong>Metode Pembayaran:</strong> {{ $order->metode_pembayaran }}</p>
            <p><strong>Harga Jasa:</strong> {{ number_format($order->harga_jasa, 0, ',', '.') }}</p>
            <p><strong>Tanggal Order:</strong> {{ $order->created_at->format('d-m-Y') }}</p>

            <!-- Status Order -->
            <div style="margin-top: 1px;">
                <p><strong>Status Order:</strong></p>
                <div style="background-color: #f0f0f0; border-radius: 10px; overflow: hidden; height: 10px; width: 100%;">
                    <div style="width: {{ $order->status_order === 'Pending' ? '30%' : ($order->status_order === 'Diproses' ? '60%' : '100%') }}; background-color: {{ $order->status_order === 'Selesai' ? '#28a745' : '#ffc107' }}; height: 100%;"></div>
                </div>
                <p style="margin-top: 5px; font-size: 12px; color: #555;">{{ $order->status_order }}</p>
            </div>

            <!-- Tombol Aksi -->
            <div style="margin-top: 20px; display: flex; justify-content: space-between; align-items: center;">
            <form action="" method="POST" style="margin: 0;">
                @csrf
                <input type="hidden" name="order_id" value="{{ $order->id }}">
                <button type="submit" style="background-color: #28a745; color: white; border: none; padding: 10px 15px; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">
                    <i style="margin-right: 5px;">✔️</i> Terima
                </button>
            </form>

                <form action="" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" style="background-color: #dc3545; color: white; border: none; padding: 10px 15px; border-radius: 5px; cursor: pointer; transition: background-color 0.3s;">
                        <i style="margin-right: 5px;">❌</i> Tolak
                    </button>
                </form>
            </div>
        </div>
    @empty
        <p style="font-size: 18px; color: #555;">Tidak ada data order.</p>
    @endforelse
</div>

        </div>
        {{-- <div class="orders">
            <div class="active-order-card">
                <div class="left-section">
                    <div class="title">
                        Active orders
                    </div>
                    <div class="count">
                        -0 ($0)
                    </div>
                </div>
                <div class="right-section">
                    <div class="select">
                        <select name="active-orders" id="orders">
                            <option value="orders">Active orders</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="complete-order-card">
                <div class="title">
                    Complete orders
                </div>
                <div class="count">
                    -0 ($0)
                </div>
            </div>
        </div> --}}
        {{-- <div class="ad-banner">
            <img alt="Ad Image" height="100"
                src="https://storage.googleapis.com/a1aa/image/6MnjQ1J0fqz5ci00FBhdfSKfPwnvUfU6TISknw8JjeleZd75E.jpg"
                width="100" />
            <div class="ad-info">
                <div class="title">
                    Adobe Illustrator Pro tricks
                </div>
                <div class="description">
                    Take your design and illustration skills to the next level.
                </div>
            </div>
        </div> --}}
    </div>
    <div class="categories">
        <div class="column">
            <h3>
                Categories
            </h3>
            <a href="#">
                Graphics &amp; Design
            </a>
            <a href="#">
                Digital Marketing
            </a>
            <a href="#">
                Writing &amp; Translation
            </a>
            <a href="#">
                Video &amp; Animation
            </a>
            <a href="#">
                Music &amp; Audio
            </a>
            <a href="#">
                Programming &amp; Tech
            </a>
            <a href="#">
                Data
            </a>
            <a href="#">
                Business
            </a>
        </div>
        <div class="column">
            <h3>
                About
            </h3>
            <a href="#">
                Careers
            </a>
            <a href="#">
                Press &amp; News
            </a>
            <a href="#">
                Partnerships
            </a>
            <a href="#">
                Privacy Policy
            </a>
            <a href="#">
                Terms of Service
            </a>
            <a href="#">
                Intellectual Property Claims
            </a>
            <a href="#">
                Investor Relations
            </a>
        </div>
        <div class="column">
            <h3>
                Support
            </h3>
            <a href="#">
                Help &amp; Support
            </a>
            <a href="#">
                Trust &amp; Safety
            </a>
        </div>
        <div class="column">
            <h3>
                Community
            </h3>
            <a href="#">
                Customer Success Stories
            </a>
            <a href="#">
                Community Hub
            </a>
            <a href="#">
                Forum
            </a>
            <a href="#">
                Events
            </a>
            <a href="#">
                Blog
            </a>
            <a href="#">
                Influencers
            </a>
            <a href="#">
                Affiliates
            </a>
            <a href="#">
                Podcast
            </a>
            <a href="#">
                Invite a Friend
            </a>
            <a href="#">
                Become a Seller
            </a>
            <a href="#">
                Community Standards
            </a>
        </div>
        <div class="column">
            <h3>
                More From Job Finder
            </h3>
            <a href="#">
                Get Inspired
            </a>
            <a href="#">
                ClearVoice
            </a>
            <a href="#">
                Workspace
            </a>
            <a href="#">
                Learn
            </a>
            <a href="#">
                Working Not Working
            </a>
        </div>
    </div>
    <footer>
        <div class="footer-container">
            <div class="social-icons">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
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
    {{-- <div class="social">
        <a href="#">
            <i class="fab fa-facebook">
            </i>
        </a>
        <a href="#">
            <i class="fab fa-twitter">
            </i>
        </a>
        <a href="#">
            <i class="fab fa-linkedin">
            </i>
        </a>
        <a href="#">
            <i class="fab fa-instagram">
            </i>
        </a>
        <a href="#">
            <i class="fab fa-youtube">
            </i>
        </a>
        <a href="#">
            <i class="fab fa-pinterest">
            </i>
        </a>
    </div> --}}
</body>

</html>
