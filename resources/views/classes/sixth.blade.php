<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>6th Standard - Courses</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/yourkitid.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
        crossorigin="anonymous"></script>

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            background-color: #f4f4f4;
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


        .hero-wrapper {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)),
                url('https://images.unsplash.com/photo-1588072432836-e10032774350?auto=format&fit=crop&w=1600&q=80') no-repeat center center;
            background-size: cover;
            color: white;
        }

        /* Transparent navbar to let the background show */
        .navbar {
            background: transparent;
            padding: 12px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        /* Hero styling remains */
        .hero {
            padding: 100px 20px 80px;
            text-align: center;
            color: white;
        }


        .search-bar {
            max-width: 600px;
            margin: 20px auto;
            display: flex;
            gap: 10px;
        }

        .course-card img {
            height: 200px;
            object-fit: cover;
        }

        .course-card .card-body {
            text-align: center;
        }

        .subject-title {
            font-size: 20px;
            font-weight: bold;
            color: #6a1b9a;
        }

        .quote {
            font-style: italic;
            color: #555;
            font-size: 15px;
            margin-top: 5px;
        }
    </style>
</head>

<body>

    <!-- Wrapper with common background -->
    <div class="hero-wrapper">
        <div class="navbar">
            <div class="title">Swivtrek</div>
            <div class="buttons">
                <button>LOGIN</button>
                <button>SIGN UP</button>
            </div>
        </div>

        <!-- Hero Section -->
        <section class="hero">
            <div class="container">
                <h1 class="display-5 fw-bold">6th Standard Subjects</h1>
                <div class="search-bar">
                    <input type="text" class="form-control" placeholder="What kind of training are you looking for?" />
                    <button class="btn btn-yellow">Search</button>
                </div>
                <p class="lead">Empower your learning with interactive lessons in your favorite subjects!</p>
            </div>
        </section>
    </div>


    <!-- Courses -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-5">Sixth Courses</h2>
            <div class="row g-4">

                <!-- Tamil -->
                <div class="col-md-4">
                    <div class="card course-card h-100">
                        <img src="/assets/sixth/1.png" class="card-img-top" alt="Tamil">
                        <div class="card-body">
                            <div class="subject-title">தமிழ் (Tamil)</div>
                            <p class="quote">"தமிழ் மொழி வாழ்க, தமிழ் எழுத்து மலர்க."</p>
                            <a href="{{ route('courses.index') }}" class="btn btn-warning mt-2">Purchase</a>
                        </div>
                    </div>
                </div>

                <!-- English -->
                <div class="col-md-4">
                    <div class="card course-card h-100">
                        <img src="/assets/sixth/2.png" class="card-img-top" alt="English">
                        <div class="card-body">
                            <div class="subject-title">English</div>
                            <p class="quote">"Read more, learn more, succeed more."</p>
                            <a href="{{ route('courses.index') }}" class="btn btn-warning mt-2">Purchase</a>
                        </div>
                    </div>
                </div>

                <!-- Maths -->
                <div class="col-md-4">
                    <div class="card course-card h-100">
                        <img src="/assets/sixth/3.png" class="card-img-top" alt="Maths">
                        <div class="card-body">
                            <div class="subject-title">கணிதம் (Maths)</div>
                            <p class="quote">"Math is not about numbers, it's about understanding."</p>
                            <a href="{{ route('courses.index') }}" class="btn btn-warning mt-2">Purchase</a>
                        </div>
                    </div>
                </div>

                <!-- Science -->
                <div class="col-md-4">
                    <div class="card course-card h-100">
                        <img src="/assets/sixth/4.png" class="card-img-top" alt="Science">
                        <div class="card-body">
                            <div class="subject-title">அறிவியல் (Science)</div>
                            <p class="quote">"Explore the universe, start with science."</p>
                            <a href="{{ route('courses.index') }}" class="btn btn-warning mt-2">Purchase</a>
                        </div>
                    </div>
                </div>

                <!-- Social Science -->
                <div class="col-md-4">
                    <div class="card course-card h-100">
                        <img src="/assets/sixth/5.png" class="card-img-top" alt="Social Science">
                        <div class="card-body">
                            <div class="subject-title">சமூக அறிவியல் (Social Science)</div>
                            <p class="quote">"Learn history, shape the future."</p>
                            <a href="{{ route('courses.index') }}" class="btn btn-warning mt-2">Purchase</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.querySelector('.search-bar input').addEventListener('input', function () {
            const keyword = this.value.toLowerCase();
            const cards = document.querySelectorAll('.course-card');

            cards.forEach(card => {
                const title = card.querySelector('.subject-title').textContent.toLowerCase();
                if (title.includes(keyword)) {
                    card.parentElement.style.display = 'block';
                } else {
                    card.parentElement.style.display = 'none';
                }
            });
        });
    </script>
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
            </div>
        </div>

        <div
            style="text-align: center; margin-top: 50px; font-size: 14px; color: #bbb; border-top: 1px solid rgba(255,255,255,0.1); padding-top: 20px;">
            © 2025 Swivel Training. All rights reserved.
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>