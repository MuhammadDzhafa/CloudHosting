<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Hosting Plan</title>
    <!-- Tambahkan Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: bold;
            color: #343a40;
        }

        .form-control {
            margin-bottom: 20px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Tambah Hosting Plan</h2>
        <form action="{{ route('hosting-plans.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="group_id">Group ID</label>
                        <input type="text" name="group_id" class="form-control" placeholder="Group ID">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Nama Plan</label>
                        <input type="text" name="name" class="form-control" placeholder="Nama Plan">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="max_domain">Max Domain</label>
                        <input type="text" name="max_domain" class="form-control" placeholder="Max Domain">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="max_addon_domain">Max Addon Domain</label>
                        <input type="text" name="max_addon_domain" class="form-control" placeholder="Max Addon Domain" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="max_email_account">Max Email Account</label>
                        <input type="text" name="max_email_account" class="form-control" placeholder="Max Email Account" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="max_database">Max Database</label>
                        <input type="text" name="max_database" class="form-control" placeholder="Max Database" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="max_io">Max IO</label>
                        <input type="text" name="max_io" class="form-control" placeholder="Max IO" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nproc">NPROC</label>
                        <input type="text" name="nproc" class="form-control" placeholder="NPROC" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="entry_process">Entry Process</label>
                        <input type="text" name="entry_process" class="form-control" placeholder="Entry Process" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="max_bandwidth">Max Bandwidth</label>
                        <input type="text" name="max_bandwidth" class="form-control" placeholder="Max Bandwidth" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="ssl">SSL</label>
                <input type="text" name="ssl" class="form-control" placeholder="SSL" required>
            </div>

            <div class="form-group">
                <label for="backup">Backup</label>
                <input type="text" name="backup" class="form-control" placeholder="Backup" required>
            </div>

            <div class="form-group">
                <label for="RAM">RAM</label>
                <input type="text" name="RAM" class="form-control" placeholder="RAM" required>
            </div>

            <div class="form-group">
                <label for="storage">Storage</label>
                <input type="text" name="storage" class="form-control" placeholder="Storage" required>
            </div>

            <div class="form-group">
                <label for="CPU">CPU</label>
                <input type="text" name="CPU" class="form-control" placeholder="CPU" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control" placeholder="Description" rows="4" required></textarea>
            </div>

            <div class="form-group">
                <label for="type">Type</label>
                <input type="text" name="type" class="form-control" placeholder="Type" required>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
    <!-- Tambahkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>