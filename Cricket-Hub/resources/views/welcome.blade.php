<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Cricket Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    
    <style>
        /* Fix opacity and enhance visibility */
        .hero {
            background-image: url('https://source.unsplash.com/1600x900/?cricket,stadium');
            background-size: cover;
            background-position: center;
            height: 80vh;
            position: relative;
        }
        .hero-overlay {
            position: absolute;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.5); /* Lowered opacity for better visibility */
        }
        .hero-content {
            position: relative;
            z-index: 1;
        }
        .fade-in {
            animation: fadeIn 1.5s ease-in-out;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

     <!-- Navbar -->
     <nav class="bg-gray-800 text-white py-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-2xl font-bold">Cricket Hub</div>
            <ul class="flex space-x-6">
                <li><a href="/" class="hover:text-teal-400">Home</a></li>
                <li><a href="{{ route('teams.index') }}" class="hover:text-teal-400">Teams</a></li>
                <li><a href="{{ route('players.index') }}" class="hover:text-teal-400">Players</a></li>
                <a href="{{ route('cricket.index') }}" class="hover:text-teal-400">Live Matches</a>
                <li><a href="{{ route('about-us') }}" class="hover:text-teal-400">About Us</a></li>
                <li><a href="{{ route('contact-us') }}" class="hover:text-teal-400">Contact Us</a></li>
            </ul>
            <div class="flex items-center space-x-4">
                @auth
                    <!-- Show username, Edit Profile, and Logout for logged-in users -->
                    <div class="relative">
                        <button id="profileDropdownButton" class="text-white px-4 py-2 bg-blue-600 rounded hover:bg-blue-700 focus:outline-none">
                            <i class="fas fa-user"></i> {{ Auth::user()->name }}
                        </button>
                        <div id="profileDropdown" class="hidden absolute right-0 mt-2 bg-white shadow-md rounded-lg overflow-hidden w-48 z-50">
                            <div class="p-4 text-center border-b">
                                <p class="font-bold">{{ Auth::user()->name }}</p>
                                <p class="text-sm text-gray-600">{{ Auth::user()->email }}</p>
                            </div>
                            <ul class="py-2">
                                <li class="px-4 py-2 hover:bg-gray-100">
                                    <a href="{{ route('profile.edit') }}" class="text-gray-800">
                                        <i class="fas fa-user"></i> Edit Profile
                                    </a>
                                </li>
                                <li class="px-4 py-2 hover:bg-gray-100">
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="text-red-500">
                                            <i class="fas fa-sign-out-alt"></i> Log Out
                                        </button>
                    
                    </form>
                @else
                    <!-- Show Login and Sign Up for guests -->
                    <a href="{{ route('login') }}" class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded-md">Login</a>
                    <a href="{{ route('register') }}" class="border border-gray-500 hover:bg-teal-500 hover:text-white text-teal-500 px-4 py-2 rounded-md">Sign Up</a>
                @endauth
            </div>
            
        </div>
    </nav>

    <!-- Hero Section -->
<div
class="hero relative bg-cover bg-center text-white"
style="background-image: url('/images/1.jpg');">
<div class="hero-overlay bg-black bg-opacity-50 absolute inset-0"></div>
<div class="container mx-auto flex flex-col items-center justify-center h-full text-center hero-content fade-in">
    <h1 class="text-6xl font-extrabold mb-4">Welcome to Cricket Hub</h1>
    <p class="text-xl mt-4">Your ultimate destination for everything cricket!</p>
    <div class="mt-6 flex space-x-4">
        <a href="{{ route('teams.index') }}" class="bg-teal-500 hover:bg-teal-600 text-white px-6 py-3 rounded-lg shadow-lg">View Teams</a>
        <a href="{{ route('players.index') }}" class="border border-teal-500 hover:bg-teal-500 hover:text-white text-teal-500 px-6 py-3 rounded-lg shadow-lg">View Players</a>
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
    <div class="bg-teal-500 py-16 text-center text-white">
        <h2 class="text-4xl font-bold mb-4">Ready to Dive In?</h2>
        <p class="text-lg mb-6">Join Cricket Hub and take your love for cricket to the next level.</p>
        <a href="{{ route('register') }}" class="bg-white text-teal-500 px-6 py-3 rounded-md font-bold hover:bg-gray-100">Get Started</a>
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
            <div class="mt-6 flex justify-center space-x-4">
                <a href="#" class="text-teal-400 hover:text-white"><i class="fab fa-facebook fa-lg"></i></a>
                <a href="#" class="text-teal-400 hover:text-white"><i class="fab fa-twitter fa-lg"></i></a>
                <a href="#" class="text-teal-400 hover:text-white"><i class="fab fa-instagram fa-lg"></i></a>
                <a href="#" class="text-teal-400 hover:text-white"><i class="fab fa-youtube fa-lg"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <!-- Dropdown Script -->
    <script>
        document.getElementById('profileDropdownButton').addEventListener('click', () => {
            const dropdown = document.getElementById('profileDropdown');
            dropdown.classList.toggle('hidden');
        });
        document.addEventListener('click', (event) => {
            const dropdown = document.getElementById('profileDropdown');
            if (!event.target.closest('#profileDropdownButton')) {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
