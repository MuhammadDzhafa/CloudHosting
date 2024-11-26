<section class="section-frame padding-1 gap-6 md:gap-12">
    <h2 class="title-section text-center">Trusted by Over 100 Multinational Companies</h2>
    <div class="clients-row">
        @foreach([
        'bank-indonesia.png',
        'logo-ojk.png',
        'logo-samsung.png',
        'cocacola.png',
        'logo-pertamina.png',
        'seagroup.png',
        'lintasarta.png',
        'itb.png',
        'logo-bri.png',
        'logo-hino.png',
        ] as $logo)
        <div class="client-logo 
        @if($logo == 'lintasarta.png' || $logo == 'logo-hino.png') elevate-logo 
        @elseif($logo == 'seagroup.png') lower-logo @endif">
            <img src="{{ asset('assets/img/sponsor/' . $logo) }}" alt="{{ pathinfo($logo, PATHINFO_FILENAME) }}">
        </div>
        @endforeach
    </div>
</section>