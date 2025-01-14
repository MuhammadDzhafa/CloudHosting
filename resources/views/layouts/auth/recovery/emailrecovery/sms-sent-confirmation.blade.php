<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awan Hosting :: SMS Sent Confirmation</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logos/logo/logoo.svg') }}" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body, h2, p, button {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
    <div class="bg-white p-6 sm:p-8 md:p-10 rounded-xl shadow-lg w-full max-w-[560px] border border-[#DEDEDE]">
        <div class="flex justify-center mb-4 sm:mb-6">
            <img 
                src="{{ asset('assets/img/illust.svg') }}" 
                alt="SMS sent illustration" 
                class="w-full max-w-[250px] sm:max-w-[350px] h-auto object-contain"
            >
        </div>
        
        <h2 class="text-xl sm:text-2xl md:text-3xl font-semibold text-center text-[#464646] mb-3 sm:mb-4">
            SMS has been sent!
        </h2>
        
        <p class="text-[#464646] text-center mb-6 text-sm sm:text-base md:text-lg px-4 sm:px-0">
            We've sent an SMS to <span class="font-bold">{{ $phone }}</span><br>
            Please check your message and follow the<br>
            instructions to reset your password.
        </p>
        
        <div class="flex justify-center">
            <a 
                href="{{ route('login') }}" 
                class="w-full sm:w-[480px] text-[#F3F5FC] font-medium text-center py-3 sm:py-4 px-6 rounded-full inline-block transition duration-300 ease-in-out hover:opacity-90"
                style="background: radial-gradient(100% 801.55% at 1.19% 0%, rgba(100, 52, 147, 0.76) 24%, rgba(74, 109, 203, 0.8) 71%, rgba(100, 210, 247, 0.78) 100%);"
            >
                Back to Login Page
            </a>
        </div>
    </div>
</body>
</html>