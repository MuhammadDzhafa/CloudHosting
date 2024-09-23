<!-- resources/views/app/admin/clients/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients Index</title>
    <!-- Add your CSS for modal styling here -->
</head>
<body>
    <h1>Client List</h1>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->email }}</td>
                    <td>{{ $client->phone_number }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('clients.edit', $client->client_id) }}">Edit</a>
                        
                        <!-- Delete Button triggers modal -->
                        <button onclick="showDeleteModal({{ $client->client_id }})">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- The Modal -->
    <div id="deleteModal" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0, 0, 0, 0.5);">
        <div style="margin:15% auto; padding:20px; background:white; width:30%; text-align:center;">
            <p>Are you sure you want to delete this client?</p>
            <form id="deleteForm" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Yes, delete</button>
                <button type="button" onclick="hideDeleteModal()">Cancel</button>
            </form>
        </div>
    </div>

    <!-- JavaScript to handle the modal -->
    <script>
        function showDeleteModal(clientId) {
            // Update the form's action to include the correct client ID
            const form = document.getElementById('deleteForm');
            form.action = '/clients/' + clientId;
            
            // Show the modal
            document.getElementById('deleteModal').style.display = 'block';
        }

        function hideDeleteModal() {
            // Hide the modal
            document.getElementById('deleteModal').style.display = 'none';
        }
    </script>

</body>
</html>

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
        <a class="navbar-brand h1" href="clients">CRUD Clients</a>
        <div class="justify-end ">
            <div class="col ">
            <a class="btn btn-sm btn-success" href="clients/create">Add Client</a>
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