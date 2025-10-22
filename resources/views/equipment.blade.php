<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMS - Equipment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            background-color: #8B0000; /* Dark Red */
        }
        .navbar-brand, .nav-link {
            color: #ffffff !important;
        }
        .navbar-brand img {
            height: 30px;
            margin-right: 10px;
        }
        .sidebar {
            background-color: #343a40; /* Dark background for sidebar */
            color: #ffffff;
            height: 100vh;
            padding-top: 20px;
        }
        .sidebar .nav-link {
            color: #ffffff;
            padding: 10px 15px;
            border-left: 3px solid transparent;
        }
        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background-color: #495057;
            border-left: 3px solid #8B0000;
        }
        .card {
            margin-bottom: 20px;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }
        .card-header {
            background-color: #8B0000;
            color: white;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #8B0000;
            border-color: #8B0000;
        }
        .btn-primary:hover {
            background-color: #6a0000;
            border-color: #6a0000;
        }
        .table thead th {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>

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

    <div class="container-fluid mt-3">
        <div class="row">
            <!-- Main Content Area -->
            <main class="col-md-12 ms-sm-auto px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h3 fw-bold text-gray-800 mb-0">Equipment</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#addEquipmentModal">
                            <i class="fas fa-plus me-1"></i> Add New Equipment
                        </button>
                    </div>
                </div>

                <!-- Equipment List Card -->
                <div class="card">
                    <div class="card-header">
                        All Equipment
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Quantity Available</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Projector (Epson)</td>
                                        <td>High-definition projector suitable for presentations.</td>
                                        <td>5</td>
                                        <td><span class="badge bg-success">Available</span></td>
                                        <td>
                                            <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#viewEquipmentModal"><i class="fas fa-eye"></i></button>
                                            <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#editEquipmentModal"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Microphone (Wireless)</td>
                                        <td>Wireless handheld microphone with good range.</td>
                                        <td>10</td>
                                        <td><span class="badge bg-success">Available</span></td>
                                        <td>
                                            <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#viewEquipmentModal"><i class="fas fa-eye"></i></button>
                                            <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#editEquipmentModal"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Laptop (Dell XPS)</td>
                                        <td>High-performance laptop for event management.</td>
                                        <td>2</td>
                                        <td><span class="badge bg-danger">In Use</span></td>
                                        <td>
                                            <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#viewEquipmentModal"><i class="fas fa-eye"></i></button>
                                            <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#editEquipmentModal"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Sound Mixer (8 Channel)</td>
                                        <td>Professional 8-channel sound mixer.</td>
                                        <td>1</td>
                                        <td><span class="badge bg-warning">Under Maintenance</span></td>
                                        <td>
                                            <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#viewEquipmentModal"><i class="fas fa-eye"></i></button>
                                            <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#editEquipmentModal"><i class="fas fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                                        </td>
                                    </tr>
                                    <!-- More equipment items could be added here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Modals for Add, View, Edit Equipment -->

    <!-- Add Equipment Modal -->
    <div class="modal fade" id="addEquipmentModal" tabindex="-1" aria-labelledby="addEquipmentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addEquipmentModalLabel">Add New Equipment</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="equipmentName" class="form-label">Equipment Name</label>
                            <input type="text" class="form-control" id="equipmentName" required>
                        </div>
                        <div class="mb-3">
                            <label for="equipmentDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="equipmentDescription" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="equipmentQuantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="equipmentQuantity" min="1" required>
                        </div>
                        <div class="mb-3">
                            <label for="equipmentStatus" class="form-label">Status</label>
                            <select class="form-select" id="equipmentStatus" required>
                                <option value="Available">Available</option>
                                <option value="In Use">In Use</option>
                                <option value="Under Maintenance">Under Maintenance</option>
                                <option value="Retired">Retired</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Equipment</button>
                </div>
            </div>
        </div>
    </div>

    <!-- View Equipment Modal (example content, would be dynamically populated) -->
    <div class="modal fade" id="viewEquipmentModal" tabindex="-1" aria-labelledby="viewEquipmentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="viewEquipmentModalLabel">View Equipment Details</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Name:</strong> Projector (Epson)</p>
                    <p><strong>Description:</strong> High-definition projector suitable for presentations.</p>
                    <p><strong>Quantity:</strong> 5</p>
                    <p><strong>Status:</strong> <span class="badge bg-success">Available</span></p>
                    <p><strong>Last Updated:</strong> 2023-11-20</p>
                    <!-- More details can be added -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Equipment Modal (example content, would be dynamically populated) -->
    <div class="modal fade" id="editEquipmentModal" tabindex="-1" aria-labelledby="editEquipmentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="editEquipmentModalLabel">Edit Equipment</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="editEquipmentName" class="form-label">Equipment Name</label>
                            <input type="text" class="form-control" id="editEquipmentName" value="Projector (Epson)" required>
                        </div>
                        <div class="mb-3">
                            <label for="editEquipmentDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="editEquipmentDescription" rows="3">High-definition projector suitable for presentations.</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="editEquipmentQuantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="editEquipmentQuantity" value="5" min="1" required>
                        </div>
                        <div class="mb-3">
                            <label for="editEquipmentStatus" class="form-label">Status</label>
                            <select class="form-select" id="editEquipmentStatus" required>
                                <option value="Available" selected>Available</option>
                                <option value="In Use">In Use</option>
                                <option value="Under Maintenance">Under Maintenance</option>
                                <option value="Retired">Retired</option>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning text-white">Update Equipment</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>