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
