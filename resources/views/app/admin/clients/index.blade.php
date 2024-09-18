<h1>Clients</h1>

<ul>
    @foreach($clients as $client)
        <li>
            <div><strong>Client ID:</strong> {{ $client->id }}</div>
            <div><strong>Email:</strong> {{ $client->email }}</div>
            <div><strong>Password:</strong> {{ $client->password }}</div>
            <div><strong>Phone Number:</strong> {{ $client->phone_number }}</div>
            <div><strong>Name:</strong> {{ $client->name }}</div>
            <div><strong>Picture:</strong> {{ $client->picture }}</div>
            <div><strong>Occupation:</strong> {{ $client->occupation }}</div>
            <div><strong>Facebook:</strong> {{ $client->facebook }}</div>
            <div><strong>Instagram:</strong> {{ $client->instagram }}</div>
            <div><strong>Created At:</strong> {{ $client->created_at }}</div>
            <div><strong>Updated At:</strong> {{ $client->updated_at }}</div>
        </li>
    @endforeach
</ul>