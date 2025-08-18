{{-- resources/views/courses/show.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $course->name }} - Course</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        /* Swivtrek header styles from main page */
        body{margin:0}
        .navbar{background:#fff;padding:12px 30px;border-bottom:1px solid #ddd;display:flex;justify-content:space-between;align-items:center;box-shadow:0 4px 10px rgba(0,0,0,.05);position:sticky;top:0;z-index:999}
        .title{font-size:28px;font-weight:800;color:#7e3d9c}
        .buttons button{margin-left:15px;background-color:#7e3d9c;color:#fff;font-weight:bold;border:none;padding:10px 22px;border-radius:25px;cursor:pointer;transition:background .3s ease}
        .buttons button:hover{background-color:#9b59b6}
    </style>
    <style>
        .btn-eye{display:inline-flex;align-items:center;gap:.5rem;border-radius:9999px;padding:.5rem .75rem;border:1px solid #dee2e6;background:#fff;box-shadow:0 2px 6px rgba(0,0,0,.06);transition:.2s;}
        .btn-eye:hover{background:#f8f9fa;border-color:#adb5bd;transform:translateY(-1px)}
        .btn-eye .bi{font-size:1.1rem;color:#6c757d}
    </style>
    <style>
        /* Override with colorful 3D style */
        .btn-eye{border:none;background:linear-gradient(135deg,#ff7a18 0%,#af002d 70%);color:#fff;box-shadow:0 8px 16px rgba(175,0,45,.35),0 4px 0 rgba(0,0,0,.08),inset 0 2px 0 rgba(255,255,255,.25);padding:.6rem 1rem;border-radius:9999px;position:relative;transition:.2s}
        .btn-eye:hover{transform:translateY(-2px);box-shadow:0 14px 28px rgba(175,0,45,.45),0 6px 0 rgba(0,0,0,.08),inset 0 2px 0 rgba(255,255,255,.25)}
        .btn-eye:active{transform:translateY(0);box-shadow:0 8px 16px rgba(175,0,45,.35),inset 0 3px 0 rgba(0,0,0,.2)}
        .btn-eye:after{content:"";position:absolute;top:2px;left:6px;right:6px;height:46%;border-radius:9999px;background:linear-gradient(to bottom,rgba(255,255,255,.45),rgba(255,255,255,0));pointer-events:none}
        /* 3D eye icon (undo gradient text) */
        .btn-eye .bi{color:#fff;text-shadow:0 1px 0 rgba(0,0,0,.3),0 2px 1px rgba(0,0,0,.25);font-size:1.1rem}
    </style>
    <style>
        /* Animated green hover for View button */
        @keyframes greenPulse { 0%{ box-shadow:0 8px 16px rgba(40,167,69,.25) } 50%{ box-shadow:0 12px 24px rgba(40,167,69,.45) } 100%{ box-shadow:0 8px 16px rgba(40,167,69,.25) } }
        .btn-eye:hover{ background:linear-gradient(135deg,#28a745 0%,#1e7e34 70%) !important; color:#fff; animation: greenPulse 1.2s ease-in-out infinite }
        .btn-eye:hover .bi{ display:none }
        .btn-eye .eye-img{ display:none; width:20px; height:20px; object-fit:contain; filter: drop-shadow(0 1px 1px rgba(0,0,0,.25)); background: transparent; mix-blend-mode: multiply; }
        .btn-eye:hover .eye-img{ display:inline-block }
    </style>
    <style>
        /* Multi-stop RGB gradient (includes green) on hover */
        .btn-eye:hover{
            background: linear-gradient(135deg,
                rgb(34,197,94) 0%,   /* green */
                rgb(16,185,129) 25%, /* teal-green */
                rgb(59,130,246) 60%, /* blue */
                rgb(99,102,241) 100% /* indigo */
            ) !important;
            color:#fff;
            animation: greenPulse 1.2s ease-in-out infinite;
        }
    </style>
    <style>
        /* Enlarge View button on hover */
        .btn-eye{transition: transform .2s ease, box-shadow .2s ease, background .2s ease; isolation:isolate}
        .btn-eye:hover{transform: translateY(-2px) scale(1.08)}
    </style>
</head>
<body>
    {{-- Swivtrek Header --}}
    @include('partials.header')

    <div class="container">
        <h2 class="mb-4">{{ $course->name }}</h2>
        <h5>Uploaded Videos</h5>
        <div class="row">
            @forelse($course->videos as $video)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">{{ $video->title }}</h6>
                            <p>Video ID: {{ $video->id }}</p>

                            @php
                                $owned = auth()->check() && \App\Models\VideoPurchase::where('user_id', auth()->id())->where('video_id', $video->id)->exists();
                            @endphp

                            @auth
                                @if($owned)
                                    <button type="button" class="btn-eye mt-2" onclick="openFullscreen('{{ route('video.stream', $video->id) }}')" title="View purchased video">
                                        <i class="bi bi-eye-fill"></i>
                                        <img class="eye-img" src="{{ asset('assets/eye-realistic.png') }}" alt="eye">
                                        <span>View</span>
                                    </button>
                                @else
                                    <video class="preview" width="100%" controls>
                                        <source src="{{ asset('storage/' . $video->file_path) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                    <p class="mt-1 text-muted" style="font-size: 0.9rem;">Preview limited to 5 seconds.</p>
                                @endif
                            @else
                                <div class="alert alert-info" role="alert">
                                    Login to preview this video.
                                </div>
                                <a href="{{ route('login.redirect', ['to' => url()->current()]) }}" class="btn btn-outline-primary">Login to Preview</a>
                            @endauth

                            <p class="mt-2">Price: ₹{{ $video->price }}</p>
                            @auth
                                @if($owned)
                                    <span class="badge bg-success">Purchased</span>
                                @else
                                    <a href="{{ route('video.purchase', $video->id) }}" class="btn btn-success mt-2"
                                       @guest onclick="event.preventDefault(); window.location='{{ route('login.redirect', ['to' => url()->current()]) }}';" @endguest>
                                        Purchase
                                    </a>
                                @endif
                            @else
                                <a href="{{ route('login.redirect', ['to' => url()->current()]) }}" class="btn btn-success mt-2">Purchase</a>
                            @endauth
                        </div>
                    </div>
                </div>
            @empty
                <p>No videos uploaded for this course yet.</p>
            @endforelse
        </div>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary mt-3">Back to Courses</a>
    </div>

    {{-- Footer --}}
    <footer class="bg-dark text-white mt-5 p-4 text-center">
        &copy; {{ date('Y') }} Swivtrek. All rights reserved.
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const LIMIT = 5; // seconds
            document.querySelectorAll('video.preview').forEach(function (vid) {
                vid.addEventListener('timeupdate', function () {
                    if (vid.currentTime > LIMIT) {
                        vid.pause();
                        vid.currentTime = 0;
                    }
                });
            });
        });
        function openFullscreen(src) {
            const video = document.createElement('video');
            video.src = src;
            video.controls = true;
            video.autoplay = true;
            video.controlsList = 'nodownload noplaybackrate';
            video.oncontextmenu = (e) => e.preventDefault();
            video.style.position = 'fixed';
            video.style.top = '0';
            video.style.left = '0';
            video.style.width = '100vw';
            video.style.height = '100vh';
            video.style.background = '#000';
            video.style.zIndex = '9999';
            document.body.appendChild(video);
            if (video.requestFullscreen) video.requestFullscreen();
            video.addEventListener('click', function(){
                if (document.fullscreenElement) {
                    document.exitFullscreen();
                }
                video.pause();
                video.remove();
            });
        }
    </script>
</body>
</html>