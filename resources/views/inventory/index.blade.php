@extends('layouts.app_black')
{{ $items[0]->equipped }}
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



                </div>
                <script>
                    let equippedstatus = ({{ $item->equipped }});
                    if(equippedstatus == 1){
                        let inventoryitem = document.querySelector(".inventory-item");
                        inventoryitem.style.border = " 12px solid #235694be";
                    }
                </script>
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
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <span></span>
        <div id="description">
            <div class="description-inventoty-header">

            </div>
        </div>
</div>
</section>


@endsection
