@extends('layouts.app_black')
@section('content')
<section id="shop-section">
    <div id="card-shop">
        <nav class="nav-inventory">
            <div class="location">
                <p>Inventory</p>
            </div>
            <div class="history-title">
                <p>Shopping history</p>
            </div>
        </nav>
    </div>

</section>
<section id="inventory">
    <div id="inventory-card">
        <div id="avatars">
            <p>Avatars</p>
            <div id="inventory-grid">
                @foreach($items as $item)
                @if($item->category == "avatar")

                <div class="inventory-item">
                    <img src="{{ $item->image }}">
                    <form>
                        <input type="hidden" class="inventory-item-blade" value="{{ json_encode($item) }}">
                    </form>
                </div>
                @endif
                @endforeach
            </div>

        </div>
        <span></span>
        <div id="skins">
            <p>Skins</p>
            <div id="inventory-grid">
                @foreach($items as $item)
                @if($item->category == "skin")

                <div class="inventory-item">
                    <img src="{{ $item->image }}">
                    <form>
                        <input type="hidden" class="inventory-item-blade" value="{{ json_encode($item) }}">
                    </form>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <span></span>
        <div id="description">

            <div class="description-inventory">
                <div class="desc-head">
                    <div class="desc-image">
                        <img src="{{ asset('media/img/coconuts.png') }}">
                    </div>
                    <div class="desc-title">
                        <p>Spanish Galeon Skin</p>
                    </div>
                </div>
                <div class="desc-body">
                    <p>This is a description about my items ajdja sjdasjd jkadkjasjkdjks ajksajkjasjd</p>
                </div>
                <div class="desc-options">
                  <form method="POST" action="{{ route('inventory.update', 1) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" value="" name="id" class="hidden-input">
                    <button type="submit" class="btn btn-primary btn-action">
                        <p>{{ __('Equip') }}</p>
                    </button>
                  </form>
                </div>
            </div>
        </div>

</div>
</section>
<script>

    let inventoryitem = document.querySelectorAll(".inventory-item");
    inventoryitem.forEach(item => {
        //si le da click  a uno de los items obtenemos su JSON
        item.addEventListener("click", ()=>{
            let itemData = JSON.parse(item.children[1].children[0].value);
            //en el caso que haya hecho click en ESTA imagen en específico
                    //asignamos los valores de PHP Blade a los datos de la descripción del item:
                    let descimg = document.querySelector(".desc-image img");
                    //cambiamos el atributo con la ruta de php del item seleccionado
                    descimg.setAttribute("src", itemData.image);
                    //cambiamos el titulo del objeto seleccionado
                    let desctitle = document.querySelector(".desc-title p");
                    desctitle.textContent = itemData.name;
                    let descbody = document.querySelector(".desc-body p")
                    descbody.textContent = itemData.description;
                    //agregamos el valor que pasaremos por ID al mediante el formulario hidden, cuando pulse el botón de equipar enviará un Request al método Update
                    let hiddeninput = document.querySelector(".hidden-input");
                    hiddeninput.value = itemData.product_id;
        })
    });
</script>

@endsection
