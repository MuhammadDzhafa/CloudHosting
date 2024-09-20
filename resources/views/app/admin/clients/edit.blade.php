<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Client</title>
    <!-- Tambahkan CSS dan JavaScript jika diperlukan -->
</head>
<body>
    <h1>Edit Client</h1>
    
    <!-- Formulir untuk memperbarui data klien -->
    <form action="{{ route('clients.update', $client->client_id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name', $client->name) }}" required>
        <br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email', $client->email) }}" required>
        <br>
        
        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $client->phone_number) }}" required>
        <br>
        
        <label for="picture">Picture:</label>
        <input type="text" id="picture" name="picture" value="{{ old('picture', $client->picture) }}">
        <br>
        
        <label for="occupation">Occupation:</label>
        <input type="text" id="occupation" name="occupation" value="{{ old('occupation', $client->occupation) }}">
        <br>
        
        <label for="facebook">Facebook:</label>
        <input type="text" id="facebook" name="facebook" value="{{ old('facebook', $client->facebook) }}">
        <br>
        
        <label for="instagram">Instagram:</label>
        <input type="text" id="instagram" name="instagram" value="{{ old('instagram', $client->instagram) }}">
        <br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="{{ old('password', $client->password) }}">
        <br>
        
        <button type="submit">Update Client</button>
    </form>
    
</body>
</html>
