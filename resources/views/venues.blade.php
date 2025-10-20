<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Venues - EMS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #8B0000; /* Dark Red - Similar to the image */
        }
        .navbar-brand, .nav-link {
            color: #ffffff !important;
        }
        .navbar-nav .nav-link.active {
            font-weight: light;
        }
        .header-section {
            background-color: #ffffff;
            padding: 20px;
            border-bottom: 1px solid #e0e0e0;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .card.venue-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            overflow: hidden;
            margin-bottom: 20px;
        }
        .card.venue-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
        }
        .venue-card .card-img-top {
            height: 200px;
            object-fit: cover;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }
        .venue-card .card-body {
            padding: 20px;
        }
        .venue-card .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
        }
        .venue-card .card-subtitle {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 15px;
        }
        .venue-card .badge {
            font-size: 0.8em;
            padding: 0.5em 0.7em;
            margin-right: 5px;
        }
        .venue-details {
            margin-top: 15px;
            font-size: 0.95rem;
            color: #555;
        }
        .venue-details i {
            margin-right: 8px;
            color: #8B0000; /* Dark Red */
        }
        .map-placeholder {
            background-color: #e9ecef;
            height: 300px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #6c757d;
            font-size: 1.2rem;
            margin-bottom: 20px;
            border: 1px dashed #ced4da;
        }
        .filter-section {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #8B0000;
            border-color: #8B0000;
        }
        .btn-primary:hover {
            background-color: #6a0000;
            border-color: #6a0000;
        }
        .btn-outline-secondary {
            color: #8B0000;
            border-color: #8B0000;
        }
        .btn-outline-secondary:hover {
            background-color: #8B0000;
            color: #fff;
        }
    </style>
</head>
<body>

    <div class="d-flex flex-column min-vh-100">
        
        <!-- Top Navigation Bar -->
       <nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="{{ asset('images/um-logo.png') }}" alt="University of Mindanao Logo" style="height: 40px; width: 40px; margin-right: 0.5rem;">
                    <h2 class="h5 mb-0 fw-bold">EMS</h2>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center active" aria-current="page" href="#">
                                <i class="fas fa-home me-2"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="#">
                                <i class="fas fa-calendar-alt me-2"></i>
                                My Events
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="#">
                                <i class="fas fa-map-marker-alt me-2"></i>
                                Venues
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="#">
                                <i class="fas fa-tools me-2"></i>
                                Equipment
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" href="#">
                                <i class="fas fa-chart-bar me-2"></i>
                                Reports
                            </a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <a href="{{ route('logout') }}" class="btn btn-outline-light d-flex align-items-center"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt me-2"></i>
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </nav>

    <div class="container mt-4">
        <div class="header-section">
            <h2 class="mb-0">Venues</h2>
            <div>
                <button class="btn btn-primary me-2"><i class="fas fa-plus-circle"></i> Add New Venue</button>
                <button class="btn btn-outline-secondary"><i class="fas fa-cog"></i> Manage Venues</button>
            </div>
        </div>

        <div class="filter-section mb-4">
            <div class="row g-3 align-items-center">
                <div class="col-md-4">
                    <input type="text" class="form-control" placeholder="Search venues...">
                </div>
                <div class="col-md-3">
                    <select class="form-select">
                        <option selected>All Types</option>
                        <option value="1">Auditorium</option>
                        <option value="2">Lecture Hall</option>
                        <option value="3">Meeting Room</option>
                        <option value="4">Sports Arena</option>
                        <option value="5">Exhibition Hall</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select">
                        <option selected>All Capacities</option>
                        <option value="1">Small ( &lt; 50)</option>
                        <option value="2">Medium (50 - 200)</option>
                        <option value="3">Large (200 - 1000)</option>
                        <option value="4">Extra Large ( &gt; 1000)</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary w-100"><i class="fas fa-filter"></i> Filter</button>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <!-- Venue Card 1 -->
                    <div class="col-md-6">
                        <div class="card venue-card">
                            <img src="https://via.placeholder.com/400x200/FFD700/FFFFFF?text=Grand+Auditorium" class="card-img-top" alt="Grand Auditorium">
                            <div class="card-body">
                                <h5 class="card-title">Grand Auditorium</h5>
                                <h6 class="card-subtitle mb-2 text-muted">A magnificent space for large-scale events.</h6>
                                <p class="venue-details">
                                    <i class="fas fa-expand-arrows-alt"></i> Capacity: 1200 <br>
                                    <i class="fas fa-map-marker-alt"></i> Building A, Main Campus <br>
                                    <i class="fas fa-tags"></i> <span class="badge bg-info">Auditorium</span> <span class="badge bg-warning text-dark">Lecture</span>
                                </p>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i> View Details</a>
                                    <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-edit"></i> Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Venue Card 2 -->
                    <div class="col-md-6">
                        <div class="card venue-card">
                            <img src="https://via.placeholder.com/400x200/ADD8E6/FFFFFF?text=Conference+Room+1" class="card-img-top" alt="Conference Room 1">
                            <div class="card-body">
                                <h5 class="card-title">Conference Room 1</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Ideal for smaller meetings and presentations.</h6>
                                <p class="venue-details">
                                    <i class="fas fa-expand-arrows-alt"></i> Capacity: 50 <br>
                                    <i class="fas fa-map-marker-alt"></i> Level 3, Academic Block <br>
                                    <i class="fas fa-tags"></i> <span class="badge bg-primary">Meeting Room</span> <span class="badge bg-secondary">Seminar</span>
                                </p>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i> View Details</a>
                                    <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-edit"></i> Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Venue Card 3 -->
                    <div class="col-md-6">
                        <div class="card venue-card">
                            <img src="https://via.placeholder.com/400x200/90EE90/FFFFFF?text=Sports+Arena" class="card-img-top" alt="Sports Arena">
                            <div class="card-body">
                                <h5 class="card-title">University Sports Arena</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Multi-purpose arena for sports and large gatherings.</h6>
                                <p class="venue-details">
                                    <i class="fas fa-expand-arrows-alt"></i> Capacity: 2500 <br>
                                    <i class="fas fa-map-marker-alt"></i> Sports Complex <br>
                                    <i class="fas fa-tags"></i> <span class="badge bg-success">Sports</span> <span class="badge bg-danger">Event Hall</span>
                                </p>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i> View Details</a>
                                    <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-edit"></i> Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Venue Card 4 -->
                    <div class="col-md-6">
                        <div class="card venue-card">
                            <img src="https://via.placeholder.com/400x200/DA70D6/FFFFFF?text=Main+Hall" class="card-img-top" alt="Main Hall">
                            <div class="card-body">
                                <h5 class="card-title">Main Hall</h5>
                                <h6 class="card-subtitle mb-2 text-muted">A classic hall for ceremonies and formal events.</h6>
                                <p class="venue-details">
                                    <i class="fas fa-expand-arrows-alt"></i> Capacity: 500 <br>
                                    <i class="fas fa-map-marker-alt"></i> Central Building <br>
                                    <i class="fas fa-tags"></i> <span class="badge bg-dark">Ceremony</span> <span class="badge bg-info">Exhibition</span>
                                </p>
                                <hr>
                                <div class="d-flex justify-content-between">
                                    <a href="#" class="btn btn-sm btn-outline-primary"><i class="fas fa-eye"></i> View Details</a>
                                    <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-edit"></i> Edit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="sticky-top" style="top: 20px;">
                    <div class="card venue-card">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Venue Locations</h5>
                            <div class="map-placeholder">
                                <i class="fas fa-map-marked-alt fa-3x"></i><br> Map Placeholder
                            </div>
                            <p class="text-muted text-center"><small>Interactive map integration coming soon!</small></p>
                            <a href="#" class="btn btn-sm btn-primary w-100 mt-2"><i class="fas fa-search-location"></i> Explore on Map</a>
                        </div>
                    </div>

                    <div class="card venue-card mt-4">
                        <div class="card-body">
                            <h5 class="card-title mb-3">Quick Stats</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Total Venues
                                    <span class="badge bg-primary rounded-pill">12</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Auditoriums
                                    <span class="badge bg-info rounded-pill">3</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Meeting Rooms
                                    <span class="badge bg-success rounded-pill">6</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Sports Facilities
                                    <span class="badge bg-danger rounded-pill">2</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Available Today
                                    <span class="badge bg-warning text-dark rounded-pill">8</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>