<div class="section-frame padding-1">
    <!-- Background Image Container -->
    <div class="absolute inset-0 -mx-[10%] bg-cover bg-center" style="height: 500px; width: calc(100% + 20%);">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('/assets/img/bg/bg-pattern2.svg'); height: 500px; width: calc(100% + 20%); opacity: 0.3;"></div>
    </div>

    <!-- Main Content -->

    <div class="flex flex-col md:flex-row w-full gap-10">

        <div
            class="w-full md:w-1/2 flex-grow flex flex-col gap-10 md:justify-start md:items-start justify-center items-center">
            <div class="text-container">
                <h2 class="title-section">Contact Us</h2>
                <p class="text-base-hero mb-0">Reach out to us anytime, and we'll be more than happy to assist you. Get
                    in touch with us through the form or by using the contact information provided below.
                </p>
            </div>


            <ul class="user-list flex flex-row md:flex-col gap-4">
                <li>
                    <div class="h-icon bg-[#DBCAEC] is-rounded">
                        <img src="/assets/img/icons/email.svg" alt="Email Icon" class="w-[18px] sm:w-[24px]">
                    </div>
                    <div class="user-list-info">
                        <div class="name dark-inverted lg:text-[10px]">Email</div>
                        <div class="position"> <a href="mailto:info@kazee.id">info@kazee.id</a></div>
                    </div>
                </li>

                <li>
                    <div class="h-icon bg-[#DBCAEC] is-rounded">
                        <img src="/assets/img/icons/phone-enabled.svg" alt="Phone Icon" class="w-[18px] sm:w-[24px]">
                    </div>
                    <div class="user-list-info">
                        <div class="name dark-inverted">Call</div>
                        <div class="position">+62 811 2222 656</div>
                    </div>
                </li>
                <li>
                    <div class="h-icon bg-[#DBCAEC] is-rounded">
                        <img src="/assets/img/icons/location.svg" alt="Location Icon" class="w-[18px] sm:w-[24px]">
                    </div>
                    <div class="user-list-info">
                        <div class="name dark-inverted">Office</div>
                        <div class="position">Jl. Setrasari Indah No. 4, Bandung</div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="w-full md:w-1/2 flex-grow">
            <div class="form-card">
                <form action="{{ route('contact-us.store') }}" method="POST">
                @csrf
                    <div class="field">
                        <label>Name</label>
                        <div class="control">
                            <input type="text" name="name"  class="input" placeholder="" value="{{ old('name') }}">
                        </div>
                    </div>

                    <div class="field">
                        <label>Email Address</label>
                        <div class="control">
                            <input type="text" name="email" class="input" placeholder="" value="{{ old('Email') }}">
                        </div>
                    </div>

                    <div class="field">
                        <label>Your Message</label>
                        <div class="control">
                            <textarea class="textarea" rows="4" name="message"
                                placeholder="Tell us about any details you'd like us to know..."></textarea>
                        </div>
                    </div>

                    <button type="submit" class="button-gradient rounded-full">Submit</button>
                </form>
            </div>
        </div>
    </div>


</div>