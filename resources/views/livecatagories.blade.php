<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Course Levels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: url('https://t3.ftcdn.net/jpg/02/13/59/40/360_F_213594025_gAzvAKRuB2uYrfBc88HhwSZBb1M4eWWA.jpg') center/cover fixed;
        }

        .overlay {
            background: rgba(0, 0, 0, 0.6);
            min-height: 100vh;
            padding-bottom: 50px;
        }

        .sticky-heading {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: rgba(50, 50, 50, 0.85);
            text-align: center;
            padding: 15px;
            color: #fff;
            font-weight: bold;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.4);
        }

        .course-link {
            text-decoration: none;
            color: inherit;
        }

        .course-card {
            position: relative;
            border-radius: 15px;
            padding: 40px 25px;
            margin: 30px 0;
            text-align: center;
            color: white;
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(6px);
            overflow: hidden;
            transition: 0.3s;
        }

        .course-card:hover {
            transform: scale(1.03);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.5);
            z-index: 10;
        }

        .course-card::before {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(255, 255, 255, 0.15);
            opacity: 0;
            transition: 0.3s;
            z-index: 0;
        }

        .course-card:hover::before {
            opacity: 1;
        }

        .course-card>* {
            position: relative;
            z-index: 1;
        }

        .course-card i {
            font-size: 40px;
            margin-bottom: 15px;
        }

        .bronze h3 {
            color: #cd7f32;
        }

        .silver h3 {
            color: #c0c0c0;
        }

        .gold h3 {
            color: #ffd700;
        }

        .diamond h3 {
            color: #00c4ff;
        }

        .container {
            max-width: 900px;
        }
    </style>
</head>

<body>
    <div class="overlay">
        <div class="sticky-heading">
            <h2>Live Course Levels</h2>
        </div>
        <div class="container">

            <a href="/bronze" class="course-link">
                <div class="course-card bronze">
                    <i class="fas fa-medal"></i>
                    <h3>Bronze Level Course</h3>
                    <p>Introductory course for beginners to learn the basics.</p>
                </div>
            </a>

            <a href="/silver" class="course-link">
                <div class="course-card silver">
                    <i class="fas fa-award"></i>
                    <h3>Silver Level Course</h3>
                    <p>Intermediate course to strengthen your core knowledge.</p>
                </div>
            </a>

            <a href="/gold" class="course-link">
                <div class="course-card gold">
                    <i class="fas fa-trophy"></i>
                    <h3>Gold Level Course</h3>
                    <p>Advanced course with real-world challenges and projects.</p>
                </div>
            </a>

            <a href="/diamond" class="course-link">
                <div class="course-card diamond">
                    <i class="fas fa-gem"></i>
                    <h3>Diamond Level Course</h3>
                    <p>Premium mentorship and career-focused certification track.</p>
                </div>
            </a>

        </div>
    </div>
</body>

</html>