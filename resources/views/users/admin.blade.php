@extends('layouts.app_black')

@section('content')
{{ $users }}
<section id="shop-section">
    <div id="card-shop">
        <nav class="nav-cart">
            <div class="location">
                <p>Admin Users</p>
            </div>
        </nav>
    </div>
</section>

<div id="shoppingcart-main">
    <div class="align-shop">
        @foreach($users as $u)
        <div class="cart-item">
            <div class="shoppingcart-image-desc">
                <img src="{{$u->image }}" />
            </div>
            <div class="shoppingcart-title">
                <p>{{$u->username }}</p>
            </div>

            <div class="shoppingcart-price">
                <form method="POST" action="{{ route('shoppingCart.destroy', $u->id) }}" class="adminuser">
                    @method('PUT')
                    @csrf
                    <select class="select-admin" name="roleselector">
                        <option selected="selected">Role</option>
                        <option value="1">User</option>
                        <option value="1">Admin</option>
                    </select>
                    <span class="admin-button">

                    </span>
                    <div class="form-group row mb-0  button-div">
                        <div class="col-md-6 offset-md-4 button-div">
                            <button type="submit" class="btn btn-primary btn-action blue">
                                <p>{{ __('Update') }}</p>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="shoppingcart-price">
                <form method="POST" action="{{ route('shoppingCart.destroy', $u->id) }}">
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

        </div>
    </div>

</div>
@endsection
