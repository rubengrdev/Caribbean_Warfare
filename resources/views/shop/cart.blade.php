@extends('layouts.app_black')

@section('content')
<section id="shop-section">
    <div id="card-shop">
        <nav class="nav-inventory">
            <div class="location">
                <p>Shopping Cart</p>
            </div>
            <div class="history-title">
                <div>
                    <a  href="{{ route('history') }}">
                        <p>Remove All</p>
                    </a>
                </div>

            </div>
        </nav>
    </div>

</section>
<div id="shoppingcart-main">
    <div class="align-shop">
        <div class="cart-item">
            <div class="shoppingcart-image-desc">
                <img src="{{ asset('media/img/coconuts.png') }}" />
            </div>
            <div class="shoppingcart-title">
                <p>product name aaaa</p>
            </div>
            <div class="shoppingcart-amount">

                    <div class="setamount">+</div>
                    <p>2</p>
                    <div class="setamount">-</div>
            </div>
            <div class="shoppingcart-price">
                <p>2,99€</p>
            </div>
            <div class="shoppingcart-delete">
                <form method="POST" action="{{ route('user.destroy', Auth::user()) }}">
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

        <div class="cart-item">
            <div class="shoppingcart-image-desc">
                <img src="{{ asset('media/img/coconuts.png') }}" />
            </div>
            <div class="shoppingcart-title">
                <p>product name aaaa</p>
            </div>
            <div class="shoppingcart-amount">

                    <div class="setamount">+</div>
                    <p>2</p>
                    <div class="setamount">-</div>
            </div>
            <div class="shoppingcart-price">
                <p>2,99€</p>
            </div>
            <div class="shoppingcart-delete">
                <form method="POST" action="{{ route('shoppingCart.destroy', 1  ) }}">
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
        </div>
    </div>

</div>
@endsection
