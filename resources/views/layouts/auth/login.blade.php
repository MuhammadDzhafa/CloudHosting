<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        'custom-purple': '#4A6DCB',
                        'custom-red': '#FCA5A5',
                        'custom-gray': '#D1D5DB',
                    },
                    backgroundImage: {
                        'gradient-custom': 'radial-gradient(100% 801.55% at 1.19% 0%, rgba(100, 52, 147, 0.76) 24%, rgba(74, 109, 203, 0.8) 71%, rgba(100, 210, 247, 0.78) 100%)',
                    },
                    animation: {
                        shake: 'shake 0.6s cubic-bezier(.36,.07,.19,.97) both',
                    },
                    keyframes: {
                        shake: {
                            '0%, 100%': { transform: 'translateX(0)' },
                            '10%, 30%, 50%, 70%, 90%': { transform: 'translateX(-5px)' },
                            '20%, 40%, 60%, 80%': { transform: 'translateX(5px)' },
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen font-sans">
    <div class="bg-white w-full max-w-[560px] p-10 rounded-xl shadow-md">
        <div class="flex flex-col items-center mb-8">
            <div class="w-[60px] h-[52.24px] mb-6">
                <img src="assets/img/logos/logo/logoo.svg" alt="Custom Logo" class="w-full h-full object-contain">
            </div>            
            <h2 class="text-2xl font-semibold text-gray-700 text-center mb-2 w-full">
                Welcome back!
            </h2>
            <p class="text-gray-600 text-xl font-normal text-center mb-4 w-full">
                Log in to your account
            </p>
        </div>

        <form id="loginForm" class="space-y-4" method="POST" action="{{ route('login') }}">
            @csrf

            <div class="flex flex-col gap-1">
                <div class="flex gap-3 items-center bg-white border @error('email') border-custom-red animate-shake @else border-custom-gray @enderror rounded-lg p-2 h-16">
                    <img src="/assets/img/icons/mail.svg" alt="Email Icon" class="w-6 h-6">
                    <input 
                        type="email" 
                        name="email"
                        id="email"
                        placeholder="Email Address" 
                        class="bg-transparent border-none outline-none w-full text-gray-700 text-base font-normal"
                        required
                        value="{{ old('email') }}"
                    >
                </div>
                @error('email')
                    <div class="text-custom-red text-sm mt-1 flex items-center">
                        <iconify-icon icon="mdi:alert-circle-outline" class="mr-1"></iconify-icon>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="flex flex-col gap-1">
                <div class="relative flex gap-3 items-center bg-white border @error('password') border-custom-red animate-shake @else border-custom-gray @enderror rounded-lg p-2 h-16">
                    <img src="/assets/img/icons/pass.svg" alt="Password Icon" class="w-6 h-6">
                    <input 
                        type="password" 
                        name="password"
                        id="password"
                        placeholder="Password" 
                        class="bg-transparent border-none outline-none w-full text-gray-700 text-base font-normal"
                        required
                    >
                    <button type="button" id="togglePassword" class="absolute right-3 text-gray-500">
                        <iconify-icon icon="mdi:eye" class="text-2xl"></iconify-icon>
                    </button>
                </div>
                @error('password')
                    <div class="text-custom-red text-sm mt-1 flex items-center">
                        <iconify-icon icon="mdi:alert-circle-outline" class="mr-1"></iconify-icon>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="flex items-center justify-between mt-4 mb-6">
                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="w-4 h-4 text-custom-purple border-custom-gray rounded focus:ring-custom-purple">
                    <label for="remember" class="ml-2 text-sm text-gray-600">Remember Me</label>
                </div>
                <a href="{{ route('password.request') }}" class="text-sm text-custom-purple hover:underline">Forgot Password?</a>
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full h-[58px] rounded-full text-white text-lg font-semibold focus:outline-none focus:ring-2 focus:ring-custom-purple focus:ring-opacity-50 transition duration-300 bg-gradient-custom hover:opacity-90">
                    Log In
                </button>
            </div>
        </form>

        <div class="flex items-center my-6">
            <div class="flex-grow border-t border-custom-gray"></div>
            <span class="px-4 text-base text-gray-600">or</span>
            <div class="flex-grow border-t border-custom-gray"></div>
        </div>
        
        <div>
            <a href="auth/redirect" class="flex items-center justify-center w-full h-[58px] border border-custom-gray rounded-full px-5 py-4 bg-white text-gray-800 hover:bg-gray-50 transition duration-300">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-6 h-6 mr-3" alt="Google logo">
                <span class="text-xl font-medium">
                    Login with Google
                </span>
            </a>            
        </div>

        <div class="text-center mt-8 flex justify-center items-center space-x-2">
            <span class="text-base font-medium text-gray-600">
                Don't have an account yet?
            </span>
            <a href="/register" class="text-custom-purple text-base font-medium hover:underline">
                Sign Up
            </a>
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.querySelector('iconify-icon').setAttribute('icon', type === 'password' ? 'mdi:eye' : 'mdi:eye-off');
        });
    </script>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awan Hosting :: Login</title>
    <link rel="icon" type="image/png" href="assets/img/logos/logo/logoo.svg" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!--Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />


    <!-- Vue.js -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2"></script>
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    @vite('resources/css/app.css')

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet" />

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        'custom-purple': '#4A6DCB',
                        'custom-red': '#FCA5A5',
                        'custom-gray': '#D1D5DB',
                    },
                    backgroundImage: {
                        'gradient-custom': 'radial-gradient(100% 801.55% at 1.19% 0%, rgba(100, 52, 147, 0.76) 24%, rgba(74, 109, 203, 0.8) 71%, rgba(100, 210, 247, 0.78) 100%)',
                    },
                    animation: {
                        shake: 'shake 0.6s cubic-bezier(.36,.07,.19,.97) both',
                    },
                    keyframes: {
                        shake: {
                            '0%, 100%': {
                                transform: 'translateX(0)'
                            },
                            '10%, 30%, 50%, 70%, 90%': {
                                transform: 'translateX(-5px)'
                            },
                            '20%, 40%, 60%, 80%': {
                                transform: 'translateX(5px)'
                            },
                        }
                    }
                }
            }
        }
    </script>

</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen font-sans">
    <div class="bg-white w-full max-w-[450px] p-[40px] rounded-xl shadow-md">
        <div class="flex flex-col items-center mb-8">
            <div class="w-[60px] h-[52.24px] mb-4">
                <img src="assets/img/logos/logo/logoo.svg" alt="Custom Logo" class="w-full h-full object-contain">
            </div>
            <h2 class="text-2xl font-semibold text-gray-700 text-center mb-2 w-full">
                Welcome back!
            </h2>
            <p class="text-gray-600 text-xl font-normal text-center mb-3 w-full">
                Log in to your account
            </p>
        </div>

        <form id="loginForm" class="space-y-4" method="POST" action="{{ route('login') }}">
            @csrf

            <!-- <div class="flex flex-col gap-1">
                <div class="flex gap-3 items-center bg-white border @error('email') border-custom-red animate-shake @else border-custom-gray @enderror rounded-lg p-2 h-16">
                    <img src="/assets/img/icons/mail.svg" alt="Email Icon" class="w-6 h-6">
                    <input 
                        type="email" 
                        name="email"
                        id="email"
                        placeholder="Email Address" 
                        class="bg-transparent border-none outline-none w-full text-gray-700 text-base font-normal"
                        required
                        value="{{ old('email') }}"
                    >
                </div>
                @error('email')
                    <div class="text-custom-red text-sm mt-1 flex items-center">
                        <iconify-icon icon="mdi:alert-circle-outline" class="mr-1"></iconify-icon>
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="flex flex-col gap-1">
                <div class="relative flex gap-3 items-center bg-white border @error('password') border-custom-red animate-shake @else border-custom-gray @enderror rounded-lg p-2 h-16">
                    <img src="/assets/img/icons/pass.svg" alt="Password Icon" class="w-6 h-6">
                    <input 
                        type="password" 
                        name="password"
                        id="password"
                        placeholder="Password" 
                        class="bg-transparent border-none outline-none w-full text-gray-700 text-base font-normal"
                        required
                    >
                    <button type="button" id="togglePassword" class="absolute right-3 text-gray-500">
                        <iconify-icon icon="mdi:eye" class="text-2xl"></iconify-icon>
                    </button>
                </div>
                @error('password')
                    <div class="text-custom-red text-sm mt-1 flex items-center">
                        <iconify-icon icon="mdi:alert-circle-outline" class="mr-1"></iconify-icon>
                        {{ $message }}
                    </div>
                @enderror
            </div> -->

            <!-- Email Input -->
            <div class="field flex flex-col gap-1">
                <div class="control has-icon bg-white border @error('email') border-custom-red animate-shake @else border-custom-gray @enderror rounded-lg ">
                    <input
                        class="input bg-transparent border-none outline-none text-gray-700"
                        type="email"
                        name="email"
                        id="email"
                        placeholder="Email Address"
                        required
                        value="{{ old('email') }}">
                    <span class="form-icon">
                        <i data-feather="mail"></i>
                    </span>
                </div>
                @error('email')
                <div class="text-custom-red text-sm mt-1 flex items-center">
                    <iconify-icon icon="mdi:alert-circle-outline" class="mr-1"></iconify-icon>
                    {{ $message }}
                </div>
                @enderror
            </div>

            <!-- Password Input -->
            <div class="field flex flex-col gap-1">
                <div class="control has-icon relative bg-white border @error('password') border-custom-red animate-shake @else border-custom-gray @enderror rounded-lg ">
                    <input
                        class="input bg-transparent border-none outline-none text-gray-700"
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Password"
                        required>
                    <span class="form-icon">
                        <i data-feather="lock"></i>
                    </span>
                    <!-- <button type="button" id="togglePassword" class="absolute right-3 text-gray-500">
                        <iconify-icon icon="mdi:eye" class="text-2xl"></iconify-icon>
                    </button> -->
                    <button type="button" id="togglePassword" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500">
                        <iconify-icon icon="mdi:eye" class="text-2xl"></iconify-icon>
                    </button>
                </div>
                @error('password')
                <div class="text-custom-red text-sm mt-1 flex items-center">
                    <iconify-icon icon="mdi:alert-circle-outline" class="mr-1"></iconify-icon>
                    {{ $message }}
                </div>
                @enderror
            </div>




            <div class="flex items-center justify-between mt-4 mb-5">
                <div class="flex items-center">
                    <input type="checkbox" id="remember" name="remember" class="w-4 h-4 text-custom-purple border-custom-gray rounded focus:ring-custom-purple">
                    <label for="remember" class="ml-2 text-sm text-gray-600">Remember Me</label>
                </div>
                <a href="{{ route('password.request') }}" class="text-sm text-custom-purple hover:underline">Forgot Password or Email?</a>
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full h-[40px] rounded-full text-white text-m font-regular focus:outline-none focus:ring-2 focus:ring-custom-purple focus:ring-opacity-50 transition duration-300 bg-gradient-custom hover:opacity-90">
                    Log In
                </button>
            </div>
        </form>

        <div class="flex items-center my-4">
            <div class="flex-grow border-t border-custom-gray"></div>
            <span class="px-4 text-base text-gray-600">or</span>
            <div class="flex-grow border-t border-custom-gray"></div>
        </div>

        <div>
            <a href="auth/redirect" class="flex items-center justify-center w-full h-[40px] border border-custom-gray rounded-full px-5 py-4 bg-white text-gray-800 hover:bg-gray-50 transition duration-300">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-6 h-6 mr-3" alt="Google logo">
                <span class="text-m">
                    Login with Google
                </span>
            </a>
        </div>

        <div class="text-center mt-8 flex justify-center items-center space-x-2">
            <span class="text-sm font-small text-gray-600">
                Don't have an account yet?
            </span>
            <a href="/register" class="text-custom-purple text-sm font-medium hover:underline">
                Sign Up
            </a>
        </div>
    </div>

    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.querySelector('iconify-icon').setAttribute('icon', type === 'password' ? 'mdi:eye' : 'mdi:eye-off');
        });
    </script>

    <!--Huro Scripts-->
    <script src="assets/js/app.js"></script>
    <script src="assets/js/functions.js"></script>
    <script src="assets/js/main.js" async></script>
    <script src="assets/js/components.js" async></script>
    <script src="assets/js/popover.js" async></script>
    <script src="assets/js/widgets.js" async></script>
    <script src="assets/js/touch.js" async></script>
    <script src="assets/js/syntax.js" async></script>
    @yield('scripts')
</body>

</html>