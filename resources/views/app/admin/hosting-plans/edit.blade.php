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
        <form action="{{ route('hosting-plans.update', $hostingPlan->hosting_plans_id) }}" method="POST">
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
            <div class="form-group">
                <label for="group_id">Max Domain</label>
                <input type="text" class="form-control" id="max_domain" name="max_domain" value="{{ $hostingPlan->max_domain }}" required>
            </div>
            <div class="form-group">
                <label for="max_addon_domain">Max Addon Domain</label>
                <input type="text" class="form-control" id="max_addon_domain" name="max_addon_domain" value="{{ $hostingPlan->max_addon_domain }}" required>
            </div>
            <div class="form-group">
                <label for="name">Max Email Account</label>
                <input type="text" class="form-control" id="max_email_account" name="max_email_account" value="{{ $hostingPlan->max_email_account }}" required>
            </div>

            <div class="form-group">
                <label for="group_id">Max Database</label>
                <input type="text" class="form-control" id="max_database" name="max_database" value="{{ $hostingPlan->max_database }}" required>
            </div>
            <div class="form-group">
                <label for="name">Max IO</label>
                <input type="text" class="form-control" id="max_io" name="max_io" value="{{ $hostingPlan->max_io }}" required>
            </div>
            <div class="form-group">
                <label for="group_id">NPROC</label>
                <input type="text" class="form-control" id="nproc" name="nproc" value="{{ $hostingPlan->nproc }}" required>
            </div>
            <div class="form-group">
                <label for="name">Entry Process</label>
                <input type="text" class="form-control" id="entry_process" name="entry_process" value="{{ $hostingPlan->entry_process }}" required>
            </div>

            <div class="form-group">
                <label for="group_id">Max Bandwidth</label>
                <input type="text" class="form-control" id="max_bandwidth" name="max_bandwidth" value="{{ $hostingPlan->max_bandwidth }}" required>
            </div>
            <div class="form-group">
                <label for="name">SSL</label>
                <input type="text" class="form-control" id="ssl" name="ssl" value="{{ $hostingPlan->ssl }}" required>
            </div>
            <div class="form-group">
                <label for="group_id">Backup</label>
                <input type="text" class="form-control" id="backup" name="backup" value="{{ $hostingPlan->backup }}" required>
            </div>
            <div class="form-group">
                <label for="name">RAM</label>
                <input type="text" class="form-control" id="RAM" name="RAM" value="{{ $hostingPlan->RAM }}" required>
            </div>

            <div class="form-group">
                <label for="group_id">Storage</label>
                <input type="text" class="form-control" id="storage" name="storage" value="{{ $hostingPlan->storage }}" required>
            </div>
            <div class="form-group">
                <label for="name">CPU</label>
                <input type="text" class="form-control" id="CPU" name="CPU" value="{{ $hostingPlan->CPU }}" required>
            </div>
            <div class="form-group">
                <label for="group_id">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ $hostingPlan->description }}" required>
            </div>
            <div class="form-group">
                <label for="name">Type</label>
                <input type="text" class="form-control" id="type" name="type" value="{{ $hostingPlan->type }}" required>
            </div>
            <!-- Add other form fields here -->
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>

</html>