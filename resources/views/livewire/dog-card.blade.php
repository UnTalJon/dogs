<style>
    .card {
        background-color: white;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        transition: box-shadow 0.3s;
    }

    .card:hover {
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }

    .card-image-container {
        overflow: hidden;
    }

    .card-image {
        width: 100%;
        height: 256px;
        object-fit: cover;
        transition: transform 0.5s;
    }

    .card:hover .card-image {
        transform: scale(1.05);
    }

    .card-content {
        padding: 1.5rem;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.75rem;
    }

    .card-name {
        font-size: 1.5rem;
        font-weight: 700;
        color: #171717;
    }

    .card-age {
        font-size: 0.875rem;
        color: #737373;
    }

    .card-breed {
        color: #525252;
        margin-bottom: 1rem;
    }

    .card-city {
        color: #525252;
        margin-bottom: 1rem;
    }

    .card-tags {
        display: flex;
        gap: 0.5rem;
        margin-bottom: 1rem;
    }

    .tag {
        background-color: #e5e5e5;
        color: #525252;
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 0.75rem;
        font-weight: 500;
    }

    .card-description {
        font-size: 0.875rem;
        line-height: 1.5;
        margin-bottom: 1.5rem;
        max-lines: 5;
        height: 1.5rem;
    }

    .adopt-btn {
        width: 100%;
        padding: 1rem;
    }
</style>
<div class="card">
    <div class="card-image-container">
        <img src="{{ $dog['photo_url'] ?? asset('images/dog.webp') }}"
             alt="{{$dog['name'] }}"
             class="card-image">
    </div>
    <div class="card-content">
        <div class="card-header">
            <h2 class="card-name">{{ $dog['name'] }}</h2>
            <span class="card-age">{{ $dog['age'] }} {{ $dog['age'] === 1 ? 'año' : 'años' }}</span>
        </div>
        <p class="card-breed">Tamaño: {{ $dog['size'] }} cm</p>
        <p class="card-city">Ciudad: Xalapa</p>
        <div class="card-tags">
            <span class="tag">peludo</span>
        </div>

        <flux:button @class('adopt-btn')
                     variant="primary"
                     href="{{ route('dog-detail', ['id' => $dog['id']]) }}">Detalles</flux:button>
    </div>
</div>
