<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .dog-detail {
        max-width: 1200px;
        margin: 0 auto;
        background-color: white;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }

    .hero-image {
        width: 100%;
        height: 400px;
        object-fit: cover;
    }

    .detail-content {
        padding: 2rem;
    }

    .detail-header {
        border-bottom: 2px solid #e5e5e5;
        padding-bottom: 1.5rem;
        margin-bottom: 2rem;
    }

    .name-age-container {
        display: flex;
        justify-content: space-between;
        align-items: baseline;
        margin-bottom: 1rem;
    }

    .dog-name {
        font-size: 2.5rem;
        font-weight: 700;
        color: #171717;
    }

    .dog-age {
        font-size: 1.25rem;
        color: #737373;
        font-weight: 500;
    }

    .quick-info {
        display: flex;
        gap: 2rem;
        flex-wrap: wrap;
        color: #525252;
    }

    .info-item {
        display: flex;
        flex-direction: column;
        gap: 0.25rem;
    }

    .info-label {
        font-size: 0.875rem;
        color: #737373;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .info-value {
        font-size: 1.125rem;
        font-weight: 600;
        color: #171717;
    }

    .tags-section {
        margin-bottom: 2rem;
    }

    .section-title {
        font-size: 1.25rem;
        font-weight: 600;
        color: #171717;
        margin-bottom: 1rem;
    }

    .tags-container {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .tag {
        background-color: #e5e5e5;
        color: #525252;
        padding: 0.5rem 1rem;
        border-radius: 9999px;
        font-size: 0.875rem;
        font-weight: 500;
    }

    .description-section {
        margin-bottom: 2rem;
    }

    .description-text {
        font-size: 1rem;
        color: #404040;
        line-height: 1.8;
    }

    .location-section {
        margin-bottom: 2rem;
    }

    .location-address {
        font-style: normal;
        color: #525252;
        font-size: 1rem;
        line-height: 1.8;
    }

    .location-address p {
        margin-bottom: 0.5rem;
    }

    .adopt-btn {
        width: 100%;
        padding: 1rem 2rem;
        border-radius: 0.5rem;
        font-size: 1.125rem;
        font-weight: 600;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    @media (max-width: 768px) {
        body {
            padding: 1rem;
        }

        .hero-image {
            height: 300px;
        }

        .detail-content {
            padding: 1.5rem;
        }

        .dog-name {
            font-size: 2rem;
        }

        .quick-info {
            gap: 1rem;
        }
    }
</style>

<div>

    <article class="dog-detail">
        <img src="{{ asset('images/dog.webp') }}"
             alt="{{ $dog['name'] }}"
             class="hero-image">

        <div class="detail-content">
            <header class="detail-header">
                <div class="name-age-container">
                    <h1 class="dog-name">{{ $dog['name'] }}</h1>
                    <span class="dog-age">{{ $dog['age']}} {{ $dog['age'] == 1 ? 'año' : 'años' }}</span>
                </div>

                <div class="quick-info">
                    <div class="info-item">
                        <span class="info-label">Tamaño</span>
                        <span class="info-value">{{ $dog['size'] }} cm</span>
                    </div>
                </div>
            </header>

            <section class="tags-section">
                <h2 class="section-title">Características</h2>
                <div class="tags-container">
                    <span class="tag">Peludo</span>
                    <span class="tag">Vacunado</span>
                    <span class="tag">Esterilizado</span>
                </div>
            </section>

            <section class="description-section">
                <h2 class="section-title">Sobre {{ $dog['name'] }}</h2>
                <p class="description-text">
                    {{ $dog['description'] }}
                </p>
            </section>

            <section class="location-section">
                <h2 class="section-title">Ubicación</h2>
                <address class="location-address">
                    <p><strong>Xalapa, Veracruz</strong></p>
                </address>
            </section>

            <flux:button @class('adopt-btn') variant="primary">
                Quiero Adoptarlo
            </flux:button>
        </div>
    </article>

</div>
