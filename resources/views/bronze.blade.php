<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Training Programs Gallery</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    <!-- <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet"> -->

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
        <h2 class="text-center mb-4">The beginning of brilliance ideal for foundational learners.
        </h2>
        <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Search Courses..." oninput="filterCourses()" />
        </div>

        <!-- 📦 Gallery -->
        <div class="row" id="gallery"></div>
    </div>
    <div>
        <script>
            const programs = [
                { name: 'Web Development', img: 'assets/images/bronze/web.png', id: 'web' },
                { name: 'Laravel', img: 'assets/images/bronze/laravel.png', id: 'laravel' },
                { name: 'JavaScript', img: 'assets/images/bronze/js.png', id: 'js' },
                { name: 'Python', img: 'assets/images/bronze/python.png', id: 'python' },
                { name: 'Air Conditioning', img: 'assets/images/bronze/Aircondition.png', id: 'air' },
                { name: 'Digital Marketing', img: 'assets/images/bronze/digitalmarketing.png', id: 'digital' },
                { name: 'English', img: 'assets/images/bronze/English.png', id: 'english' },
                { name: 'HTML & CSS', img: 'assets/images/bronze/html&css.png', id: 'htmlcss' },
                { name: 'Java', img: 'assets/images/bronze/java.png', id: 'java' },
                { name: 'PHP', img: 'assets/images/bronze/php.png', id: 'php' },
                { name: 'PPC', img: 'assets/images/bronze/ppc.png', id: 'ppc' },
                { name: 'SEO', img: 'assets/images/bronze/seo.png', id: 'seo' },
                { name: 'SMM', img: 'assets/images/bronze/smm.png', id: 'smm' },
            ];


            const gallery = document.getElementById('gallery');
            programs.forEach(prog => {
                gallery.innerHTML += `
        <div class="col-md-4">
          <div class="image-card card-wrapper" onclick="goToDetails('${prog.id}')">
            <img src="${prog.img}" alt="${prog.name}">
          </div>
        </div>`;
            });

            function goToDetails(id) {
                window.location.href = 'form?course=' + id;
            }
            // const gallery = document.getElementById('gallery');

            function renderGallery(items) {
                gallery.innerHTML = ''; // Clear before render
                items.forEach(prog => {
                    gallery.innerHTML += `
          <div class="col-md-4 course-item" data-name="${prog.name.toLowerCase()}">
            <div class="image-card card-wrapper" onclick="goToDetails('${prog.id}')">
              <img src="${prog.img}" alt="${prog.name}">
            </div>
          </div>`;
                });
            }

            function filterCourses() {
                const query = document.getElementById('searchInput').value.toLowerCase();
                const items = document.querySelectorAll('.course-item');

                items.forEach(item => {
                    const name = item.dataset.name;
                    item.style.display = name.includes(query) ? 'block' : 'none';
                });
            }

            function goToDetails(id) {
                window.location.href = 'bronze_details?course=' + id;
            }

            // Initial render
            renderGallery(programs);
        </script>
</body>

</html>