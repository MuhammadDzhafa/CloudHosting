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
                <th>Nama</th>
                <td>{{ $hostingPlan->name }}</td>
            </tr>
            <tr>
                <th>Group ID</th>
                <td>{{ $hostingPlan->group_id }}</td>
            </tr>
            <!-- Add other fields here -->
        </table>
        <a href="{{ route('hosting-plans.edit', $hostingPlan->hosting_plans_id) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('hosting-plans.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
</body>

</html>