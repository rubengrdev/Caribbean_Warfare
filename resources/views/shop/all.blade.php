@extends('layouts.app_black')

@section('content')
<section id="search-results">
    <div id="card">
        <nav class="nav-shop">
            <div class="location">
                <p>All Items</p>
            </div>
            <span class="bigpan"></span>
            <div class="options">
                <form class="form-search" method="POST" action="{{ route('product.search') }}">
                    @csrf
                <input id="searchbar" type="text" class="form-control @error('search') is-invalid @enderror" name="search" value="{{ old('search') }}" required autocomplete="Find products" autofocus>

                <button type="submit" class="btn btn-primary btn-simple">
                    <img src="{{ asset('media/img/icons/lupa.png') }}" title='icon lupa' alt="Icon from FlatIcon: https://www.flaticon.es/iconos-gratis/lupa">
                </button>
            </form>
            </div>
        </nav>
            <span class="separation-search"></span>
            <div id="grid-shop">
                @foreach($products as $product)
                    <div class="grid-item">
                        <div class="product-image">
                            <a onclick="window.location='{{ route('shop.show', ['shop'=>$product->id])}}'">
                                <img src={{ asset('media/img/skins/blas-de-lezo/blas-de-lezo-template-image-small-caribbean-warfare-render-skin-buy.png') }}>
                            </a>
                        </div>
                        <div class="product-sect">
                        <div class="product-info">
                            <div class="product-title">
                                <p>{{ $product->name }}</p>
                                <p>{{ $product->price }}</p>
                            </div>
                            <div class="product-shopping">
                                <button type="submit" class="btn btn-primary btn-simple">
                                    <img src="{{ asset('media/img/icons/carrito-de-compras.png') }}" title='icon shopping cart' alt="Icon from FlatIcon, created by Freepik: https://www.flaticon.es/iconos-gratis/supermercado">
                                </button>
                            </div>

                        </div>
                    </div>
                        <form>
                            <input type="hidden" value="{{ $product->id }}">
                        </form>
                    </div>
                @endforeach
            </div>



    </div>

</section>
@endsection
