<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Hosting Plan</title>
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
            margin-bottom: 30px;
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

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
            color: #34495e;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn-primary {
            background-color: #3498db;
            border-color: #3498db;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #2980b9;
            border-color: #2980b9;
        }

        .btn-secondary {
            background-color: #95a5a6;
            border-color: #95a5a6;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
        }

        .btn-secondary:hover {
            background-color: #7f8c8d;
            border-color: #7f8c8d;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2><i class="fas fa-edit me-2"></i>Edit Hosting Plan</h2>

        <div class="card">
            <div class="card-header">
                <i class="fas fa-server me-2"></i>Edit Hosting Plan Details
            </div>
            <div class="card-body">
                <form action="{{ route('hosting-plans.update', $hostingPlan->hosting_plans_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="group_id" class="form-label"><i class="fas fa-layer-group me-2"></i>Group ID</label>
                                <input type="text" class="form-control" id="group_id" name="group_id" value="{{ $hostingPlan->group_id }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="form-label"><i class="fas fa-tag me-2"></i>Nama</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $hostingPlan->name }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="max_domain" class="form-label"><i class="fas fa-globe me-2"></i>Max Domain</label>
                                <input type="text" class="form-control" id="max_domain" name="max_domain" value="{{ $hostingPlan->max_domain }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="max_addon_domain" class="form-label"><i class="fas fa-plus-circle me-2"></i>Max Addon Domain</label>
                                <input type="text" class="form-control" id="max_addon_domain" name="max_addon_domain" value="{{ $hostingPlan->max_addon_domain }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="max_email_account" class="form-label"><i class="fas fa-envelope me-2"></i>Max Email Account</label>
                                <input type="text" class="form-control" id="max_email_account" name="max_email_account" value="{{ $hostingPlan->max_email_account }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="max_database" class="form-label"><i class="fas fa-database me-2"></i>Max Database</label>
                                <input type="text" class="form-control" id="max_database" name="max_database" value="{{ $hostingPlan->max_database }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="max_io" class="form-label"><i class="fas fa-exchange-alt me-2"></i>Max IO</label>
                                <input type="text" class="form-control" id="max_io" name="max_io" value="{{ $hostingPlan->max_io }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nproc" class="form-label"><i class="fas fa-microchip me-2"></i>NPROC</label>
                                <input type="text" class="form-control" id="nproc" name="nproc" value="{{ $hostingPlan->nproc }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="entry_process" class="form-label"><i class="fas fa-cogs me-2"></i>Entry Process</label>
                                <input type="text" class="form-control" id="entry_process" name="entry_process" value="{{ $hostingPlan->entry_process }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="max_bandwidth" class="form-label"><i class="fas fa-tachometer-alt me-2"></i>Max Bandwidth</label>
                                <input type="text" class="form-control" id="max_bandwidth" name="max_bandwidth" value="{{ $hostingPlan->max_bandwidth }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ssl" class="form-label"><i class="fas fa-lock me-2"></i>SSL</label>
                                <input type="text" class="form-control" id="ssl" name="ssl" value="{{ $hostingPlan->ssl }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="backup" class="form-label"><i class="fas fa-save me-2"></i>Backup</label>
                                <input type="text" class="form-control" id="backup" name="backup" value="{{ $hostingPlan->backup }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="RAM" class="form-label"><i class="fas fa-memory me-2"></i>RAM</label>
                                <input type="text" class="form-control" id="RAM" name="RAM" value="{{ $hostingPlan->RAM }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="storage" class="form-label"><i class="fas fa-hdd me-2"></i>Storage</label>
                                <input type="text" class="form-control" id="storage" name="storage" value="{{ $hostingPlan->storage }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="CPU" class="form-label"><i class="fas fa-microchip me-2"></i>CPU</label>
                                <input type="text" class="form-control" id="CPU" name="CPU" value="{{ $hostingPlan->CPU }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type" class="form-label"><i class="fas fa-cube me-2"></i>Type</label>
                                <input type="text" class="form-control" id="type" name="type" value="{{ $hostingPlan->type }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="form-label"><i class="fas fa-info-circle me-2"></i>Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ $hostingPlan->description }}</textarea>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('hosting-plans.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>