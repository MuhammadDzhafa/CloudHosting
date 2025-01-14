<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awan Hosting :: Recover Password</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logos/logo/logoo.svg') }}" />
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
    <div class="bg-white border border-gray-100 rounded-xl p-6 sm:p-8 md:p-10 w-full max-w-[560px] shadow-md">
        <div class="flex justify-center mb-4 sm:mb-6">
            <div class="p-2 sm:p-3 rounded-lg">
                <img 
                    src="{{ asset('assets/img/logos/logo/logoo.svg') }}" 
                    alt="Awan Hosting Logo" 
                    class="w-12 h-12 sm:w-16 sm:h-14 object-contain"
                >
            </div>
        </div>

        <div class="text-center mb-6">
            <h2 class="text-xl sm:text-2xl md:text-[26px] font-semibold text-[#464646] mb-2">
                Recover Your Password
            </h2>

            <p class="text-sm sm:text-base md:text-[20px] text-[#464646] px-4 sm:px-0">
                Enter your registered phone number below to reset your password.
            </p>
        </div>

        @if ($errors->any())
            <div class="bg-red-50 border border-red-300 text-red-800 px-4 py-3 rounded-lg mb-4" role="alert">
                <ul class="space-y-1">
                    @foreach ($errors->all() as $error)
                        <li class="flex items-center text-sm">
                            <svg class="w-4 h-4 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('send.reset.link.whatsapp') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <div class="flex bg-gray-50 border rounded-lg focus-within:ring-2 focus-within:ring-blue-200 transition duration-200 
                    {{ $errors->has('phone') ? 'border-red-500' : 'border-gray-300' }}">
                    <span class="inline-flex items-center px-3 text-gray-500 bg-gray-100 border-r border-gray-300 rounded-l-lg">
                        +62
                    </span>
                    <input 
                        type="tel" 
                        name="phone" 
                        placeholder="Phone Number" 
                        class="flex-1 p-3 border-none outline-none rounded-r-lg text-gray-700 placeholder-gray-500
                        focus:ring-0 focus:outline-none"
                        value="{{ old('phone') }}" 
                        required
                        pattern="[0-9]*"
                        inputmode="numeric"
                    >
                </div>
                @error('phone')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button 
                type="submit" 
                class="w-full h-12 sm:h-[58px] rounded-full text-[#F3F5FC] text-base sm:text-lg font-medium 
                custom-gradient hover:opacity-90 transition duration-300 transform active:scale-[0.98]"
            >
                Send Recovery Link via WhatsApp
            </button>
        </form>
    </div>

    <div class="mt-4 sm:mt-6 text-center">
        <a 
            href="/login" 
            class="text-blue-600 text-sm hover:underline inline-flex items-center group"
        >
            <svg 
                xmlns="http://www.w3.org/2000/svg" 
                class="h-4 w-4 mr-1 transition-transform group-hover:-translate-x-1" 
                fill="none" 
                viewBox="0 0 24 24" 
                stroke="currentColor"
            >
                <path 
                    stroke-linecap="round" 
                    stroke-linejoin="round" 
                    stroke-width="2" 
                    d="M10 19l-7-7m0 0l7-7m-7 7h18" 
                />
            </svg>
            Go Back
        </a>
    </div>

    <script>
        // Optional: Client-side validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const phoneInput = document.querySelector('input[name="phone"]');
            const phoneValue = phoneInput.value.trim();
            
            // Validasi nomor telepon
            if (!/^[0-9]{9,14}$/.test(phoneValue)) {
                e.preventDefault();
                alert('Please enter a valid phone number (9-14 digits)');
            }
        });
    </script>
</body>
</html>