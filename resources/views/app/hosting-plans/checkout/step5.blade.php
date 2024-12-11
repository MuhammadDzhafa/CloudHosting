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
                <a href="#" style="font-family: Inter; font-size: 16px; font-weight: 700; line-height: 23.2px; text-align: left; color: var(--Kazee-Secondary-400, #A377CF);">
                    Login
                </a>
            </p>

            <form action="{{ route('register') }}" method="POST" id="register-form">
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


            <div class="relative my-4">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-[#DEDEDE]"></div>
                </div>
                <div class="relative flex justify-center text-[16px]">
                    <span class="px-2 bg-white text-[#7C7C7C]">or</span>
                </div>
            </div>

            <div>
                <a href="auth/redirect" class="flex items-center justify-center w-full h-[40px] border border-custom-gray rounded-full px-5 py-4 bg-white text-gray-800 hover:bg-gray-50 transition duration-300">
                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" class="w-6 h-6 mr-3" alt="Google logo">
                    <span class="text-m">
                        Login with Google
                    </span>
                </a>
            </div>
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
        // Validasi password saat blur atau input
        $('#password').on('input', function() {
            const password = $(this).val();
            if (password.length < 8) {
                $('#password-error').show(); // Tampilkan pesan error
            } else {
                $('#password-error').hide(); // Sembunyikan pesan error
            }
        });

        // Validasi konfirmasi password
        $('#password_confirmation').on('input', function() {
            const password = $('#password').val();
            const confirmPassword = $(this).val();
            if (password !== confirmPassword) {
                $('#confirm-password-error').show(); // Tampilkan pesan error
            } else {
                $('#confirm-password-error').hide(); // Sembunyikan pesan error
            }
        });

        // Proses submit form dengan AJAX
        $('#register-form').on('submit', function(e) {
            e.preventDefault();

            const password = $('#password').val();
            const confirmPassword = $('#password_confirmation').val();
            let isValid = true;

            // Periksa panjang password
            if (password.length < 8) {
                $('#password-error').show();
                isValid = false;
            }

            // Periksa kecocokan password
            if (password !== confirmPassword) {
                $('#confirm-password-error').show();
                isValid = false;
            }

            // Jika validasi gagal, hentikan submit
            if (!isValid) {
                return;
            }

            var form = $(this);
            $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: form.serialize(),
                success: function(response) {
                    console.log('Response:', response); // Debug response
                    if (response.success) {
                        // Tampilkan pesan sukses
                        $('#success-message').text(response.message).show();
                        form[0].reset(); // Reset form jika sukses

                        // Sembunyikan elemen guest-section dan tombol login
                        $('#guest-section').hide();
                        $('#guest-login-button').hide();
                    } else {
                        alert('Registrasi gagal: ' + response.message);
                    }
                },
                error: function(xhr) {
                    console.error('Error Response:', xhr); // Debug error
                    let errorMsg = 'Terjadi kesalahan. Silakan coba lagi.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errorMsg = xhr.responseJSON.message;
                    } else if (xhr.responseText) {
                        errorMsg = xhr.responseText;
                    }
                    alert('Error: ' + errorMsg);
                }
            });
        });
    });
</script>



<!-- Tambahkan elemen untuk pesan sukses -->
<div id="success-message" style="display: none; color: green; margin-top: 10px;">
    Data berhasil disimpan!
</div>