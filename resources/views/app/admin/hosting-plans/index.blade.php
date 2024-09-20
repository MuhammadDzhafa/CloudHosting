<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Group ID</th>
                    <th>RAM</th>
                    <th>CPU</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hostingPlans as $plan)
                <tr>
                    <td>{{ $plan->hosting_plans_id }}</td>
                    <td>{{ $plan->name }}</td>
                    <td>{{ $plan->group_id }}</td>
                    <td>{{ $plan->RAM }}</td>
                    <td>{{ $plan->CPU }}</td>
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
</body>

</html>