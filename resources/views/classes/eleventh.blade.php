<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>11th Standard Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/yourkitid.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
        crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background-color: #f4f4f4;
        }

        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.65)),
                url('https://images.unsplash.com/photo-1588072432836-e10032774350?auto=format&fit=crop&w=1600&q=80') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 100px 20px 60px;
            text-align: center;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .hero p {
            font-size: 20px;
            color: #ddd;
        }

        .section-title {
            text-align: center;
            font-weight: 700;
            color: #6a1b9a;
            margin: 50px 0 20px;
            font-size: 32px;
        }

        .course-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            padding: 40px 20px;
            max-width: 1100px;
            margin: 0 auto;
        }

        .course-box {
            background: #fff;
            border-radius: 15px;
            padding: 40px 20px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            text-decoration: none;
            color: #6a1b9a;
            font-weight: 600;
            font-size: 18px;
            position: relative;
        }

        .course-box i {
            font-size: 50px;
            margin-bottom: 15px;
            color: #6a1b9a;
            transition: 0.3s;
        }

        .course-box:hover {
            background-color: #6a1b9a;
            color: white;
            transform: translateY(-10px);
        }

        .course-box:hover i {
            color: white;
        }

        @media (max-width: 576px) {
            .hero h1 {
                font-size: 32px;
            }

            .hero p {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>

    <!-- Hero Section -->
    <section class="hero">
        <h1>11th Standard</h1>
        <p>Select your stream to explore the available courses</p>
    </section>

    <!-- Course Grid Section -->
    <h2 class="section-title">Available Streams</h2>
    <div class="course-grid">
        <a href="bio.html" class="course-box">
            <i class="fas fa-dna"></i>
            <div>Biology Group</div>
        </a>
        <a href="cs.html" class="course-box">
            <i class="fas fa-laptop-code"></i>
            <div>Computer Science Group</div>
        </a>
        <a href="pure.html" class="course-box">
            <i class="fas fa-atom"></i>
            <div>Pure Science Group</div>
        </a>
        <a href="ca.html" class="course-box">
            <i class="fas fa-calculator"></i>
            <div>Commerce + Computer Applications</div>
        </a>
        <a href="account.html" class="course-box">
            <i class="fas fa-chart-line"></i>
            <div>Commerce + Accountancy</div>
        </a>
        <a href="history.html" class="course-box">
            <i class="fas fa-landmark"></i>
            <div>History</div>
        </a>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>