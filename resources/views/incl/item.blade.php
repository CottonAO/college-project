<div class="row">
    @foreach ($items as $i)
    <div class="col-4">
        <a href="{{ route('item', ['id' => $i->id]) }}">
            <div class="card shadow-sm">
                <div class="img" style="background: url({{ $i->img }}) center center no-repeat; background-size: cover;"></div>
                <div class="card-body">
                    <h5 class="text-black">{{ $i->model }} {{ $i->name }}</h5>
                    <div class="d-flex justify-content-between align-items-center">
                        <small class="text-muted">{{ $i->price }} руб.</small>
                        <div class="btn-group">
                            <a href="{{ route('item', ['id' => $i->id]) }}" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>