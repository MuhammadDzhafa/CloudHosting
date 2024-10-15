@extends('layouts.template-landing-page.web.master')

@section('cloud-hosting')
@include('app.hosting-plans.pricing.cloud-hosting.section1')
@include('app.hosting-plans.pricing.cloud-hosting.section2')
@include('app.hosting-plans.pricing.cloud-hosting.section3')
@include('app.hosting-plans.pricing.cloud-hosting.section4')
@include('app.hosting-plans.pricing.cloud-hosting.section5')
@include('app.hosting-plans.pricing.cloud-hosting.section6')
@endsection

<script>
    /*
    ========================================================
                        Section6 - Javascript
    ========================================================
    */
    document.addEventListener('DOMContentLoaded', function() {
        // Elemen-elemen slider
        const storageSlider = document.getElementById('storage-slider');
        const ramSlider = document.getElementById('ram-slider');
        const cpuSlider = document.getElementById('cpu-slider');
        const totalPriceElement = document.getElementById('total-price');
        const storageValue = document.getElementById('storage-value');
        const storagePrice = document.getElementById('storage-price');
        const ramValue = document.getElementById('ram-value');
        const ramPrice = document.getElementById('ram-price');
        const cpuValue = document.getElementById('cpu-value');
        const cpuPrice = document.getElementById('cpu-price');

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

        // Fungsi untuk memperbarui total harga
        function updateTotalPrice() {
            const selectedStorage = storageOptions[storageSlider.value].price;
            const selectedRam = ramOptions[ramSlider.value].price;
            const selectedCpu = cpuOptions[cpuSlider.value].price;

            // Hitung total harga
            const totalPrice = selectedStorage + selectedRam + selectedCpu;

            // Update tampilan total harga
            totalPriceElement.textContent = `${totalPrice.toLocaleString('id-ID')}`;
        }

        // Fungsi untuk memperbarui nilai slider Storage
        function updateStorage() {
            const selectedOption = storageOptions[storageSlider.value];
            storageValue.textContent = selectedOption.value;
            storagePrice.textContent = `IDR ${selectedOption.price.toLocaleString('id-ID')}/mon`;
        }

        // Fungsi untuk memperbarui nilai slider RAM
        function updateRam() {
            const selectedOption = ramOptions[ramSlider.value];
            ramValue.textContent = selectedOption.value;
            ramPrice.textContent = `IDR ${selectedOption.price.toLocaleString('id-ID')}/mon`;
        }

        // Fungsi untuk memperbarui nilai slider CPU
        function updateCpu() {
            const selectedOption = cpuOptions[cpuSlider.value];
            cpuValue.textContent = selectedOption.value;
            cpuPrice.textContent = `IDR ${selectedOption.price.toLocaleString('id-ID')}/mon`;
        }

        // Set event listener untuk update harga
        storageSlider.addEventListener('input', function() {
            updateStorage();
            updateTotalPrice();
        });
        ramSlider.addEventListener('input', function() {
            updateRam();
            updateTotalPrice();
        });
        cpuSlider.addEventListener('input', function() {
            updateCpu();
            updateTotalPrice();
        });

        // Set nilai awal
        updateStorage();
        updateRam();
        updateCpu();
        updateTotalPrice();
    });
</script>