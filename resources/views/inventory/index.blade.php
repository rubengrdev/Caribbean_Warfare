@extends('layouts.app_black')

@section('content')
<section id="shop-section">
    <div id="card-shop">
        <nav class="nav-inventory">
            <div class="location">
                <p>Inventory</p>
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
    </div>
</section>



@endsection
