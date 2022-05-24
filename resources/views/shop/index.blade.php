@extends('layouts.app_black')


@section('content')
<section id="shop-section">
    <div id="card-shop">
        <nav class="nav-shop">
            <div class="location">
                <p>Shop</p>
            </div>
            <span class="bigpan"></span>
            <div class="options">
                <form class="form-search" method="POST" action="{{ route('login') }}">
                    @csrf
                <input id="searchbar" type="text" class="form-control @error('search') is-invalid @enderror" name="search" value="{{ old('search') }}" required autocomplete="Find products" autofocus>

                <button type="submit" class="btn btn-primary btn-simple">
                    <img src="{{ asset('media/img/icons/lupa.png') }}" title='icon lupa' alt="Icon from FlatIcon: https://www.flaticon.es/iconos-gratis/lupa">
                </button>
            </form>
                <span class="separator"></span>
                <form class="form-search" method="GET" action="{{ route('login') }}">
                    @csrf

                <button type="submit" class="btn btn-primary btn-simple">
                    <img src="{{ asset('media/img/icons/carrito-de-compras.png') }}" title='icon shopping cart' alt="Icon from FlatIcon, created by Freepik: https://www.flaticon.es/iconos-gratis/supermercado">
                </button>
            </form>
            </div>
        </nav>
        <article id="portal-shop">

                <img src="{{ asset('media/img/skins/blas-de-lezo/portal-big-blas-de-lezo-picture-of-bundle-caribbean-warfare-skin-pack-v2.jpg') }}">
                <div class="content-text">
                    <p class="title-header">Blas de Lezo Bundle</p>
                    <p class="price-header">7.99€</p>
                    <button class="btn-simple border" onclick="window.location='{{ route('shop.show', ['shop'=>1])}}'">
                        <p><strong>View Product</strong></p>
                    </button>
                </div>

        </article>
        <article id="last-shop">

            <div class="all-list">
                <div class="all-title">
                    <p>Last items</p>
                </div>
                <div class="all-filter">
                    <button type="submit" class="btn btn-primary btn-simple">
                        <p>View All</p>
                    </button>
                </div>
            </div>
            <div id="grid-shop">
                @foreach($products as $product)
                    <div class="grid-item">
                        <div class="product-image">
                            <a onclick="window.location='{{ route('shop.show', ['shop'=>$product->id])}}'">
                                <img src={{ asset('media/img/skins/blas-de-lezo/blas-de-lezo-template-image-small-caribbean-warfare-render-skin-buy.png') }}>
                            </a>
                        </div>
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
                        <form>
                            <input type="hidden" value="{{ $product->id }}">
                        </form>
                    </div>
                @endforeach
            </div>

            </div>
        </article>
    </div>
</section>



@endsection
