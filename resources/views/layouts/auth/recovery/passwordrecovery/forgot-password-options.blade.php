<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recover Email or Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body, h2, p, button, a {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen p-4">
    <div class="bg-white border border-[#DEDEDE] rounded-lg p-6 w-full max-w-md flex flex-col gap-2">
        <div class="flex justify-center mb-4">
            <img src="assets/img/logos/logo/logoo.svg" alt="Your Logo" class="w-[60px] h-[52.24px] object-cover">
        </div>

        <h2 class="text-center text-[#464646] text-[22px] sm:text-[26px] font-semibold leading-[30px] sm:leading-[33.8px] mb-1">
            Recover Email or Password
        </h2>
        
        <p class="text-center text-[#464646] text-[18px] sm:text-[20px] font-normal leading-[24px] sm:leading-[26px] mt-[-8px] mb-2">
            Select the option below
        </p>
        
        <div class="space-y-4 mt-6">
            <a href="{{ route('password.reset') }}" class="flex items-center px-3 py-3 sm:px-4 sm:py-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 hover:bg-gray-50">
                <img src="assets/img/icons/mail.svg" alt="Email Icon" class="w-[20px] h-[16px] mr-2 sm:mr-3">
                <span class="text-[#45494A] text-[18px] sm:text-[20px] font-medium leading-[24px] sm:leading-[26px]">Recover Email</span>
            </a>
            <a href="{{ route('email.forgot') }}" class="flex items-center px-3 py-3 sm:px-4 sm:py-3 w-full border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 hover:bg-gray-50">
                <img src="assets/img/icons/pass.svg" alt="Password Icon" class="w-[20px] h-[16px] mr-2 sm:mr-3">
                <span class="text-[#45494A] text-[18px] sm:text-[20px] font-medium leading-[24px] sm:leading-[26px]">Recover Password</span>
            </a>
        </div>        
    </div>
    
    <div class="text-center w-full mt-4">
        <a href="{{ route('login') }}" class="text-[#4A6DCB] text-[14px] sm:text-[16px] font-medium leading-[21px] sm:leading-[23.2px] hover:underline">
            ← Back to Login Page
        </a>
    </div>
</body>
</html>
