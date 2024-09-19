<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonials</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Testimonials</h1>
        <a href="{{ route('testimonials.create') }}" class="btn btn-primary mb-3">Add Testimonial</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Domain Web</th>
                    <th>Testimonial Text</th>
                    <th>Picture</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($testimonials as $testimonial)
                <tr>
                    <td>{{ $testimonial->testimonial_id }}</td>
                    <td>{{ $testimonial->domain_web }}</td>
                    <td>{{ $testimonial->testimonial_text }}</td>
                    <td>
                        @if ($testimonial->picture)
                            <img src="{{ asset('storage/' . $testimonial->picture) }}" alt="Picture" style="width: 100px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('testimonials.edit', $testimonial->testimonial_id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('testimonials.destroy', $testimonial->testimonial_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</body>
</html>
