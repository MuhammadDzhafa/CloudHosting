<div class="section-frame padding-1 gap-[50px]">
    <div class="tabs-wrapper">
        <div class="tabs-inner">
            <div class="tabs">
                <ul>
                    @foreach ($faqs as $category => $items)
                        <li data-tab="{{ strtolower(str_replace(' ', '-', $category)) }}" class="{{ $loop->first ? 'is-active' : '' }}">
                            <a>
                                <i data-feather="tag"></i>
                                <span>{{ $category }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

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
