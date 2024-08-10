<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page if not logged in
    header('Location: index.html');
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Home </title>
    <style>
        /* Basic Reset */
        body, h1, h2, p, ul, li, img, a {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            background: linear-gradient(to right, #141e30, #243b55);
            color: #fff;
            line-height: 1.6;
        }


        header {
            background: #111;
            color: white;
            padding: 15px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }

        nav .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        

        nav .logo {
            font-size: 28px;
            font-weight: bold;
            text-decoration: none;
            color: #0685f4;
        }

        nav ul {
            list-style: none;
            display: flex;
        }

        nav ul li {
            margin-left: 20px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #0685f4;
        }

        main .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .hero {
            background: linear-gradient(180deg, #333 0%, #0d0d0d 100%);
            color: white;
            display: flex;
            align-items: center;
            padding: 50px 0;
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.7);
        }

        .hero-content {
            display: flex;
            align-items: center;
            gap: 30px;
            position: relative;
            z-index: 1;
            width: 100%;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.3));
            z-index: 0;
        }

        .slider-container {
    position: relative;
    width: 100%;
    max-width: 300px;
    height: 400px;
    overflow: hidden;
    border-radius: 15px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.5);
}

.slider {
    display: flex;
    transition: transform 0.5s ease-in-out;
    height: 100%;
    width: 100%;
}

.slider img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 15px;
    display: block;
}

.slide {
    min-width: 100%;
    flex-shrink: 0;
    justify-content: space-between;
    transition: opacity 0.5s ease-in-out;
}

.slide-photo {
    flex: 1;
    padding: 10px;
}

.slide-photo img {
    width: 100%;
    border-radius: 10px;
}

.slide-info {
    flex: 1;
    padding: 20px;
    color: #fff;
    background: rgba(0, 0, 0, 0.5);
    border-radius: 10px;
}

.slide-info h1 {
    font-size: 36px;
    margin-bottom: 10px;
}

.slide-info p {
    margin-bottom: 10px;
}


.slider-controls {
    position: absolute;
    top: 50%;
    width: 100%;
    display: flex;
    justify-content: space-between;
    transform: translateY(-50%);
    z-index: 2;
}

.control-btn {
    background: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 10px;
    border-radius: 50%;
    cursor: pointer;
    font-size: 24px;
    transition: background 0.3s;
}

.control-btn:hover {
    background: #0685f4;
}

.slider-indicators {
    position: absolute;
    bottom: 10px;
    width: 100%;
    display: flex;
    justify-content: center;
    gap: 8px;
    z-index: 2;
}

.slider-indicator {
    width: 10px;
    height: 10px;
    background: #0685f4;
    border-radius: 50%;
    cursor: pointer;
    transition: background 0.3s;
}

.slider-indicator.active {
    background: white;
}

.slider::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(180deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0) 70%);
    border-radius: 15px;
    z-index: 1;
}

        .hero-info {
            max-width: 600px;
        }

        .hero-info h1 {
            font-size: 42px;
            margin-bottom: 20px;
        }

        .hero-info p {
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .btn {
            background: #0685f4;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 18px;
            transition: background 0.3s, transform 0.3s;
        }

        .btn:hover {
            background: #75f406;
            transform: translateY(-2px);
        }



        .search-container {
            position: absolute;
            top:20px;
            right: 20px;
            display: flex;
            gap: 10px;
            align-items: center;
            z-index: 1;
        }

        .search-input {
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #444;
            background: #222;
            color: #fff;
            transition: background 0.3s, border-color 0.3s;
        }

        .search-input:focus {
            background: #444;
            border-color: #0685f4;
        }

        .search-btn {
            padding: 10px 20px;
            background: #0685f4;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s, transform 0.3s;
        }

        .search-btn:hover {
            background: #75f406;
            transform: translateY(-2px);
        }

        .movie-list {
            padding: 20px 0;
        }

        .movie-list h2 {
            font-size: 28px;
            margin-bottom: 20px;
            border-bottom: 2px solid #0685f4;
            display: inline-block;
            padding-bottom: 5px;
        }

        .movie-carousel {
            display: flex;
            overflow-x: auto;
            gap: 20px;
            padding-bottom: 10px;
            scroll-behavior: smooth;
        }

        .movie-carousel::-webkit-scrollbar {
            height: 10px;
        }

        .movie-carousel::-webkit-scrollbar-thumb {
            background-color: #0685f4;
            border-radius: 10px;
        }

        .movie-carousel::-webkit-scrollbar-track {
            background: #444;
        }

        .movie-card {
            flex: 0 0 200px;
            background: #000000;
            border-radius: 12px;
            overflow: hidden;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            position: relative;
        }

        .movie-card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(18, 80, 187, 0.7);
        }

        .movie-card img {
            width: 100%;
            height: auto;
        }

        .movie-card p {
            padding: 10px;
            background: #000000;
        }

        .play-button {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 50px;
            color: #ffffff;
            display: none;
            pointer-events: all;
            text-decoration: none;
        }

        .movie-card:hover .play-button {
            display: block;
        }

        .movie-card:hover img {
            opacity: 0.7;
        }

        footer {
            background: #111;
            color: white;
            padding: 15px 0;
            text-align: center;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.5);
        }

        /* Adjust header for mobile */
@media (max-width: 768px) {
    nav .container {
        flex-direction: column;
        align-items: flex-start;
    }

    nav ul {
        flex-direction: column;
        gap: 10px;
        width: 100%;
    }

    nav ul li {
        margin-left: 0;
    }
}

/* Adjust hero section for mobile */
@media (max-width: 768px) {
    .hero-content {
        flex-direction: column;
        text-align: center;
    }

    .slider-container {
        max-width: 100%;
        height: 300px;
    }

    .hero-info {
        max-width: 100%;
        margin-top: 20px;
    }

    .hero-info h1 {
        font-size: 28px;
    }

    .hero-info p {
        font-size: 16px;
    }

    .btn {
        font-size: 16px;
        padding: 10px 20px;
    }
}

/* Adjust movie list for mobile */
@media (max-width: 768px) {
    .movie-carousel {
        flex-direction: column;
        align-items: center;
    }

    .movie-card {
        width: 100%;
        max-width: 300px;
    }

    .movie-card img {
        width: 100%;
    }

    .movie-card p {
        font-size: 16px;
    }

    .play-button {
        font-size: 40px;
    }
}

/* Adjust footer for mobile */
@media (max-width: 768px) {
    footer {
        padding: 10px;
    }
}

    </style>
</head>
<body>
    <!--<h1>Welcome to WatchTime, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>  -->

    <header>
        <nav>
            <div class="container">
                <a href="logobutton.html" class="logo">WatchTime</a>
                <ul>
                    <li><a href="movie_home.php">Home</a></li>
                    <li><a href="web_series.html">Series</a></li>
                    <li><a href="films.html">Films</a></li>
                    <li><a href="new_popular.html">New & Popular</a></li>
                    <li><a href="wishlist.html">My List</a></li>
                    <li><a href="profile.html">Profile</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="logout.html">Logout</a></li>
                </ul>
            </div>
        </nav>
    </header>
    
    <main>
        <section class="hero">
            <!-- Search Button -->
            <div class="search-container">
    <form action="search_results.php" method="GET">
        <input type="text" name="query" placeholder="Search..." class="search-input">
        <button type="submit" class="search-btn">Search</button>
    </form>
</div>
            <div class="container">
                <div class="hero-content">
                    <div class="slider-container">
                        <div class="slider" id="featured-slider">
                            <div class="slide" data-title="The Boys" data-description="All the loyal citizens are called to attention; they must gather at the courthouse tomorrow to witness Homelander's verdict and prepare themselves." data-stream-link="featuredmoviedash1.html">
                                <img src="pictures/rohonboys.jpg" alt="The Boys">
                            </div>
                            <div class="slide" data-title="Maharaja" data-description="The tension escalates as new threats emerge and the old guard is challenged.The tension escalates as new threats emerge and the old guard is challenged." data-stream-link="featuredmoviedash2.html">
                                <img src="pictures/maharaja.jpg" alt="Maharaja">
                            </div>
                            <div class="slide" data-title="The Boys 3" data-description="The final showdown looms as alliances shift and secrets are revealed.The tension escalates as new threats emerge and the old guard is challenged." data-stream-link="featuredmoviedash3.html">
                                <img src="pictures/rohonboys1.jpg" alt="The Boys 3">
                            </div>
                        </div>
                        <div class="slider-controls">
                            <button class="control-btn" id="prevBtn">&#10094;</button>
                            <button class="control-btn" id="nextBtn">&#10095;</button>
                        </div>
                    </div>
                    <div class="hero-info">
                        <h1 id="movie-title">The Boys</h1>
                        <p id="movie-description">All the loyal citizens are called to attention; they must gather at the courthouse tomorrow to witness Homelander's verdict and prepare themselves.</p>
                        <button class="btn" id="stream-btn"><a href="featuredmoviedash.html" style="text-decoration:none;color: #fff;">Stream</a></button>
                    </div>
                </div>
            </div>
        </section>

        <section class="movie-list" id="trending-now">
            <div class="container">
                <h2>Trending Now</h2>
                <div class="movie-carousel">
                    <div class="movie-card" data-title="Godzilla x Kong: The New Empire">
                        <img src="pictures/godzila.jpg" alt="Movie 1">
                        <a href="movie1.html" class="play-button">&#9658;</a>
                        <p>Godzilla x Kong: The New Empire</p>
                    </div>
                    <div class="movie-card" data-title="Dune: Part Two">
                        <img src="pictures/dune2.jpg" alt="Movie 2">
                        <a href="movie2.html" class="play-button">&#9658;</a>
                        <p>Dune: Part Two</p>
                    </div>
                    <div class="movie-card" data-title="The Fall Guy">
                        <img src="pictures/fallguy.jpg" alt="Movie 3">
                        <a href="movie3.html" class="play-button">&#9658;</a>
                        <p>The Fall Guy</p>
                    </div>
                    <div class="movie-card" data-title="Extraction 2">
                        <img src="pictures/extraction2.jpg" alt="Movie 4">
                        <a href="movie4.html" class="play-button">&#9658;</a>
                        <p>Extraction 2</p>
                    </div>
                    <div class="movie-card" data-title="The Gray Man">
                        <img src="pictures/thegrayman.jpg" alt="Movie 5">
                        <a href="movie5.html" class="play-button">&#9658;</a>
                        <p>The Gray Man</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="movie-list" id="New Releases">
            <div class="container">
                <h2>New Releases</h2>
                <div class="movie-carousel" data-title="KINGDOM of the PLANET of the APES">
                    <div class="movie-card">
                        <img src="pictures/kingdom.jpeg" alt="Movie 6">
                        <a href="movie6.html" class="play-button">&#9658;</a>
                        <p>KINGDOM of the PLANET of the APES</p>
                    </div>
                    <div class="movie-card" data-title="Bad Boys: Ride or Die">
                        <img src="pictures/badboys.jpeg" alt="Movie 7">
                        <a href="movie7.html" class="play-button">&#9658;</a>
                        <p>Bad Boys: Ride or Die</p>
                    </div>
                    <div class="movie-card" data-title="Land of Bad (2024)">
                        <img src="pictures/landofbad.jpg" alt="Movie 8">
                        <a href="movie8.html" class="play-button">&#9658;</a>
                        <p>Land of Bad (2024)</p>
                    </div>
                    <div class="movie-card" data-title="Furiosa (2024)">
                        <img src="pictures/furiosa.jpg" alt="Movie 9">
                        <a href="movie9.html" class="play-button">&#9658;</a>
                        <p>Furiosa (2024)</p>
                    </div>
                    <div class="movie-card" data-title="Joker 2: Folie à Deux (2024)">
                        <img src="pictures/jocker2.webp" alt="Movie 10">
                        <a href="movie10.html" class="play-button">&#9658;</a>
                        <p>Joker 2: Folie à Deux (2024)</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="movie-list">
            <div class="container">
                <h2>Top Rated</h2>
                <div class="movie-carousel">
                    <div class="movie-card" data-title="Kung Fu Panda 4 Movie">
                        <img src="pictures/kungfupanda4.jpeg" alt="Movie 11">
                        <a href="movie11.html" class="play-button">&#9658;</a>
                        <p>Kung Fu Panda 4 Movie</p>
                    </div>
                    <div class="movie-card" data-title="Avengers: ENDGAME">
                        <img src="pictures/endgame.jpeg" alt="Movie 12">
                        <a href="movie12.html" class="play-button">&#9658;</a>
                        <p>Avengers: ENDGAME</p>
                    </div>
                    <div class="movie-card" data-title="IF">
                        <img src="pictures/if.jpg" alt="Movie 13">
                        <a href="movie13.html" class="play-button">&#9658;</a>
                        <p>IF</p>
                    </div>
                    <div class="movie-card" data-title="KALKI part-1">
                        <img src="pictures/kalki.cHJkLWVtcy1hc3NldHMvbW92aWVzL2JlNjU4NjUxLTQwMzItNGRkYS1hYjRiLWJhZTM2ZDllMGMxMy5qcGc=" alt="Movie 14">
                        <a href="movie14.html" class="play-button">&#9658;</a>
                        <p>KALKI part-1</p>
                    </div>
                    <div class="movie-card" data-title="MADAM WEB">
                        <img src="pictures/madamweb.jpg" alt="Movie 15">
                        <a href="movie15.html" class="play-button">&#9658;</a>
                        <p>MADAM WEB</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 WatchTime. All Rights Reserved.</p>
    </footer>
    <!-- Add the search-container and search functionality as before -->

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const slider = document.getElementById('featured-slider');
        const slides = slider.querySelectorAll('.slide');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const titleElement = document.getElementById('movie-title');
        const descriptionElement = document.getElementById('movie-description');
        const streamBtn = document.getElementById('stream-btn');

        let index = 0;

        function showSlide(n) {
            if (n >= slides.length) index = 0;
            else if (n < 0) index = slides.length - 1;
            else index = n;

            slider.style.transform = `translateX(${-index * 100}%)`;

            // Update the title, description, and stream link
            const currentSlide = slides[index];
            titleElement.textContent = currentSlide.getAttribute('data-title');
            descriptionElement.textContent = currentSlide.getAttribute('data-description');
            streamBtn.querySelector('a').setAttribute('href', currentSlide.getAttribute('data-stream-link'));
        }

        prevBtn.addEventListener('click', () => showSlide(index - 1));
        nextBtn.addEventListener('click', () => showSlide(index + 1));

        showSlide(index);

        // Search functionality for all sections
        const searchInput = document.querySelector('.search-input');
        const searchBtn = document.querySelector('.search-btn');
        const movieSections = document.querySelectorAll('.movie-section'); // All sections like Trending Now, New Releases, Top Rated
        const movieCards = document.querySelectorAll('.movie-card');

        searchBtn.addEventListener('click', () => {
            const query = searchInput.value.toLowerCase();
            let movieFound = false;

            // Hide all movie sections initially
            movieSections.forEach(section => section.style.display = 'none');

            // Loop through all movie cards and show only those that match the search query
            movieCards.forEach(card => {
                const movieTitle = card.querySelector('p').textContent.toLowerCase();
                if (movieTitle.includes(query)) {
                    card.style.display = 'block';
                    movieFound = true;
                } else {
                    card.style.display = 'none';
                }
            });

            // If a movie is found, show only the section containing that movie
            if (movieFound) {
                movieCards.forEach(card => {
                    if (card.style.display === 'block') {
                        card.closest('.movie-section').style.display = 'block'; // Show the section of the matching movie
                    }
                });
            } else {
                alert('No movies found!');
            }
        });

        // Optional: Enable search on pressing Enter key
        searchInput.addEventListener('keyup', (e) => {
            if (e.key === 'Enter') {
                searchBtn.click();
            }
        });
    });
</script>


     <!--  
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const slider = document.getElementById('featured-slider');
        const slides = slider.querySelectorAll('.slide');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const titleElement = document.getElementById('movie-title');
        const descriptionElement = document.getElementById('movie-description');
        const streamBtn = document.getElementById('stream-btn');

        let index = 0;

        function showSlide(n) {
            if (n >= slides.length) index = 0;
            else if (n < 0) index = slides.length - 1;
            else index = n;

            slider.style.transform = `translateX(${-index * 100}%)`;

            // Update the title, description, and stream link
            const currentSlide = slides[index];
            titleElement.textContent = currentSlide.getAttribute('data-title');
            descriptionElement.textContent = currentSlide.getAttribute('data-description');
            streamBtn.querySelector('a').setAttribute('href', currentSlide.getAttribute('data-stream-link'));
        }

        prevBtn.addEventListener('click', () => showSlide(index - 1));
        nextBtn.addEventListener('click', () => showSlide(index + 1));

        showSlide(index);

        // Search functionality for all sections
        const searchInput = document.querySelector('.search-input');
        const searchBtn = document.querySelector('.search-btn');
        const movieCards = document.querySelectorAll('.movie-card');

        searchBtn.addEventListener('click', () => {
            const query = searchInput.value.toLowerCase();

            // Loop through all movie cards and show only those that match the search query
            movieCards.forEach(card => {
                const movieTitle = card.querySelector('p').textContent.toLowerCase();
                if (movieTitle.includes(query)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // Optional: Enable search on pressing Enter key
        searchInput.addEventListener('keyup', (e) => {
            if (e.key === 'Enter') {
                searchBtn.click();
            }
        });
    });
</script>
-->
</body>
</html>
