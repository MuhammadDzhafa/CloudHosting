@extends('layouts.template-landing-page.web.master')

@section('landing-page')

@include("app.hosting-plans.landing-page.section1")
@include("app.hosting-plans.landing-page.section2")
@include("app.hosting-plans.landing-page.section3")
@include("app.hosting-plans.landing-page.section4")
@include("app.hosting-plans.landing-page.section5")
@include("app.hosting-plans.landing-page.section6")
@include("app.hosting-plans.landing-page.section7")
@include("app.hosting-plans.landing-page.section8")
@include("app.hosting-plans.landing-page.section9")
@include("app.hosting-plans.landing-page.section10")
@include("app.hosting-plans.landing-page.section11")
@include("app.hosting-plans.landing-page.section12")
@include("app.hosting-plans.landing-page.section13")

@endsection

@section('scripts')
<script>
    /*section1 javascript*/
    document.addEventListener('DOMContentLoaded', () => {
        const words = ['Easy', 'Fast', 'Secure', 'Efficient'];
        let currentIndex = 0;

        function changeText() {
            const animatedTextElements = document.querySelectorAll('.animated-text');
            animatedTextElements.forEach(element => {
                element.classList.add('changing');
                setTimeout(() => {
                    element.classList.remove('changing');
                    element.textContent = words[currentIndex];
                }, 300);
            });
            currentIndex = (currentIndex + 1) % words.length;
        }

        setInterval(changeText, 1800);
    });

    // Section2 JavaScript
    // const viewPriceListLink = document.getElementById('view-price-list');
    // const priceListSection = document.getElementById('price-list-section');
    // if (viewPriceListLink && priceListSection) {
    //     const arrowIcon = viewPriceListLink.querySelector('svg');
    //     viewPriceListLink.addEventListener('click', event => {
    //         event.preventDefault();
    //         priceListSection.classList.toggle('active');
    //         arrowIcon.classList.toggle('rotate-180');
    //     });
    // }

    // // Search Domain Availability
    // document.getElementById('search-btn').addEventListener('click', function () {
    //         const searchQuery = document.getElementById('domain-search').value;
    //         const dropdownContainer = document.getElementById('dropdown-container');
    //         const dropdownContent = document.getElementById('dropdown-content');

    //         if (searchQuery) {
    //             // Simulating search results - replace with actual data
    //             dropdownContent.innerHTML = `
                
    //             <div class="message is-success flex-row flex justify-between items-center">
    //                 <div class="message-body">
    //                 <strong> ${searchQuery}</strong> is available
    //                 <br>Exclusive offer: $ 1.50/mon for a 2-year plan
    //                 </div>
    //                 <button class="button h-button is-success rounded-full">Add to Cart</button>
    //             </div>

    //             <div class="message flex-row flex justify-between items-center">
    //                 <div class="message-body">
    //                 <strong> ${searchQuery}</strong> is not available
    //                 </div>
    //                 <button class="button h-button rounded-full">WHOIS</button>
    //             </div>

    //             <div>
    //                 <p class="text-[#FFFFFF] font-semibold mb-2 text-xl">AI Recommendations ✨</p>
    //                 <p class="text-[#FFFFFF] mb-4">For Polban, which is a vocational institution in
    //                 Indonesia, here are some domain name recommendations with education-related
    //                 TLD:</p>
    //                 <div class="message is-primary flex-row flex justify-between items-center">
    //                     <div class="message-body">
    //                         <strong> ${searchQuery}.edu</strong> is available
    //                         <br>Exclusive offer: $ 1.50/mon for a 2-year plan
    //                     </div>
    //                     <button class="button h-button is-primary rounded-full">Add to Cart</button>
    //             </div>
                
    //         `;

    //             // Apply animation class to show the dropdown
    //             dropdownContainer.classList.add('show');
    //         } else {
    //             // Hide the container if there's no search
    //             dropdownContainer.classList.remove('show');
    //         }
    //     });


    // /* Pick TLD Card */
    // // Select the input field
    // const searchInput = document.getElementById('domain-search');

    // // Function to replace the TLD of a domain
    // function replaceTLD(domainName, newTLD) {
    //     // Use regex to match everything from the first dot in the last two segments
    //     return domainName.replace(/(\.[a-z]{2,63}\.[a-z]{2,63}|(\.[a-z]{2,63})){1}$/, newTLD);
    // }

    // // Select the container with the 'domain-container' id
    // const domainContainer = document.getElementById('domain-container');

    // // Add event listeners to each popular domain card
    // document.querySelectorAll('.popular-domain').forEach(domainCard => {
    //     domainCard.addEventListener('click', function () {
    //         const selectedTLD = this.getAttribute('data-domain');  // Get the clicked TLD
    //         const currentDomain = searchInput.value;  // Get the current input value

    //         if (currentDomain) {
    //             // Replace the existing TLD with the selected one
    //             searchInput.value = replaceTLD(currentDomain, selectedTLD);
    //         } else {
    //             // If input is empty, just set the selected TLD
    //             searchInput.value = selectedTLD;
    //         }
    //     });
    // });

    /*section6 javascript*/
    const storageSlider = document.getElementById('storage-slider');
    const ramSlider = document.getElementById('ram-slider');
    const cpuSlider = document.getElementById('cpu-slider');

    const totalPriceElement = document.getElementById('total-price');

    // Storage options
    const storageOptions = [{
            value: '120 GB',
            price: 5000
        },
        {
            value: '240 GB',
            price: 10000
        },
        {
            value: '256 GB',
            price: 15000
        },
        {
            value: '480 GB',
            price: 20000
        },
        {
            value: '512 GB',
            price: 25000
        }
    ];

    // RAM options
    const ramOptions = [{
            value: '4 GB',
            price: 5000
        },
        {
            value: '8 GB',
            price: 10000
        },
        {
            value: '16 GB',
            price: 15000
        },
        {
            value: '32 GB',
            price: 20000
        },
        {
            value: '64 GB',
            price: 25000
        }
    ];

    // CPU options
    const cpuOptions = [{
            value: '4 Core',
            price: 5000
        },
        {
            value: '8 Core',
            price: 10000
        },
        {
            value: '12 Core',
            price: 15000
        },
        {
            value: '16 Core',
            price: 20000
        },
        {
            value: '24 Core',
            price: 25000
        }
    ];

    function updateTotalPrice() {
        const selectedStorage = storageOptions[storageSlider.value].price;
        const selectedRam = ramOptions[ramSlider.value].price;
        const selectedCpu = cpuOptions[cpuSlider.value].price;

        // Hitung total harga
        const totalPrice = selectedStorage + selectedRam + selectedCpu;

        // Update tampilan total harga dengan titik sebagai pemisah ribuan
        totalPriceElement.textContent = `${totalPrice.toLocaleString('id-ID')}`;
    }



    // Set event listener untuk update harga
    storageSlider.addEventListener('input', updateTotalPrice);
    ramSlider.addEventListener('input', updateTotalPrice);
    cpuSlider.addEventListener('input', updateTotalPrice);

    // Set initial value
    updateTotalPrice();

    document.addEventListener('DOMContentLoaded', function() {
        const storageSlider = document.getElementById('storage-slider');
        const storageValue = document.getElementById('storage-value');
        const storagePrice = document.getElementById('storage-price');

        const storageOptions = [{
                value: '120 GB',
                price: 'IDR 5.000/mon'
            },
            {
                value: '240 GB',
                price: 'IDR 10.000/mon'
            },
            {
                value: '256 GB',
                price: 'IDR 15.000/mon'
            },
            {
                value: '480 GB',
                price: 'IDR 20.000/mon'
            },
            {
                value: '512 GB',
                price: 'IDR 25.000/mon'
            }
        ];

        function updateStorage() {
            const selectedOption = storageOptions[storageSlider.value];
            storageValue.textContent = selectedOption.value;
            storagePrice.textContent = selectedOption.price;
        }

        storageSlider.addEventListener('input', updateStorage);

        // Set initial value
        updateStorage();
    });

    document.addEventListener('DOMContentLoaded', function() {
        const ramSlider = document.getElementById('ram-slider');
        const ramValue = document.getElementById('ram-value');
        const ramPrice = document.getElementById('ram-price');

        const ramOptions = [{
                value: '4 GB',
                price: 'IDR 5.000/mon'
            },
            {
                value: '8 GB',
                price: 'IDR 10.000/mon'
            },
            {
                value: '16 GB',
                price: 'IDR 15.000/mon'
            },
            {
                value: '32 GB',
                price: 'IDR 20.000/mon'
            },
            {
                value: '64 GB',
                price: 'IDR 25.000/mon'
            }
        ];

        function updateRam() {
            const selectedOption = ramOptions[ramSlider.value];
            ramValue.textContent = selectedOption.value;
            ramPrice.textContent = selectedOption.price;
        }

        ramSlider.addEventListener('input', updateRam);

        // Set initial value
        updateRam();
    });

    document.addEventListener('DOMContentLoaded', function() {
        const cpuSlider = document.getElementById('cpu-slider');
        const cpuValue = document.getElementById('cpu-value');
        const cpuPrice = document.getElementById('cpu-price');

        const cpuOptions = [{
                value: '4 Core',
                price: 'IDR 5.000/mon'
            },
            {
                value: '8 Core',
                price: 'IDR 10.000/mon'
            },
            {
                value: '12 Core',
                price: 'IDR 15.000/mon'
            },
            {
                value: '16 Core',
                price: 'IDR 20.000/mon'
            },
            {
                value: '24 Core',
                price: 'IDR 25.000/mon'
            }
        ];

        function updateCpu() {
            const selectedOption = cpuOptions[cpuSlider.value];
            cpuValue.textContent = selectedOption.value;
            cpuPrice.textContent = selectedOption.price;
        }

        cpuSlider.addEventListener('input', updateCpu);

        // Set initial value
        updateCpu();
    });


    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.tab');
        const tabContents = document.querySelectorAll('.tab-content');
        const slider = document.querySelector('.slider');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const target = tab.getAttribute('data-target');
                tabContents.forEach(content => {
                    content.classList.toggle('is-active', content.id === target);
                });
                tabs.forEach(t => t.classList.remove('text-white'));
                tab.classList.add('text-white');
                updateSlider(tab);
            });
        });

        function updateSlider(activeTab) {
            const tabWidth = activeTab.offsetWidth;
            const tabOffset = activeTab.offsetLeft;
            slider.style.width = `${tabWidth}px`;
            slider.style.left = `${tabOffset}px`;
        }
    });

    /*section9 javascript*/
    const slider = document.querySelector('#slider');
    const sliderContent = document.querySelector('.slider-content');
    const sliderItems = document.querySelectorAll('.slider-item');
    if (slider && sliderContent && sliderItems.length > 0) {
        let currentIndex = 0;

        function showSlide(index) {
            const itemWidth = sliderItems[0].offsetWidth;
            sliderContent.style.transform = `translateX(${-index * itemWidth}px)`;
        }

        document.querySelector('#prev').addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                showSlide(currentIndex);
            }
        });

        document.querySelector('#next').addEventListener('click', () => {
            if (currentIndex < sliderItems.length - 1) {
                currentIndex++;
                showSlide(currentIndex);
            }
        });

        sliderContent.style.width = `${sliderItems.length * 34}%`;
    }


    /*section14 javascript*/
    document.addEventListener('DOMContentLoaded', function() {
        const orderNowBtn = document.getElementById('orderNowBtn');
        orderNowBtn.addEventListener('click', function() {
            const section7 = document.getElementById('section7');
            if (section7) {
                section7.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

    /*Scroll To Top javascript*/
    document.addEventListener('DOMContentLoaded', function() {
        var scrollToTopBtn = document.getElementById('scrollToTopBtn');
        var rootElement = document.documentElement;

        function handleScroll() {
            var scrollTotal = rootElement.scrollHeight - rootElement.clientHeight;
            if ((rootElement.scrollTop / scrollTotal) > 0.20) {
                scrollToTopBtn.classList.add('visible');
            } else {
                scrollToTopBtn.classList.remove('visible');
            }
        }

        function scrollToTop() {
            rootElement.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        scrollToTopBtn.addEventListener('click', scrollToTop);
        document.addEventListener('scroll', handleScroll);
    });

    /*Ai Chat javascript*/
    document.addEventListener('DOMContentLoaded', function() {
        const chatButton = document.getElementById('ai-chat-button');
        const chatWindow = document.getElementById('ai-chat-window');
        const closeChat = document.getElementById('close-chat');
        const userInput = document.getElementById('user-input');
        const sendMessage = document.getElementById('send-message');
        const chatMessages = document.getElementById('chat-messages');
        const initialContent = document.getElementById('initial-content');
        const greeting = document.getElementById('greeting');

        console.log('DOM Loaded');

        if (chatWindow) {
            chatWindow.classList.add('hidden');
        }

        if (chatButton) {
            chatButton.addEventListener('click', function() {
                console.log('Chat button clicked');
                chatWindow.classList.toggle('hidden');
                userInput.focus();
            });
        }

        if (closeChat) {
            closeChat.addEventListener('click', function() {
                console.log('Close button clicked');
                chatWindow.classList.add('hidden');
                // Reset chat when closed
                if (initialContent) initialContent.style.display = 'block';
                if (greeting) greeting.style.display = 'block';
                if (chatMessages) {
                    chatMessages.style.display = 'none';
                    chatMessages.innerHTML = '';
                }
            });
        }

        if (sendMessage) {
            sendMessage.addEventListener('click', sendUserMessage);
        }

        if (userInput) {
            userInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    sendUserMessage();
                }
            });
        }

        function sendUserMessage() {
            const message = userInput.value.trim();
            if (message) {
                console.log('Sending message:', message);

                // Hide initial content and greeting
                if (initialContent) {
                    initialContent.style.display = 'none';
                }
                if (greeting) {
                    greeting.style.display = 'none';
                }

                // Show and clear chat messages
                if (chatMessages) {
                    chatMessages.style.display = 'block';
                    chatMessages.innerHTML = ''; // Clear existing messages
                }

                addMessage('user', message);
                userInput.value = '';

                // Simulate AI response
                setTimeout(() => {
                    addMessage('ai', `You said: ${message}`);
                }, 1000);
            } else {
                console.log('Message is empty');
            }
        }

        function addMessage(sender, text) {
            if (!chatMessages) return;

            const messageElement = document.createElement('div');
            messageElement.style.width = '279px';
            messageElement.style.height = 'auto';
            messageElement.style.padding = '15px 20px';
            messageElement.style.gap = '10px';
            messageElement.style.borderRadius = '12px 0px 12px 12px';
            messageElement.style.border = '1px solid #BDBDBD';
            messageElement.style.opacity = '1';
            messageElement.style.boxShadow = '0px 4px 4px 0px rgba(0, 0, 0, 0.25)';
            messageElement.style.marginBottom = '10px';

            // Apply text styles
            messageElement.style.fontFamily = 'Roboto, sans-serif';
            messageElement.style.fontSize = '13.3px';
            messageElement.style.fontWeight = '400';
            messageElement.style.lineHeight = '19.95px';
            messageElement.style.textAlign = 'left';

            if (sender === 'user') {
                messageElement.style.background = 'linear-gradient(90deg, #4A6DCB 0%, rgba(100, 52, 147, 0.8) 100%)';
                messageElement.style.color = '#FFFFFF';
                messageElement.style.marginLeft = 'auto';
            } else {
                messageElement.style.backgroundColor = '#FFFFFF';
                messageElement.style.color = '#000000';
            }

            messageElement.textContent = text;
            chatMessages.appendChild(messageElement);

            // Auto-scroll to the bottom
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
    });
</script>
@endsection