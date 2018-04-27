<?php

namespace App;
use \Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
//    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];
    public static $rules = array(
        'username' => 'required|min:3',
        'password' => 'required'
        );
   
    public static $create = array(
        'name' => 'required|min:3',
        'email' => 'required',
        'password' => 'required'
        );
    
    public static $edit = array(
        'name' => 'required|min:3',
        'email' => 'required',
        );
   
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
