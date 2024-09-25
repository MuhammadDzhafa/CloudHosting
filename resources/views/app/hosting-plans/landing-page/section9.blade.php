<!-- <div class="section-frame padding-1 gap-6 md:gap-12">
    <h2 class="text-3xl md:text-4xl title-section text-center">
        Hear Directly from Our Satisfied Clients
    </h2>    
    </h2>    
    <div id="slider" class="relative w-full overflow-hidden">
        <div class="slider-content flex transition-transform duration-300 ease-in-out" style="width: 100%; width: unset;" >
            @foreach($testimonials as $testimonial)
            <div class="slider-item flex-none w-full flex items-center justify-between bg-white p-8">
                <img src="{{ asset('storage/' . $testimonial->picture) }}" style="width: 100%;" alt="Client" class="rounded-full img-slide">
                <div class="text-left ml-8">
                    <div class="flex items-center gap-4">
                        <div class="quote-icon">
                            <span class="quote-text">“</span>
                        </div>
                        <p class="client-review">
                            {{ $testimonial->testimonial_text }}
                        </p>
                    </div>
                    <p class="client-name">
                        - {{ $testimonial->occupation }}
                    </p>
                    <div class="client-socials">
                        <a href="{{ $testimonial->facebook }}" target="_blank">Facebook</a> | 
                        <a href="{{ $testimonial->instagram }}" target="_blank">Instagram</a>
                     
                        <span>Facebook: {{ $testimonial->facebook }}</span> | 
                        <span>Instagram: {{ $testimonial->instagram }}</span>
            
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <button id="prev" class="absolute bottom-4 right-20 w-[50px] h-[50px] bg-indigo-500 text-white p-2 rounded-full focus:outline-none">❮</button>
        <button id="next" class="absolute bottom-4 right-4 w-[50px] h-[50px] bg-indigo-500 text-white p-2 rounded-full focus:outline-none">❯</button>
    </div>
</div> -->



<div class="gap-[50px] section-frame padding-1">
    <h2 class="text-3xl md:text-4xl title-section text-center">
        Hear Directly from Our Satisfied Clients
    </h2>    
    <div id="slider" class="relative w-full overflow-hidden">
        <div class="slider-content flex transition-transform duration-300 ease-in-out">
        @foreach($testimonials as $testimonial)
            <div class="slider-item flex-none w-full flex items-center justify-between bg-white">
                <div class="relative rounded-full flex items-center" style="width: 100%; height: 100%; background: radial-gradient(circle, rgba(74, 109, 203, 1) 20%, rgba(74, 109, 203, 0) 67%); align-items: center; justify-content: center;">
                    <img src="{{ asset('storage/' . $testimonial->picture) }}" alt="Satisfied Clients" class="rounded-full" style="width: 400px; height: 388.99px;">
                </div>
                <div class="text-left ml-8">
                    <div class="flex items-center gap-4">
                        <div class="w-[69px] h-[69px] p-[10px] bg-[#B8C5EB] rounded-[12px] flex items-center justify-center opacity-100">
                        <span class="text-[49px] leading-[49px]" style="font-family: Inter; font-weight: 700; color: #643493;">
                            “
                        </span>
                    </div>
                    
                    <p class="font-inter text-[23px] font-normal leading-[29.9px] text-left text-black mb-12">
                        {{ $testimonial->testimonial_text }}
                    </p>
                </div>
                    <p class="font-inter text-[18px] font-normal leading-[29.9px] text-[#465890] mb-1 mt-10">
                        - Azhar & Ahmad | {{ $testimonial->occupation }} 
                    </p>
                    <p class="font-inter text-[18px] font-normal leading-[29.9px] text-[#465890] mb-12">
                        {{ $testimonial->domain_web }} 
                    </p>
                </div>
            </div>   
        @endforeach
        </div>
        <button id="prev" class="absolute bottom-4 right-20 w-[50px] h-[50px] bg-indigo-500 text-white p-2 rounded-full focus:outline-none bg:#4A6DCB">❮</button>
        <button id="next" class="absolute bottom-4 right-4 w-[50px] h-[50px] bg-indigo-500 text-white p-2 rounded-full focus:outline-none bg:#4A6DCB">❯</button>
    </div>
</div>