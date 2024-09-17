<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Your Email</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="flex flex-col items-center justify-center min-h-screen bg-gray-100 p-4">
    <div class="w-full max-w-[600px] p-6 gap-8 bg-white border border-gray-300 rounded-[12px] shadow-lg text-center">
        <!-- Mengganti div logo dengan gambar -->
        <img src="assets/img/logos/logo/logoo.svg" alt="Logo" class="w-16 h-16 mx-auto mb-4">
        
        <!-- Styling untuk teks "Check Your Email" -->
        <h1 class="text-[20px] md:text-[26px] font-semibold leading-[28px] md:leading-[33.8px] text-[#464646] mx-auto mb-4">
            Check Your Email
        </h1>
        
        <!-- Styling untuk teks detail dengan penekanan pada email -->
        <p class="text-[16px] md:text-[20px] font-normal leading-[22px] md:leading-[26px] text-[#464646] mx-auto mb-6">
            @if(session('user_email'))
                We've sent a verification link to <strong class="font-bold">{{ session('user_email') }}</strong><br>
                Please check your inbox to complete the verification.
            @else
                No email found in the session.
            @endif
        </p>
        
        
        <!-- Tombol dengan ukuran dan styling sesuai spesifikasi -->
        <a href="/login" class="block text-[#F3F5FC] py-4 px-5 rounded-full text-[16px] md:text-[20px] font-medium leading-[22px] md:leading-[26px] mx-auto"
            style="background: radial-gradient(100% 801.55% at 1.19% 0%, rgba(100, 52, 147, 0.76) 24%, rgba(74, 109, 203, 0.8) 71%, rgba(100, 210, 247, 0.78) 100%);">
            Back to Log In Page
        </a>

        
        <!-- Menempatkan teks "Didn't receive the email?" dan "Resend Email" sedikit ke bawah -->
        <div class="text-[12px] md:text-[14px] mt-6 md:mt-8">
            <span class="text-[#464646]">Didn't receive the email?</span>
            <a href="#" class="text-[#395FC6] font-medium ml-1">Resend Email</a>
        </div>
    </div>
    
    <!-- Change Email link -->
    <a href="/signup" class="text-[#395FC6] text-[12px] md:text-[14px] font-semibold mt-4">
        ← Change Email
    </a>
</body>
</html>
