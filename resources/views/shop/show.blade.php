@extends('layouts.app_black')
@section('content')
<div class="show-header">
    <div class="margin-header">
<nav class="nav-shop">
    <div class="location-show">
        <p>{{ $response->name }}</p>
    </div>
    <span class="bigpan"></span>
    @if (Auth::user()->role_id == 2)
    <div class="options-cart">
        <a href="{{ route('shop.edit', $response->id) }}">
        <img src="{{ asset('media/img/icons/edit.png') }}" alt="https://www.flaticon.es/iconos-gratis/editar Editar iconos creados por Kiranshastry">
        </a>
    </div>
    @endif

</nav>
</div>
</div>
<section id="show-margin">

<div id="view-product">
    <div id="image-box">
        <img id="product-img" src="{{asset($response->image) }}">
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
            @if($response->available == 1)
            <form action="{{ route('inventory.add')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary btn-simple add-cart-button">
                <div class="shop-now">
                    <input type="hidden" name="product" id="id" value="{{$response}}" style="display:none">

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
            @else
            <div class="shop-now">

            <button class="btn btn-primary btn-simple add-cart-button">
                <div class="cart-title">
                    <p>Not available</p>
                </div>

            </div>
            @endif
    </div>
</div>
    </div>
</div>
    <script>
        let id = document.querySelector("#id");

    </script>
    </section>

@endsection

