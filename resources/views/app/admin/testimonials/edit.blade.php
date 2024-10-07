{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Testimonial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Testimonial</h1>

        <!-- Menampilkan pesan error jika ada -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Edit Testimonial -->
        <form action="{{ route('testimonials.update', $testimonial->testimonial_id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Laravel method untuk update -->

            <div class="mb-3">
                <label for="domain_web" class="form-label">Domain Web</label>
                <input type="text" class="form-control" id="domain_web" name="domain_web" value="{{ $testimonial->domain_web }}" required>
            </div>

            <div class="mb-3">
                <label for="testimonial_text" class="form-label">Testimonial Text</label>
                <textarea class="form-control" id="testimonial_text" name="testimonial_text" rows="3" required>{{ $testimonial->testimonial_text }}</textarea>
            </div>

            <div class="mb-3">
                <label for="picture" class="form-label">Current Picture</label><br>
                @if ($testimonial->picture)
                    <img src="{{ asset('storage/testimonial_pictures/' . $testimonial->picture) }}" alt="Testimonial Picture" width="150">
                @else
                    <p>No picture available</p>
                @endif
            </div>

            <div class="mb-3">
                <label for="picture" class="form-label">Upload New Picture (optional)</label>
                <input type="file" class="form-control" id="picture" name="picture">
            </div>

            <div class="mb-3">
                <label for="occupation" class="form-label">Occupation</label>
                <input type="text" class="form-control" id="occupation" name="occupation" value="{{ $testimonial->occupation }}" required>
            </div>

            <div class="mb-3">
                <label for="facebook" class="form-label">Facebook URL</label>
                <input type="url" class="form-control" id="facebook" name="facebook" value="{{ $testimonial->facebook }}">
            </div>

            <div class="mb-3">
                <label for="instagram" class="form-label">Instagram URL</label>
                <input type="url" class="form-control" id="instagram" name="instagram" value="{{ $testimonial->instagram }}">
            </div>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('testimonials.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html> --}}
