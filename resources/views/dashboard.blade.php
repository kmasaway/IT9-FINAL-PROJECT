<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Events Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar-custom {
            background-color: #8B0000;
        }
        .navbar {
            background-color: #8B0000;
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .navbar-brand img {
            height: 30px;
            margin-right: 10px;
        }
        .card-custom {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }
        .card-custom:hover {
            transform: translateY(-5px) scale(1.02);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }       
        .btn-red-custom {
            background-color: #8B0000;
            border-color: #8B0000;
        }
        .btn-red-custom:hover {
            background-color: #8B0000; 
            border-color: #8B0000;
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
                            <a class="nav-link d-flex align-items-center" aria-current="page" href="#">
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

        <!-- Main Content -->
        <main class="flex-grow-1 p-4">
            <div class="container-fluid py-3 border-bottom mb-1">
            <header class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                <div class="container d-flex justify-content-between align-items-center">    
                <h1 class="h3 fw-bold text-gray-800 mb-0">Dashboard</h1>
                <div class="d-flex gap-2">
                    <button class="btn btn-red-custom text-white d-flex align-items-center shadow-sm"><i class="fas fa-plus me-2"></i>Create New Event
                    </button>
                    <button class="btn btn-secondary d-flex align-items-center shadow-sm"><i class="fas fa-cogs me-2"></i>Settings
                    </button>
                </div>
            </header>

            <!-- Dashboard Content Cards -->
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-4">
                <!-- Card 1: Total Events -->
                <div class="col">
                    <div class="card shadow-sm h-100 card-custom">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <p class="text-uppercase text-muted mb-1 small">Total Events</p>
                                <p class="fs-2 fw-bold text-dark mb-0">125</p>
                            </div>
                            <i class="fas fa-calendar-check fa-3x text-danger opacity-75"></i>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Upcoming Events -->
                <div class="col">
                    <div class="card shadow-sm h-100 card-custom">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <p class="text-uppercase text-muted mb-1 small">Upcoming Events</p>
                                <p class="fs-2 fw-bold text-dark mb-0">15</p>
                            </div>
                            <i class="fas fa-calendar-day fa-3x text-primary opacity-75"></i>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Pending Approvals -->
                <div class="col">
                    <div class="card shadow-sm h-100 card-custom">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <p class="text-uppercase text-muted mb-1 small">Pending Approvals</p>
                                <p class="fs-2 fw-bold text-dark mb-0">7</p>
                            </div>
                            <i class="fas fa-hourglass-half fa-3x text-warning opacity-75"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity / Upcoming Schedule -->
            <div class="row row-cols-1 row-cols-lg-2 g-4 mb-4">
                <!-- Recent Activity -->
                <div class="col">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h3 class="card-title h5 fw-semibold text-gray-800 mb-4">Recent Activity</h3>
                            <ul class="list-unstyled space-y-3">
                                <li class="d-flex align-items-start">
                                    <span class="badge bg-success rounded-circle mt-1 me-3 p-1"></span>
                                    <div>
                                        <p class="text-dark mb-0"><span class="fw-medium">John Doe</span> created event <span class="fw-medium">"Annual Sports Fest"</span></p>
                                        <p class="text-muted small mb-0">2 hours ago</p>
                                    </div>
                                </li>
                                <li class="d-flex align-items-start">
                                    <span class="badge bg-primary rounded-circle mt-1 me-3 p-1"></span>
                                    <div>
                                        <p class="text-dark mb-0">Venue <span class="fw-medium">"Grand Auditorium"</span> booked for <span class="fw-medium">"Graduation Ceremony"</span></p>
                                        <p class="text-muted small mb-0">Yesterday</p>
                                    </div>
                                </li>
                                <li class="d-flex align-items-start">
                                    <span class="badge bg-warning rounded-circle mt-1 me-3 p-1"></span>
                                    <div>
                                        <p class="text-dark mb-0">Equipment request for <span class="fw-medium">"Lecture Series"</span> is pending</p>
                                        <p class="text-muted small mb-0">3 days ago</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Schedule -->
                <div class="col">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h3 class="card-title h5 fw-semibold text-gray-800 mb-4">Upcoming Schedule</h3>
                            <ul class="list-unstyled space-y-3">
                                <li class="d-flex align-items-center justify-content-between p-3 bg-light rounded">
                                    <div>
                                        <p class="fw-medium text-dark mb-0">Department Meeting</p>
                                        <p class="small text-muted mb-0">Nov 15, 2023 - 10:00 AM</p>
                                    </div>
                                    <span class="badge bg-danger text-light px-2 py-1 rounded-pill">UM Main Hall</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between p-3 bg-light rounded">
                                    <div>
                                        <p class="fw-medium text-dark mb-0">Student Orientation</p>
                                        <p class="small text-muted mb-0">Nov 20, 2023 - 9:00 AM</p>
                                    </div>
                                    <span class="badge bg-primary text-light px-2 py-1 rounded-pill">Conference Room 1</span>
                                </li>
                                <li class="d-flex align-items-center justify-content-between p-3 bg-light rounded">
                                    <div>
                                        <p class="fw-medium text-dark mb-0">Faculty Research Forum</p>
                                        <p class="small text-muted mb-0">Nov 25, 2023 - 1:00 PM</p>
                                    </div>
                                    <span class="badge bg-success text-light px-2 py-1 rounded-pill">Auditorium B</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Placeholder for charts-->
            <div class="card shadow-sm p-4 min-vh-25 d-flex align-items-center justify-content-center text-muted">
                <p class="mb-0">Chart for Event Statistics (e.g., events per month, venue utilization) could go here.</p>
            </div>

        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>