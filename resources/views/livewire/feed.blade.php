<x-common.card-grid>
    @foreach($dogs as $dog)
        <livewire:dog-card :key="$dog['id']" :$dog/>
    @endforeach
</x-common.card-grid>
