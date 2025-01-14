<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awan Hosting :: Recover Email Or Password</title>
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
    </style>
</head>

<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen p-4">
    <div class="bg-white border border-[#DEDEDE] rounded-xl shadow-md p-6 sm:p-8 w-full max-w-md">
        <div class="flex justify-center mb-4">
            <img
                src="{{ asset('assets/img/logos/logo/logoo.svg') }}"
                alt="Awan Hosting Logo"
                class="w-12 h-12 sm:w-[60px] sm:h-[52.24px] object-contain">
        </div>

        <div class="text-center mb-6">
            <h2 class="text-xl sm:text-2xl text-[#464646] font-semibold mb-2">
                Recover Email or Password
            </h2>

            <p class="text-sm sm:text-base text-[#464646] text-opacity-80">
                Select the option below
            </p>
        </div>

        <div class="space-y-4">
            <a
                href="{{ route('password.reset') }}"
                class="flex items-center px-3 py-3 sm:px-4 sm:py-4 w-full border border-gray-300 rounded-lg 
                       transition duration-300 ease-in-out transform hover:scale-[1.02] active:scale-[0.98]
                       focus:outline-none focus:ring-2 focus:ring-indigo-500 hover:bg-gray-50 group">
                <div class="flex items-center">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 mr-2 sm:mr-3 text-gray-500 group-hover:text-indigo-600"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <span class="text-[#45494A] text-sm sm:text-base font-medium">
                        Recover Email
                    </span>
                </div>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 ml-auto text-gray-400 group-hover:text-indigo-600 transition-colors"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 5l7 7-7 7" />
                </svg>
            </a>

            <a
                href="{{ route('email.forgot') }}"
                class="flex items-center px-3 py-3 sm:px-4 sm:py-4 w-full border border-gray-300 rounded-lg 
                       transition duration-300 ease-in-out transform hover:scale-[1.02] active:scale-[0.98]
                       focus:outline-none focus:ring-2 focus:ring-indigo-500 hover:bg-gray-50 group">
                <div class="flex items-center">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 mr-2 sm:mr-3 text-gray-500 group-hover:text-indigo-600"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    <span class="text-[#45494A] text-sm sm:text-base font-medium">
                        Recover Password
                    </span>
                </div>
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 ml-auto text-gray-400 group-hover:text-indigo-600 transition-colors"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </div>

    <div class="text-center w-full mt-4 sm:mt-6">
        <a
            href="{{ route('login') }}"
            class="text-[#4A6DCB] text-xs sm:text-sm font-medium hover:underline inline-flex items-center group">
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
            Back to Login Page
        </a>
    </div>
</body>

</html>