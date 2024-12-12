<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Awan Hosting :: Profile Update</title>
    <link rel="icon" type="image/png" href="assets/img/logos/logo/logoo.svg" />
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
        <div class="text-center mb-6">
            <img src="/assets/img/logos/logo/logoo.svg" alt="Logo" class="w-16 h-16 mx-auto mb-4">
            <h2 class="text-2xl font-bold text-gray-800 mb-2">Profile Updated!</h2>

            @if(request()->input('redirect') === '/checkout')
            <p class="text-gray-600 text-lg">Redirecting you to the checkout area.</p>
            @else
            <p class="text-gray-600 text-lg">Redirecting you to the client area.</p>
            @endif
        </div>
    </div>

    <script>
        // Redirect to the appropriate area after 2 seconds
        setTimeout(function() {
            const redirectUrl = "{{ request()->input('redirect', '/client-dashboard') }}";
            window.location.href = redirectUrl;
        }, 2000);
    </script>
</body>

</html>