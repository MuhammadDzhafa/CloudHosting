<section class="section-frame padding-1 gap-6 md:gap-12">
    <h2 class="title-section text-center">Trusted by Over 100 Multinational Companies</h2>
    <div class="clients-row">
        @foreach([
        'bankindonesia.svg',
        'ojk.svg',
        'samsung.svg',
        'cocacola.svg',
        'pertamina.svg',
        'seagroup.svg',
        'lintasarta.svg',
        'itb.svg',
        'bri.svg',
        'hino.svg',
        ] as $logo)
        <div class="client-logo">
            <img src="{{ asset('assets/img/sponsor/' . $logo) }}" alt="{{ pathinfo($logo, PATHINFO_FILENAME) }}">
        </div>
        @endforeach
    </div>
</section>