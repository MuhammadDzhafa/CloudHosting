<section class="section-frame padding-1 gap-6 md:gap-12">
    <h2 class="title-section text-center">Trusted by Over 100 Multinational Companies</h2>
    <div class="clients-row">
        @foreach([
            'BANK INDONESIA.svg',
            'OJK.svg',
            'SAMSUNG.svg',
            'COCA COLA.svg',
            'PERTAMINA.svg',
            'SEA GROUP.svg',
            'LINTASARTA.svg',
            'SBM ITB.svg',
            'BRI.svg',
            'HINO.svg',
            'BCA.svg',
            'TELKOM.svg'] as $logo)
            <div class="client-logo">
                <img src="{{ asset('assets/img/sponsor/' . $logo) }}" alt="{{ pathinfo($logo, PATHINFO_FILENAME) }}">
            </div>
        @endforeach
    </div>
</section>