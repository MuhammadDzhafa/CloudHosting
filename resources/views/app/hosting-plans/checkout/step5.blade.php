<div class="w-full">
    <h2 class="text-[20px] font-normal" style="background: linear-gradient(104.31deg, rgba(100, 52, 147, 0.95) 23.63%, #4A6DCB 70.69%, #64D2F7 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; height: 26px;">
        STEP 5
    </h2>

    <h1 class="text-[32px] font-bold leading-[38.4px] text-left mt-3 mb-8 w-full md:w-auto lg:w-full" style="background: radial-gradient(104.31% 150.2% at 0% 22.79%, rgba(100, 52, 147, 0.95) 23.63%, #4A6DCB 70.69%, #64D2F7 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; height: 40px;">
        Billing Address
    </h1>

    @auth
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
                <input type="text" name="phone" class="input" placeholder="Phone Number" required>

                <div class="flex flex-col md:flex-row space-y-4 md:space-y-0 md:space-x-4">
                    <div class="w-full md:w-1/2">
                        <label class="w-full text-[16px] font-normal leading-[23.2px] text-black">Password</label>
                        <div class="relative">
                            <input type="password" name="password" class="input" placeholder="Password" required>
                            <button class="absolute inset-y-0 right-0 flex items-center px-2">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="w-full md:w-1/2">
                        <label class="w-full text-[16px] font-normal leading-[23.2px] text-black">Confirm Password</label>
                        <div class="relative">
                            <input type="password" name="password_confirmation" class="input" placeholder="Confirm Password" required>
                            <button class="absolute inset-y-0 right-0 flex items-center px-2">
                                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="button h-button bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-white">Register</button>
        </form>

        <div class="relative my-6">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-[#DEDEDE]"></div>
            </div>
            <div class="relative flex justify-center text-[16px]">
                <span class="px-2 bg-white text-[#7C7C7C]">or</span>
            </div>
        </div>

        <button
            type="button"
            class="w-full mt-6 py-3 border border-gray-300 rounded-full bg-white flex items-center justify-center gap-4 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-opacity-50 transition duration-300 ease-in-out">
            <img
                src="https://www.svgrepo.com/show/475656/google-color.svg"
                class="w-6 h-6"
                alt="Google logo">
            <span class="text-[20px] font-medium text-gray-700">
                Sign up with Google
            </span>
        </button>
    </div>
    @endauth

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
                    <input type="text" name="company_name" placeholder="Company Name" class="input h-12">
                </div>
            </div>

            <!-- Street Address -->
            <div>
                <label class="block text-base font-normal text-black mb-2">
                    Street Address
                </label>
                <div class="control">
                    <input type="text" name="street_address_1" placeholder="Street Address" class="input h-12" required>
                </div>
            </div>

            <!-- Street Address 2 (Optional) -->
            <div>
                <label class="block text-base font-normal text-black mb-2">
                    Street Address 2 (Optional)
                </label>
                <div class="control">
                    <input type="text" name="street_address_2" placeholder="Apartment, suite, etc." class="input h-12">
                </div>
            </div>

            <!-- City -->
            <div>
                <label class="block text-base font-normal text-black mb-2">
                    City
                </label>
                <div class="control">
                    <input type="text" name="city" placeholder="City" class="input h-12" required>
                </div>
            </div>

            <!-- Country -->
            <div>
                <label class="block text-base font-normal text-black mb-2 w-full">
                    Country
                </label>
                <div class="field">
                    <div class="control">
                        <select name="country" class="input h-12" required>
                            <option value="">Select Country</option>
                            <option value="ID">Indonesia</option>
                            <option value="SG">Singapore</option>
                            <option value="MY">Malaysia</option>
                        </select>
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
                        <input type="text" name="state" placeholder="State/Province" class="input h-12" required>
                    </div>
                </div>
                <div>
                    <label class="block text-base font-normal text-black mb-2">
                        Post Code
                    </label>
                    <div class="control">
                        <input type="text" name="post_code" placeholder="Post Code" class="input h-12" required>
                    </div>
                </div>
            </div>

            <!-- Phone Number -->
            <div class="col-span-1 md:col-span-2">
                <div class="field has-addons">
                    <div class="control">
                        <a class="button is-static">
                            +62
                        </a>
                    </div>
                    <div class="control is-expanded">
                        <input name="phone" class="input" type="text" placeholder="Your phone number" required>
                    </div>
                </div>
            </div>


        </div>

    </div>
</div>

<script>
    $(document).ready(function() {
        $('#register-form').on('submit', function(e) {
            e.preventDefault(); // Menghentikan pengiriman form default

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(response) {
                    // Tindakan setelah berhasil
                    alert('Registrasi berhasil!');
                    $('#register-form')[0].reset(); // Mengosongkan form
                    // Sembunyikan elemen jika diperlukan
                    $('#create-account-title').hide(); // Sesuaikan ID jika perlu
                    $('#login-prompt').hide(); // Sesuaikan ID jika perlu
                    window.location.href = '/checkout'; // Arahkan ke halaman checkout
                },
                error: function(xhr) {
                    // Tindakan jika terjadi kesalahan
                    alert('Ada kesalahan. Silakan coba lagi.');
                }
            });
        });
    });
</script>