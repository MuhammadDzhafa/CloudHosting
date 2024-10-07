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
        </div>

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
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.tabs li');
        const tabContents = document.querySelectorAll('.tab-content');

        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                tabs.forEach(t => t.classList.remove('is-active'));
                tabContents.forEach(content => {
                    content.classList.remove('is-active');
                    content.style.display = 'none';
                });

                tab.classList.add('is-active');
                const activeTabContentId = tab.getAttribute('data-tab');
                const activeTabContent = document.getElementById(activeTabContentId);
                activeTabContent.classList.add('is-active');
                activeTabContent.style.display = 'block';
            });
        });
    });
</script>
