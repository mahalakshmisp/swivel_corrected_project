{{-- resources/views/courses/purchase.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase Video</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { margin: 0; font-family: 'Outfit', sans-serif; color: #333; }
        .navbar { background: #fff; padding: 12px 30px; border-bottom: 1px solid #ddd; display: flex; justify-content: space-between; align-items: center; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05); position: sticky; top: 0; z-index: 999; }
        .title { font-size: 28px; font-weight: 800; color: #7e3d9c; }
        .buttons button { margin-left: 15px; background-color: #7e3d9c; color: white; font-weight: bold; border: none; padding: 10px 22px; border-radius: 25px; cursor: pointer; transition: background 0.3s ease; }
        .buttons button:hover { background-color: #9b59b6; }
    </style>
</head>
<body>
    @include('partials.header')
    <div class="container mt-5">
        <h2>Purchase Video</h2>
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $video->title }}</h5>
                <p>Video ID: {{ $video->id }}</p>
                <p>Course: <strong>{{ $course->name }}</strong></p>
                <p class="mt-2">Price: ₹{{ $video->price }}</p>
            </div>
        </div>

        @if(!$purchased)
            <form method="POST" action="{{ route('video.purchase.store', $video->id) }}">
                @csrf
                <div class="mb-3">
                    <label for="paymentMethod" class="form-label">Select Payment Method</label>
                    <select class="form-select" id="paymentMethod" name="payment_method" required>
                        <option value="upi">UPI</option>
                        <option value="card">Credit/Debit Card</option>
                        <option value="netbanking">Net Banking</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Pay & Purchase</button>
            </form>
        @else
            <div class="alert alert-success">You already own this video.</div>
            <a href="{{ route('courses.show', $course->slug) }}" class="btn btn-outline-success">Back to Course</a>
        @endif
    </div>
</body>
</html>