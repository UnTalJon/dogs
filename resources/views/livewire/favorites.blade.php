<div x-data="{
    currentFavorites: [],
    get favoriteIds() {
        try {
            const stored = localStorage.getItem('favoriteDogs');
            if (!stored) return [];
            const parsed = JSON.parse(stored);
            return Array.isArray(parsed) ? parsed : [];
        } catch (e) {
            return [];
        }
    },
    shouldShow(dogId) {
        return this.currentFavorites.includes(dogId);
    },
    init() {
        this.loadFavorites();

        window.addEventListener('favorites-changed', () => {
            this.currentFavorites = this.favoriteIds;
            this.loadFavorites();
        });

        window.addEventListener('storage', (e) => {
            if (e.key === 'favoriteDogs') {
                this.currentFavorites = this.favoriteIds;
                this.loadFavorites();
            }
        });
    },
    loadFavorites() {
        const ids = this.favoriteIds;
        this.currentFavorites = ids;
        $wire.loadFavorites(ids);
    }
}">

    @if($isLoading)
        <div style="text-align: center; padding: 3rem;">
            <flux:text>Cargando favoritos...</flux:text>
        </div>
    @else
        <x-common.card-grid>
            @foreach($dogs as $dog)
                <!-- mmanejamos la visibilidad de las cards con alpine -->
                <div
                    x-show="shouldShow({{ $dog['id'] }})"
                    x-transition
                    wire:key="dog-{{ $dog['id'] }}"
                    wire:ignore.self>
                    @include('livewire.dog-card', ['dog' => $dog])
                </div>
            @endforeach
        </x-common.card-grid>
    @endif
</div>
