<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
    // Redirect to the login page if not logged in
    header('Location: index.html');
    exit;
}

// Movie data array
$movies = [
    [
        'title' => 'Godzilla x Kong: The New Empire',
        'image' => 'pictures/godzila.jpg',
        'link'  => 'movie1.html',
        'description' => 'An epic battle between titans.'
    ],
    [
        'title' => 'Dune: Part Two',
        'image' => 'pictures/dune2.jpg',
        'link'  => 'movie2.html',
        'description' => 'An epic battle between titans.'
    ],
    [
        'title' => 'The Fall Guy',
        'image' => 'pictures/fallguy.jpg',
        'link'  => 'movie3.html',
        'description' => 'An epic battle between titans.'
    ],
    [
        'title' => 'Extraction 2',
        'image' => 'pictures/extraction2.jpg',
        'link'  => 'movie4.html',
        'description' => 'An epic battle between titans.'
    ],
    [
        'title' => 'The Gray Man',
        'image' => 'pictures/thegrayman.jpg',
        'link'  => 'movie5.html',
        'description' => 'An epic battle between titans.'
    ],
    [
        'title' => 'KINGDOM of the PLANET of the APES',
        'image' => 'pictures/kingdom.jpeg',
        'link'  => 'movie6.html',
        'description' => 'An epic battle between titans.'
    ],
    [
        'title' => 'Bad Boys: Ride or Die',
        'image' => 'pictures/badboys.jpeg',
        'link'  => 'movie7.html',
        'description' => 'An epic battle between titans.'
    ],
    [
        'title' => 'Land of Bad (2024)',
        'image' => 'pictures/landofbad.jpg',
        'link'  => 'movie8.html',
        'description' => 'An epic battle between titans.'
    ],
    [
        'title' => 'Furiosa (2024)',
        'image' => 'pictures/furiosa.jpg',
        'link'  => 'movie9.html',
        'description' => 'An epic battle between titans.'
    ],
    [
        'title' => 'Joker 2: Folie à Deux (2024)',
        'image' => 'pictures/jocker2.webp',
        'link'  => 'movie10.html',
        'description' => 'An epic battle between titans.'
    ],
    [
        'title' => 'Kung Fu Panda 4 Movie',
        'image' => 'pictures/kungfupanda4.jpeg',
        'link'  => 'movie11.html',
        'description' => 'An epic battle between titans.'
    ],
    [
        'title' => 'Avengers: ENDGAME',
        'image' => 'pictures/endgame.jpeg',
        'link'  => 'movie12.html',
        'description' => 'An epic battle between titans.'
    ],
    [
        'title' => 'IF',
        'image' => 'pictures/if.jpg',
        'link'  => 'movie13.html',
        'description' => 'An epic battle between titans.'
    ],
    [
        'title' => 'KALKI part-1',
        'image' => 'pictures/kalki.cHJkLWVtcy1hc3NldHMvbW92aWVzL2JlNjU4NjUxLTQwMzItNGRkYS1hYjRiLWJhZTM2ZDllMGMxMy5qcGc=',
        'link'  => 'movie14.html',
        'description' => 'An epic battle between titans.'
    ],
    [
        'title' => 'MADAM WEB',
        'image' => 'pictures/madamweb.jpg',
        'link'  => 'movie15.html',
        'description' => 'An epic battle between titans.'
    ],
];

// Get the search query
$query = isset($_GET['query']) ? strtolower(trim($_GET['query'])) : '';

// Filter movies based on search query
$filteredMovies = array_filter($movies, function($movie) use ($query) {
    return strpos(strtolower($movie['title']), $query) !== false;
});
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        /* Include the same CSS from movie_home.php */
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

        .container {
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
            margin-top: 20px;
        }

        .hero img {
            width: 100%;
            max-width: 300px;
            border-radius: 10px;
            margin-right: 20px;
        }

        .hero-info h1 {
            font-size: 36px;
            margin-bottom: 15px;
        }

        .hero-info p {
            margin-bottom: 10px;
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

        #no-movies-found {
            text-align: center;
            margin-top: 20px;
        }

        #no-movies-found p {
            margin-bottom: 10px;
        }

        #no-movies-found .btn {
            margin-top: 10px;
        }
    </style>
</head>
<body>
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

    <main class="container">
        <?php if (count($filteredMovies) > 0): ?>
            <?php foreach ($filteredMovies as $movie): ?>
                <section class="hero">
                    <img src="<?php echo $movie['image']; ?>" alt="<?php echo $movie['title']; ?>">
                    <div class="hero-info">
                        <h1><?php echo $movie['title']; ?></h1>
                        <p><?php echo $movie['description']; ?></p>
                        <button class="btn"><a href="<?php echo $movie['link']; ?>" style="text-decoration:none;color: #fff;">Stream</a></button>
                    </div>
                </section>
            <?php endforeach; ?>
        <?php else: ?>
            <div id="no-movies-found">
                <p>SORRY!! No movies found matching your search criteria.Please contact us via mail, and we will add your favorite movie in 24 hours.</p>
                <a href="contact.html" class="btn">Contact Us</a>
            </div>
        <?php endif; ?>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.querySelector('.search-input');
            const searchBtn = document.querySelector('.search-btn');
            const movieCards = document.querySelectorAll('.movie-card');
            const noMoviesFound = document.getElementById('no-movies-found');

            searchBtn.addEventListener('click', () => {
                const query = searchInput.value.toLowerCase();
                let movieFound = false;

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

                // Show or hide the no-movies-found message
                if (movieFound) {
                    noMoviesFound.style.display = 'none';
                } else {
                    noMoviesFound.style.display = 'block';
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
</body>
</html>
