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

                    <form method="POST" class="form-invent formput" action="">
                        @csrf
                        @method('PUT')

                        <div class="inventory-item" oncontextmenu="javascript:imageDetail({{ json_encode($item) }}); return false;">
                            <a class="inventory-item-img">
                                <img src="{{ $item->image }}">
                                <div class="reverse-image">
                                    <button class="btn-simple">
                                        <p>{{ $item->name }}</p>
                                    </button>
                                </div>
                            </a>
                            <form>
                                <input type="hidden" class="inventory-item-blade" value="{{ json_encode($item) }}">
                            </form>
                            <input type="hidden" value="" name="id" class="hidden-input">

                        </div>
                        <input type="submit" class="button-hidden">
                        </input>
                    </form>
                    @endif
                    @endforeach
                </div>

            </div>
            <span></span>
            <div id="skins">
                <p>Skins</p>
                <div id="inventory-grid">
                    @foreach ($items as $item)

                    @if ($item->category == 'skins')

                    <form method="POST" class="form-invent formput" action="">
                        @csrf
                        @method('PUT')

                        <div class="inventory-item" oncontextmenu="javascript:imageDetail({{ json_encode($item) }}); return false;">
                            <a class="inventory-item-img">
                                <img src="{{ $item->image }}">
                                <div class="reverse-image">
                                    <button class="btn-simple">
                                        <p>{{ $item->name }}</p>
                                    </button>
                                </div>
                            </a>
                            <form>
                                <input type="hidden" class="inventory-item-blade" value="{{ json_encode($item) }}">
                            </form>
                            <input type="hidden" value="" name="id" class="hidden-input">

                        </div>
                        <input type="submit" class="button-hidden">
                        </input>
                    </form>
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

                </div>
            </div>

        </div>
    </section>
    <script>
        let inventoryitem = document.querySelectorAll(".inventory-item");

        inventoryitem.forEach(item => {

            let itemData = JSON.parse(item.children[1].value);
                if(itemData.equipped == 1){
                    item.style.border = " 10px solid #235694be";
                }else{
                    item.style.border = " 12px solid gray";

                }
            //si le da click  a uno de los items obtenemos su JSON
            item.addEventListener("click", () => {
                let itemData = JSON.parse(item.children[1].value);
                //agregamos el valor que pasaremos por ID al mediante el formulario hidden, cuando pulse el botón de equipar enviará un Request al método Update
                let hiddeninput = document.querySelector(".hidden-input");
                hiddeninput.value = itemData.product_id;
                let inventform = document.querySelector(".form-invent");
                let route = window.location.href;
                let id = itemData.id;
                let fullroute = route + "/" + id;
                inventform.action = fullroute;
                let buttonh = document.querySelector(".button-hidden");
                inventform.submit();
            })
        });


        function imageDetail(json){
            console.log(json)
            let inventoryitemimg = document.querySelectorAll(".inventory-item-img");
            let image = document.querySelectorAll(".inventory-item img");

            let getObjects = document.querySelectorAll(".inventory-item-blade");
            inventoryitemimg.forEach(element => {

                if(json.id == JSON.parse(element.parentElement.children[1].value).id){


                    if(element.children[0].style.display == "none"){
                        element.children[0].style.display = "flex";
                        element.children[1].style.display = "none";

                        return false;


                    }else{
                        element.children[0].style.display = "none";
                        element.children[1].style.display = "flex";

                        return false;
                    }

                }

            });

            return false;
        }
    </script>
@endsection
