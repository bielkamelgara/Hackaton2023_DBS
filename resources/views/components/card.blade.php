@include('components.card-skeleton')

<div class="card real-card" style="display: none">
    <div class="img-card">
        <input type="checkbox" id="swich-3">
        <label for="swich-3" class="heart-card">
            <i class="fi fi-rr-heart"></i>
            <i class="fi fi-sr-heart"></i>
        </label>
        <a href="{{ Route('show/post', ['id' => $product->id]) }}"><img src="{{ $product->url() }}"
                alt="{{ $product->name }}"></a>
    </div>
    <div class="cont-card">
        <div class="perfil-cont">
            <div class="perfil-card">
                <img src="{{ asset('img\Cardoza.png') }}">
            </div>
            <a href="{{ Route('index/profile') }}"
                class="name-card">{{ Str::limit($post->userFirstAndLastName, 16) }}</a>
        </div>
        <p class="time-card">{{ Str::limit($post->created_at->diffForHumans(), 16) }}</p>
    </div>
    <div class="cont-card">
        <h2 class="tl-card">{{ Str::limit($post->name, 16, '...') }}</h2>
        <div class="cash-card">
            <p>
            <p class="cord">{{ $post->currency()->simbol }}</p>
            {{ $post->price }}
            <p class="cord">.99</p>{{ $post->measureUnit()->simbol }}</p>
        </div>
    </div>
    <p class="info-card">{{ Str::limit($post->description, 32, '...') }}</p>

    @if (Route::currentRouteName() == 'index/post')
        <div class="cont-card">
            <a href="{{ route('edit/post', ['id' => $post->id]) }}" class="btn-card">Editar</a>
            <a href="{{ route('delete/post', ['id' => $post->id]) }}" style="color: inherit;"
                onclick="return confirm('¿Estás seguro de que deseas borrar este post?')">Eliminar</a>
        </div>
    @endif

    <style>
        .btn-card {
            background-color: #F2F2F2;
            border-radius: 10px;
            padding: 5px 10px;
            margin: 0 5px;
            font-size: 14px;
            color: #000;
            text-decoration: none;
        }

        .btn-card:hover {
            background-color: #E0E0E0;
        }
    </style>
</div>
