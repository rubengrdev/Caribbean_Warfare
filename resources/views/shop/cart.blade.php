@extends('layouts.app_black')

@section('content')
<section id="shop-section">
    <div id="card-shop">
        <nav class="nav-cart">
            <div class="location">
                <p>Cart</p>
            </div>
            <div class="history-title">
                <div>
                    <a  href="{{ route('shoppingCart.removeAll') }}">
                        <p>Remove All</p>
                    </a>
                </div>

            </div>
        </nav>
    </div>

</section>
<div id="shoppingcart-main">
    <div class="align-shop">
        @foreach ($products as $product)
        <div class="cart-item">
            <div class="shoppingcart-image-desc">
                <img src="{{ $product->image }}" />
            </div>
            <div class="shoppingcart-title">
                <p>{{ $product->name }}</p>
            </div>
            <div class="shoppingcart-amount">

                    <div class="setamount">+</div>
                    <p>{{ $amounts[$loop->index] }}</p>
                    <div class="setamount">-</div>
            </div>
            <div class="shoppingcart-price">
                <p>{{ $product->price }}€</p>
            </div>
            <span class="grid-cart-hidden">

            </span>
            <div class="shoppingcart-delete">
                <form method="POST" action="{{ route('shoppingCart.destroy', $product->id) }}">
                    @method('DELETE')
                    @csrf

                    <div class="form-group row mb-0  button-div">
                        <div class="col-md-6 offset-md-4 button-div">
                            <button type="submit" class="btn btn-primary btn-action red">
                                <p>{{ __('Delete') }}</p>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endforeach
            <hr>
            <div class="align-right-cart">
                <form>
                    <button type="submit" class="buy-all-cart">
                        <p>Buy Items</p>
                    </button>
                </form>
            </div>
        </div>

    </div>

</div>
@endsection
