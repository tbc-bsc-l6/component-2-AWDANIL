<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Team</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md mx-auto bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-2xl font-bold text-center text-teal-600 mb-4">Add New Team</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                <strong class="font-bold">Whoops!</strong>
                <span class="block sm:inline">There are some problems with your input.</span>
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('teams.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Team Name -->
            <div>
                <label for="name" class="block text-gray-700 font-medium mb-2">Team Name:</label>
                <input type="text" id="name" name="name" required 
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500">
            </div>

            <!-- Coach -->
            <div>
                <label for="coach" class="block text-gray-700 font-medium mb-2">Coach:</label>
                <input type="text" id="coach" name="coach" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500">
            </div>

            <!-- City -->
            <div>
                <label for="city" class="block text-gray-700 font-medium mb-2">City:</label>
                <input type="text" id="city" name="city" 
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-teal-500">
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" 
                    class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-6 rounded-lg shadow-lg transition duration-300">
                    Create Team
                </button>
            </div>
        </form>
    </div>
</body>
</html>
