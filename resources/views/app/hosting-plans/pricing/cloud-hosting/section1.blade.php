<div class="flex flex-col md:flex-row bg-gradient-custom section-frame" style="padding: 100px 120px 0 120px;">

    <div class="md:w-1/2 pr-8 section-frame">
        <h1 class="text-[50px] font-bold leading-[60px] text-left text-white font-inter mb-4">
            Cloud Hosting
        </h1>

        <p class="mb-4 text-[18px] font-normal leading-[23.4px] text-left text-white font-inter">
            Adjust your resources on demand and scale effortlessly as your business evolves. Pay only for what you need, ensuring optimal efficiency and cost-effectiveness.
        </p>

        <!-- Placeholder for the person image -->
        <img src="assets/img/cloudhosting/people.png" alt="" class="w-[421.31px] h-[455px]">
    </div>
    <div class="md:w-1/2 h-[614px] bg-white text-gray-800 rounded-t-xl" style="padding: 30px 50px;">
        <h4 class="custom-title mt-1">
            Fulfill your needs with our
        </h4>
        <div class="custom-text-gradient mt-1">
            Customized Plan
        </div>
        <ul class="mb-4">
            <li class="flex items-center mb-2 mt-5 text-left text-[16px] font-normal leading-[23.2px] text-[#465387] font-inter">
                <img src="assets/img/icons/checklist.svg" alt="" class="mr-2">
                Unlimited Domains, Bandwidth, Emails, Inodes
            </li>

        </ul>



        <div class="custom-col custom-col-2">
            <div class="custom-slider-section">
                <div class="flex justify-between items-center mb-2">
                    <label class="font-bold text-gray-800">RAM</label>
                    <div id="ram-price" class="custom-price">Rp5000/mon</div>
                </div>
                <div class="flex items-center">
                    <div id="ram-value" class="custom-slider-value text-center" style="width: 75px;">4
                        GB</div>
                    <input id="ram-slider" type="range" min="0" max="4" step="1" value="0"
                        class="custom-slider">
                </div>
            </div>
            <div class="custom-slider-section">
                <div class="flex justify-between items-center mb-2">
                    <label class="font-bold text-gray-800">CPU</label>
                    <div id="cpu-price" class="custom-price">Rp5000/mon</div>
                </div>
                <div class="flex items-center">
                    <div id="cpu-value" class="custom-slider-value text-center" style="width: 75px;">4
                        Core</div>
                    <input id="cpu-slider" type="range" min="0" max="4" step="1" value="0"
                        class="custom-slider">
                </div>
            </div>
            <div class="custom-slider-section">
                <div class="flex justify-between items-center mb-2">
                    <label class="font-bold text-gray-800">Storage</label>
                    <div id="storage-price" class="custom-price">Rp5000/mon</div>
                </div>
                <div class="flex items-center">
                    <div id="storage-value" class="custom-slider-value text-center"
                        style="width: 75px;">120 GB</div>
                    <input id="storage-slider" type="range" min="0" max="4" step="1" value="0"
                        class="custom-slider">
                </div>
            </div>
        </div>

        <div class="flex justify-between items-center mb-4">
            <div class="text-2xl font-bold">
                <span class="flex items-center justify-center">
                    <span
                        class="h-[20px] gap-0 opacity-100 font-inter text-[14px] font-[400] leading-[20.3px] text-center text-[color:var(--Kazee-Primary-500,#4A6DCB)]">Rp</span>
                    <span
                        class="h-[38px] gap-0 opacity-100 font-inter text-[32px] font-[700] leading-[38.4px] text-center text-[color:var(--Kazee-Primary-500,#4A6DCB)]">15.000</span>
                    <span
                        class="h-[20px] gap-0 opacity-100 font-inter text-[14px] font-[400] leading-[20.3px] text-center text-[color:var(--Kazee-Primary-500,#4A6DCB)]">/mon</span>
                </span>
            </div>
            <button class="custom-order-button mt-4 md:mt-0"> <!-- Tambahkan mt-4 untuk margin-top di mobile -->
                <span class="custom-order-text">
                    Order Now
                </span>
            </button>
        </div>
        <p class="text-center text-[16px] font-normal leading-[23.2px] text-[#7C7C7C] font-inter">
            Price does not include tax.
        </p>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const hostingPlans = document.querySelectorAll('.tab-content div');

        hostingPlans.forEach(function(plan) {
            const planNameElement = plan.querySelector('h5');
            if (planNameElement && planNameElement.textContent.toLowerCase().includes('alto')) {
                plan.classList.add('bg-gradient-custom', 'text-white'); // Add background and text style
                planNameElement.classList.add('text-white'); // Change title text color

                // Change description color to white
                let descriptionElement = plan.querySelector('p');
                if (descriptionElement) {
                    descriptionElement.classList.add('text-white'); // Add text color to description
                }

                // Find the price container and update the price text color
                let priceContainer = plan.querySelector('.price-container');
                if (priceContainer) {
                    let priceElements = priceContainer.querySelectorAll('span');
                    priceElements.forEach(function(priceElement) {
                        priceElement.classList.add('text-white'); // Add text color to price elements
                    });
                }

                // Change color of key features (check icon) to white
                let keyItems = plan.querySelectorAll('li'); // Assuming features are in <li> elements
                keyItems.forEach(item => {
                    item.classList.add('text-white'); // Add text color to key features
                    let img = item.querySelector('img');
                    if (img) {
                        img.src = '/assets/img/icons/checkwhite.svg'; // Change to white check icon
                    }
                });

                // Change "More detail" link to white, but exclude button
                let moreDetailLink = plan.querySelector('a:not(.button)'); // Ensure we don't select the button
                if (moreDetailLink) {
                    moreDetailLink.classList.add('text-white'); // Change "More detail" link color to white
                }
            }

        });
    });
</script>