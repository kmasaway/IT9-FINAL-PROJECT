<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Events - EMS</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #8B0000; /* Dark Red, similar to your header */
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .navbar-brand img {
            height: 30px;
            margin-right: 10px;
        }
        .card-header {
            background-color: #e9ecef;
            font-weight: bold;
        }
        .event-card {
            transition: transform 0.2s;
        }
        .event-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .event-status-badge {
            font-size: 0.8em;
            padding: 0.4em 0.6em;
            border-radius: 0.25rem;
        }
        .status-upcoming { background-color: #17a2b8; color: white; } /* Info Blue */
        .status-completed { background-color: #28a745; color: white; } /* Success Green */
        .status-cancelled { background-color: #dc3545; color: white; } /* Danger Red */
        .status-pending { background-color: #ffc107; color: black; } /* Warning Yellow */

        /* Custom styles for the event detail buttons/badges */
        .badge-venue {
            background-color: #007bff; /* Primary Blue */
            color: white;
            padding: 0.4em 0.6em;
            border-radius: 0.25rem;
            font-size: 0.85em;
        }
        .badge-time {
            background-color: #6c757d; /* Secondary Gray */
            color: white;
            padding: 0.4em 0.6em;
            border-radius: 0.25rem;
            font-size: 0.85em;
        }
        .badge-type {
            background-color: #6f42c1; /* Purple */
            color: white;
            padding: 0.4em 0.6em;
            border-radius: 0.25rem;
            font-size: 0.85em;
        }
        .btn-create-event {
            background-color: #800000; /* Maroon color */
            border-color: #800000;
            color: white;
        }
        .btn-create-event:hover {
            background-color: #5C0000; /* Slightly darker maroon on hover */
            border-color: #5C0000;
            color: white;
        }
        .btn-settings {
            background-color: #6c757d; /* Bootstrap secondary gray */
            border-color: #6c757d;
            color: white;
        }
        .btn-settings:hover {
            background-color: #5a6268;
            border-color: #545b62;
            color: white;
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


    <div class="container-fluid py-3 border-bottom mb-1">
        <header class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
            </header>
        <div class="container d-flex justify-content-between align-items-center">
            <h2 class="h3 fw-bold text-gray-800 mb-0">My Events</h2>
            <div>
                <button class="btn btn-create-event me-2"><i class="fas fa-plus-circle"></i> Create New Event</button>
                <button class="btn btn-settings"><i class="fas fa-cogs"></i> Settings</button>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <!-- Filter/Search Section -->
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <form class="row g-3 align-items-center">
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="Search events...">
                    </div>
                    <div class="col-md-3">
                        <select class="form-select">
                            <option selected>All Status</option>
                            <option>Upcoming</option>
                            <option>Completed</option>
                            <option>Cancelled</option>
                            <option>Pending</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-info w-100"><i class="fas fa-filter"></i> Filter</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Events List -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <!-- Example Event Card 1 (Upcoming) -->
            <div class="col">
                <div class="card h-100 shadow-sm event-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Annual Sports Fest</span>
                        <span class="event-status-badge status-upcoming">Upcoming</span>
                    </div>
                    <div class="card-body">
                        <p class="card-text mb-2">
                            <span class="badge-venue"><i class="fas fa-map-marker-alt"></i> Grand Auditorium</span>
                        </p>
                        <p class="card-text mb-2">
                            <span class="badge-time"><i class="far fa-calendar-alt"></i> Nov 20, 2023</span>
                            <span class="badge-time ms-2"><i class="far fa-clock"></i> 9:00 AM - 5:00 PM</span>
                        </p>
                        <p class="card-text mb-2">
                            <span class="badge-type"><i class="fas fa-tag"></i> Sports Event</span>
                        </p>
                        <hr>
                        <p class="card-text text-muted small">Created by John Doe 2 days ago.</p>
                        <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-sm btn-outline-primary me-2"><i class="fas fa-eye"></i> View</a>
                            <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-edit"></i> Edit</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Example Event Card 2 (Completed) -->
            <div class="col">
                <div class="card h-100 shadow-sm event-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Graduation Ceremony</span>
                        <span class="event-status-badge status-completed">Completed</span>
                    </div>
                    <div class="card-body">
                        <p class="card-text mb-2">
                            <span class="badge-venue"><i class="fas fa-map-marker-alt"></i> Main Hall</span>
                        </p>
                        <p class="card-text mb-2">
                            <span class="badge-time"><i class="far fa-calendar-alt"></i> Oct 15, 2023</span>
                            <span class="badge-time ms-2"><i class="far fa-clock"></i> 2:00 PM - 5:00 PM</span>
                        </p>
                        <p class="card-text mb-2">
                            <span class="badge-type"><i class="fas fa-tag"></i> Academic</span>
                        </p>
                        <hr>
                        <p class="card-text text-muted small">Booked by Jane Smith 1 month ago.</p>
                        <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-sm btn-outline-primary me-2"><i class="fas fa-eye"></i> View</a>
                            <a href="#" class="btn btn-sm btn-outline-secondary disabled"><i class="fas fa-edit"></i> Edit</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Example Event Card 3 (Pending Approval) -->
            <div class="col">
                <div class="card h-100 shadow-sm event-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Lecture Series - AI & Future</span>
                        <span class="event-status-badge status-pending">Pending</span>
                    </div>
                    <div class="card-body">
                        <p class="card-text mb-2">
                            <span class="badge-venue"><i class="fas fa-map-marker-alt"></i> Conference Room 1</span>
                        </p>
                        <p class="card-text mb-2">
                            <span class="badge-time"><i class="far fa-calendar-alt"></i> Dec 1, 2023</span>
                            <span class="badge-time ms-2"><i class="far fa-clock"></i> 10:00 AM - 12:00 PM</span>
                        </p>
                        <p class="card-text mb-2">
                            <span class="badge-type"><i class="fas fa-tag"></i> Academic</span>
                        </p>
                        <hr>
                        <p class="card-text text-muted small">Equipment request submitted 3 days ago.</p>
                        <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-sm btn-outline-primary me-2"><i class="fas fa-eye"></i> View</a>
                            <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-edit"></i> Edit</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Example Event Card 4 (Another Upcoming) -->
            <div class="col">
                <div class="card h-100 shadow-sm event-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Department Meeting</span>
                        <span class="event-status-badge status-upcoming">Upcoming</span>
                    </div>
                    <div class="card-body">
                        <p class="card-text mb-2">
                            <span class="badge-venue"><i class="fas fa-map-marker-alt"></i> UM Main Hall</span>
                        </p>
                        <p class="card-text mb-2">
                            <span class="badge-time"><i class="far fa-calendar-alt"></i> Nov 15, 2023</span>
                            <span class="badge-time ms-2"><i class="far fa-clock"></i> 10:00 AM - 10:00 AM</span>
                        </p>
                        <p class="card-text mb-2">
                            <span class="badge-type"><i class="fas fa-tag"></i> Meeting</span>
                        </p>
                        <hr>
                        <p class="card-text text-muted small">Created yesterday.</p>
                        <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-sm btn-outline-primary me-2"><i class="fas fa-eye"></i> View</a>
                            <a href="#" class="btn btn-sm btn-outline-secondary"><i class="fas fa-edit"></i> Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination (if many events) -->
        <nav aria-label="Page navigation example" class="mt-4">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>