@extends('layouts.app_black')
@section('content')
    <section id="shop-section">
        <div id="card-shop">
            <nav class="nav-inventory">
                <div class="location">
                    <p>Inventory</p>
                </div>
                <div class="history-title">
                    <div>
                        <a  href="{{ route('history') }}">
                            <p>Shopping history</p>
                        </a>
                    </div>

                </div>
            </nav>
        </div>

    </section>
    <section id="inventory">
        <div id="inventory-card">
            <div id="avatars">
                <p>Avatars</p>
                <div id="inventory-grid">
                    @foreach ($items as $item)
                        @if ($item->category == 'avatar')
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
                    @foreach ($items as $item)
                        @if ($item->category == 'skin')
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
                            <img src="">
                        </div>
                        <div class="desc-title">
                            <p></p>
                        </div>
                    </div>
                    <div class="desc-body">
                        <p></p>
                    </div>
                    <div class="desc-options">
                        <form method="POST" action="{{ route('inventory.update', 1) }}">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="" name="id" class="hidden-input">
                            <button type="submit" class="btn btn-primary btn-action btn-equip">
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
        let descinventory = document.querySelector(".description-inventory");

        inventoryitem.forEach(item => {
            let itemData = JSON.parse(item.children[1].children[0].value);
                if(itemData.equipped == 1){
                    item.style.border = " 10px solid #235694be";
                }else{
                    item.style.border = " 12px solid gray";

                }
            //si le da click  a uno de los items obtenemos su JSON
            item.addEventListener("click", () => {
                //cuando le de click a algún item cambiaremos el display del menú de descripción
                descinventory.style.display = "block";
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
                let button = document.querySelector(".btn-equip");
                if(itemData.equipped == 1){
                    button.style.display = "none";
                }else{
                    button.style.display = "block";
                }
            })
        });
    </script>
@endsection
