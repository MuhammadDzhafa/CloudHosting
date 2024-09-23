<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Hosting Plans</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            max-width: 1200px;
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
            background-color: #f8f9fa;
            font-weight: 600;
            border-top: none;
        }

        .table td,
        .table th {
            padding: 12px;
            vertical-align: middle;
        }

        .btn-group .btn {
            margin: 2px;
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.875rem;
        }

        .alert-success {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
        }

        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }

        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
            color: white;
        }

        .btn-info:hover {
            background-color: #138496;
            border-color: #138496;
            color: white;
        }

        .btn-danger {
            background-color: #e74c3c;
            border-color: #e74c3c;
        }

        .btn-danger:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2><i class="fas fa-server me-2"></i>Daftar Hosting Plans</h2>

        <div class="mb-3 text-end">
            <a href="{{ route('hosting-plans.create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Tambah Hosting Plan
            </a>
        </div>

        @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                <i class="fas fa-list me-2"></i>Hosting Plans
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Group ID</th>
                                <th>Nama Plan</th>
                                <th>Max Domain</th>
                                <th>Max Email Account</th>
                                <th>Max Database</th>
                                <th>Max IO</th>
                                <th>NPROC</th>
                                <th>Entry Process</th>
                                <th>Max Bandwidth</th>
                                <th>SSL</th>
                                <th>Backup</th>
                                <th>RAM</th>
                                <th>Storage</th>
                                <th>CPU</th>
                                <th>Description</th>
                                <th>Type</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($hostingPlans as $plan)
                            <tr>
                                <td>{{ $plan->hosting_plans_id }}</td>
                                <td>{{ $plan->group_id }}</td>
                                <td>{{ $plan->name }}</td>
                                <td>{{ $plan->max_domain }}</td>
                                <td>{{ $plan->max_email_account }}</td>
                                <td>{{ $plan->max_database }}</td>
                                <td>{{ $plan->max_io }}</td>
                                <td>{{ $plan->nproc }}</td>
                                <td>{{ $plan->entry_process }}</td>
                                <td>{{ $plan->max_bandwidth }}</td>
                                <td>{{ $plan->ssl }}</td>
                                <td>{{ $plan->backup }}</td>
                                <td>{{ $plan->RAM }}</td>
                                <td>{{ $plan->storage }}</td>
                                <td>{{ $plan->CPU }}</td>
                                <td>{{ $plan->description }}</td>
                                <td>{{ $plan->type }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="{{ route('hosting-plans.show', $plan->hosting_plans_id) }}" class="btn btn-info btn-sm" title="Lihat">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('hosting-plans.edit', $plan->hosting_plans_id) }}" class="btn btn-primary btn-sm" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('hosting-plans.destroy', $plan->hosting_plans_id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')" title="Hapus">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>