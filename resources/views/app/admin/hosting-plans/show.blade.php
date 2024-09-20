<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h2>Detail Hosting Plan</h2>
        <table class="table">
            <tr>
                <th>ID</th>
                <td>{{ $hostingPlan->hosting_plans_id }}</td>
            </tr>
            <tr>
                <th>Group ID</th>
                <td>{{ $hostingPlan->group_id }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $hostingPlan->name }}</td>
            </tr>
            <tr>
                <th>Max Domain</th>
                <td>{{ $hostingPlan->max_domain }}</td>
            </tr>
            <tr>
                <th>Max Email Account</th>
                <td>{{ $hostingPlan->max_email_account }}</td>
            </tr>
            <tr>
                <th>Max Database</th>
                <td>{{ $hostingPlan->max_database }}</td>
            </tr>
            <tr>
                <th>Max IO</th>
                <td>{{ $hostingPlan->max_io }}</td>
            </tr>
            <tr>
                <th>NPROC</th>
                <td>{{ $hostingPlan->nproc }}</td>
            </tr>
            <tr>
                <th>Entry Process</th>
                <td>{{ $hostingPlan->entry_process }}</td>
            </tr>
            <tr>
                <th>Max Bandwidth</th>
                <td>{{ $hostingPlan->max_bandwidth }}</td>
            </tr>
            <tr>
                <th>SSL</th>
                <td>{{ $hostingPlan->ssl }}</td>
            </tr>
            <tr>
                <th>Backup</th>
                <td>{{ $hostingPlan->backup }}</td>
            </tr>
            <tr>
                <th>RAM</th>
                <td>{{ $hostingPlan->RAM }}</td>
            </tr>
            <tr>
                <th>Storage</th>
                <td>{{ $hostingPlan->storage }}</td>
            </tr>
            <tr>
                <th>CPU</th>
                <td>{{ $hostingPlan->CPU }}</td>
            </tr>
            <tr>
                <th>Description</th>
                <td>{{ $hostingPlan->description }}</td>
            </tr>
            <tr>
                <th>Type</th>
                <td>{{ $hostingPlan->type }}</td>
            </tr>
            <!-- Add other fields here -->
        </table>
        <a href="{{ route('hosting-plans.edit', $hostingPlan->hosting_plans_id) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('hosting-plans.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</body>

</html>