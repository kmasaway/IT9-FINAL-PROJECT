<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports - EMS</title>
    <link rel="icon" type="image/png" href="{{ asset('images/um-logo.png') }}">
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
                                Equipments
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
        <main class="flex-grow-1 container mt-5">
            <h1 class="mb-4 text-center">Event Reports Summary</h1>

            <div class="row g-4">
                <!-- Total Events Card -->
                <div class="col-md-4">
                    <div class="card card-custom text-center shadow-sm h-100">
                        <div class="card-body">
                            <i class="fas fa-calendar-check fa-4x text-primary mb-3"></i>
                            <h5 class="card-title fw-bold">Total Events</h5>
                            <p class="card-text fs-3">150</p>
                            <a href="#" class="btn btn-red-custom btn-sm" onclick="viewReport('Total Events')">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Events Card -->
                <div class="col-md-4">
                    <div class="card card-custom text-center shadow-sm h-100">
                        <div class="card-body">
                            <i class="fas fa-calendar-plus fa-4x text-info mb-3"></i>
                            <h5 class="card-title fw-bold">Upcoming Events</h5>
                            <p class="card-text fs-3">25</p>
                            <a href="#" class="btn btn-red-custom btn-sm" onclick="viewReport('Upcoming Events')">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Completed Events Card -->
                <div class="col-md-4">
                    <div class="card card-custom text-center shadow-sm h-100">
                        <div class="card-body">
                            <i class="fas fa-calendar-day fa-4x text-success mb-3"></i>
                            <h5 class="card-title fw-bold">Completed Events</h5>
                            <p class="card-text fs-3">125</p>
                            <a href="#" class="btn btn-red-custom btn-sm" onclick="viewReport('Completed Events')">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Total Venues Card -->
                <div class="col-md-4">
                    <div class="card card-custom text-center shadow-sm h-100">
                        <div class="card-body">
                            <i class="fas fa-map-marker-alt fa-4x text-danger mb-3"></i>
                            <h5 class="card-title fw-bold">Total Venues</h5>
                            <p class="card-text fs-3">12</p>
                            <a href="#" class="btn btn-red-custom btn-sm" onclick="viewReport('Total Venues')">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Booked Venues Card -->
                <div class="col-md-4">
                    <div class="card card-custom text-center shadow-sm h-100">
                        <div class="card-body">
                            <i class="fas fa-building fa-4x text-warning mb-3"></i>
                            <h5 class="card-title fw-bold">Booked Venues</h5>
                            <p class="card-text fs-3">8</p>
                            <a href="#" class="btn btn-red-custom btn-sm" onclick="viewReport('Booked Venues')">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Available Venues Card -->
                <div class="col-md-4">
                    <div class="card card-custom text-center shadow-sm h-100">
                        <div class="card-body">
                            <i class="fas fa-house-chimney fa-4x text-secondary mb-3"></i>
                            <h5 class="card-title fw-bold">Available Venues</h5>
                            <p class="card-text fs-3">4</p>
                            <a href="#" class="btn btn-red-custom btn-sm" onclick="viewReport('Available Venues')">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Total Equipment Card -->
                <div class="col-md-4">
                    <div class="card card-custom text-center shadow-sm h-100">
                        <div class="card-body">
                            <i class="fas fa-tools fa-4x text-dark mb-3"></i>
                            <h5 class="card-title fw-bold">Total Equipment</h5>
                            <p class="card-text fs-3">500</p>
                            <a href="#" class="btn btn-red-custom btn-sm" onclick="viewReport('Total Equipment')">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Allocated Equipment Card -->
                <div class="col-md-4">
                    <div class="card card-custom text-center shadow-sm h-100">
                        <div class="card-body">
                            <i class="fas fa-cogs fa-4x text-primary mb-3"></i>
                            <h5 class="card-title fw-bold">Allocated Equipment</h5>
                            <p class="card-text fs-3">300</p>
                            <a href="#" class="btn btn-red-custom btn-sm" onclick="viewReport('Allocated Equipment')">View Details</a>
                        </div>
                    </div>
                </div>

                <!-- Available Equipment Card -->
                <div class="col-md-4">
                    <div class="card card-custom text-center shadow-sm h-100">
                        <div class="card-body">
                            <i class="fas fa-screwdriver-wrench fa-4x text-success mb-3"></i>
                            <h5 class="card-title fw-bold">Available Equipment</h5>
                            <p class="card-text fs-3">200</p>
                            <a href="#" class="btn btn-red-custom btn-sm" onclick="viewReport('Available Equipment')">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="footer mt-auto py-3 bg-light">
            <div class="container text-center">
                <span class="text-muted">&copy; 2025 University of Mindanao. All Rights Reserved.</span>
            </div>
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function viewReport(reportType) {
            alert(`Viewing details for: ${reportType}`);
            console.log(`Action: User clicked to view details for "${reportType}"`);
        }
    </script>
</body>
</html>
