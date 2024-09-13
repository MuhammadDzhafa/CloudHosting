<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Sent Confirmation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <style>
        body, h2, p, button {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-10 rounded-[12px] shadow-lg max-w-[560px] w-full h-[688px] border border-[#DEDEDE]">
        <div class="flex justify-center mb-6">
            <img src="{{ asset('assets/img/illust.svg') }}" alt="Email sent illustration" class="w-[350px] h-[350px]">
        </div>
        <h2 class="text-3xl font-semibold text-center text-[#464646] mb-4" style="width: 480px; height: 34px; line-height: 33.8px;">
            Email has been sent!
        </h2>
        <p class="text-[#464646] text-center mb-6" style="width: 480px; height: 78px; font-size: 20px; font-weight: 400; line-height: 26px;">
            We've sent an email to <span class="font-bold">{{ $email }}</span><br>
            Please check your inbox and follow the<br>
            instructions to reset your password.
        </p>
        <div class="flex justify-center">
            <a href="{{ route('login') }}" class="text-[#F3F5FC] font-medium inline-block text-center"
                style="width: 480px; height: 58px; padding: 16px 20px; border-radius: 9999px; background: radial-gradient(100% 801.55% at 1.19% 0%, rgba(100, 52, 147, 0.76) 24%, rgba(74, 109, 203, 0.8) 71%, rgba(100, 210, 247, 0.78) 100%);">
                Back to Login Page
            </a>
        </div>
    </div>
</body>
</html>