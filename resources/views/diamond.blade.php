<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Training Programs Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet">

    <style>
        .image-card {
            margin-bottom: 20px;
            border-radius: 10px;
            background-color: transparent;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .image-card:hover {
            transform: scale(1.03);
        }

        .image-card img {
            width: 100%;
            height: 250px;
            object-fit: content;
            border-radius: 10px;

        }

        h2.text-center {
            /* ...existing styles... */
            border: 1px solid rgba(255, 255, 255, 0.1);
            text-shadow: 1px 1px 2px rgba(255, 255, 255, 0.1);
            font-size: 27px;
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;

        }


        .search-bar {
            text-align: center;
            margin-bottom: 30px;
        }

        .search-bar input {
            padding: 10px;
            width: 60%;
            max-width: 400px;
            font-size: 16px;
            border-radius: 8px;
            border: 1px solid #aaa;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }


        .image-card {
            height: 270px;
            padding: 10px;
            display: flex;
            align-items: center;
            /* background-color: transparent; */
            justify-content: center;
        }



        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: beige;
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
        }

        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .card-wrapper {
            position: relative;
        }
    </style>
</head>

<body>
    <div class="container py-5">
        <h2 class="text-center mb-4"> Explosive mastery Reserved for elite learners who reach stellar performance.</h2>
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search Courses..." oninput="filterCourses()" />
        </div>
        <div class="row" id="gallery"></div>
    </div>
    <div>
        <script>
            const programs = [
                { name: 'Web Development', img: 'assets/images/diamond/web.jpg', id: 'web' },
                { name: 'Laravel', img: 'assets/images/diamond/laravel.jpg', id: 'laravel' },
                { name: 'JavaScript', img: 'assets/images/diamond/js.jpg', id: 'js' },
                { name: 'Python', img: 'assets/images/diamond/python.jpg', id: 'python' },
                { name: 'Air Conditioning', img: 'assets/images/diamond/Aircondition.jpg', id: 'air' },
                { name: 'Digital Marketing', img: 'assets/images/diamond/digitalmarketing.jpg', id: 'digital' },
                { name: 'English', img: 'assets/images/diamond/English.png', id: 'english' },
                { name: 'HTML & CSS', img: 'assets/images/diamond/html&css.jpg', id: 'htmlcss' },
                { name: 'Java', img: 'assets/images/diamond/java.jpg', id: 'java' },
                { name: 'PHP', img: 'assets/images/diamond/php.png', id: 'php' },
                { name: 'PPC', img: 'assets/images/diamond/ppc.png', id: 'ppc' },
                { name: 'SEO', img: 'assets/images/diamond/seo.png', id: 'seo' },
                { name: 'SMM', img: 'assets/images/diamond/smm.png', id: 'smm' },
            ];

            const gallery = document.getElementById('gallery');
            const searchInput = document.getElementById('searchInput');

            // Render all initially
            function renderCourses(courses) {
                gallery.innerHTML = '';
                courses.forEach(prog => {
                    gallery.innerHTML += `
                <div class="col-md-4 course-item" data-name="${prog.name.toLowerCase()}">
                    <div class="image-card card-wrapper" onclick="goToDetails('${prog.id}')">
                        <img src="${prog.img}" alt="${prog.name}">
                    </div>
                </div>`;
                });
            }

            renderCourses(programs); // Initial render

            // Go to details page
            function goToDetails(id) {
                window.location.href = 'diamond_details?course=' + id;
            }

            // Filter courses and optionally redirect
            function filterCourses() {
                const query = searchInput.value.trim().toLowerCase();

                const filtered = programs.filter(p => p.name.toLowerCase().includes(query));
                renderCourses(filtered);

                // 🔁 Redirect to details page if there's an exact match
                const exactMatch = programs.find(p => p.name.toLowerCase() === query);
                if (exactMatch) {
                    setTimeout(() => goToDetails(exactMatch.id), 700); // slight delay before redirect
                }
            }
        </script>

</body>

</html>