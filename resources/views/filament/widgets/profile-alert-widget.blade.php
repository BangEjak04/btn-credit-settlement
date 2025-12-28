<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex items-center gap-x-4">
            <div class="p-3 bg-danger-500/10 rounded-full">
                <x-heroicon-o-exclamation-triangle class="w-8 h-8 text-danger-600" />
            </div>

            <div class="flex-1">
                <h2 class="text-xl font-bold tracking-tight text-gray-950 dark:text-white">
                    {{ __('Profil Belum Lengkap!') }}
                </h2>
                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Mohon lengkapi data informasi pribadi Anda sebelum membuat pengajuan baru untuk mempercepat proses verifikasi.') }}
                </p>
            </div>

            <x-filament::button
                color="danger"
                tag="a"
                href="{{ \Jeffgreco13\FilamentBreezy\Pages\MyProfilePage::getUrl() }}"
                icon="heroicon-m-user">
                {{ __('Lengkapi Profil') }}
            </x-filament::button>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
