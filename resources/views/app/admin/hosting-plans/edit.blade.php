<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h2>Edit Hosting Plan</h2>
        <form action="{{ route('hosting-plans.update', $hostingPlan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="group_id">Group ID</label>
                <input type="text" class="form-control" id="group_id" name="group_id" value="{{ $hostingPlan->group_id }}" required>
            </div>
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $hostingPlan->name }}" required>
            </div>
            <!-- Add other form fields here -->
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>