<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Cricket Hub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Header Section -->
    <header class="bg-gradient-to-r from-teal-500 to-blue-500 text-white py-12">
        <div class="container mx-auto text-center">
            <h1 class="text-5xl font-bold mb-4">About Cricket Hub</h1>
            <p class="text-lg">Discover who we are and what drives us to bring the cricket world closer to you.</p>
        </div>
    </header>

    <!-- About Us Content -->
    <section class="py-12">
        <div class="container mx-auto px-6 lg:px-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Image Section -->
                <div>
                    <img src="https://via.placeholder.com/600x400" alt="About Us" class="rounded-lg shadow-lg">
                </div>
                <!-- Text Section -->
                <div>
                    <h2 class="text-4xl font-bold mb-6">Our Mission</h2>
                    <p class="text-lg leading-relaxed mb-4">
                        At Cricket Hub, our mission is to empower cricket enthusiasts with a platform that connects
                        players, teams, and fans. We are dedicated to making cricket management easy and accessible
                        while celebrating the spirit of the game.
                    </p>
                    <p class="text-lg leading-relaxed">
                        Whether you're a team manager, player, or fan, Cricket Hub is your one-stop destination for
                        managing teams, exploring player stats, and staying updated with the latest cricket news.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-6 lg:px-20">
            <h2 class="text-4xl font-bold text-center mb-8">Our Values</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Value 1 -->
                <div class="p-6 bg-white rounded-lg shadow-lg text-center">
                    <div class="text-teal-500 text-6xl mb-4">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Excellence</h3>
                    <p class="text-gray-600">
                        We strive to deliver the best platform to support cricket management and growth.
                    </p>
                </div>
                <!-- Value 2 -->
                <div class="p-6 bg-white rounded-lg shadow-lg text-center">
                    <div class="text-teal-500 text-6xl mb-4">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Community</h3>
                    <p class="text-gray-600">
                        Building connections and fostering a sense of belonging within the cricket world.
                    </p>
                </div>
                <!-- Value 3 -->
                <div class="p-6 bg-white rounded-lg shadow-lg text-center">
                    <div class="text-teal-500 text-6xl mb-4">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Innovation</h3>
                    <p class="text-gray-600">
                        Continuously improving our platform with cutting-edge features and technologies.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="py-12">
        <div class="container mx-auto px-6 lg:px-20">
            <h2 class="text-4xl font-bold text-center mb-8">Meet Our Team</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Team Member 1 -->
                <div class="text-center">
                    <img src="https://via.placeholder.com/150" alt="Team Member" class="rounded-full mx-auto mb-4 shadow-lg">
                    <h3 class="text-lg font-bold">Anil Acharya</h3>
                    <p class="text-gray-600">Founder & CEO</p>
                </div>
                <!-- Team Member 2 -->
                <div class="text-center">
                    <img src="https://via.placeholder.com/150" alt="Team Member" class="rounded-full mx-auto mb-4 shadow-lg">
                    <h3 class="text-lg font-bold">Shahrukh Khan</h3>
                    <p class="text-gray-600">Head of Operations</p>
                </div>
                <!-- Team Member 3 -->
                <div class="text-center">
                    <img src="https://via.placeholder.com/150" alt="Team Member" class="rounded-full mx-auto mb-4 shadow-lg">
                    <h3 class="text-lg font-bold">Pretti Zinta</h3>
                    <p class="text-gray-600">Lead Developer</p>
                </div>
                <!-- Team Member 4 -->
                <div class="text-center">
                    <img src="https://via.placeholder.com/150" alt="Team Member" class="rounded-full mx-auto mb-4 shadow-lg">
                    <h3 class="text-lg font-bold">Ranbir Kapoor</h3>
                    <p class="text-gray-600">Marketing Specialist</p>
                </div>
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


    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
