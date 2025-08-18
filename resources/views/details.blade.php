<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Registration Records</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #e0f7fa, #e1bee7);
            font-family: 'Segoe UI', sans-serif;
        }

        h2 {
            font-weight: 700;
            color: #4a148c;
        }

        .card {
            border: none;
            border-radius: 15px;
            background: #fff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            color: #6a1b9a;
            font-weight: 600;
        }

        .badge-upi {
            background: linear-gradient(to right, #64b5f6, #1976d2);
        }

        .badge-emi {
            background: linear-gradient(to right, #ff8a65, #d84315);
        }

        .card-text strong {
            color: #333;
        }
    </style>
</head>

<body class="py-5">
    <div class="container">
        <h2 class="mb-5 text-center">Registered Freelancing Students</h2>

        <div class="row">
            @foreach ($freelancers as $freelancer)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card shadow-sm h-100 p-3">
                        <div class="card-body">
                            <h5 class="card-title">{{ $freelancer->name }}</h5>
                            <h6 class="card-subtitle mb-3 text-muted">{{ $freelancer->email }}</h6>

                            <p class="card-text"><strong>📞 Phone:</strong> {{ $freelancer->phone }}</p>
                            <p class="card-text"><strong>📍 Location:</strong> {{ $freelancer->location }}</p>
                            <p class="card-text"><strong>📚 Course:</strong> {{ $freelancer->course }}</p>
                            <p class="card-text"><strong>💰 Price:</strong> {{ $freelancer->price }}</p>

                            <p class="card-text">
                                <strong>💳 Payment Method:</strong>
                                @php
                                    $method = strtolower($freelancer->payment_method ?? $freelancer->paymentMethod);
                                @endphp

                                @if ($method === 'upi')
                                    <span class="badge badge-upi text-white px-3 py-1">UPI</span>
                                @elseif ($method === 'emi')
                                    <span class="badge badge-emi text-white px-3 py-1">EMI</span>
                                @else
                                    <span class="badge bg-secondary">N/A</span>
                                @endif
                            </p>

                            @if ($method === 'emi' && !empty($freelancer->duration))
                                <p class="card-text"><strong>⏳ EMI Duration:</strong> {{ $freelancer->duration }} months</p>
                            @endif
                            <p class="card-text"><strong>📅 Time:</strong> {{ $freelancer->updated_at }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @if ($freelancers->isEmpty())
            <p class="text-center text-muted">No registrations found.</p>
        @endif
    </div>
</body>

</html>
