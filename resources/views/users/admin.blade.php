@extends('layouts.app_black')

@section('content')

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

        @if(count($users) == 0)
            <div class="center-admin">
                <div>
                    <p>No Users available</p>
                </div>
            </div>
            @else
            <p>*You can't modify Admin's Role*</p><br>
        @endif
        @foreach($users as $u)
        <div class="cart-item">
            <div class="shoppingcart-image-desc">
                <img alt="user profile image" src="{{$u->image }}" />
            </div>
            <div class="shoppingcart-title">
                <p>{{$u->username }}</p>
            </div>

            <div class="shoppingcart-price">
                <form method="POST" action="{{ route('admin.update') }}" class="adminuser">
                    @method('PUT')
                    @csrf
                    <select class="select-admin" name="role_id">
                        <option selected="true"  disabled="disabled">Role</option>
                        <option value="1">User</option>
                        <option value="2">Admin</option>
                    </select>
                    <input type="hidden" name="user" value="{{ json_encode($u) }}">
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
                <form method="POST" action="{{ route('admin.delete') }}">
                    @method('DELETE')
                    @csrf
                    <input type="hidden" name="id" value="{{ $u->id }}">
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
