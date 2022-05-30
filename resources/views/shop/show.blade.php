@extends('layouts.app_black')

@section('content')
<div class="show-header">
    <div class="margin-header">
<nav class="nav-shop">
    <div class="location-show">
        <p>{{ $response->name }}</p>
    </div>
    <span class="bigpan"></span>
    <div class="options-show">
        <form class="form-search-show" method="GET" action="{{ route('shoppingCart.index') }}">
            @csrf

        <button type="submit" class="btn btn-primary btn-simple">
            <img src="{{ asset('media/img/icons/carrito-de-compras.png') }}" title='Go to Shopping Cart' alt="Icon from FlatIcon, created by Freepik: https://www.flaticon.es/iconos-gratis/supermercado">
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
            <form action="{{ route('inventory.store', $response)}}" method="POST">
                @method('POST')
                @csrf
                <div class="shop-now">
                <button type="submit" class="btn btn-primary btn-simple add-cart-button">
                    <div class="cart-title">
                        <p>Buy Now</p>
                    </div>

                </div>
            </button>
        </form>
            <div class="center">
                <form action="{{ route('shoppingCart.store')}}" method="POST">
                    @csrf
                    <div class="get-into-cart">
                    <input type="number" name="id" id="id" value="{{$response->id}}" style="display:none">
                    <button type="submit" class="btn btn-primary btn-simple add-cart-button">

                        <div class="options-show-cart">
                            <img src="{{ asset('media/img/icons/carrito-de-compras.png') }}" title='icon shopping cart' alt="Icon from FlatIcon, created by Freepik: https://www.flaticon.es/iconos-gratis/supermercado">
                        </div>

                    </div>
                </button>
            </form>
            </div>

    </div>
</div>
    </div>
</div>
    <script>
        let id = document.querySelector("#id");

    </script>
    </section>

@endsection

