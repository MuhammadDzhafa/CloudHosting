<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Email</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .custom-gradient {
            background: radial-gradient(100% 801.55% at 1.19% 0%, rgba(100, 52, 147, 0.76) 24%, rgba(74, 109, 203, 0.8) 71%, rgba(100, 210, 247, 0.78) 100%);
        }
    </style>
</head>
<body class="bg-gray-100 flex flex-col justify-center items-center min-h-screen p-4">
    <div class="bg-white border border-gray-200 rounded-lg p-6 md:p-10 w-full max-w-[560px] shadow-md">
        <div class="flex justify-center mb-6">
            <div class="p-3 rounded-lg">
                <img src="assets/img/logos/logo/logoo.svg" alt="Your Image" class="w-16 h-14 md:w-[60px] md:h-[52.24px]">
            </div>
        </div>
        
        <h2 class="text-xl md:text-[26px] font-semibold text-center mb-2 md:mb-1 text-[#464646] leading-7 md:leading-[33.8px]">
            Recover Your Password
        </h2>
        
        <p class="text-base md:text-[20px] font-normal text-[#464646] leading-6 md:leading-[26px] text-center mb-6">
            Enter your registered phone number below to reset your password.
        </p>
        
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('send.reset.link.whatsapp') }}" method="POST">
            @csrf
            <div class="mb-6">
            <div class="flex bg-gray-50 border rounded-lg {{ $errors->has('phone') ? 'border-red-500' : 'border-gray-300' }}">
    <span class="inline-flex items-center px-3 text-gray-500 bg-gray-100 border-r border-gray-300 rounded-l-lg">
        +62
    </span>
    <input type="tel" name="phone" placeholder="Phone Number" class="flex-1 p-3 border-none outline-none rounded-r-lg text-gray-700 placeholder-gray-500" value="{{ old('phone') }}" required>
</div>
                @error('phone')
                    <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <button type="submit" class="w-full h-[58px] rounded-full text-[#F3F5FC] text-lg font-medium leading-6 custom-gradient hover:opacity-90 transition duration-300">
                Send Recovery Link via WhatsApp
            </button>
        </form>
    </div>
    
    <div class="mt-6 text-center">
        <a href="{{ route('password.request') }}" class="text-blue-500 hover:underline">&larr; Go Back</a>
    </div>
</body>
</html>