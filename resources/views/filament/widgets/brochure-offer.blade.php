<div class="flex flex-col gap-4 p-6 border rounded-xl bg-gray-50 dark:bg-gray-900 border-primary-500">
    <div class="flex items-center gap-3">
        <x-heroicon-o-information-circle class="w-8 h-8 text-primary-600" />
        <h3 class="text-lg font-bold text-gray-900 dark:text-white">
            Penawaran Eksklusif Untuk Anda
        </h3>
    </div>

    <p class="text-gray-600 dark:text-gray-400">
        Sepertinya Anda belum mencentang persetujuan. Silakan pelajari keuntungan layanan kami melalui brosur di bawah ini.
    </p>

    <div class="flex gap-4">
        <x-filament::button
            tag="a"
            href="/path/to/brosur.pdf"
            target="_blank"
            icon="heroicon-m-arrow-down-tray">
            Unduh Brosur
        </x-filament::button>

        <x-filament::button
            tag="a"
            href="https://wa.me/{{ $contactNumber }}"
            color="success"
            icon="heroicon-m-chat-bubble-left-right">
            Hubungi Marketing
        </x-filament::button>
    </div>
</div>
