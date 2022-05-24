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
                  <form method="POST" action="{{ route('inventory.index') }}">
                    @csrf

                    <button type="submit" class="btn btn-primary btn-action">
                        <p>{{ __('Equip') }}</p>
                    </button>
                  </form>
                </div>
            </div>
        </div>
        
</div>
</section>


@endsection
