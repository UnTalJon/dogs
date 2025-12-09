<style>
    .card-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.5rem;
    }

    @media (min-width: 768px) {
        .card-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 2rem;
        }
    }

    @media (min-width: 1024px) {
        .card-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }
</style>
<div class="card-grid">
    {{ $slot }}
</div>
