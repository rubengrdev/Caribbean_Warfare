<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'role_id', 'region_id', 'rank_id', 'avatar_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function score(){
        return $this->has(Score::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function region(){
        return $this->belongsTo(Region::class);
    }

    public function lobby(){
        return $this->belongsTo(Lobby::class);
    }

    public function matches(){
        return $this->hasMany(Matche::class);
    }

    public function current_game(){
        return $this->has(CurrentGame::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('amount')->withTimestamps();
    }

    public function isAdmin(User $user)
    {
        if ($user->role_id === 2) {
            return true;
        }
        return false;
    }
}
