<div class="w-full">
    <h2 class="text-[20px] font-normal" style="background: linear-gradient(104.31deg, rgba(100, 52, 147, 0.95) 23.63%, #4A6DCB 70.69%, #64D2F7 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; height: 26px;">
        STEP 5
    </h2>

    <h1 class="text-[32px] font-bold leading-[38.4px] text-left mt-3 mb-8 w-full md:w-auto lg:w-full" style="background: radial-gradient(104.31% 150.2% at 0% 22.79%, rgba(100, 52, 147, 0.95) 23.63%, #4A6DCB 70.69%, #64D2F7 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; height: 40px;">
        Billing Address
    </h1>

    @guest
    <div class="guest-section" id="guest-section">
        <div class="mb-8">
            <h3 class="font-semibold text-left mt-5 w-full md:w-auto" style="height: 30px; font-family: Inter; font-size: 23px; font-weight: 600; line-height: 29.9px; color: #000000;">
                Create an Account
            </h3>

            <p class="text-left w-full md:w-auto" style="font-family: Inter; font-size: 16px; font-weight: 500; line-height: 23.2px; color: #000000;">
                Already have an account?
                <span id="handle-login" style="font-family: Inter; font-size: 16px; font-weight: 700; line-height: 23.2px; text-align: left; color: var(--Kazee-Secondary-400, #A377CF);">
                    Login
                </span>
            </p>

            <form action="{{ route('register-checkout') }}" method="POST" id="register-form">
                @csrf
                <div class="space-y-2">
                    <label class="block mb-1 mt-3 w-full">Name</label>
                    <input type="text" name="name" class="input" placeholder="Username" required>

                    <label class="block mb-1 mt-3 w-full">Email Address</label>
                    <input type="email" name="email" class="input" placeholder="Email Address" required>

                    <label class="block mb-1 mt-3 w-full">Phone</label>
                    <div class="field has-addons">
                        <div class="control">
                            <a class="button is-static">
                                +62
                            </a>
                        </div>
                        <div class="control is-expanded">
                            <input type="text" name="phone" class="input" placeholder="Phone Number" required>
                        </div>
                    </div>

                    <!-- Wrapper untuk menempatkan kedua field dalam satu baris -->
                    <div class="flex w-full space-x-4">
                        <!-- Password Field -->
                        <div class="w-full md:w-1/2">
                            <label class="w-full text-[16px] font-normal leading-[23.2px] text-black">Password</label>
                            <div class="field">
                                <div class="control has-icon has-validation">
                                    <input type="password" name="password" id="password" class="input" placeholder="Password" required>
                                    <div class="form-icon">
                                        <i data-feather="lock"></i>
                                    </div>
                                </div>
                                <p class="help danger-text" id="password-error" style="display: none;">Password should be at least 8 characters.</p>
                            </div>
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="w-full md:w-1/2">
                            <label class="w-full text-[16px] font-normal leading-[23.2px] text-black">Confirm Password</label>
                            <div class="field">
                                <div class="control has-icon has-validation">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="input" placeholder="Confirm Password" required>
                                    <div class="form-icon">
                                        <i data-feather="lock"></i>
                                    </div>
                                </div>
                                <p class="help danger-text" id="confirm-password-error" style="display: none;">Passwords do not match.</p>
                            </div>
                        </div>
                    </div>


                </div>
                <button type="submit" class="button h-button w-full bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-white mt-5 rounded-full">Register</button>
            </form>


            <!-- <div class="relative my-4">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-[#DEDEDE]"></div>
                </div>
            </div> -->

            <!-- <div>
                <a href="{{ url('auth/redirect?redirect=/checkout') }}" class="flex items-center justify-center w-full h-[40px] border border-custom-gray rounded-full px-5 py-4 bg-white text-gray-800 hover:bg-gray-50 transition duration-300">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-6 h-6 mr-3" alt="Google logo">
                    <span class="text-m">
                        Login with Google
                    </span>
                </a>
            </div> -->
        </div>
    </div>
    <div id="Login-form" class="w-full hidden">
        <div class="flex flex-col items-center mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-2 w-full">
                Welcome back!
            </h2>
            <p class="text-gray-600 text-xl font-normal mb-3 w-full">
                Log in to your account
            </p>
        </div>

        <form id="loginForm" class="space-y-4" method="POST" action="{{ route('login-checkout') }}">
            @csrf

            <!-- Email Input -->
            <div class="field flex flex-col gap-1">
                <div class="control has-icon bg-white border @error('email') border-custom-red animate-shake @else border-custom-gray @enderror rounded-lg ">
                    <input
                        class="input bg-transparent border-none outline-none text-gray-700"
                        type="email"
                        name="email"
                        id="email_login"
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
                        id="password_login"
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
            </div>

            <div class="pt-2">
                <button type="submit" class="w-full h-[40px] rounded-full text-m font-regular button h-button bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-white">
                    Log In
                </button>
            </div>
        </form>

        <!-- <div class="flex items-center my-4">
            <div class="flex-grow border-t border-custom-gray"></div>
            <span class="px-4 text-base text-gray-600">or</span>
            <div class="flex-grow border-t border-custom-gray"></div>
        </div> -->

        <!-- <div>
            <a href="{{ url('auth/redirect?redirect=/client-dashboard') }}" class="flex items-center justify-center w-full h-[40px] border border-custom-gray rounded-full px-5 py-4 bg-white text-gray-800 hover:bg-gray-50 transition duration-300">
                <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-6 h-6 mr-3" alt="Google logo">
                <span class="text-m">
                    Login with Google
                </span>
            </a>
        </div> -->

        <div class="text-center mt-8 flex justify-center items-center space-x-2">
            <span class="text-sm font-small text-gray-600">
                Don't have an account yet?
            </span>
            <span id="handle-register" class="text-custom-purple text-sm font-medium hover:underline">
                Sign Up
            </span>
        </div>
    </div>
    @endguest

    <div>
        <h3 class="text-2xl font-semibold text-black mb-4">
            Billing Address
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
            <!-- Company Name -->
            <div>
                <label class="block text-base font-normal text-black mb-2">
                    Company Name (Optional)
                </label>
                <div class="control">
                    <input type="text" name="company_name" placeholder="Company Name" class="input">
                </div>
            </div>

            <!-- Street Address -->
            <div>
                <label class="block text-base font-normal text-black mb-2">
                    Street Address
                </label>
                <div class="control">
                    <input type="text" name="street_address_1" placeholder="Street Address" class="input" required>
                </div>
            </div>

            <!-- Street Address 2 (Optional) -->
            <div>
                <label class="block text-base font-normal text-black mb-2">
                    Street Address 2 (Optional)
                </label>
                <div class="control">
                    <input type="text" name="street_address_2" placeholder="Apartment, suite, etc." class="input">
                </div>
            </div>

            <!-- City -->
            <div>
                <label class="block text-base font-normal text-black mb-2">
                    City
                </label>
                <div class="control">
                    <input type="text" name="city" placeholder="City" class="input" required>
                </div>
            </div>

            <!-- Country -->
            <div>
                <label class="block text-base font-normal text-black mb-2 w-full">
                    Country
                </label>
                <div class="field">
                    <div class="control">
                        <div class="h-select">
                            <div class="select-box">
                                <span>Select Country</span>
                            </div>
                            <div class="select-icon">
                                <i data-feather="chevron-down"></i>
                            </div>
                            <div class="select-drop has-slimscroll-sm">
                                <div class="drop-inner">
                                    <div class="option-row">
                                        <input type="radio" name="country" value="ID">
                                        <div class="option-meta">
                                            <span>Indonesia</span>
                                        </div>
                                    </div>
                                    <div class="option-row">
                                        <input type="radio" name="country" value="SG">
                                        <div class="option-meta">
                                            <span>Singapore</span>
                                        </div>
                                    </div>
                                    <div class="option-row">
                                        <input type="radio" name="country" value="MY">
                                        <div class="option-meta">
                                            <span>Malaysia</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- State and Post Code -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-4">
                <div>
                    <label class="block text-base font-normal text-black mb-2">
                        State
                    </label>
                    <div class="control">
                        <input type="text" name="state" placeholder="State/Province" class="input" required>
                    </div>
                </div>
                <div>
                    <label class="block text-base font-normal text-black mb-2">
                        Post Code
                    </label>
                    <div class="control">
                        <input type="text" name="post_code" placeholder="Post Code" class="input" required>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



<script>
    $(document).ready(function() {
        // Sembunyikan Login-form saat halaman pertama kali dimuat
        $('#Login-form').addClass('hidden');

        // Fungsi untuk toggle form
        function toggleForms(showFormId, hideFormId) {
            $('#' + hideFormId).hide();
            $('#' + showFormId).show();
        }

        // Event listener untuk pindah ke form login
        $('#handle-login').on('click', function() {
            $('#Login-form').removeClass('hidden');
            $('#guest-section').hide();
        });

        // Event listener untuk pindah ke form register (Sign Up)
        $('#handle-register').on('click', function() {
            $('#Login-form').addClass('hidden');
            $('#guest-section').show();
        });

        // Fungsi untuk mengecek dan memperbarui status login
        function checkLoginStatus() {
            const isUserLoggedIn = localStorage.getItem('user_has_log_in') === 'true';
            const userData = JSON.parse(localStorage.getItem('user_data'));

            if (isUserLoggedIn && userData) {
                // Jika user sudah login
                $('#Login-form').hide(); // Sembunyikan seluruh form login
                $('#loginForm').hide(); // Sembunyikan form login
                $('#guest-section').hide(); // Sembunyikan elemen guest
                $('#guest-login-button').hide(); // Sembunyikan tombol login
                $('#user-dashboard').show(); // Tampilkan elemen user dashboard

                // Update informasi user
                $('#user-name').text(userData.name);
                $('#user-email').text(userData.email);
            } else {
                // Jika user belum login
                $('#Login-form').addClass('hidden'); // Sembunyikan form login
                $('#guest-section').show(); // Tampilkan elemen guest
                $('#guest-login-button').show(); // Tampilkan tombol login
                $('#user-dashboard').hide(); // Sembunyikan elemen user dashboard
            }
        }

        // Panggil fungsi saat halaman dimuat
        checkLoginStatus();

        // Validasi password saat registrasi
        $('#password').on('input', function() {
            const password = $(this).val();
            if (password.length < 8) {
                $('#password-error').show();
            } else {
                $('#password-error').hide();
            }
        });

        // Validasi konfirmasi password
        $('#password_confirmation').on('input', function() {
            const password = $('#password').val();
            const confirmPassword = $(this).val();
            if (password !== confirmPassword) {
                $('#confirm-password-error').show();
            } else {
                $('#confirm-password-error').hide();
            }
        });

        // Proses submit form registrasi
        $('#register-form').on('submit', function(e) {
            e.preventDefault();

            const password = $('#password').val();
            const confirmPassword = $('#password_confirmation').val();
            let isValid = true;

            // Validasi panjang password
            if (password.length < 8) {
                $('#password-error').show();
                isValid = false;
            }

            // Validasi kecocokan password
            if (password !== confirmPassword) {
                $('#confirm-password-error').show();
                isValid = false;
            }

            if (!isValid) {
                return;
            }

            var form = $(this);
            $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: form.serialize(),
                success: function(response) {
                    if (response.success) {
                        // Simpan data login
                        localStorage.setItem('user_has_log_in', 'true');
                        localStorage.setItem('user_data', JSON.stringify(response.user));

                        // Tampilkan pesan sukses
                        Swal.fire({
                            icon: 'success',
                            title: 'Registrasi Berhasil',
                            text: response.message,
                            timer: 1500,
                            showConfirmButton: false
                        });

                        // Reset form dan update status login
                        form[0].reset();
                        checkLoginStatus();
                    } else {
                        // Registrasi gagal
                        localStorage.setItem('user_has_log_in', 'false');

                        Swal.fire({
                            icon: 'error',
                            title: 'Registrasi Gagal',
                            text: response.message
                        });
                    }
                },
                error: function(xhr) {
                    let errorMsg = 'Terjadi kesalahan. Silakan coba lagi.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMsg = xhr.responseJSON.message;
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: errorMsg
                    });
                }
            });
        });

        // Proses submit form login
        $('#loginForm').on('submit', function(e) {
            e.preventDefault();

            const email = $('#email_login').val();
            const password = $('#password_login').val();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: {
                    email: email,
                    password: password,
                    _token: $('input[name="_token"]').val()
                },
                success: function(response) {
                    if (response.success) {
                        // Simpan data login
                        localStorage.setItem('user_has_log_in', 'true');
                        localStorage.setItem('user_data', JSON.stringify(response.user));

                        // Tampilkan pesan sukses
                        Swal.fire({
                            icon: 'success',
                            title: 'Login Berhasil',
                            text: response.message,
                            timer: 1500,
                            showConfirmButton: false
                        });

                        // Update status login
                        checkLoginStatus();
                    }
                },
                error: function(xhr) {
                    localStorage.setItem('user_has_log_in', 'false');

                    let errorMessage = 'Login gagal';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMessage = xhr.responseJSON.message;
                    }

                    Swal.fire({
                        icon: 'error',
                        title: 'Login Gagal',
                        text: errorMessage
                    });
                }
            });
        });
        // Tambahkan handler logout
        $(document).on('click', '#logout-btn', function() {
            $.ajax({
                type: 'POST',
                url: '{{ route("logout") }}',
                data: {
                    _token: $('input[name="_token"]').val()
                },
                success: function(response) {
                    // Hapus data login dari localStorage
                    localStorage.removeItem('user_has_log_in');
                    localStorage.removeItem('user_data');

                    // Tampilkan notifikasi logout
                    Swal.fire({
                        icon: 'success',
                        title: 'Logout Berhasil',
                        timer: 1500,
                        showConfirmButton: false
                    });

                    // Update status login
                    checkLoginStatus();
                },
                error: function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Logout Gagal',
                        text: 'Silakan coba lagi'
                    });
                }
            });
        });
    });
</script>

<!-- javascript eye -->
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function() {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.querySelector('iconify-icon').setAttribute('icon', type === 'password' ? 'mdi:eye' : 'mdi:eye-off');
    });
</script>







<!-- Tambahkan elemen untuk pesan sukses -->
<div id="success-message" style="display: none; color: green; margin-top: 10px;">
    Data berhasil disimpan!
</div>