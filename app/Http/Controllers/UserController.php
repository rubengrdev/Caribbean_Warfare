<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Inventory;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('users.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAdmin(Request $request)
    {
        if($request->role_id == null){
            return back();
        }
        $jsonuser = json_decode($request->user);
        $newrole = intval($request->role_id);

        $update = DB::table('users')
              ->where('id', $jsonuser->id)
              ->update(['role_id' => $newrole]);

        if($update){
            return redirect()->route('admin');
        }
        return back();
    }


    public function deleteAdmin(Request $request)
    {
       if(Auth::user()->role_id == 2){
            $user = User::where('id', $request->id);
            $user->delete();
            return redirect()->route('admin');
       }
       return back();
    }


     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        $validatedData = $request->validate([
            'username' => 'required|max:255',
            'email' => 'required|max:255'
        ]);

        if($user->update($validatedData)){
            return redirect()->route('home');
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //Inventory::where('user_id',Auth::user()->id)->delete();
        $user->delete();

        return view('welcome');
    }

    public function updateAvatar(Request $request)
    {
        //dd($request);
        $validatedData = $request->validate([
            'avatar_id' => 'nullable|max:20',
        ]);

        $user = User::where('id',Auth::user()->id);
        //dd($user);
        $user->update($validatedData,$user);

        return back();
    }

    public function admin(){
        $users= DB::table('users')->join('scores','scores.id_user','=','users.id')->join('products','users.avatar_id','=','products.id')->join('regions','users.region_id','=','regions.id')->orderBy('score', 'desc')->select('users.username','users.id','users.region_id','users.avatar_id','scores.score','products.image','regions.region')->where('role_id', 1)->get();
        return view('users.admin',  compact('users'));
    }


}
