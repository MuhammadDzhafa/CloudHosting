<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New TLD</title>
    <link rel="stylesheet" href="path/to/your/css/styles.css"> <!-- Ganti dengan path CSS Anda -->
</head>

<body>
    <div class="container">
        <h1>Add New TLD</h1>
        <a href="{{ route('tlds.index') }}"  class="btn btn-secondary">Back to TLDs</a>
        <form action="{{ route('tlds.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tld_name">TLD Name:</label>
                <input type="text" id="tld_name" name="tld_name" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" id="price" name="tld_price" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary">Add TLD</button>
        </form>
    </div>
</body>

</html>