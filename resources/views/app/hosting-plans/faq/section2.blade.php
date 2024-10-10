@php
    $icons = [
        'Domain' => 'globe',
        'Cloud Hosting' => 'monitor',
        'WordPress Hosting' => 'monitor',
        'Server' => 'server',
        'Payment' => 'credit-card',
        'Security' => 'shield',
        'Hosting' => 'credit-card',
        'Optimization' => 'cloud-lightning',
        'Data' => 'database'
    ];
@endphp

<div class="tabs-wrapper section-frame padding-1" style="background: #fff; padding-top:20px">

    <div class="account-wrapper">
        <div class="columns">
            <div class="column is-4">
                <div class="account-box is-navigation">
                    <div class="account-menu">
                        @foreach ($faqs as $category => $items)
                            @php
                                $icon = isset($icons[$category]) ? $icons[$category] : 'tag';
                            @endphp
                            <a href="#{{ strtolower(str_replace(' ', '-', $category)) }}"
                                class="account-menu-item text-[#3151AA] {{ $loop->first ? 'is-active' : '' }}">
                                <i data-feather="{{ $icon }}" width="16" height="16" style="margin-right:8px; color:#671cc9"></i>
                                <span>{{ $category }}</span>
                                <span class="end">
                                    <i aria-hidden="true" class="fas fa-arrow-right"></i>
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="column is-8">
                <div class="account-box is-footerless">
                    <div class="form-body">

                        <!--Fieldset-->
                        @foreach ($faqs as $category => $items)
                            <div id="{{ strtolower(str_replace(' ', '-', $category)) }}" class="fieldset">
                                <div class="fieldset-heading">
                                    <div class="single-accordion">
                                        @foreach ($items as $item)
                                            <div class="accordion-header">{{ $item->question }}</div>
                                            <div class="accordion-content">{{ $item->answer }}</div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Select all anchors inside account-menu
    const menuItems = document.querySelectorAll('.account-menu-item');
    const contentSections = document.querySelectorAll('.fieldset');

    // Hide all sections initially
    contentSections.forEach(section => section.style.display = 'none');

    // Set up default visible section (first one)
    const defaultSection = document.querySelector('.fieldset');
    if (defaultSection) {
        defaultSection.style.display = 'block';  // Ensure the first section is visible by default
    }

    menuItems.forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault();

            // Remove active class from all menu items
            menuItems.forEach(link => link.classList.remove('is-active'));

            // Add active class to the clicked menu item
            this.classList.add('is-active');

            // Hide all content sections
            contentSections.forEach(section => section.style.display = 'none');

            // Get the target section based on the href of the clicked anchor
            const targetId = this.getAttribute('href');
            const targetSection = document.querySelector(targetId);

            // Show the corresponding section
            if (targetSection) {
                targetSection.style.display = 'block';
            }
        });
    });
</script>