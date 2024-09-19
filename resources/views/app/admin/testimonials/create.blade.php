<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Testimonial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Add Testimonial</h1>
        <form action="{{ route('testimonials.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="domain_web" class="form-label">Domain Web</label>
                <input type="text" class="form-control" id="domain_web" name="domain_web" required>
            </div>
            <div class="mb-3">
                <label for="testimonial_text" class="form-label">Testimonial Text</label>
                <textarea class="form-control" id="testimonial_text" name="testimonial_text" rows="3" required></textarea>
            </div>
            <div class="mb-3">
                <label for="picture" class="form-label">Picture (optional)</label>
                <input type="file" class="form-control" id="picture" name="picture">
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
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
