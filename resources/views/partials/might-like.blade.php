<div class="might-like-section">
    <div class="container">
        <h2>Tal vez le interese...</h2>
        <div class="might-like-grid product text-center">
            @forelse ($mightAlsoLike as $product)
                <ul>
                <li><a href="{{ route('machine.show', [ 'machine' => $machine->slug, 'product' => $product->slug ]) }}">{{ $product->name }}</a></li>
                </ul>
            @empty
                <div style="text-align: left">No se encontraron items</div>
            @endforelse
        </div>
    </div>
</div>
