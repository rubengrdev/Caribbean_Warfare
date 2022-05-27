<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Inventory;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Region;
use App\Score;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'region_id' => ['required', 'integer'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $createduser=User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id'=>1,
            'region_id' => $data['region_id'],
            'rank_id'=>1
        ]);

        $userid=User::select('id')->orderBy('created_at','desc')->first();

        Inventory::create(['user_id'=>$userid['id'],'product_id'=>1,'amount'=>1,'equipped'=>true,'created_at'=>now(),'updated_at'=>now()]);

        User::where('id',$userid['id'])->update(['avatar_id'=>1]);

        Score::create(['id_user'=>$userid['id'],'score'=>0,'date'=>now(),'created_at'=>now(),'updated_at'=>now()]);

        return $createduser;
    }
}
