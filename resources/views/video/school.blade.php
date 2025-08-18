<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Select Your Class - Swivtrek</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: 'Outfit', sans-serif;
            margin: 0;
            background-color: #f4f4f4;
        }

        /* Hero Section with Background */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url('https://images.unsplash.com/photo-1588072432836-e10032774350?auto=format&fit=crop&w=1600&q=80') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 100px 20px;
            text-align: center;
        }

        .hero h1 {
            font-size: 48px;
            font-weight: 700;
        }

        .hero p {
            font-size: 20px;
            margin-top: 10px;
            color: #ddd;
        }

        /* Class Card Grid */
        .class-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 25px;
            max-width: 1000px;
            margin: -60px auto 40px;
            padding: 0 20px;
            position: relative;
            z-index: 1;
        }

        .class-box {
            background: white;
            border-radius: 12px;
            padding: 30px 20px;
            text-align: center;
            font-size: 20px;
            font-weight: 600;
            color: #6a1b9a;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .class-box:hover {
            transform: scale(1.05);
            background-color: #a979c8;
            color: white;
        }

        .class-box i {
            font-size: 40px;
            margin-bottom: 15px;
            display: block;
            color: #6a1b9a;
            transition: 0.3s;
        }

        .class-box:hover i {
            color: white;
        }

        /* Quotes Section */
        .quotes-section {
            background: #fff;
            padding: 60px 20px;
            text-align: center;
        }

        .quotes-section h2 {
            color: #6a1b9a;
            font-weight: 700;
            margin-bottom: 30px;
        }

        .quote {
            font-size: 18px;
            font-style: italic;
            color: #444;
            max-width: 800px;
            margin: 0 auto 20px;
        }

        .quote::before {
            content: "“";
            font-size: 30px;
            vertical-align: top;
            color: #999;
        }

        .quote::after {
            content: "”";
            font-size: 30px;
            vertical-align: bottom;
            color: #999;
        }

        @media (max-width: 600px) {
            .hero h1 {
                font-size: 32px;
            }

            .hero p {
                font-size: 16px;
            }
        }

        .hero-quote {
            font-style: italic;
            font-size: 18px;
            color: #eee;
            margin-top: 20px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<body>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Start Learning Today</h1>
        <p>Select your class level to begin your journey</p>
        <blockquote class="hero-quote">"The future belongs to those who believe in the beauty of their dreams."
        </blockquote>
    </section>


    <!-- Class Selection Cards -->
    <div class="container my-5">

        <!-- First Row: 4 cards -->
        <div class="d-flex justify-content-center flex-wrap gap-4 mb-4">
            <a href="/classes/sixth" class="class-box">
                <i class="fas fa-book-open"></i>
                6th Standard
            </a>
            <a href="/classes/seventh" class="class-box">
                <i class="fas fa-book-reader"></i>
                7th Standard
            </a>
            <a href="/classes/eight" class="class-box">
                <i class="fas fa-chalkboard-teacher"></i>
                8th Standard
            </a>
            <a href="/classes/ninenth" class="class-box">
                <i class="fas fa-graduation-cap"></i>
                9th Standard
            </a>
        </div>

        <!-- Second Row: 3 cards centered -->
        <div class="d-flex justify-content-center flex-wrap gap-4">
            <a href="/classes/tenth" class="class-box">
                <i class="fas fa-laptop-code"></i>
                10th Standard
            </a>
            <a href="/classes/eleventh" class="class-box">
                <i class="fas fa-microscope"></i>
                11th Standard
            </a>
            <a href="/classes/twelth" class="class-box">
                <i class="fas fa-university"></i>
                12th Standard
            </a>
        </div>

    </div>
    <footer style="background-color: #0e1a33; color: white; padding: 60px 40px; font-family: 'Outfit', sans-serif;">
        <div
            style="max-width: 1400px; margin: auto; display: flex; flex-wrap: wrap; justify-content: space-between; gap: 40px;">

            <!-- Left Column -->
            <div style="flex: 1; min-width: 300px;">
                <h2 style="font-size: 30px; font-weight: 800; margin-bottom: 20px;">Let’s Talk</h2>
                <p style="font-size: 16px; line-height: 1.7; max-width: 500px;">
                    Every project starts with a chat. Joven leads our client conversations and will be happy to discuss
                    your
                    project.
                    He will also pull in the right people from the team when needed.
                </p>
                <br />
                <a href="#"
                    style="background-color: #28a745; padding: 12px 24px; color: #fff; text-decoration: none; font-weight: bold; border-radius: 6px; display: inline-block;">
                    Tell us about your project
                </a>
            </div>

            <!-- Right Column (Contact Info + Icons) -->
            <div style=" min-width: 100px;">
                <div style="display: flex; flex-direction: column; gap: 15px; font-size: 16px;">
                    <div style="display: flex; align-items: center;">
                        <i class="fas fa-envelope" style="color: #3fa0ff; margin-right: 10px;"></i>
                        <span><a href="mailto:admin@swivel.co.in"
                                style="color: #3fa0ff; text-decoration: none;">admin@swivel.co.in</a></span>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <i class="fas fa-phone" style="color: #3fa0ff; margin-right: 10px;"></i>
                        <span><a href="tel:+918300504230"
                                style="color: #3fa0ff; text-decoration: none;">+91-8300504230</a></span>
                    </div>
                    <div style="display: flex; align-items: flex-start; gap: 10px; line-height: 1.6; max-width: 400px;">
                        <i class="fas fa-map-marker-alt" style="color: #3fa0ff; margin-top: 4px;"></i>
                        <span>
                            <a href="https://g.co/kgs/X4Nid87" target="_blank"
                                style="color: #3fa0ff; text-decoration: none;">
                                Mahatma Gandhi Nagar Rd, near Annai Therasa English School,
                                MRR Nagar, Palani Chettipatti,<br>
                                Theni, Tamil Nadu 625531
                            </a>
                        </span>
                    </div>

                </div>

                <!-- Social Icons -->
                <div style="margin-top: 30px;" class="footer_detail">
                    <a href="https://x.com/Swivel_Training" style="margin-right: 15px; color: #ccc;"><i
                            class="fab fa-twitter fa-lg"></i></a>
                    <a href="https://www.facebook.com/profile.php?id=61573324123476"
                        style="margin-right: 15px; color: #ccc;"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="https://www.instagram.com/swivel.training/?hl=en"
                        style="margin-right: 15px; color: #ccc;"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="https://www.linkedin.com/company/105973101/admin/dashboard/"
                        style="margin-right: 15px; color: #ccc;"><i class="fab fa-linkedin fa-lg"></i></a>
                    <a href="https://www.youtube.com/@Swivel-training" style="margin-right: 15px; color: #ccc;"><i
                            class="fab fa-youtube fa-lg"></i></a>
                </div>
            </div>f
        </div>

        <div
            style="text-align: center; margin-top: 50px; font-size: 14px; color: #bbb; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 20px;">
            © 2025 Swivel Training. All rights reserved.
        </div>
    </footer>

</body>

</html>