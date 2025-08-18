<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Stylish Course Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Merriweather:wght@700&family=Poppins&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #f9f9f9, #dce3f0);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            padding-top: 40px;
            margin: 0;
        }

        /* Layout container */
        .details-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 40px;
            margin-top: 50px;
        }

        /* Course image */
        .image-box img {
            width: 100%;
            max-width: 900px;
            height: auto;
            max-height: 500px;
            object-fit: contain;
            border-radius: 15px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
        }


        .image-box {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            /* background: linear-gradient(145deg, #e6e9f0, #f9f9f9); */
            border-radius: 20px;
            /* box-shadow: inset 0 0 0 4px rgba(255, 255, 255, 0.8), 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease; */
        }

        /* Course title */
        .course-title {
            font-family: 'Orbitron', sans-serif;
            font-size: 2.5rem;
            color: #2c3e50;
            letter-spacing: 1.5px;
            margin-bottom: 15px;
        }

        /* Price style */
        .price-tag {
            font-size: 2rem;
            color: #e74c3c;
            font-weight: 600;
        }

        /* Info card with glassmorphism effect */
        .info-card {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 20px;
            padding: 30px;
            backdrop-filter: blur(8px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease-in-out;
        }

        .info-card:hover {
            transform: scale(1.02);
        }

        /* Enroll button */
        .enroll-btn {
            background: linear-gradient(45deg, #6a11cb, #2575fc);
            border: none;
            color: white;
            padding: 12px;
            font-size: 1.1rem;
            letter-spacing: 1px;
            font-weight: bold;
            border-radius: 8px;
            transition: background 0.3s ease, transform 0.2s;
            width: 100%;
        }

        .enroll-btn:hover {
            background: linear-gradient(45deg, #2575fc, #6a11cb);
            transform: scale(1.03);
        }

        /* Feature list items */
        .list-group-item {
            border: none;
            background: transparent;
            font-size: 1rem;
            padding-left: 0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="details-container">
            <!-- Image Left -->
            <div class="image-box col-md-6">
                <img id="courseImage" src="" alt="Course Image" />
            </div>

            <!-- Details Right -->
            <div class="info-card col-md-5">
                <div class="course-title" id="courseTitle">Course Title</div>
                <p class="price-tag mt-3" id="coursePrice">₹--</p>
                <p class="text-muted" id="courseDescription">Loading description...</p>
                <ul class="list-group list-group-flush mb-4" id="featuresList"></ul>
                <button class="btn enroll-btn w-100" onclick="goToForm()">🚀 Enroll Now</button>
            </div>
        </div>
    </div>

    <script>

        function goToForm() {
            const params = new URLSearchParams(window.location.search);
            const course = courses[params.get("course")];

            const formURL = `form?course=${encodeURIComponent(course.name)}&price=${encodeURIComponent(course.price)}`;
            window.location.href = formURL;
        }

        const courses = {
            web: {
                name: 'Web Development Masterclass',
                price: '₹33,999 - Diamond Plan',
                image: 'assets/images/diamond/web.jpg',
                description: 'The Bronze Level Web Development Course introduces the basics of HTML, CSS, and JavaScript for building simple, responsive websites.',
                features: ['🕒 Duration: 3 Months', '👨‍💻 Hands-on Projects', '📜 Certification Included']
            },
            laravel: {
                name: 'Laravel ',
                price: '₹23,499 - Diamond Plan',
                image: 'assets/images/diamond/laravel.jpg',
                description: 'The Bronze Level Laravel Course offers a beginner-friendly introduction to Laravel fundamentals, guiding you through routing, controllers, and Blade templating to build dynamic web applications.',
                features: ['🧠 Advanced PHP Concepts', '🗄️ MySQL Integration', '📜 Real-time App Deployment']
            },
            js: {
                name: 'JavaScript Essentials',
                price: '₹19,999 - Diamond Plan',
                image: 'assets/images/diamond/js.jpg',
                description: 'The Bronze Level JavaScript Course introduces core JS concepts like variables, functions, loops, and DOM manipulation, enabling you to create interactive web pages with ease.',
                features: ['👨‍🏫 Expert Tutors', '🎓 Certificate of Completion', '💻 Browser & Node.js Training']
            },
            python: {
                name: 'Python for Beginners',
                price: '₹23,999 - Diamond Plan',
                image: 'assets/images/diamond/python.jpg',
                description: 'Start coding in Python with hands-on examples and real-world exercises, perfect for absolute beginners.',
                features: ['💡 Logical Thinking', '📚 Mini Projects', '🎓 Certificate Provided']
            },
            air: {
                name: 'Air Conditioning & Refrigeration',
                price: '₹13,999 - Diamond Plan',
                image: 'assets/images/diamond/Aircondition.jpg',
                description: 'Learn installation, repair, and maintenance of air conditioners and refrigeration systems.',
                features: ['🔧 Field Training', '🛠️ Tools Provided', '📋 Govt. Approved']
            },
            digital: {
                name: 'Digital Marketing Bootcamp',
                price: '₹33,999 - Diamond Plan',
                image: 'assets/images/diamond/digitalmarketing.jpg',
                description: 'Master digital tools like SEO, Google Ads, Facebook Marketing, and content strategy.',
                features: ['🌐 Social Media Ads', '📊 Analytics Setup', '🎯 Career Guidance']
            },
            english: {
                name: 'Spoken English & Personality',
                price: '₹7,999 - Diamond Plan',
                image: 'assets/images/diamond/English.png',
                description: 'Improve English fluency, grammar, and build confidence for interviews and professional settings.',
                features: ['🗣️ Daily Speaking Practice', '📖 Grammar Sessions', '👥 Group Discussions']
            },
            htmlcss: {
                name: 'HTML & CSS Crash Course',
                price: '₹19,999 - Diamond Plan',
                image: 'assets/images/diamond/html&css.jpg',
                description: 'Learn to design beautiful and responsive websites with HTML5 and modern CSS3 techniques.',
                features: ['🎨 Layout Techniques', '📱 Responsive Design', '💡 Web Design Tips']
            },
            java: {
                name: 'Java Programming Complete Guide',
                price: '₹23,999 - Diamond Plan',
                image: 'assets/images/diamond/java.jpg',
                description: 'Master Java syntax, OOP concepts, and create console and GUI-based applications to build Strong foundation for your carriers.',
                features: ['☕ Object Oriented Programming', '📱 Android Basics', '🎓 Final Project']
            },
            php: {
                name: 'PHP Backend Web Development',
                price: '₹19,999 - Diamond Plan',
                image: 'assets/images/diamond/php.png',
                description: 'Build secure backend systems with PHP, connect with MySQL, and manage sessions & forms handling, ideal for building dynamic web applications..',
                features: ['🛡️ Secure Auth System', '📂 MVC Pattern', '🔄 Form Handling']
            },
            ppc: {
                name: 'PPC (Pay-Per-Click) Advertising',
                price: '₹23,999 - Diamond Plan',
                image: 'assets/images/diamond/ppc.png',
                description: 'Run Google Ads and optimize paid ad campaigns for maximum ROI.',
                features: ['🔍 Keyword Planning', '📈 ROI Tracking', '💸 Budget Management']
            },
            seo: {
                name: 'Search Engine Optimization (SEO)',
                price: '₹23,999 - Diamond Plan',
                image: 'assets/images/diamond/seo.png',
                description: 'Rank websites on Google using on-page, off-page, and technical SEO techniques.',
                features: ['🛠️ Audit Tools', '🔗 Link Building', '📄 Content Strategy']
            },
            smm: {
                name: 'Social Media Marketing (SMM)',
                price: '₹23,999 - Diamond Plan',
                image: 'assets/images/diamond/smm.png',
                description: 'Build brand awareness and generate leads through Facebook, Instagram, LinkedIn & more.',
                features: ['📱 Instagram Reels', '📢 Ad Campaign Creation', '📆 Content Calendar Planning']
            }
        };

        const params = new URLSearchParams(window.location.search);
        const courseId = params.get("course");
        const course = courses[courseId];

        if (course) {
            document.getElementById("courseTitle").innerText = course.name;
            document.getElementById("coursePrice").innerText = course.price;
            document.getElementById("courseImage").src = course.image;
            document.getElementById("courseDescription").innerText = course.description;

            const featuresList = document.getElementById("featuresList");
            course.features.forEach(item => {
                const li = document.createElement('li');
                li.className = "list-group-item";
                li.textContent = item;
                featuresList.appendChild(li);
            });
        } else {
            document.querySelector(".container").innerHTML = `<h4 class="text-center mt-5 text-danger">Invalid course selection.</h4>`;
        }
    </script>
</body>

</html>