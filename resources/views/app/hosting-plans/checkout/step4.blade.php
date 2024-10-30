{{-- resources/views/app/hosting-plans/checkout/step4.blade.php --}}
<div class="w-full">
    <h2 class="text-[20px] font-normal leading-[26px] text-left w-full md:w-auto lg:w-full" style="background: linear-gradient(104.31deg, rgba(100, 52, 147, 0.95) 23.63%, #4A6DCB 70.69%, #64D2F7 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
        STEP 4
    </h2>
    <h1 class="text-[32px] font-bold leading-[38.4px] text-left mt-3 mb-7">
        Addons
    </h1>

    <form id="addonsForm" class="space-y-4">
        @csrf
        <input type="hidden" name="order_id" value="{{ $order_id }}">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 mb-6">
            @forelse($addons as $addon)
            <div class="w-full h-[140px] p-4 rounded-[10px] border border-[#DEDEDE] bg-white shadow-[0px_1.75px_4px_-1px_#00000024] flex flex-col justify-between"
                data-addon-id="{{ $addon->id }}"
                data-addon-price="{{ $addon->price }}"
                data-addon-billing="{{ $addon->billing_cycle }}">

                <div class="flex justify-between items-center">
                    <span class="text-[18px] font-semibold leading-[23.4px] text-[#3C476C] truncate max-w-[200px]">
                        {{ $addon->name }}
                    </span>
                    <label class="checkbox is-outlined is-circle is-info flex-shrink-0">
                        <input type="checkbox"
                            name="selected_addons[]"
                            value="{{ $addon->id }}"
                            class="addon-checkbox"
                            {{ $addon->selected === 'yes' ? 'checked' : '' }}>
                        <span></span>
                    </label>
                </div>

                <div class="flex items-baseline">
                    <span class="text-[14px] font-normal leading-[20.3px] text-[#4A6DCB]">
                        Rp
                    </span>
                    <span class="text-[32px] font-bold leading-[38.4px] text-[#4A6DCB]">
                        {{ number_format($addon->price, 0, ',', '.') }}
                    </span>
                    <span class="text-[14px] font-normal leading-[20.3px] text-[#4A6DCB]">
                        /{{ $addon->billing_cycle }}
                    </span>
                </div>

                @if($addon->description)
                <div class="flex justify-between items-center">
                    <span class="text-gray-400 text-sm">
                        {{ $addon->description }}
                    </span>
                    <span class="text-[13px] font-semibold leading-[18.85px] text-[#6C88D5] bg-[#F5F7FF] px-2 py-1 rounded">
                        Save 30%
                    </span>
                </div>
                @endif
            </div>
            @empty
            <div class="col-span-2 text-center text-gray-500">
                No addons available at the moment.
            </div>
            @endforelse
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle continue button click
        const nextButton = document.getElementById('next-button');
        if (nextButton) {
            nextButton.addEventListener('click', async function(e) {
                e.preventDefault();

                try {
                    const formData = new FormData(document.getElementById('addonsForm'));
                    const selectedAddons = Array.from(formData.getAll('selected_addons[]'));

                    const response = await fetch('/save-addons', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        },
                        body: JSON.stringify({
                            order_id: formData.get('order_id'),
                            selected_addons: selectedAddons
                        })
                    });

                    const result = await response.json();

                    if (result.success) {
                        // Setelah berhasil menyimpan, lanjutkan ke step berikutnya
                        window.location.href = '#form-step-5'; // Ganti dengan URL atau anchor yang sesuai
                    }
                    // Hapus semua referensi pesan di sini
                } catch (error) {
                    console.error('Error:', error);
                    // Hapus pesan di sini
                }
            });
        }
    });
</script>