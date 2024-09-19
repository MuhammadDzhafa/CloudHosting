<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TLDs</title>
    <link rel="stylesheet" href="{{ asset('path/to/your/css/styles.css') }}"> <!-- Ganti dengan path CSS Anda -->
</head>
<body>
    <div class="container">
        <h1>TLDs</h1>
        <a href="{{ route('tlds.create') }}" class="btn btn-primary">Add New TLD</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tlds as $tld)
                    <tr>
                        <td>{{ $tld->tld_name }}</td>
                        <td>${{ number_format($tld->tld_price, 2) }}</td>
                        <td>
                            <a href="{{ route('tlds.edit', $tld) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('tlds.destroy', $tld) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
