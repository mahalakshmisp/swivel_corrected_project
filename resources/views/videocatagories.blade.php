<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Swivtrek - Search</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: 'Outfit', sans-serif;
            color: #333;
            background-color: #f9f9f9;
        }

        .navbar {
            background: #fff;
            padding: 12px 30px;
            border-bottom: 1px solid #ddd;
            display: flex;
            align-items: center;
            position: sticky;
            height: 70px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            z-index: 999;
            top: 0;
        }

        .title {
            font-size: 28px;
            font-weight: 800;
            color: #7e3d9c;
            flex: 0 0 auto;
        }

        .search-box {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .search-box input {
            padding: 10px 16px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 25px;
            width: 600px;
            /* height: 35px; */
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .search-box input:focus {
            outline: none;
            border-color: #7e3d9c;
            box-shadow: 0 0 8px rgba(126, 61, 156, 0.2);
        }

        .image-gallery {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            padding: 40px;
            justify-items: center;
            /* border-radius: 60px; */
        }

        .image-card {
            text-align: center;
            /* background-color: #7e3d9c; */
            /* height: 40px; */
            /* width: 350px; */
        }

        .image-card img {
            width: 300px;
            height: 350px;
            object-fit: cover;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .image-card img:hover {
            transform: scale(1.03);
        }

        .image-card h4 {
            margin-top: 10px;
            font-weight: 600;
            color: #7e3d9c;
        }

        @media (max-width: 1200px) {
            .image-gallery {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 900px) {
            .image-gallery {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {
            .image-gallery {
                grid-template-columns: 1fr;
            }

            .search-box input {
                width: 90vw;
            }

            .title {
                font-size: 22px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="title">Swivtrek</div>
        <div class="search-box">
            <input type="text" placeholder="Search courses..." id="searchInput" oninput="filterImages()">
        </div>
    </div>

    <!-- Image Gallery -->
    <div class="image-gallery" id="gallery">
        <!-- Template for 16 cards -->
    </div>

    <!-- ✅ Replace the data array with 'id' for routing -->
    <script>
        const data = [
            { id: "web", title: "web", img: "assets/video_Course/Web.jpg" },
            { id: "dm", title: "DigitalMarketing", img: "assets/video_Course/DM - Thumb.png" },
            { id: "car", title: "CarService", img: "assets/video_Course/Car Design - Thumbnail.png" },
            { id: "school", title: "School", img: "assets/video_Course/School Academy - Thumb.png" },
            { id: "beautician", title: "BEAUTICIAN", img: "assets/video_Course/Beautician Course.png" },
            { id: "fitness", title: "FITNESS", img: "assets/video_Course/Fittness.jpg" },
            { id: "craft", title: "ART & CRAFT", img: "assets/video_Course/Art and craft - Thumb.png" },
            { id: "tailoring", title: "TAILORING", img: "assets/video_Course/Tailoring Thumb.png" },
            { id: "aari", title: "AARI WORK", img: "assets/video_Course/Aari & Embroidery - Thumb.png" },
            { id: "photo", title: "PHOTOGRAPHY", img: "assets/video_Course/Photography Course.png" },
            { id: "mobile", title: "Mobile/Service", img: "assets/video_Course/Mobile Services.png" },
            { id: "music", title: "INSTRUMENTAL MUSIC", img: "assets/video_Course/Instrumental Music Poster.png" },
            { id: "baking", title: "BAKING / COOKING", img: "assets/video_Course/_Baking Poster.png" },
            { id: "fashion", title: "MODELING  FASHION DESIGNING", img: "assets/video_Course/Fashion designing .png" },
            { id: "exam", title: "COMPETITIVE EXAM", img: "assets/video_Course/Competitor Exam.png" },
            { id: "career", title: "CAREER GUIDANCE & PLACEMENT TRAINING", img: "assets/video_Course/career guidance and placement training.png" },
            { id: "abacus", title: "ABACUS", img: "assets/video_Course/Abacus .png" },
            { id: "nj", title: "NEET / JEE", img: "assets/video_Course/Competitor Exam.png" },
            { id: "Modeling", title: "Modeling", img: "assets/video_Course/Modeling.png" },
        ];

        function loadImages(filtered = data) {
            const gallery = document.getElementById('gallery');
            gallery.innerHTML = filtered.map(item => `
        <div class="image-card">
          <a href="videos/${item.id}">
            <img src="${item.img}" alt="${item.title}" title="${item.title}" />
          </a>
        </div>
      `)
      .join('');
        }

        function filterImages() {
            const keyword = document.getElementById('searchInput').value.toLowerCase();
            const filtered = data.filter(item => item.title.toLowerCase().includes(keyword));
            loadImages(filtered);
        }

        // Load all initially
        loadImages();
    </script>


</body>

</html>