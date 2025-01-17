<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cricket Hub Dashboard</title>

    <!-- TailwindCSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <!-- Additional Styling -->
    <style>
        .card:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease-in-out;
        }

        .hero {
            background-image: url('images/2.jpg');
            background-size: cover;
            background-position: center;
            height: 50vh;
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
    </style>
</head>

<body class="bg-gray-100 text-gray-800">
    <!-- Navbar -->
    <nav class="bg-gray-800 text-white py-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Branding -->
            <div class="text-2xl font-bold">Cricket Hub</div>

            <!-- Navigation Links -->
            <ul class="flex space-x-6">
                <li><a href="/" class="hover:text-teal-400">Home</a></li>
                <li><a href="{{ route('teams.index') }}" class="hover:text-teal-400">Teams</a></li>
                <li><a href="{{ route('players.index') }}" class="hover:text-teal-400">Players</a></li>
                <li><a href="{{ route('about-us') }}" class="hover:text-teal-400">About Us</a></li>
                <li><a href="{{ route('contact-us') }}" class="hover:text-teal-400">Contact Us</a></li>
                <!-- Profile Dropdown -->
                <div class="relative">
                    <button id="profileDropdownButton"
                        class="text-white px-4 py-2 bg-blue-600 rounded hover:bg-blue-700 focus:outline-none">
                        <i class="fas fa-user"></i> {{ Auth::user()->name }}
                    </button>
                    <div id="profileDropdown"
                        class="hidden absolute right-0 mt-2 bg-white shadow-md rounded-lg overflow-hidden w-48 z-50">
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
                            </li>
                        </ul>
                    </div>
                </div>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-overlay"></div>
        <div class="container mx-auto h-full flex flex-col items-center justify-center text-center text-white hero-content">
            <h1 class="text-5xl font-bold mb-4">Cricket Hub Dashboard</h1>
            <p class="text-lg">Manage your cricket activities efficiently and effectively.</p>
            <div class="mt-6">
                <a href="{{ route('teams.index') }}" class="bg-blue-600 text-white px-6 py-3 rounded shadow-lg hover:bg-blue-700">
                    Manage Teams
                </a>
                <a href="{{ route('players.index') }}" class="bg-gray-800 text-white px-6 py-3 rounded shadow-lg hover:bg-gray-900">
                    Manage Players
                </a>
            </div>
        </div>
    </section>

    <!-- Dashboard Overview -->
    <section class="py-12">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Total Teams -->
                <div class="card p-6 bg-white shadow-lg rounded-lg">
                    <h3 class="text-lg font-bold text-gray-700">Total Teams</h3>
                    <p class="text-4xl font-bold text-blue-600 mt-2">10</p>
                </div>

                <!-- Total Players -->
                <div class="card p-6 bg-white shadow-lg rounded-lg">
                    <h3 class="text-lg font-bold text-gray-700">Total Players</h3>
                    <p class="text-4xl font-bold text-green-600 mt-2">50+</p>
                </div>

                <!-- Upcoming Matches -->
                <div class="card p-6 bg-white shadow-lg rounded-lg">
                    <h3 class="text-lg font-bold text-gray-700">Upcoming Matches</h3>
                    <p class="text-4xl font-bold text-red-600 mt-2">5</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Recent Activity -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold text-gray-700 mb-6">Recent Activity</h2>
            <div class="bg-white p-6 rounded-lg shadow">
                <ul class="divide-y divide-gray-200">
                    <li class="py-3 flex justify-between">
                        <span>Team A won against Team B</span>
                        <span class="bg-blue-600 text-white px-3 py-1 text-xs rounded">New</span>
                    </li>
                    <li class="py-3 flex justify-between">
                        <span>Player X scored a century</span>
                        <span class="bg-green-600 text-white px-3 py-1 text-xs rounded">Highlight</span>
                    </li>
                    <li class="py-3 flex justify-between">
                        <span>Upcoming match scheduled for next week</span>
                        <span class="bg-yellow-600 text-white px-3 py-1 text-xs rounded">Upcoming</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

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
