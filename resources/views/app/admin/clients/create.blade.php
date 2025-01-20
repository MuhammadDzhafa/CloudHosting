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
    </div>
  </nav>

  <div class="container h-100 mt-5">
    <div class="row h-100 justify-content-center align-items-center">
      <div class="col-10 col-md-8 col-lg-6">
        <h3>Add a Client</h3>
        <form action="{{ route('clients.store') }}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="tel" class="form-control" id="phone_number" name="phone_number">
          </div>
          <div class="form-group">
            <label class="picture" for="picture">GAMBAR</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="picture" name="picture">
                @error('image')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
          <div class="form-group">
            <label for="occupation">Occupation</label>
            <input type="text" class="form-control" id="occupation" name="occupation">
          </div>
          <div class="form-group">
            <label for="facebook">Facebook Profile (Optional)</label>
            <input type="url" class="form-control" id="facebook" name="facebook">
          </div>
          <div class="form-group">
            <label for="instagram">Instagram Profile (Optional)</label>
            <input type="url" class="form-control" id="instagram" name="instagram">
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Create Client</button>
        </f>
      </div>
    </div>
  </div>
</body>
</html>