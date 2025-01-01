<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Hero Section -->
    <div class="bg-teal-500 py-12">
        <div class="max-w-7xl mx-auto text-center">
            <h1 class="text-4xl font-bold text-white">Contact Us</h1>
            <p class="mt-4 text-teal-100">We'd love to hear from you. Get in touch with us today!</p>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="max-w-7xl mx-auto py-12 px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="bg-white shadow-lg rounded-lg p-8">
                <h2 class="text-2xl font-semibold mb-6">Send Us a Message</h2>
                <form action="#" method="POST" class="space-y-4">
                    
                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
                        <input type="text" name="name" id="name" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500">
                    </div>
                    
                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Your Email</label>
                        <input type="email" name="email" id="email" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500">
                    </div>
                    
                    <!-- Subject -->
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                        <input type="text" name="subject" id="subject" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500">
                    </div>
                    
                    <!-- Message -->
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                        <textarea name="message" id="message" rows="4" required
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500"></textarea>
                    </div>
                    
                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                            class="w-full bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded-md">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>

            <!-- Contact Information -->
            <div>
                <h2 class="text-2xl font-semibold mb-6">Contact Information</h2>
                <p class="text-gray-700 mb-4">
                    Feel free to reach out to us through any of the following contact details.
                </p>
                <ul class="space-y-4">
                    <li class="flex items-center">
                        <i class="fas fa-phone-alt text-teal-500 mr-4"></i>
                        <span>+977 9843964051</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-envelope text-teal-500 mr-4"></i>
                        <span>anilacharya@crickethub.com</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-map-marker-alt text-teal-500 mr-4"></i>
                        <span>Nagarjun-1, Kathmandu, Nepal</span>
                    </li>
                </ul>

                <!-- Social Media Links -->
                <div class="mt-8">
                    <h3 class="text-lg font-semibold mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-teal-500 hover:text-teal-600"><i class="fab fa-facebook fa-lg"></i></a>
                        <a href="#" class="text-teal-500 hover:text-teal-600"><i class="fab fa-twitter fa-lg"></i></a>
                        <a href="#" class="text-teal-500 hover:text-teal-600"><i class="fab fa-instagram fa-lg"></i></a>
                        <a href="#" class="text-teal-500 hover:text-teal-600"><i class="fab fa-youtube fa-lg"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Footer Section -->
<footer class="bg-gray-900 text-white py-10">
        <div class="container mx-auto text-center">
        <p>&copy; <?php echo date('Y'); ?> Cricket Hub. All Rights Reserved.</p>
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
