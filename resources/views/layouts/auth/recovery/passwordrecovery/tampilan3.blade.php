<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        body, h2, p, button, input, i {
            font-family: 'Inter', sans-serif;
        }
        .bg-radial-custom {
            background: radial-gradient(104.31% 150.2% at 0% 22.79%, rgba(100, 52, 147, 0.76) 23.63%, rgba(74, 109, 203, 0.8) 70.69%, rgba(100, 210, 247, 0.8) 100%);
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">
    <div class="bg-white p-8 rounded-lg shadow-md max-w-md w-full border border-[#DEDEDE]">
        <div class="flex justify-center mb-6">
            <img src="assets/img/logos/logo/logoo.svg" alt="Your Image" class="w-16 h-14">
        </div>
        
        <h2 class="text-2xl font-semibold leading-8 text-[#464646] text-center mb-4">Reset Your Password</h2>
        <p class="text-lg font-normal leading-6 text-[#464646] text-center mb-6">Please enter your new password</p>
        <form>
            <div class="mb-4 relative w-full bg-white border border-[#DEDEDE] rounded-lg">
                <input id="new-password" type="password" placeholder="New Password" class="w-full px-4 py-3 pl-10 border-none bg-white rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <i id="toggle-new-password" class="fas fa-eye absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 cursor-pointer"></i>
            </div>
            <div class="mb-6 relative w-full bg-white border border-[#DEDEDE] rounded-lg">
                <input id="confirm-password" type="password" placeholder="Confirm Password" class="w-full px-4 py-3 pl-10 border-none bg-white rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <i id="toggle-confirm-password" class="fas fa-eye absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 cursor-pointer"></i>
            </div>
            <button type="submit" class="w-full h-14 px-6 py-3 rounded-full bg-radial-custom text-[#F3F5FC] text-lg font-medium leading-6 text-center">
                Reset Password
            </button>
        </form>
    </div>

    <script>
        document.getElementById('toggle-new-password').addEventListener('click', function() {
            const passwordField = document.getElementById('new-password');
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });

        document.getElementById('toggle-confirm-password').addEventListener('click', function() {
            const passwordField = document.getElementById('confirm-password');
            const type = passwordField.type === 'password' ? 'text' : 'password';
            passwordField.type = type;
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>
