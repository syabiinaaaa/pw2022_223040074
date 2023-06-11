<?php
require 'function.php';
//melakukan query
$movie = query("SELECT * FROM movies");
$m2 = query("SELECT * FROM movies");
$m3 = query("SELECT * FROM movies");



// Cek apakah ada parameter "query" yang dikirimkan melalui Ajax
if (isset($_GET['query'])) {
  $searchQuery = $_GET['query'];

  // Melakukan query dengan menggunakan parameter pencarian
  $movies = query("SELECT * FROM movies WHERE name LIKE '%$searchQuery%'");

  // Mengembalikan hasil query dalam format JSON
  echo json_encode($movies);
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Filmlane - Best movie collections</title>

  <!--favicon -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!--css link-->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!--google font link-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>

<body id="top">

  <!--#HEADER -->
  <header class="header" data-header>
    <div class="container">

      <div class="overlay" data-overlay></div>

      <a href="./index.php" class="logo">
        <img src="./assets/images/logo.svg" alt="Filmlane logo">
      </a>

      <div class="header-actions">

        <button class="search-btn">
          <ion-icon name="search-outline"></ion-icon>
        </button>
        
        <a href="login.php" class="btn btn-primary">Log in</a>


      </div>

      <button class="menu-open-btn" data-menu-open-btn>
        <ion-icon name="reorder-two"></ion-icon>
      </button>

      <nav class="navbar" data-navbar>

        <div class="navbar-top">

          <a href="./index.php" class="logo">
            <img src="./assets/images/logo.svg" alt="Filmlane logo">
          </a>
          <button class="menu-close-btn" data-menu-close-btn>
            <ion-icon name="close-outline"></ion-icon>
          </button>

        </div>

        <ul class="navbar-list">

          <li><a href="#hero" class="navbar-link">Home</a></li>
          <li><a href="#upcoming" class="navbar-link">Movie</a></li>
          <li><a href="#service" class="navbar-link">Service</a></li>

        </ul>

        <ul class="navbar-social-list">

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-pinterest"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="navbar-social-link">
              <ion-icon name="logo-youtube"></ion-icon>
            </a>
          </li>

        </ul>

      </nav>

    </div>
  </header>

  <main>
    <article>
      <!-- #HERO-->

      <section class="hero" id="hero">
        <div class="container">

          <div class="hero-content">

            <p class="hero-subtitle">Filmlane</p>

            <h1 class="h1 hero-title">
              Unlimited <strong>Movie</strong>, TVs Shows, & More.
            </h1>

            <div class="meta-wrapper">

              <div class="badge-wrapper">
                <div class="badge badge-fill">PG 18</div>

                <div class="badge badge-outline">HD</div>
              </div>

              <div class="ganre-wrapper">
                <a href="#">Romance,</a>

                <a href="#">Drama</a>
              </div>

              <div class="date-time">

                <div>
                  <ion-icon name="calendar-outline"></ion-icon>

                  <time datetime="2022">2022</time>
                </div>

                <div>
                  <ion-icon name="time-outline"></ion-icon>

                  <time datetime="PT128M">128 min</time>
                </div>

              </div>

            </div>

            <button class="btn btn-primary">
              <ion-icon name="play"></ion-icon>

              <span>Watch now</span>
            </button>

          </div>

        </div>
      </section>

      <!--#UPCOMING-->

      <section class="upcoming" id="upcoming">
        <div class="container">

          <div class="flex-wrapper">

            <div class="title-wrapper">
              <p class="section-subtitle">Online Streaming</p>

              <h2 class="h2 section-title">Upcoming Movies</h2>
            </div>

            <ul class="filter-list">

              <li>
                <button class="filter-btn" onclick="scrollToSection('upcoming')">Upcoming</button>
              </li>

              <li>
                <button class="filter-btn" onclick="scrollToSection('toprated')">Top Rated</button>
              </li>

            </ul>

          </div>

          <ul class="movies-list has-scrollbar">
            <?php $count = 0; ?>
            <?php foreach ($movie as $movie) : ?>
              <?php if ($movie['id'] != 12 && $count <= 3) :
              ?>

                <li>
                  <div class="movie-card">
                    <a href="./movie-details2.php?name=<?= urlencode($movie['name']) ?>">
                      <figure class="card-banner">
                        <img src="./assets/images/<?= $movie["gambar"]; ?>" alt="The Northman movie poster">
                      </figure>
                    </a>
                    <div class="title-wrapper">
                      <a href="./movie-details.php">
                        <h1 class="h1 hero-title card-title"><?= $movie["name"] ?></h1>
                      </a>
                      <time><?= $movie["year"] ?></time>
                    </div>
                    <div class="card-meta">
                      <div class="badge badge-outline"><?= $movie["Quality"]; ?></div>
                      <div class="duration">
                        <ion-icon name="time-outline"></ion-icon>
                        <time><?= $movie["hour"] ?></time>
                      </div>
                      <div class="rating">
                        <ion-icon name="star"></ion-icon>
                        <data><?= $movie["Rating"]; ?></data>
                      </div>
                    </div>
                  </div>
                </li>
                <?php $count++; ?>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>





      </section>

      <!--#SERVICE-->

      <section class="service" id="service">
        <div class="container">

          <div class="service-banner">
            <figure>
              <img src="./assets/images/service-banner.jpg" alt="HD 4k resolution! only $3.99">
            </figure>

            <a href="./assets/images/service-banner.jpg" download class="service-btn">
              <span>Download</span>

              <ion-icon name="download-outline"></ion-icon>
            </a>
          </div>

          <div class="service-content">

            <p class="service-subtitle">Our Services</p>

            <h2 class="h2 service-title">Download Your Shows Watch Offline.</h2>

            <p class="service-text">
              Lorem ipsum dolor sit amet, consecetur adipiscing elseddo eiusmod tempor.There are many variations of
              passages of lorem
              Ipsum available, but the majority have suffered alteration in some injected humour.
            </p>

            <ul class="service-list">

              <li>
                <div class="service-card">

                  <div class="card-icon">
                    <ion-icon name="tv"></ion-icon>
                  </div>

                  <div class="card-content">
                    <h3 class="h3 card-title">Enjoy on Your TV.</h3>

                    <p class="card-text">
                      Lorem ipsum dolor sit amet, consecetur adipiscing elit, sed do eiusmod tempor.
                    </p>
                  </div>

                </div>
              </li>

              <li>
                <div class="service-card">

                  <div class="card-icon">
                    <ion-icon name="videocam"></ion-icon>
                  </div>

                  <div class="card-content">
                    <h3 class="h3 card-title">Watch Everywhere.</h3>

                    <p class="card-text">
                      Lorem ipsum dolor sit amet, consecetur adipiscing elit, sed do eiusmod tempor.
                    </p>
                  </div>

                </div>
              </li>

            </ul>

          </div>

        </div>
      </section>

      <!--#TOP RATED -->

      <section class="top-rated">
        <div class="container">

          <p class="section-subtitle">Online Streaming</p>

          <h2 class="h2 section-title">Top Rated Movies</h2>

          <ul class="movies-list" id="search-results">
            <?php $count = 0; ?>
            <?php foreach ($m2 as $m2) : ?>
              <?php if ($m2['id'] >= 12 && $count <= 25) : ?>
                <li>
                  <div class="movie-card">
                    <a href="./movie-details2.php?name=<?= urlencode($m2['name']) ?>">
                      <figure class="card-banner">
                        <img src="./assets/images/<?= $m2["gambar"]; ?>" alt="Photo">
                      </figure>
                    </a>
                    <div class="title-wrapper">
                      <a href="./movie-details.php">
                        <h1 class="h1 hero-title card-title"><?= $m2["name"] ?></h1>
                      </a>
                      <time><?= $m2["year"] ?></time>
                    </div>
                    <div class="card-meta">
                      <div class="badge badge-outline"><?= $m2["Quality"]; ?></div>
                      <div class="duration">
                        <ion-icon name="time-outline"></ion-icon>
                        <time><?= $m2["hour"] ?></time>
                      </div>
                      <div class="rating">
                        <ion-icon name="star"></ion-icon>
                        <data><?= $m2["Rating"]; ?></data>
                      </div>
                    </div>
                  </div>
                </li>
                <?php $count++; ?>
              <?php endif; ?>
            <?php endforeach; ?>
          </ul>

        </div>
      </section>

      <!--#CTA-->

      <section class="cta">
        <div class="container">

          <div class="title-wrapper">
            <h2 class="cta-title">Trial start first 30 days.</h2>

            <p class="cta-text">
              Enter your email to create or restart your membership.
            </p>
          </div>

          <form action="" class="cta-form">
            <input type="email" name="email" required placeholder="Enter your email" class="email-field">

            <button type="submit" class="cta-form-btn">Get started</button>
          </form>

        </div>
      </section>

    </article>
  </main>

  <!--#FOOTER -->

  <footer class="footer">

    <div class="footer-top">
      <div class="container">

        <div class="footer-brand-wrapper">

          <a href="./index.php" class="logo">
            <img src="./assets/images/logo.svg" alt="Filmlane logo">
          </a>

          <ul class="footer-list">

            <li>
              <a href="./index.php" class="footer-link">Home</a>
            </li>

            <li>
              <a href="#" class="footer-link">Movie</a>
            </li>

            <li>
              <a href="#" class="footer-link">Service</a>
            </li>

          </ul>

        </div>

        <div class="divider"></div>

        <div class="quicklink-wrapper">

          <ul class="quicklink-list">

            <li>
              <a href="#" class="quicklink-link">Faq</a>
            </li>

            <li>
              <a href="#" class="quicklink-link">Help center</a>
            </li>

            <li>
              <a href="#" class="quicklink-link">Terms of use</a>
            </li>

            <li>
              <a href="#" class="quicklink-link">Privacy</a>
            </li>

          </ul>

          <ul class="social-list">

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-facebook"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-twitter"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-pinterest"></ion-icon>
              </a>
            </li>

            <li>
              <a href="#" class="social-link">
                <ion-icon name="logo-linkedin"></ion-icon>
              </a>
            </li>

          </ul>

        </div>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; 2023 <a href="#">By Syahbrina Dinova</a>. All Rights Reserved
        </p>

        <img src="./assets/images/footer-bottom-img.png" alt="Online banking companies logo" class="footer-bottom-img">

      </div>
    </div>

  </footer>

  <!--#GO TO TOP -->

  <a href="#top" class="go-top" data-go-top>
    <ion-icon name="chevron-up"></ion-icon>
  </a>

  <!--js link -->
  <script src="./assets/js/script.js"></script>

  <script>
    function scrollToSection(sectionId) {
      var section = document.getElementById(sectionId);
      if (section) {
        section.scrollIntoView({
          behavior: "smooth"
        });
      }
    }
  </script>

  <script>
    var searchInput = document.getElementById('search-input');
    var searchResults = document.getElementById('search-results');

    searchInput.addEventListener('keyup', function() {
      var query = searchInput.value.trim();

      if (query !== '') {
        // Membuat objek XMLHttpRequest
        var xhr = new XMLHttpRequest();

        // Menentukan callback untuk menangani respon dari server
        xhr.onreadystatechange = function() {
          if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
              // Menguraikan respon JSON menjadi array objek
              var movies = JSON.parse(xhr.responseText);

              // Menghapus hasil pencarian sebelumnya
              searchResults.innerHTML = '';

              // Menampilkan hasil pencarian baru
              for (var i = 0; i < movies.length; i++) {
                var movie = movies[i];
                var li = document.createElement('li');
                li.textContent = movie.name;
                searchResults.appendChild(li);
              }
            } else {
              console.log('Request error:', xhr.status);
            }
          }
        };

        // Mengirim request GET ke file search.php dengan parameter query
        xhr.open('GET', 'search.php?query=' + encodeURIComponent(query), true);
        xhr.send();
      } else {
        // Jika kotak pencarian kosong, hapus hasil pencarian sebelumnya
        searchResults.innerHTML = '';
      }
    });
  </script>


  <!--ionicon link-->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>