@extends('layouts.app_black')

@section('content')
<div class="show-header">
    <div class="margin-header">
<nav class="nav-shop">
    <div class="location">
        <p>{{ $response->name }}</p>
    </div>
    <span class="bigpan"></span>
    <div class="options">
        <form class="form-search-show" method="GET" action="{{ route('login') }}">
            @csrf

        <button type="submit" class="btn btn-primary btn-simple">
            <img src="{{ asset('media/img/icons/carrito-de-compras.png') }}" title='icon shopping cart' alt="Icon from FlatIcon, created by Freepik: https://www.flaticon.es/iconos-gratis/supermercado">
        </button>
    </form>
    </div>
</nav>
</div>
</div>
<section id="show-margin">

<div id="view-product">
    <div id="image-box">
        <img id="product-img" src="{{" ../".$response->image }}">
    </div>

    <div id="desc-box">

    <div class="responsive-text">

        <p class="text">{{ $response->description }}</p><br>
        <p>Category</p>
        <p class="type-item">{{ $response->category }}</p>
    </div>
    <div id="buy-options">

        <div class="cart-box">
            <div class="price">
                <p>Price</p>
                <p class="price-num">{{ $response->price }}</p>
            </div>

            <form>
                <input type="hidden" value="{{ $response->discount }}">
            </form>
            <span class="separate-price"></span>
            <div class="center">
            <div class="get-into-cart">
                <div class="cart-title">
                    <p> Add to cart</p>
                </div>
                <div class="options-show">
                    <form class="form-search-show" method="GET" action="{{ route('login') }}">
                        @csrf

                    <button type="submit" class="btn btn-primary btn-simple">
                        <img src="{{ asset('media/img/icons/carrito-de-compras.png') }}" title='icon shopping cart' alt="Icon from FlatIcon, created by Freepik: https://www.flaticon.es/iconos-gratis/supermercado">
                    </button>
                </form>
                </div>
            </div>
            </div>

    </div>
</div>
    </div>
</div>

    </section>
    <script src="{{ asset('js/admin.js')}}"></script>
@endsection

