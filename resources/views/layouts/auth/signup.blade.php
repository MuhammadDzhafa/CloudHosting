<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awan Hosting :: Register</title>
    <link rel="icon" type="image/png" href="assets/img/logos/logo/logoo.svg" />
    <script src="https://cdn.tailwindcss.com"></script>
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
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4 font-sans">
    <div class="bg-white w-full max-w-[450px] p-[40px] rounded-xl shadow-md">
        <div class="text-center mb-6">
            <img src="assets/img/logos/logo/logoo.svg" alt="Logo" class="w-16 h-16 mx-auto mb-4">
            <h2 class="text-2xl font-semibold text-gray-700 text-center mb-2 w-full">Sign Up</h2>
            <p class="text-gray-600 text-xl font-normal text-center mb-3 w-full ">Create a new account</p>
        </div>

        <form action="{{ route('register') }}" method="POST" class="space-y-6">
            @csrf
            <div class="space-y-4">
                <!-- <div>
                    <div class="flex items-center bg-gray-50 border @error('name') border-custom-red @else border-custom-gray @enderror rounded-lg p-3 focus-within:ring-2 focus-within:ring-custom-purple transition duration-300">
                        <img src="/assets/img/icons/user.svg" alt="User Icon" class="w-5 h-5 text-gray-400 mr-3">
                        <input type="text" name="name" placeholder="Name" class="bg-transparent border-none outline-none w-full text-gray-700 placeholder-gray-500" value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <p class="text-custom-red text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <div class="flex items-center bg-gray-50 border @error('email') border-custom-red @else border-custom-gray @enderror rounded-lg p-3 focus-within:ring-2 focus-within:ring-custom-purple transition duration-300">
                        <img src="/assets/img/icons/mail.svg" alt="Mail Icon" class="w-5 h-5 text-gray-400 mr-3">
                        <input type="email" name="email" placeholder="Gmail Address" class="bg-transparent border-none outline-none w-full text-gray-700 placeholder-gray-500" value="{{ old('email') }}">
                    </div>
                    <p class="text-sm text-gray-500 mt-1">Please use a valid Gmail address (e.g., yourname@gmail.com)</p>
                    @error('email')
                        <p class="text-custom-red text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <div class="flex bg-gray-50 border @error('phone') border-custom-red @else border-custom-gray @enderror rounded-lg focus-within:ring-2 focus-within:ring-custom-purple transition duration-300">
                        <span class="inline-flex items-center px-3 text-gray-500 bg-gray-100 border-r border-custom-gray rounded-l-lg">
                            +62
                        </span>
                        <input type="tel" name="phone" placeholder="Phone Number" class="flex-1 p-3 border-none outline-none rounded-r-lg text-gray-700 placeholder-gray-500" value="{{ old('phone') }}">
                    </div>
                    @error('phone')
                        <p class="text-custom-red text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

                <div>
                    <div class="flex items-center bg-gray-50 border @error('password') border-custom-red @else border-custom-gray @enderror rounded-lg p-3 focus-within:ring-2 focus-within:ring-custom-purple transition duration-300">
                        <img src="/assets/img/icons/pass.svg" alt="Password Icon" class="w-5 h-5 text-gray-400 mr-3">
                        <input type="password" name="password" placeholder="Password" class="bg-transparent border-none outline-none w-full text-gray-700 placeholder-gray-500">
                    </div>
                    @error('password')
                        <p class="text-custom-red text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div>
                    <div class="flex items-center bg-gray-50 border @error('password_confirmation') border-custom-red @else border-custom-gray @enderror rounded-lg p-3 focus-within:ring-2 focus-within:ring-custom-purple transition duration-300">
                        <img src="/assets/img/icons/pass.svg" alt="Confirm Password Icon" class="w-5 h-5 text-gray-400 mr-3">
                        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="bg-transparent border-none outline-none w-full text-gray-700 placeholder-gray-500">
                    </div>
                    @error('password_confirmation')
                        <p class="text-custom-red text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div> -->


                <!-- <div class="field">
                    <div class="control has-icon">
                        <input class="input" type="text" placeholder="Username">
                            <span class="form-icon">
                                <i data-feather="user"></i>
                            </span>
                    </div>
                </div>
                <div class="field">
                    <div class="control has-icon">
                        <input class="input" type="text" placeholder="Email Address">
                            <span class="form-icon">
                                <i data-feather="mail"></i>
                            </span>
                    </div>
                </div>
                <div class="field has-addons">
                    <div class="control">
                        <a class="button is-static">
                            +62
                        </a>
                    </div>
                    <div class="control is-expanded">
                        <input class="input" type="text" placeholder="Your phone number">
                    </div>
                </div>
                <div class="field">
                    <div class="control has-icon">
                        <input class="input" type="password" placeholder="Password">
                            <span class="form-icon">
                                <i data-feather="lock"></i>
                            </span>
                    </div>
                </div>
                <div class="field">
                    <div class="control has-icon">
                        <input class="input" type="password" placeholder="Repeat Password">
                            <span class="form-icon">
                                <i data-feather="lock"></i>
                            </span>
                    </div>
                </div> -->

                <form action="{{ route('register') }}" method="POST" class="space-y-6">
                    @csrf
                    <!-- Username Input -->
                    <div class="field flex flex-col gap-1">
                        <div class="control has-icon bg-white border @error('name') border-custom-red @else border-custom-gray @enderror rounded-lg focus-within:ring-2 focus-within:ring-custom-purple transition duration-300">
                            <input
                                class="input bg-transparent border-none outline-none text-gray-700 placeholder-gray-500"
                                type="text"
                                name="name"
                                placeholder="Username"
                                value="{{ old('name') }}">
                            <span class="form-icon">
                                <i data-feather="user"></i>
                            </span>
                        </div>
                        @error('name')
                        <p class="text-custom-red text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Input -->
                    <div class="field flex flex-col gap-1">
                        <div class="control has-icon bg-white border @error('email') border-custom-red @else border-custom-gray @enderror rounded-lg focus-within:ring-2 focus-within:ring-custom-purple transition duration-300">
                            <input
                                class="input bg-transparent border-none outline-none text-gray-700 placeholder-gray-500"
                                type="email"
                                name="email"
                                placeholder="Gmail Address"
                                value="{{ old('email') }}">
                            <span class="form-icon">
                                <i data-feather="mail"></i>
                            </span>
                        </div>
                        <p class="text-sm text-gray-500">Please use a valid Gmail address (e.g., yourname@gmail.com)</p>
                        @error('email')
                        <p class="text-custom-red text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Phone Input -->
                    <div class="field flex flex-col gap-1">
                        <div class="control has-icon bg-white border @error('phone') border-custom-red @else border-custom-gray @enderror rounded-lg focus-within:ring-2 focus-within:ring-custom-purple transition duration-300">
                            <div class="field has-addons w-full">
                                <div class="control">
                                    <a class="button is-static">+62</a>
                                </div>
                                <div class="control is-expanded">
                                    <input
                                        class="input bg-transparent border-none outline-none w-full text-gray-700 placeholder-gray-500"
                                        type="tel"
                                        name="phone"
                                        placeholder="Your phone number"
                                        value="{{ old('phone') }}"
                                        style="padding-left: 10px;">
                                </div>
                            </div>
                        </div>
                        @error('phone')
                        <p class="text-custom-red text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div class="field flex flex-col gap-1">
                        <div class="control has-icon bg-white border @error('password') border-custom-red @else border-custom-gray @enderror rounded-lg focus-within:ring-2 focus-within:ring-custom-purple transition duration-300">
                            <input
                                class="input bg-transparent border-none outline-none text-gray-700 placeholder-gray-500"
                                type="password"
                                name="password"
                                placeholder="Password">
                            <span class="form-icon">
                                <i data-feather="lock"></i>
                            </span>
                        </div>
                        <p class="text-sm text-gray-500">Password must contain at least 8 characters, one uppercase, one lowercase, one number and one special character.</p>
                        @error('password')
                        <p class="text-custom-red text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password Input -->
                    <div class="field flex flex-col gap-1">
                        <div class="control has-icon bg-white border @error('password_confirmation') border-custom-red @else border-custom-gray @enderror rounded-lg focus-within:ring-2 focus-within:ring-custom-purple transition duration-300">
                            <input
                                class="input bg-transparent border-none outline-none text-gray-700 placeholder-gray-500"
                                type="password"
                                name="password_confirmation"
                                placeholder="Confirm Password">
                            <span class="form-icon">
                                <i data-feather="lock"></i>
                            </span>
                        </div>
                        @error('password_confirmation')
                        <p class="text-custom-red text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Hidden Role Input -->
                    <input type="hidden" name="role" value="client">

                    <!-- Terms and Conditions -->
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input type="checkbox"
                                id="terms"
                                name="terms"
                                class="focus:ring-custom-purple h-4 w-4 text-custom-purple border-custom-gray rounded"
                                {{ old('terms') ? 'checked' : '' }}>
                        </div>
                        <div class="ml-3 text-sm mb-5">
                            <label for="terms" class="font-medium text-gray-700">I accept the <a href="#" class="text-gray-700 hover:underline">Terms and Conditions</a></label>
                        </div>
                    </div>
                    @error('terms')
                    <p class="text-custom-red text-sm mt-1">{{ $message }}</p>
                    @enderror

                    <!-- Submit Button -->
                    <button type="submit" class="w-full h-[40px] text-white text-lg font-regular rounded-full hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-custom-purple focus:ring-opacity-50 transition duration-300" style="background: radial-gradient(100% 801.55% at 1.19% 0%, rgba(100, 52, 147, 0.76) 24%, rgba(74, 109, 203, 0.8) 71%, rgba(100, 210, 247, 0.78) 100%);">
                        Sign Up
                    </button>

                    <div class="relative my-4">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-custom-gray"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">or</span>
                        </div>
                    </div>

                    <!-- Google Sign Up -->
                    <div>
                        <a href="{{ url('auth/redirect?redirect=/client-dashboard') }}" class="flex items-center justify-center w-full h-[40px] border border-custom-gray rounded-full px-5 py-4 bg-white text-gray-800 hover:bg-gray-50 transition duration-300">
                            <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-6 h-6 mr-3" alt="Google logo">
                            <span class="text-">
                                Sign up with Google
                            </span>
                        </a>
                    </div>

                    <p class="mt-6 text-center text-gray-600 text-sm">
                        Already have an account? <a href="{{ route('login') }}" class="text-custom-purple text-sm font-medium hover:underline">Sign in</a>
                    </p>
                </form>
            </div>

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