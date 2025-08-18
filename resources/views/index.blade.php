<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Swivel Training</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/yourkitid.js" crossorigin="anonymous"></script>

  <style>
    body {
      margin: 0;
      font-family: 'Outfit', sans-serif;
      color: #333;
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

    .slide video {
      width: 100%;
      height: auto;
      display: block;
      object-fit: cover;
      border-radius: 0;
    }

    .content {
      display: flex;
      justify-content: center;
      gap: 10px;
      padding: 60px 0px;
    }

   .card {
      padding: 0px;
      border-radius: 12px;
      width: 600px;
      height: 300px;
      text-align: center;
    }

    .card img,
    .video-wrapper iframe {
      width: 90%;
      height: 250px;
      border-radius: 10px;
      object-fit: cover;
    }

    .card h3 {
      margin: 20px 0 15px;
      color: #7e3d9c;
      font-weight: 700;
    }

    .explore {
      background-color: #7e3d9c;
      color: white;
      padding: 12px 28px;
      font-size: 18px;
      border: none;
      border-radius: 30px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    .explore:hover {
      background-color: #9b59b6;
    }

    section {
      background: #fff;
      margin: 60px 0;
      padding: 60px 20px;
      box-shadow: inset 0 10px 25px rgba(0, 0, 0, 0.02);
    }

    .about-container {
      max-width: 1100px;
      margin: auto;
      display: flex;
      flex-wrap: wrap;
      gap: 40px;
      align-items: center;
      justify-content: center;
    }

    .about-image {
      flex: 1;
      min-width: 250px;
      text-align: center;
    }

    .about-image img {
      width: 150px;
      border-radius: 50%;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .about-text {
      flex: 2;
      min-width: 300px;
    }

    .about-text h2 {
      font-size: 32px;
      font-weight: 800;
      color: #7e3d9c;
      margin-bottom: 20px;
    }

    .about-text p {
      font-size: 17px;
      line-height: 1.8;
      color: #444;
    }

    .footer_detail {
      position: relative;
      top: 40px;
    }

    .video-portrait {
      width: 400px;
      height: 711px;
      max-width: 100%;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }

    .main-content {
      display: flex;
      flex-direction: row;
      padding: 20px 0;
      /* reduce top and bottom space */
      margin: 0;
      align-items: center;
      /* margin-top: -100px; */
    }

    .text-box {
      width: 50%;
      padding: 0 30px;
      display: flex;
      margin-left: 80px;
      flex-direction: column;
      justify-content: center;
    }

    .text-box h2 {
      font-size: 35px;
      color: #7e3d9c;
      /* margin-left: 250px; */
    }

    .text-box p {
      font-size: 16px;
      color: #555;
      line-height: 1.6;
      padding-left: 20px;
      text-align: justify;
    }

    .opportunity-box {
      background-color: #f9f9f9;
      padding: 25px;
      border-radius: 10px;
      color: #333;
      max-width: 800px;
      margin: auto;
    }

    .opportunity-box h2 {
      color: #007BFF;
      font-size: 24px;
      margin-bottom: 10px;
    }

    .opportunity-box h3 {
      color: #444;
      font-size: 20px;
      margin-top: 20px;
    }

    .opportunity-box ul {
      padding-left: 20px;
      line-height: 1.8;
    }

    .opportunity-box ul ul {
      list-style-type: circle;
      padding-left: 20px;
    }

    .opportunity-box p {
      font-size: 16px;
      line-height: 1.6;
      text-align: justify;
      margin-top: 10px;
    }

    .opportunity-box .cta {
      margin-top: 20px;
      font-weight: bold;
      color: #0056b3;
    }


    .video-box {
      width: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .video-square {
      width: 400px;
      height: 400px;
    }


    .apply-now {
      display: block;
      margin-top: 10px;
      font-size: 1.3em;
      color: #e63946;
      cursor: pointer;
      text-align: center;
    }

    #player {
      width: 100%;
      height: 100%;
    }

    @media (max-width: 768px) {
      .main-content {
        flex-direction: column;
        padding: 20px;
        position: relative;
      }

      .text-box,
      .video-box {
        width: 100%;
        text-align: center;
        padding: 10px;

      }

      .video-square {
        width: 300px;
        height: 400px;
      }
    }

    @media (max-width: 768px) {
      .content {
        flex-direction: column;
        align-items: center;

      }

      .about-container {
        flex-direction: column;
        text-align: center;
      }

      .card {
        width: 90%;
      }
     
    }
  </style>

</head>

<body>

  @include('partials.header')
  <br><br>
  <div class="main-content">
    <div class="text-box">
      <div class="opportunity-box">
        <h2> Your Career Start with Swivel IT & Training Institute</h2>

        <p>
          Swivel IT & Training Institute invites ambitious college and school students to ignite a brilliant career
          path.
        </p>

        <h3> Program Highlights:</h3>
        <ul>
          <li> Assessment-based selection of <strong>1,000 skilled students</strong>.</li>
          <li><strong>Top 200 scorers</strong> get:
            <ul>
              <li>3 months of intensive training</li>
              <li>Guaranteed placement support</li>
              <li>Salary packages from ₹2.4 LPA to ₹10 LPA</li>
            </ul>
          </li>
          <li> Only ₹999 to begin your journey — a small token for a big future!</li>
          <li> Remaining 800 students will receive:
            <ul>
              <li>Full job support</li>
              <li>Scheduled interviews</li>
              <li>Ongoing career guidance</li>
            </ul>
          </li>
        </ul>

        <p class="cta"> Take the first step toward a successful and impactful career.
          <a href="https://forms.gle/ZWM7gh3LViaeTetx7" class="apply-now">
            <strong>Apply now!</strong>
          </a>

        </p>
      </div>

    </div>

    <div class="video-box">
      <div class="video-portrait">
        <div id="player"></div>
      </div>
    </div>
  </div>

  <script src="https://www.youtube.com/iframe_api"></script>
  <script>
    const videoIds = [
      "E0aporowHtU", "XaN8AJDEYL8", "3mCk_Ot48Uc",
      "nAWpkBnWv7Y", "ahd6oArQwjo"
    ];

    let player, currentIndex = 0;

    function onYouTubeIframeAPIReady() {
      player = new YT.Player('player', {
        videoId: videoIds[currentIndex],
        playerVars: { autoplay: 1, mute: 1, controls: 1, rel: 0, modestbranding: 1 },
        events: {
          'onReady': e => e.target.playVideo(),
          'onStateChange': onPlayerStateChange
        }
      });
    }

    function onPlayerStateChange(e) {
      if (e.data === YT.PlayerState.ENDED) {
        currentIndex = (currentIndex + 1) % videoIds.length;
        player.loadVideoById(videoIds[currentIndex]);
      }
    }
  </script>

  <div class="content">
    <div class="card">
      <div class="video-wrapper">
        <img
          src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSS4E-1dGYNE7u3A_2mPeMDS52kwv9_n8U1jw&s">
      </div>
      <h3 style="color: #7e3d9c;font-weight: bolder; ">VIDEO COURSES</h3>
      <a href="/videocatagories"><button class="explore">EXPLORE</button></a>
    </div>

    <div class="card">
      <img src="https://itechindia.co/wp-content/uploads/2021/11/student-attendance-tracker.jpeg" alt="Live Courses">
      <h3 style="color: #7e3d9c;font-weight: bolder; ">LIVE COURSES</h3>
      <a href="/livecatagories"><button class="explore">EXPLORE</button></a>
    </div>
  </div>

  <br><br>


  <section style="padding: 60px 20px; background-color: #ffffff;">
    <div
      style="max-width: 1100px; margin: auto; display: flex; flex-wrap: wrap; gap: 40px; align-items: center; justify-content: center;">

      <div style="flex: 1; min-width: 280px; text-align: left;">
        <img src="/assets/course image/swivel.jpg" alt="About Icon" style="width: 300px; border-radius: 5%; ">
      </div>

      <div style="flex: 2; min-width: 300px;">
        <h2
          style="font-family: 'Outfit', sans-serif; font-weight: 800; font-size: 32px; color: #7e3d9c; margin-bottom: 20px;">
          Who We Are
        </h2>
        <p style="font-size: 18px; color: #333; line-height: 1.8;">
          <strong>Swivel IT & Training Institute</strong> – Building Careers, Empowering People.<br><br>
          We help people turn skills into opportunities. Our IT and non-IT training programs are designed to get you
          job-ready, with dedicated placement support and guidance to start earning through freelancing. Whether you’re
          a student, job seeker, homemaker, or working professional, we help you move forward with confidence.
          <br><br>
          We also work with local shops and small businesses to create professional websites and set up Google My
          Business profiles, helping them attract more customers and grow.
          <br><br>
          Swivel IT & Training Institute is managed by <strong>Dolphin Education & Rural Development Trust</strong> and
          operates under <strong>JEY Groups</strong>.
        </p>
      </div>
    </div>

    <div style="
    max-width: 1100px; 
    margin: 80px auto 40px; 
    display: flex; 
    flex-wrap: wrap; 
    gap: 40px; 
    justify-content: center;
  ">

      <div style="
  flex: 1; 
  min-width: 300px; 
  background: #f5f1fa; 
  border-radius: 16px; 
  padding: 30px 20px; 
  text-align: center; 
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08); 
  transition: transform 0.3s ease;
" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
        <img src="/assets/course image/vision.png" alt="Vision Icon" style="width: 80px; margin-bottom: 20px;" />
        <h2 style="
    font-family: 'Outfit', sans-serif; 
    font-weight: 800; 
    font-size: 26px; 
    color: #7e3d9c; 
    margin-bottom: 15px;
  ">
          Our Vision
        </h2>
        <p style="font-size: 16px; line-height: 1.8; color: #444; text-align: left;">
          • Be a trusted hub for skill development and career growth.<br><br>
          • Empower individuals to build brighter futures and achieve financial independence.<br><br>
          • Inspire community success through shared knowledge and collaboration.<br><br>
          • Foster a culture of continuous learning and innovation.
        </p>

      </div>


      <div style="
  flex: 1; 
  min-width: 300px; 
  background: #f5f1fa; 
  border-radius: 16px; 
  padding: 30px 20px; 
  text-align: center; 
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08); 
  transition: transform 0.3s ease;
" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">

        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT5TnAsOkTM_jDtKK26GEFWIKOso2ehWVKrEw&s"
          alt="Mission Icon" style="width: 80px; margin-bottom: 20px;" />

        <h2 style="
    font-family: 'Outfit', sans-serif; 
    font-weight: 800; 
    font-size: 26px; 
    color: #7e3d9c; 
    margin-bottom: 15px;">
          Our Mission
        </h2>

        <p style="font-size: 16px; line-height: 1.8; color: #444; text-align: left;">
          • Provide practical IT and non-IT training that prepares learners for real-world job opportunities.<br><br>
          • Offer placement support and freelancing guidance to help individuals achieve financial independence.<br><br>
          • Support local businesses with digital solutions, including professional websites and Google My Business
          profiles.<br><br>
          • Promote community development through skill-building, self-reliance, and continuous learning.
        </p>
      </div>

    </div>
  </section>

  <footer style="background-color: #0e1a33; color: white; padding: 60px 40px; font-family: 'Outfit', sans-serif;">
    <div
      style="max-width: 1400px; margin: auto; display: flex; flex-wrap: wrap; justify-content: space-between; gap: 40px;">

      <div style="flex: 1; min-width: 300px;">
        <h2 style="font-size: 30px; font-weight: 800; margin-bottom: 20px;">Let’s Talk</h2>
        <p style="font-size: 16px; line-height: 1.7; max-width: 500px;">
          Every project starts with a chat. Joven leads our client conversations and will be happy to discuss your
          project.
          He will also pull in the right people from the team when needed.
        </p>
        <br />
        <a href="#"
          style="background-color: #28a745; padding: 12px 24px; color: #fff; text-decoration: none; font-weight: bold; border-radius: 6px; display: inline-block;">
          Tell us about your project
        </a>
      </div>

      <div style=" min-width: 100px;">
        <div style="display: flex; flex-direction: column; gap: 15px; font-size: 16px;">
          <div style="display: flex; align-items: center;">
            <i class="fas fa-envelope" style="color: #3fa0ff; margin-right: 10px;"></i>
            <span><a href="mailto:admin@swivel.co.in"
                style="color: #3fa0ff; text-decoration: none;">admin@swivel.co.in</a></span>
          </div>
          <div style="display: flex; align-items: center;">
            <i class="fas fa-phone" style="color: #3fa0ff; margin-right: 10px;"></i>
            <span><a href="tel:+918300504230" style="color: #3fa0ff; text-decoration: none;">+91-8300504230</a></span>
          </div>
          <div style="display: flex; align-items: flex-start; gap: 10px; line-height: 1.6; max-width: 400px;">
            <i class="fas fa-map-marker-alt" style="color: #3fa0ff; margin-top: 4px;"></i>
            <span>
              <a href="https://g.co/kgs/X4Nid87" target="_blank" style="color: #3fa0ff; text-decoration: none;">
                Mahatma Gandhi Nagar Rd, near Annai Therasa English School,
                MRR Nagar, Palani Chettipatti,<br>
                Theni, Tamil Nadu 625531
              </a>
            </span>
          </div>

        </div>


        <div style="margin-top: 30px;" class="footer_detail">
          <a href="https://x.com/Swivel_Training" style="margin-right: 15px; color: #ccc;"><i
              class="fab fa-twitter fa-lg"></i></a>
          <a href="https://www.facebook.com/profile.php?id=61573324123476" style="margin-right: 15px; color: #ccc;"><i
              class="fab fa-facebook fa-lg"></i></a>
          <a href="https://www.instagram.com/swivel.training/?hl=en" style="margin-right: 15px; color: #ccc;"><i
              class="fab fa-instagram fa-lg"></i></a>
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


</body>

</html>