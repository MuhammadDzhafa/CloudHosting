<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awan Hosting :: Reset Email</title>
    <link rel="icon" type="image/png" href="assets/img/logos/logo/logoo.svg" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <style>
        body, h2, p, button {
            font-family: 'Inter', sans-serif;
        }
        .gradient-bg {
            background: radial-gradient(104.31% 150.2% at 0% 22.79%, rgba(100, 52, 147, 0.76) 23.63%, rgba(74, 109, 203, 0.8) 70.69%, rgba(100, 210, 247, 0.8) 100%);
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white border border-gray-200 rounded-3xl p-6 md:p-10 shadow-md max-w-[560px] w-full h-auto">
        <div class="flex justify-center mb-6">
            <div class="p-3 rounded-lg">
                <img src="assets/img/logos/logo/logoo.svg" alt="Your Image" class="w-16 h-14 md:w-[60px] md:h-[52px]">
            </div>
        </div>
        
        <h2 class="text-xl md:text-2xl font-semibold text-center mb-2 text-gray-800 leading-7 md:leading-[33.8px]">
            Reset Your Email
        </h2>
        <p class="text-base md:text-lg text-center text-[#464646] leading-6 md:leading-[26px] mb-6">
            Please enter your new email
        </p>
        
        <div class="mb-6">
            <div class="flex items-center bg-white border border-gray-300 rounded-lg p-2 h-12 md:h-16">
                <img src="/assets/img/icons/mail.svg" alt="Email Icon" class="w-5 h-5 md:w-6 md:h-6">
                <input 
                    type="email" 
                    placeholder="Email Address" 
                    class="bg-transparent border-none outline-none w-full text-[#464646] text-base md:text-lg leading-6 ml-2">
            </div>    
        </div>
        
        <button class="w-full md:w-[480px] h-[58px] py-3 px-4 rounded-full text-white font-medium text-center leading-6 gradient-bg hover:opacity-90 transition duration-300">
            Reset Email
        </button>
    </div>
</body>
</html>
