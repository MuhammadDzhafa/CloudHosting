<div class="section-frame padding-1 gap-6 md:gap-12">
    <h2 class="title-section text-center">
        Hear Directly from Our Satisfied Clients
    </h2>
    <div id="slider" class="relative w-full overflow-hidden">
        <div class="slider-content flex transition-transform duration-300 ease-in-out">
            @foreach($testimonials as $testimonial)
            <div class="slider-item flex-none w-full flex items-center justify-between bg-white">
                <div class="relative rounded-full flex items-center justify-center overflow-hidden" style="background: radial-gradient(circle, rgba(74, 109, 203, 1) 20%, rgba(74, 109, 203, 0) 63%);">
                    <img src="{{ asset('storage/testimonial_pictures/' . $testimonial->picture) }}" alt="Satisfied Client" class="rounded-full object-cover backgroundblue">
                </div>

                <div class="testimonial-container text-left ml-8 w-1/2">
                    <div class="flex items-start gap-4 kutipan-container">
                        <!-- Div kutipan -->
                        <div class="kutipan p-[20px] bg-[#B8C5EB] rounded-[12px] flex items-center justify-center opacity-100 mb-4">
                            <span class="text-[41px] leading-[49px]" style="font-family: Inter; font-weight: 700; color: #643493;">
                                “
                            </span>
                        </div>

                        <!-- Teks testimonial -->
                        <p class="font-inter font-normal text-left text-black text-testimonial">
                            {{ $testimonial->testimonial_text }}
                        </p>
                    </div>

                    <p class="font-inter text-[18px] font-normal leading-[29.9px] text-[#465890] mb-1 mt-10">
                        - Azhar | {{ $testimonial->occupation }}
                    </p>

                    <p class="font-inter text-[18px] font-normal leading-[29.9px] text-[#465890] mb-12">
                        {{ $testimonial->domain_web }}
                    </p>
                </div>
            </div>
            @endforeach
        </div>
        <button id="prev" class="absolute bottom-4 right-20 w-[50px] h-[50px] bg-[#4A6DCB] text-white p-2 rounded-full focus:outline-none">❮</button>
        <button id="next" class="absolute bottom-4 right-4 w-[50px] h-[50px] bg-[#4A6DCB] text-white p-2 rounded-full focus:outline-none">❯</button>
    </div>
</div>