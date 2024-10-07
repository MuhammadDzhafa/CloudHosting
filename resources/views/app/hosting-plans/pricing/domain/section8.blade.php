<!-- @foreach ($faqs as $category => $items)
                        <li data-tab="{{ strtolower(str_replace(' ', '-', $category)) }}" class="{{ $loop->first ? 'is-active' : '' }}">
                            <a>
                                <i data-feather="archive"></i>
                                <span>{{ $category }}</span>
                            </a>
                        </li>
                    @endforeach -->
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

<div class="section-frame padding-1 gap-[50px]" style="background: #fff;">
    <div class="tabs-wrapper">
        <h2 class="title-section text-center mb-20">
            Frequently Asked Questions
        </h2>
        @foreach ($faqs as $category => $items)
        <div id="{{ strtolower(str_replace(' ', '-', $category)) }}" class="tab-content {{ $loop->first ? 'is-active' : '' }}">
            <div class="single-accordion">
                @foreach ($items as $item)
                <div class="accordion-header">{{ $item->question }}</div>
                <div class="accordion-content">{{ $item->answer }}</div>
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