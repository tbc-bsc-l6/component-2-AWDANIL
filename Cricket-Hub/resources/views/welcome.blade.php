<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Cricket Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        /* Hero Section Styling */
        .hero {
            background-image: url('https://source.unsplash.com/1600x900/?cricket,stadium');
            background-size: cover;
            background-position: center;
            height: 60vh;
            position: relative;
        }
        .hero-overlay {
            position: absolute;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.6);
        }
        .hero-content {
            position: relative;
            z-index: 1;
        }

        /* Feature Card Hover Animation */
        .card:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease-in-out;
        }
        .feature-icon:hover {
            transform: scale(1.2);
            color: #14b8a6;
        }

        /* Smooth Scrolling */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Hero Section -->
    <div class="hero">
        <div class="hero-overlay"></div>
        <div class="container mx-auto h-full flex flex-col items-center justify-center text-center text-white hero-content">
            <h1 class="text-6xl font-extrabold mb-4">Welcome to Cricket Hub</h1>
            <p class="text-xl mt-4">Your ultimate destination for everything cricket!</p>
            <div class="mt-6">
                <a href="{{ route('teams.index') }}" class="bg-teal-500 hover:bg-teal-600 text-white px-8 py-3 rounded-lg shadow-lg mr-4 transition-all duration-300">View Teams</a>
                <a href="{{ route('players.index') }}" class="border border-teal-500 hover:bg-teal-500 hover:text-white text-teal-500 px-8 py-3 rounded-lg shadow-lg transition-all duration-300">View Players</a>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="container mx-auto my-16">
        <h2 class="text-4xl font-bold text-center text-gray-800 mb-12">Our Features</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
            <div class="text-center p-8 bg-white shadow-lg rounded-lg hover:shadow-xl transition duration-300 transform hover:scale-105">
                <div class="text-teal-500 text-7xl mb-6">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="text-2xl font-bold">Team Management</h3>
                <p class="mt-3 text-gray-600">Easily manage your favorite cricket teams and track their performance.</p>
            </div>
            <div class="text-center p-8 bg-white shadow-lg rounded-lg hover:shadow-xl transition duration-300 transform hover:scale-105">
                <div class="text-teal-500 text-7xl mb-6">
                    <i class="fas fa-user"></i>
                </div>
                <h3 class="text-2xl font-bold">Player Profiles</h3>
                <p class="mt-3 text-gray-600">Dive into detailed profiles, stats, and achievements of your favorite players.</p>
            </div>
            <div class="text-center p-8 bg-white shadow-lg rounded-lg hover:shadow-xl transition duration-300 transform hover:scale-105">
                <div class="text-teal-500 text-7xl mb-6">
                    <i class="fas fa-newspaper"></i>
                </div>
                <h3 class="text-2xl font-bold">Latest News</h3>
                <p class="mt-3 text-gray-600">Stay updated with the latest news and updates from the world of cricket.</p>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="bg-teal-500 py-16">
        <div class="container mx-auto text-center text-white">
            <h2 class="text-4xl font-extrabold mb-4">Ready to Dive In?</h2>
            <p class="text-lg mb-6">Join Cricket Hub and take your love for cricket to the next level.</p>
            <a href="{{ route('teams.index') }}" class="bg-white text-teal-500 px-8 py-3 rounded-md font-semibold shadow-md hover:bg-gray-100">Get Started</a>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="bg-gray-900 text-white py-10">
        <div class="container mx-auto text-center">
            <p>&copy; {{ date('Y') }} Cricket Hub. All Rights Reserved.</p>
            <div class="mt-4">
                <a href="#" class="text-teal-400 hover:underline px-4">Privacy Policy</a>
                <a href="#" class="text-teal-400 hover:underline px-4">Terms of Service</a>
                <a href="#" class="text-teal-400 hover:underline px-4">Contact Us</a>
            </div>
            <div class="mt-6">
                <p>Follow Us:</p>
                <div class="flex justify-center space-x-4 mt-2">
                    <a href="#" class="text-teal-400 hover:text-white"><i class="fab fa-facebook fa-lg"></i></a>
                    <a href="#" class="text-teal-400 hover:text-white"><i class="fab fa-twitter fa-lg"></i></a>
                    <a href="#" class="text-teal-400 hover:text-white"><i class="fab fa-instagram fa-lg"></i></a>
                    <a href="#" class="text-teal-400 hover:text-white"><i class="fab fa-youtube fa-lg"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
</body>
</html>
