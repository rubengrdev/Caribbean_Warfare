@extends('layouts.app_black')


@section('content')
<section id="shop-section">
    <div id="card-shop">
        <nav class="nav-shop">
            <div class="location">
                <p>Shop</p>
            </div>
            <span class="bigpan"></span>
            <div class="options-cart">
                <form class="form-search" method="POST" action="{{ route('product.search') }}">
                    @csrf
                <label>
                <input id="searchbar" type="text" class="form-control @error('search') is-invalid @enderror" name="search" value="{{ old('search') }}" required autocomplete="Find products" autofocus>
            </label>    
                <button type="submit" class="btn btn-primary btn-simple">
                    <img src="{{ asset('media/img/icons/lupa.png') }}" title='icon lupa' alt="Icon from FlatIcon: https://www.flaticon.es/iconos-gratis/lupa">
                </button>
            </form>
                <span class="separator"></span>
                <a class="form-search" href="{{ route('shoppingCart.index') }}">


                        <button type="submit" class="btn btn-primary btn-simple">
                            <img src="{{ asset('media/img/icons/carrito-de-compras.png') }}" title='Go to Shopping Cart' alt="Icon from FlatIcon, created by Freepik: https://www.flaticon.es/iconos-gratis/supermercado">
                        </button>

            </a>
            </div>
        </nav>
        <article>
            @if($errors->any())
            <div class="center-shop">
                <div>
                    <p>{{$errors->first()}}</p>
                </div>
            </div>
            @endif

            @if (session('success'))
                <div class="center-cart-ok">
                    <div role="alert">
                        <p>{{ session('success') }}</p>
                    </div>
                </div>
            @endif
        </article>

        <article id="portal-shop">

                <img alt="promotion banner caribbean warfare" src="{{ asset('media/img/skins/blas-de-lezo/portal-big-blas-de-lezo-picture-of-bundle-caribbean-warfare-skin-pack-v2.jpg') }}">
                <div class="content-text">
                    <p class="title-header">Blas de Lezo Bundle</p>
                    <p class="price-header">7.99€</p>
                    <button class="btn-simple border" onclick="window.location='{{ route('shop.show', ['shop'=>2])}}'">
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
                    <a href="{{ route('all') }}">
                        <p>View All</p>
                    </a>
                </div>
            </div>
            <div id="grid-shop">
                {{-- {{dd($products)}} --}}
                @foreach($products as $product)

                    <div class="grid-item">
                        <a onclick="window.location='{{ route('shop.show', $product->id)}}'">
                        <div class="product-image">

                                <img alt="product caribbean warfare" src={{ asset( $product->image ) }}>

                        </div>
                        <div class="product-sect">
                        <div class="product-info">
                            <div class="product-title">
                                <p>{{ $product->name }}</p>
                                <p>{{ $product->price }}</p>
                            </div>
                            <div class="product-shopping">
                                <form action="{{ route('shoppingCart.store')}}" method="POST">
                                    @csrf
                                    <input type="number" name="id" id="id" value="{{$product->id}}" style="display:none">
                                    <button type="submit" class="btn btn-primary btn-simple">
                                        <img src="{{ asset('media/img/icons/carrito-de-compras.png') }}" title='icon shopping cart' alt="Icon from FlatIcon, created by Freepik: https://www.flaticon.es/iconos-gratis/supermercado">
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                        <form>
                            <input type="hidden" value="{{ $product->id }}">
                        </form>
                        <span class="grid-item-space"></span>
                    </a>
                    </div>
                @endforeach
            </div>

            </div>
        </article>
    </div>
</section>



@endsection
