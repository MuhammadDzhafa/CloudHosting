<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit TLD</title>
    <link rel="stylesheet" href="{{ asset('path/to/your/css/styles.css') }}"> <!-- Ganti dengan path CSS Anda -->
</head>
<body>
    <div class="container">
        <h1>Edit TLD</h1>
        <a href="{{ route('tlds.index') }}" class="btn btn-secondary">Back to TLDs</a>
        <form action="{{ route('tlds.update', $tld) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="tld_name">TLD Name:</label>
                <input type="text" id="tld_name" name="tld_name" value="{{ $tld->tld_name }}" required>
            </div>
            <div class="form-group">
                <label for="tld_price">Price:</label>
                <input type="number" id="tld_price" name="tld_price" value="{{ $tld->tld_price }}" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Update TLD</button>
        </form>
    </div>
</body>
</html>
