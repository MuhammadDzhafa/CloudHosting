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

<div class="section-frame padding-1 gap-[50px]">
    <div class="tabs-wrapper">
        <div class="tabs-inner">
            <div class="tabs">
                <ul>
                    @foreach ($faqs as $category => $items)
                        <li data-tab="{{ strtolower(str_replace(' ', '-', $category)) }}" class="{{ $loop->first ? 'is-active' : '' }}">
                            <a>
                                <i data-feather="{{ $icons[$category] ?? 'default-icon' }}"></i>
                                <span>{{ $category }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="column is-8">
                <div class="account-box is-footerless">
                    <div class="form-body">

        @foreach ($faqs as $category => $items)
            <div id="{{ strtolower(str_replace(' ', '-', $category)) }}" class="tab-content {{ $loop->first ? 'is-active' : '' }}" style="{{ $loop->first ? 'display: block;' : 'display: none;' }}">
                <div class="single-accordion">
                    @foreach ($items as $index => $item)
                        <div class="accordion-header {{ $index === 0 ? 'is-active' : '' }}">{{ $item->question }}</div>
                        <div class="accordion-content" style="{{ $index === 0 ? 'display: block;' : 'display: none;' }}">
                            {{ $item->answer }}
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

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
