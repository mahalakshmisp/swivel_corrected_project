{{-- resources/views/courses/general_upload.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>General Video Upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Upload up to 5 Videos</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('general.uploadVideos') }}" method="POST" enctype="multipart/form-data">
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
                        <div class="mb-2">
                            <label>Course</label>
                            <select name="videos[{{ $i }}][course_id]" class="form-control">
                                <option value="">Select Course</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endfor
            </div>
            <button type="submit" class="btn btn-primary">Upload Videos</button>
        </form>
        <p class="mt-3 text-muted">You can upload even just one video. Leave other fields blank.</p>
    </div>
</body>
</html>