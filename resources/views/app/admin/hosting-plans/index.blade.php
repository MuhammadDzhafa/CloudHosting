<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Hosting Plans</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        h2 {
            color: #333;
            font-weight: bold;
            margin-bottom: 20px;
        }

        table {
            background-color: #ffffff;
            border-collapse: separate;
            border-spacing: 0;
            border: 1px solid #dee2e6;
            width: 100%;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .btn {
            margin-right: 5px;
        }

        .alert-success {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Daftar Hosting Plans</h2>
        <a href="{{ route('hosting-plans.create') }}" class="btn btn-primary mb-3">Tambah Hosting Plan</a>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

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
                        <a href="{{ route('hosting-plans.show', $plan->hosting_plans_id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('hosting-plans.edit', $plan->hosting_plans_id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('hosting-plans.destroy', $plan->hosting_plans_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>