<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awan Hosting :: Reset Password</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logos/logo/logoo.svg') }}" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body,
        h2,
        p,
        button,
        a {
            font-family: 'Inter', sans-serif;
        }

        /* Tambahan efek fokus */
        input:focus {
            outline: 2px solid rgba(74, 109, 203, 0.5);
        }
    </style>
</head>

<body class="bg-[#DEDEDE] selection:bg-purple-100">
    <div class="flex flex-col items-center justify-center min-h-screen px-4 sm:px-6 py-6">
        <div class="w-full max-w-[560px] bg-white border border-[#DEDEDE] rounded-xl shadow-lg p-6 sm:p-8 space-y-6">
            <div class="flex justify-center mb-4">
                <img
                    src="{{ asset('assets/img/logos/logo/logoo.svg') }}"
                    alt="Awan Hosting Logo"
                    class="w-12 h-12 sm:w-16 sm:h-14 object-contain">
            </div>

            <div class="text-center space-y-3">
                <h2 class="text-xl sm:text-2xl font-semibold text-[#464646] leading-tight">
                    Forgot Your Password?
                </h2>
                <p class="text-sm sm:text-base text-[#464646] leading-relaxed px-4 sm:px-0">
                    Enter your registered email below to receive password reset instructions.
                </p>
            </div>

            @if ($errors->any())
            <div class="bg-red-50 border border-red-300 text-red-800 px-4 py-3 rounded-lg space-y-1">
                @foreach ($errors->all() as $error)
                <p class="text-xs sm:text-sm flex items-center">
                    <svg class="w-4 h-4 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                    </svg>
                    {{ $error }}
                </p>
                @endforeach
            </div>
            @endif

            <form action="{{ route('password.email') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <div class="flex items-center bg-white border border-gray-300 rounded-lg p-3 focus-within:ring-2 focus-within:ring-blue-200 transition duration-200">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <input
                            type="email"
                            name="email"
                            placeholder="Email Address"
                            class="bg-transparent border-none outline-none w-full text-[#464646] text-sm sm:text-base ml-3 placeholder-gray-400"
                            required
                            value="{{ old('email') }}">
                    </div>
                </div>

                <button
                    type="submit"
                    class="w-full h-12 sm:h-14 rounded-full text-[#F3F5FC] text-sm sm:text-base font-medium transition duration-300 ease-in-out transform hover:scale-[1.02] active:scale-[0.98]"
                    style="background: radial-gradient(100% 801.55% at 1.19% 0%, rgba(100, 52, 147, 0.76) 24%, rgba(74, 109, 203, 0.8) 71%, rgba(100, 210, 247, 0.78) 100%);">
                    Confirm
                </button>
            </form>
        </div>

        <div class="mt-4 sm:mt-6 text-center">
            <a
                href="{{ route('password.request') }}"
                class="text-blue-600 text-xs sm:text-sm hover:underline inline-flex items-center group">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="h-4 w-4 mr-1 transition-transform group-hover:-translate-x-1"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Go Back
            </a>
        </div>
    </div>

    <script>
        // Client-side validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const emailInput = document.querySelector('input[name="email"]');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(emailInput.value)) {
                e.preventDefault();

                // Tampilkan error dengan Sweet Alert
                Swal.fire({
                    icon: 'error',
                    title: 'Invalid Email',
                    text: 'Please enter a valid email address',
                    confirmButtonColor: '#4A6DCB'
                });
            }
        });
    </script>

    <!-- Sweet Alert untuk notifikasi yang lebih baik -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>