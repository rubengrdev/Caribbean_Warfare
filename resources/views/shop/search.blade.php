@extends('layouts.app_black')

@section('content')
<section id="search-results">
    <div id="card">
        <nav class="nav-shop">
            <div class="location">
                <p class="search-result">Results</p>
            </div>
            <span class="bigpan"></span>
            <div class="options">
                <a class="js-button-drop-search">
                    <img src="{{ asset('media/img/icons/lupa.png') }}" title='icon lupa' alt="Icon from FlatIcon: https://www.flaticon.es/iconos-gratis/lupa">
                </a>
                <form class="form-search search-result-form" method="POST" action="{{ route('product.search') }}">
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
                                <img alt="caribbean warfare product image" src={{ asset( $product->image ) }}>
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
<script>
        let searchbuttonresponsive = document.querySelector(".js-button-drop-search");
        let formsearch = document.querySelector(".form-search");
        let title = document.querySelector(".location");
        let options = document.querySelector(".options");

        searchbuttonresponsive.addEventListener("click", ()=>{
            formsearch.style.display = "flex";
            title.style.display = "none";
            searchbuttonresponsive.style.display = "none";
            options.style.display = "flex";
            options.style.justifyContent = "center";
            options.style.alignItems = "center";
        });
</script>
@endsection
