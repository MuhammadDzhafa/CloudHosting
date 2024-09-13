<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body, h2, p, button, a {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-[#DEDEDE]">
    <div class="flex flex-col items-center justify-center min-h-screen px-4">
        <div class="w-[560px] max-w-full bg-white border border-[#DEDEDE] rounded-lg shadow-lg p-8 flex flex-col gap-6">
            <div class="flex justify-center mb-6">
                <div class="flex items-center justify-center">
                    <img src="assets/img/logos/logo/logoo.svg" alt="Your Logo" class="w-16 h-14 object-cover">
                </div>
            </div>
            
            <h2 class="text-2xl font-semibold text-[#464646] leading-7 text-center mb--10">Forgot Your Password?</h2>
            <p class="text-lg font-normal text-[#464646] leading-6 text-center mb-4">
                Enter your registered email below to receive password reset instructions.
            </p>
            
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            
            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <div class="flex items-center bg-white border border-gray-300 rounded-lg p-3 h-12">
                        <img src="/assets/img/icons/mail.svg" alt="Email Icon" class="w-6 h-6">
                        <input
                            type="email"
                            name="email"
                            placeholder="Email Address"
                            class="bg-transparent border-none outline-none w-full text-[#464646] text-base font-normal leading-6 ml-3"
                            required
                            value="{{ old('email') }}"
                        >
                    </div>
                </div>
                
                <button type="submit" class="w-full h-14 px-5 py-3 rounded-full text-[#F3F5FC] text-lg font-medium leading-6 text-center transition duration-300"
                    style="background: radial-gradient(100% 801.55% at 1.19% 0%, rgba(100, 52, 147, 0.76) 24%, rgba(74, 109, 203, 0.8) 71%, rgba(100, 210, 247, 0.78) 100%);">
                    Confirm
                </button>
            </form>
        </div>
        <div class="mt-4">
            <a href="{{ route('password.request') }}" class="text-blue-600 text-sm hover:underline">← Go Back</a>
        </div>
    </div>
</body>
</html>