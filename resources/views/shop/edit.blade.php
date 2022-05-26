@extends('layouts.app_black')
@section('content')
<section>

<div id="image-box">
    <img id="product-img" src="{{ $product->image }}">

</div>
<div id="desc-box">
    <h1 class="text-title">{{ $product->name }}</h1>
    <p class="text">{{ $product->description }}</p>
    <!--<input type="checkbox" name="permissions[]" value=""-->
    <form method="POST" action="{{ route('shop.update',$product) }}">
        @csrf
        @method('PUT')
        <div class="form-group make-changes">
            <label for="available" class="col-md-4 col-form-label text-md-right"><p class="text">Available <input type="checkbox"  id="available" name="available" value="{{ $product->available }}"></p></label>


        </div>
         <span class="spanlabelsubmit"></span>
         <input type="text" name="product" class="hidden" value="{{ $product }}">
        <input type="submit" class="form-control btn btn-primary" value="Edit">
    </form>
</div>
<script src="{{ asset('js/admin.js')}}"></script>
</section>

@endsection

