<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awan Hosting :: Complete Your Profile</title>
    <link rel="icon" type="image/png" href="assets/img/logos/logo/logoo.svg" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
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

<body class="bg-gray-100 flex justify-center items-center min-h-screen">

    <div class="bg-white p-10 rounded-lg shadow-lg w-[560px] text-center">
        <div class="text-center mb-6">
            <img src="/assets/img/logos/logo/logoo.svg" alt="Logo" class="w-16 h-16 mx-auto mb-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">You’re Almost There!</h2>
            <p class="text-gray-600 text-lg">Complete your profile to continue</p>
        </div>

        <form method="POST" action="{{ route('google.phone.store') }}" class="space-y-4 text-left">
            @csrf

            <div class="space-y-4">
                <div>
                    <div class="flex items-center bg-gray-50 border @error('name') border-custom-red @else border-custom-gray @enderror rounded-lg p-3 focus-within:ring-2 focus-within:ring-custom-purple transition duration-300">
                        <img src="/assets/img/icons/user.svg" alt="User Icon" class="w-5 h-5 text-gray-400 mr-3">
                        <input type="text" name="name" placeholder="Name" class="bg-transparent border-none outline-none w-full text-gray-700 placeholder-gray-500" value="{{ old('name', $userFirstName) }}">
                    </div>
                    @error('name')
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

            <div class="flex items-center">
                <input type="checkbox" name="terms" id="terms" class="mr-2" required>
                <label for="terms" class="text-sm text-gray-600">I accept the <a href="#" class="text-blue-600">Terms and Conditions</a></label>
            </div>

            <button type="submit" class="w-full py-3 text-white text-lg font-semibold rounded-full hover:opacity-90 focus:outline-none focus:ring-2 focus:ring-custom-purple focus:ring-opacity-50 transition duration-300" style="background: radial-gradient(100% 801.55% at 1.19% 0%, rgba(100, 52, 147, 0.76) 24%, rgba(74, 109, 203, 0.8) 71%, rgba(100, 210, 247, 0.78) 100%);">
                Continue
            </button>
        </form>
    </div>

</body>

</html>