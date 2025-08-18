{{-- resources/views/courses/index.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Outfit', sans-serif; }
        .course-list {
            display: flex;
            flex-direction: row;
            gap: 2rem;
            overflow-x: auto;
            padding: 2rem 0;
        }
        .course-card {
            min-width: 250px;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 1rem;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
            color:#fff;
            border:none;
            border-radius:16px;
            overflow:hidden;
            position:relative;
            box-shadow:0 12px 24px rgba(0,0,0,.12);
            transition:transform .2s ease, box-shadow .2s ease;
        }
        .course-card:hover {
            transform: translateY(-4px) scale(1.02);
            box-shadow:0 16px 32px rgba(0,0,0,.18);
        }
        .course-card:nth-of-type(3n+1){
            background: linear-gradient(135deg, rgb(34,197,94) 0%, rgb(16,185,129) 50%, rgb(59,130,246) 100%);
        }
        .course-card:nth-of-type(3n+2){
            background: linear-gradient(135deg, rgb(255,122,24) 0%, rgb(233,30,99) 60%, rgb(156,39,176) 100%);
        }
        .course-card:nth-of-type(3n){
            background: linear-gradient(135deg, rgb(99,102,241) 0%, rgb(56,189,248) 60%, rgb(34,197,94) 100%);
        }
        .course-card .card-body { position:relative; z-index:2; }
        .course-card::after{
            content:"";
            position:absolute;
            inset:0;
            background: radial-gradient( circle at 20% 10%, rgba(255,255,255,.15), transparent 40%),
            radial-gradient( circle at 80% 80%, rgba(0,0,0,.15), transparent 40%);
            z-index:1;
        }
        .course-card .btn {
            border:none;
            border-radius:9999px;
            padding:.5rem 1rem;
            font-weight:600;
            background: rgba(255,255,255,.2);
            color:#fff;
            backdrop-filter: blur(4px);
            box-shadow:0 4px 12px rgba(0,0,0,.15);
        }
        .course-card .btn:hover {
            background: rgba(255,255,255,.3);
            color:#fff;
        }
        .course-card .card-title, .course-card p {
            color:#fff;
        }
        .navbar {
            background: #fff;
            padding: 12px 30px;
            border-bottom: 1px solid #ddd;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 0;
            z-index: 999;
        }
        .title {
            font-size: 28px;
            font-weight: 800;
            color: #7e3d9c;
        }
        .buttons button {
            margin-left: 15px;
            background-color: #7e3d9c;
            color: white;
            font-weight: bold;
            border: none;
            padding: 10px 22px;
            border-radius: 25px;
            cursor: pointer;
            transition: background 0.3s ease;
        }
        .buttons button:hover {
            background-color: #9b59b6;
        }
        /* Catchy gradient View Course button */
        .btn-view{
            display:inline-flex;
            align-items:center;
            gap:.5rem;
            border:none;
            border-radius:9999px;
            padding:.55rem 1rem;
            color:#fff;
            text-decoration:none;
            font-weight:700;
            letter-spacing:.2px;
            background:linear-gradient(135deg,#ff7a18 0%,#e91e63 50%,#7e3d9c 100%);
            box-shadow:0 8px 16px rgba(126,61,156,.35);
            transition:transform .2s ease,box-shadow .2s ease,filter .2s ease
        }
        .btn-view:hover{
            transform:translateY(-2px) scale(1.04);
            box-shadow:0 14px 28px rgba(126,61,156,.45);
            filter:saturate(1.1)
        }
        .btn-view .sparkle{
            width:14px;
            height:14px;
            border-radius:50%;
            background:radial-gradient(circle at 30% 30%, #fff, rgba(255,255,255,0) 60%);
            animation:twinkle 1.5s ease-in-out infinite
        }
        @keyframes twinkle{
            0%,100%{
                opacity:.6;
                transform:scale(1)
            }
            50%{
                opacity:1;
                transform:scale(1.2)
            }
        }
        /* Ensure overlays don't block clicks */
        .container .card::after{ pointer-events:none; }
        /* Ensure clickable button above overlays */
        .card { position: relative; }
        .card .card-body { position: relative; z-index: 2; }
        .container .card::after { pointer-events: none !important; z-index: 1 !important; }
        .btn-view { position: relative; z-index: 5; pointer-events: auto; display: inline-flex; }
    </style>
</head>
<body>
      @include('partials.header')
    {{-- Swivtrek Signup/Login Section --}}
    

    <div class="container">
        <h2 class="mb-4">Courses</h2>
        <div class="course-list">
            @foreach($courses as $course)
                <div class="course-card">
                    <h4>{{ $course->name }}</h4>
                    {{-- Replace default button with catchy gradient button --}}
                    {{-- Ensure the View button uses a valid route (slug preferred, fallback to numeric ID) --}}
                    <a href="{{ isset($course) && !empty($course->slug) 
                                ? route('courses.show', $course->slug) 
                                : (isset($course) 
                                    ? route('courses.show.id', $course->id) 
                                    : (!empty($c->slug) 
                                        ? route('courses.show', $c->slug) 
                                        : route('courses.show.id', $c->id))) }}" 
                       class="btn-view">View Course <span class="sparkle"></span></a>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Footer --}}
    <footer class="bg-dark text-white mt-5 p-4 text-center">
        &copy; {{ date('Y') }} Swivtrek. All rights reserved.
    </footer>
</body>
</html>