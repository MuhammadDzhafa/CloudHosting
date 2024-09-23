<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Hosting Plan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            max-width: 800px;
            margin-top: 30px;
        }

        h2 {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 30px;
            text-align: center;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }

        .card-header {
            background-color: #3498db;
            color: white;
            font-weight: bold;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            padding: 15px;
        }

        .table {
            margin-bottom: 0;
        }

        .table th {
            width: 40%;
            background-color: #f8f9fa;
            font-weight: 600;
        }

        .table td,
        .table th {
            padding: 12px;
            vertical-align: middle;
        }

        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
        }

        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }

        .btn-secondary {
            background-color: #95a5a6;
            border-color: #95a5a6;
        }

        .btn-secondary:hover {
            background-color: #7f8c8d;
            border-color: #7f8c8d;
        }

        .btn-group {
            margin-top: 20px;
        }

        .icon-cell {
            display: flex;
            align-items: center;
        }

        .icon-cell i {
            margin-right: 10px;
            font-size: 1.2em;
            color: #3498db;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2><i class="fas fa-server me-2"></i>Detail Hosting Plan</h2>

        <div class="card">
            <div class="card-header">
                <i class="fas fa-info-circle me-2"></i>Informasi Hosting Plan
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>ID</th>
                        <td class="icon-cell"><i class="fas fa-fingerprint"></i>{{ $hostingPlan->hosting_plans_id }}</td>
                    </tr>
                    <tr>
                        <th>Group ID</th>
                        <td class="icon-cell"><i class="fas fa-layer-group"></i>{{ $hostingPlan->group_id }}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td class="icon-cell"><i class="fas fa-tag"></i>{{ $hostingPlan->name }}</td>
                    </tr>
                    <tr>
                        <th>Max Domain</th>
                        <td class="icon-cell"><i class="fas fa-globe"></i>{{ $hostingPlan->max_domain }}</td>
                    </tr>
                    <tr>
                        <th>Max Email Account</th>
                        <td class="icon-cell"><i class="fas fa-envelope"></i>{{ $hostingPlan->max_email_account }}</td>
                    </tr>
                    <tr>
                        <th>Max Database</th>
                        <td class="icon-cell"><i class="fas fa-database"></i>{{ $hostingPlan->max_database }}</td>
                    </tr>
                    <tr>
                        <th>Max IO</th>
                        <td class="icon-cell"><i class="fas fa-exchange-alt"></i>{{ $hostingPlan->max_io }}</td>
                    </tr>
                    <tr>
                        <th>NPROC</th>
                        <td class="icon-cell"><i class="fas fa-microchip"></i>{{ $hostingPlan->nproc }}</td>
                    </tr>
                    <tr>
                        <th>Entry Process</th>
                        <td class="icon-cell"><i class="fas fa-cogs"></i>{{ $hostingPlan->entry_process }}</td>
                    </tr>
                    <tr>
                        <th>Max Bandwidth</th>
                        <td class="icon-cell"><i class="fas fa-tachometer-alt"></i>{{ $hostingPlan->max_bandwidth }}</td>
                    </tr>
                    <tr>
                        <th>SSL</th>
                        <td class="icon-cell"><i class="fas fa-lock"></i>{{ $hostingPlan->ssl }}</td>
                    </tr>
                    <tr>
                        <th>Backup</th>
                        <td class="icon-cell"><i class="fas fa-save"></i>{{ $hostingPlan->backup }}</td>
                    </tr>
                    <tr>
                        <th>RAM</th>
                        <td class="icon-cell"><i class="fas fa-memory"></i>{{ $hostingPlan->RAM }}</td>
                    </tr>
                    <tr>
                        <th>Storage</th>
                        <td class="icon-cell"><i class="fas fa-hdd"></i>{{ $hostingPlan->storage }}</td>
                    </tr>
                    <tr>
                        <th>CPU</th>
                        <td class="icon-cell"><i class="fas fa-microchip"></i>{{ $hostingPlan->CPU }}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td class="icon-cell"><i class="fas fa-info-circle"></i>{{ $hostingPlan->description }}</td>
                    </tr>
                    <tr>
                        <th>Type</th>
                        <td class="icon-cell"><i class="fas fa-cube"></i>{{ $hostingPlan->type }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="btn-group d-flex justify-content-center">
            <a href="{{ route('hosting-plans.edit', $hostingPlan->hosting_plans_id) }}" class="btn btn-primary me-2">
                <i class="fas fa-edit me-2"></i>Edit
            </a>
            <a href="{{ route('hosting-plans.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>