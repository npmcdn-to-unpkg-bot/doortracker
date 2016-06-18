<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','token','user_id','created_at','updated_at'
    ];

    /**
     * Relation with App\User
     */
    public function user(){
        return $this -> belongsTo('App\User');
    }
}
