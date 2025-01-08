<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Job Finder Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('frontend/css/admin.css') }}">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <h1> <img src="{{ asset('frontend/img/quality_restoration_20240926111905403.png') }}" alt="Logo"></h1>
            <ul>
                <li>
                    <a href="#">
                        <i class="fas fa-tachometer-alt"></i>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('datafreelancer') }}">
                        <i class="fab fa-black-tie"></i>
                        Freelancer
                    </a>
                </li>
                <li>
                    <a href="{{ route('lowongan') }}">
                        <i class="fas fa-briefcase"></i>
                        Lowongan Pekerjaan
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-clipboard-list"></i>
                        Jasa
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fas fa-user"></i>
                        Pengguna
                    </a>
                </li>
                {{-- <li>
                    <a href="#">
                        <i class="fas fa-chart-line"></i>
                        Progress
                    </a>
                </li> --}}
            </ul>
        </div>
        <div class="main-content">
            <div class="header">
                <div class="search-bar">
                    <input placeholder="Type here..." type="text"/>
                    <i class="fas fa-search"></i>
                </div>
                <div class="user-actions">
                    <a href="#">Sign In</a>
                    <a href="#"><i class="fas fa-cog"></i></a>
                </div>
            </div>
            <div class="card">
                <h2>Job Finder Dashboard Admin</h2>
                <p>Built by developers</p>
            </div>
            <div class="card">
                <img alt="People working together on laptops" src="https://placehold.co/600x200" />
                <h2>Bekerjasama dengan Job Finder</h2>
                <p></p>
                <a href="#">Read more</a>
            </div>
            <div class="stats">
                <div class="stat">
                    <h3>Pengguna Aktif</h3>
                    <p class="change">(+23) dibandingkan minggu lalu</p>
                    <div class="value">32,984</div>
                    <p>Pengguna</p>
                    {{-- <div class="value">2.42m</div>
                    <p>Clicks</p>
                    <div class="value">2,400$</div>
                    <p>Sales</p> --}}
                    <div class="value">320</div>
                    <p>Lowongan Pekerjaan</p>
                </div>
                <div class="stat">
                    <h3></h3>
                    <p class="change"></p>
                    <img alt="Sales overview graph" src="https://placehold.co/600x200" />
                </div>
            </div>
        </div>
    </div>
</body>
</html>