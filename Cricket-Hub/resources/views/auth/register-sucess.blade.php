<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Successful</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 max-w-lg text-center">
        <h1 class="text-2xl font-bold text-teal-500 mb-4">🎉 Registration Successful!</h1>
        @if (session('status'))
            <p class="text-gray-700 mb-6">{{ session('status') }}</p>
        @endif
        <a href="{{ route('login') }}"
           class="bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-4 rounded-lg shadow-lg">
           Click Here to Login
        </a>
    </div>
</body>
</html>
