<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Cricket Hub</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
        }
        .hero {
            background-image: url('https://example.com/cricket-hero.jpg'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            height: 60vh;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            position: relative;
        }
        .hero::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5); /* Dark overlay */
        }
        .hero h1 {
            z-index: 1;
        }
        .feature-icon {
            font-size: 50px;
            color: #007bff;
            transition: transform 0.3s;
        }
        .feature-icon:hover {
            transform: scale(1.2);
        }
        .footer {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
        }
        .card {
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>

    <!-- Hero Section -->
    <div class="hero">
        <div class="container">
            <h1 class="display-4">Welcome to Cricket Hub</h1>
            <p class="lead">Your one-stop destination for all things cricket!</p>
            <a href="{{ route('teams.index') }}" class="btn btn-light btn-lg">View Teams</a>
            <a href="{{ route('players.index') }}" class="btn btn-outline-light btn-lg">View Players</a>
        </div>
    </div>

    <!-- Features Section -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Features</h2>
        <div class="row">
            <div class="col-md-4 text-center">
                <div class="feature-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3>Team Management</h3>
                <p>Manage your favorite cricket teams and stay updated with their performance.</p>
            </div>
            <div class="col-md-4 text-center">
                <div class="feature-icon">
                    <i class="fas fa-user"></i>
                </div>
                <h3>Player Profiles</h3>
                <p>Explore detailed profiles of your favorite players, including stats and achievements.</p>
            </div>
            <div class="col-md-4 text-center">
                <div class="feature-icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <h3>Latest News</h3>
                <p>Get the latest news and updates from the world of cricket.</p>
            </div>
        </div>
    </div>

    <!-- Latest News Section -->
    <div class="container my-5">
        <h2 class="text-center mb-4">Latest News</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="images/1.jpeg" class="card-img-top" alt="News 1"> <!-- Replace with your image URL -->
                    <div class="card-body">
                        <h5 class="card-title">Cricket World Cup 2023 Updates</h5>
                        <p class="card-text">Stay tuned for the latest updates on the Cricket World Cup 2023.</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </ div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://example.com/news2.jpg" class="card-img-top" alt="News 2"> <!-- Replace with your image URL -->
                    <div class="card-body">
                        <h5 class="card-title">Player of the Month</h5>
                        <p class="card-text">Find out who has been named the Player of the Month in cricket.</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="https://example.com/news3.jpg" class="card-img-top" alt="News 3"> <!-- Replace with your image URL -->
                    <div class="card-body">
                        <h5 class="card-title">Upcoming Matches</h5>
                        <p class="card-text">Check out the schedule for upcoming cricket matches.</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="footer text-center">
        <div class="container">
            <p>&copy; 2023 Cricket Hub. All rights reserved.</p>
            <a href="#" class="text-light">Privacy Policy</a> | 
            <a href="#" class="text-light">Terms of Service</a>
        </div>
    </footer>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Add any additional JavaScript for animations or interactivity here
        $(document).ready(function() {
            $('.hero').fadeIn(2000); // Fade in the hero section
        });
    </script>
</body>
</html>