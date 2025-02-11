<div class="section-frame padding-1" style="background: #fff;">
    <!-- Background Image Container -->
    <div class="absolute -mx-[10%] bg-cover bg-center" style="height: 500px; width: calc(100% + 20%);">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('/assets/img/bg/bg-pattern2.svg'); height: 500px; width: calc(100% + 20%); opacity: 0.2;"></div>
    </div>

    <!-- Main Content -->

    <div class="flex flex-col md:flex-row w-full gap-10 z-10">

        <div
            class="w-full md:w-1/2 flex-grow flex flex-col gap-10 md:justify-start md:items-start justify-center items-center">
            <div class="text-container">
                <h2 class="title-section">Contact Us</h2>
                <p class="text-base-hero mb-0">Reach out to us anytime, and we'll be more than happy to assist you. Get
                    in touch with us through the form or by using the contact information provided below.
                </p>
            </div>


            <ul class="user-list flex flex-col lg:flex-col md:flex-col gap-4 md:items-start lg:items-center">
                <div class="flex justify-between -mx-10 md:hidden">
                    <li class="flex items-center w-full">
                        <div class="h-icon bg-[#DBCAEC] is-rounded flex-shrink-0">
                            <img
                                src="/assets/img/icons/email.svg"
                                alt="Email Icon"
                                class="w-[18px] sm:w-[24px]">
                        </div>
                        <div class="user-list-info ml-3 flex-grow">
                            <div class="name dark-inverted lg:text-[10px] md:text-base font-semibold">
                                Email
                            </div>
                            <div class="position">
                                <a href="mailto:info@kazee.id" class="text-sm">
                                    info@kazee.id
                                </a>
                            </div>
                        </div>
                    </li>

                    <li class="flex items-center w-full">
                        <div class="h-icon bg-[#DBCAEC] is-rounded flex-shrink-0">
                            <img
                                src="/assets/img/icons/phone-enabled.svg"
                                alt="Phone Icon"
                                class="w-[18px] sm:w-[24px]">
                        </div>
                        <div class="user-list-info ml-3 flex-grow">
                            <div class="name dark-inverted lg:text-[10px] md:text-base font-semibold">
                                Call
                            </div>
                            <div class="position text-sm">+62 811 2222 656</div>
                        </div>
                    </li>
                </div>
                <div class="hidden md:flex flex-col items-center w-full ">
                    <li class="flex items-center w-full">
                        <div class="h-icon bg-[#DBCAEC] is-rounded flex-shrink-0">
                            <img
                                src="/assets/img/icons/email.svg"
                                alt="Email Icon"
                                class="w-[18px] sm:w-[24px]">
                        </div>
                        <div class="user-list-info ml-3 flex-grow">
                            <div class="name dark-inverted lg:text-[10px] md:text-base font-semibold">
                                Email
                            </div>
                            <div class="position">
                                <a href="mailto:info@kazee.id" class="text-sm">
                                    info@kazee.id
                                </a>
                            </div>
                        </div>
                    </li>

                    <li class="flex items-center w-full">
                        <div class="h-icon bg-[#DBCAEC] is-rounded flex-shrink-0">
                            <img
                                src="/assets/img/icons/phone-enabled.svg"
                                alt="Phone Icon"
                                class="w-[18px] sm:w-[24px]">
                        </div>
                        <div class="user-list-info ml-3 flex-grow">
                            <div class="name dark-inverted lg:text-[10px] md:text-base font-semibold">
                                Call
                            </div>
                            <div class="position text-sm">+62 811 2222 656</div>
                        </div>
                    </li>
                </div>

                <div class="mx-auto">
                    <li class="flex items-center w-full">
                        <div class="h-icon bg-[#DBCAEC] is-rounded flex-shrink-0">
                            <img
                                src="/assets/img/icons/location.svg"
                                alt="Location Icon"
                                class="w-[18px] sm:w-[24px]">
                        </div>
                        <div class="user-list-info ml-3 flex-grow">
                            <div class="name dark-inverted lg:text-[10px] md:text-base font-semibold">
                                Office
                            </div>
                            <div class="position text-sm">
                                Jl. Setrasari Indah No. 4, Bandung
                            </div>
                        </div>
                    </li>
                </div>
            </ul>
        </div>

        <div class="w-full md:w-1/2 flex-grow">
            <div class="form-card">
                <form id="contactForm" action="/contact-us" method="POST">
                    @csrf
                    <div class="field">
                        <label>Name</label>
                        <div class="control">
                            <input type="text" name="name" class="input" placeholder="" value="{{ old('name') }}">
                        </div>
                    </div>

                    <div class="field">
                        <label>Email Address</label>
                        <div class="control">
                            <input type="email" name="email" class="input" placeholder="" value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="field">
                        <label>Your Message</label>
                        <div class="control">
                            <textarea class="textarea" rows="4" name="message" placeholder="Tell us about any details you'd like us to know..."></textarea>
                        </div>
                    </div>

                    <button type="submit" class="button-gradient rounded-full" id="submitBtn">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div id="demo-right-actions-modal" class="modal h-modal">
        <div class="modal-background h-modal-close"></div>
        <div class="modal-content">
            <div class="modal-card">
                <header class="modal-card-head">
                    <h3>Thank You for Reaching Out!</h3>
                    <button class="h-modal-close ml-auto" aria-label="close">
                        <i data-feather="x"></i>
                    </button>
                </header>
                <div class="modal-card-body">
                    <div class="inner-content">
                        <div class="section-placeholder">
                            <div class="placeholder-content">
                                <img src="assets/img/illustmail.svg" alt="Success Icon">
                                <h3 class="dark-inverted">Your massage has been sent.</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-card-foot is-end">
                    <a class="button h-button is-rounded h-modal-close">Close</a>
                    <a class="button h-button is-primary is-raised is-rounded h-modal-close">OK</a>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Mencegah form dikirim secara tradisional

        // Ambil data dari form
        let formData = new FormData(this);

        // Kirim form menggunakan AJAX
        fetch("/contact-us", {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Tampilkan modal setelah berhasil
                    document.getElementById('demo-right-actions-modal').classList.add('is-active');
                } else {
                    // Handle error, tampilkan pesan error atau lakukan sesuatu
                    alert('Something went wrong!');
                }
            })
            .catch(error => console.log('Error:', error));
    });

    // Tutup modal saat tombol "Cancel" atau ikon "x" ditekan
    document.querySelectorAll('.h-modal-close').forEach(function(el) {
        el.addEventListener('click', function() {
            document.getElementById('demo-right-actions-modal').classList.remove('is-active');
        });
    });
</script>