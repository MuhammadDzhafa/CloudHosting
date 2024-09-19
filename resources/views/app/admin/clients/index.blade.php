<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <title>Create Client</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-warning">
        <div class="container-fluid">
        <a class="navbar-brand h1" href={{ route('clients.index') }}>CRUD Clients</a>
        <div class="justify-end ">
            <div class="col ">
            <a class="btn btn-sm btn-success" href={{ route('clients.create') }}>Add Client</a>
            </div>
        </div>
        </div>
    </nav>
    <ul>
    @foreach($clients as $client)
        <li>
            <div><strong>Client ID:</strong> {{ $client->id }}</div>
            <div><strong>Email:</strong> {{ $client->email }}</div>
            <div><strong>Password:</strong> {{ $client->password }}</div>
            <div><strong>Phone Number:</strong> {{ $client->phone_number }}</div>
            <div><strong>Name:</strong> {{ $client->name }}</div>
            <img src="{{ asset('storage/' . $client->picture) }}" alt="{{ $client->name }}'s Picture" style="width: 150px; height: 150px;">
            <div><strong>Occupation:</strong> {{ $client->occupation }}</div>
            <div><strong>Facebook:</strong> {{ $client->facebook }}</div>
            <div><strong>Instagram:</strong> {{ $client->instagram }}</div>
            <div><strong>Created At:</strong> {{ $client->created_at }}</div>
            <div><strong>Updated At:</strong> {{ $client->updated_at }}</div>
        </li>
    @endforeach
</ul>
</body>
</html>