{{-- resources/views/courses/upload.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Videos for {{ $course->name }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Upload up to 5 Videos for {{ $course->name }}</h2>
        <form action="{{ route('courses.uploadVideos', $course->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div id="video-upload-fields">
                @for($i = 0; $i < 5; $i++)
                    <div class="mb-4 border p-3 rounded">
                        <h5>Video {{ $i+1 }}</h5>
                        <div class="mb-2">
                            <label>Title</label>
                            <input type="text" name="videos[{{ $i }}][title]" class="form-control" />
                        </div>
                        <div class="mb-2">
                            <label>File</label>
                            <input type="file" name="videos[{{ $i }}][file]" class="form-control" />
                        </div>
                        <div class="mb-2">
                            <label>Price</label>
                            <input type="number" name="videos[{{ $i }}][price]" class="form-control" step="0.01" min="0" />
                        </div>
                    </div>
                @endfor
            </div>
            <button type="submit" class="btn btn-primary">Upload Videos</button>
        </form>
        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-secondary mt-3">Back to Course</a>
    </div>
</body>
</html>